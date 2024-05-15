<x-guest-layout>
    <div class="text-base">
        <div
            class="w-full px-12 max-w-[1500px] m-auto">
            <x-main-menu-component />
            <x-page-title title="{{ __('booking.booking') }}" />
            {{-- <p class="text-xs lg:text-base mb-8 text-center">{{__('contact.feel_free_to_contact')}}</p> --}}
            <div x-data="{
                tab : 0,
                specialties: [],
                doctors: [],
                specialtyDoctors: [],
                specialtyCode: '',
                doctorId: '',
                dates: [],
                timeslots: [],
                theDate: '',
                theSlot: '',
                divWidth: 0,
                divWidthOriginal: 0,
                name: '',
                phone: '',
                email: '',
                airpayFields: '',
                solverOk: true,
                fetchDates() {
                    axios.get(
                        '{{route('booking.dates')}}',
                        {
                            params: {
                                'SP_CD': this.specialtyCode,
                                'CONS_ID': this.doctorId
                            }
                        }
                    ).then((r) => {
                        if (r.data.dates.length == 0) {
                            $dispatch(
                                'showtoast',
                                {
                                    message: '{{ __('booking.no_dates_available') }}',
                                    mode: 'error'
                                }
                            );
                        } else {
                            this.dates = r.data.dates;
                        }
                        console.log(r);
                    }).catch((e) => {
                        console.log(e);
                        $dispatch(
                                'showtoast',
                                {
                                    message: '{!! __('booking.sorry_unexpector_error') !!}',
                                    mode: 'error'
                                }
                            );
                    });
                },
                fetchTimeslots() {
                    axios.get(
                        '{{route('booking.slots')}}',
                        {
                            params: {
                                'SP_CD': this.specialtyCode,
                                'CONS_ID': this.doctorId,
                                'SELECTED_DATE': this.theDate
                            }
                        }
                    ).then((r) => {
                        console.log('slots:');
                        console.log(r.data.slots);
                        if (r.data.slots.length == 0) {
                            $dispatch(
                                'showtoast',
                                {
                                    message: '{{ __('booking.no_dates_available') }}',
                                    mode: 'error'
                                }
                            );
                        } else {
                            this.timeslots = r.data.slots;
                        }
                        console.log(r);
                    }).catch((e) => {
                        console.log(e);
                        $dispatch(
                                'showtoast',
                                {
                                    message: '{!! __('booking.sorry_unexpector_error') !!}',
                                    mode: 'error'
                                }
                            );
                    });
                },
                getSpecialtyName(code) {
                    return this.specialties.filter((s) => {
                        return s.Sp_Cd == code;
                    })[0].SpecialtyName;
                },
                getDoctorName(id) {
                    return this.doctors.filter((d) => {
                        return d.DoctorId == id;
                    })[0].DoctorName;
                },
                getPaymentForm() {
                    axios.get(
                        '{{route('payment.airpay.form')}}',
                        {
                            params: {
                                'email': this.email,
                                'phone': this.phone,
                                'name': this.name,
                                'sp_cd': this.specialtyCode,
                                'cons_id': this.doctorId,
                                'sdate': this.theDate,
                                'stime': this.theSlot,
                                'sp_name': this.getSpecialtyName(this.specialtyCode),
                                'cons_name': this.getDoctorName(this.doctorId),
                            }
                        }
                    ).then((r) => {
                        console.log('form fields:');
                        console.log(r.data.fields);
                        if (r.data.fields.length == 0) {
                            $dispatch(
                                'showtoast',
                                {
                                    message: '{{ __('booking.system_is_unable') }}',
                                    mode: 'error'
                                }
                            );
                        } else {
                            this.airpayFields = r.data.fields;
                            $nextTick(() => {
                                document.getElementById('airpay-form').submit();
                            });
                        }
                        console.log(r);
                    }).catch((e) => {
                        console.log(e);
                        $dispatch(
                                'showtoast',
                                {
                                    message: '{{ __('booking.system_is_unable') }}',
                                    mode: 'error'
                                }
                            );
                    });
                },
                hasDoctors(sid) {
                    return (this.doctors.filter((d) => {
                        return d.SP_CD == sid;
                    })).length > 0;
                },
                inputsReady() {
                    return this.theDate != '' &&
                        this.theSlot != '' &&
                        this.name != '' &&
                        this.phone != '' &&
                        this.email != '';
                }
            }"
            x-init="
                $watch('specialtyCode', (code) => {
                    console.log('code: '+specialtyCode);
                    doctorId = '';
                    specialtyDoctors = doctors.filter((d) => {
                        return d.SP_CD == code;
                    });
                });
                $watch('doctorId', (id) => {
                    theDate = '';
                    theSlot = '';
                    if (id != '') {
                        fetchDates();
                    }

                });
                $watch('theDate', (d) => {
                    theSlot = '';
                    if (d != '') {
                        fetchTimeslots();
                    }
                });
                $watch('theSlot', (d) => {
                    divWidth = divWidthOriginal;
                    {{-- if (d != '') {
                        fetchTimeslots();
                    } --}}
                });
                @if (isset($doctors))
                    doctors = {{Js::from($doctors)}};
                @else
                    solverOk = false;
                @endif
                @if (isset($specialties))
                    specialties = {{Js::from($specialties)}}.filter((s) => {
                        return hasDoctors(s.Sp_Cd);dbng
                    });
                @else
                    solverOk = false;
                @endif

                divWidthOriginal = document.getElementById('booking-form-div').offsetWidth / 2;
                divWidth = 0;
            "
            class="min-h-1/2 gap-4 w-full border border-gray p-8">
                <div x-show="solverOk" id="booking-form-div" class="flex w-full justify-center py-4 mb-4 px-8">
                    {{-- <x-booking-stage-component/> --}}
                    {{-- <x-bookingstage1 /> --}}
                    {{-- <x-bookingstage2 />
                    <x-bookingstage3 /> --}}
                    <div class="flex flex-col gap-y-3 w-1/2 p-3 border border-lightgray bg-lightgray">
                        <div class="relative flex-grow">
                            <label class="font-bold label" for="title1">{{__('doctors.department')}}</label>
                            <select x-model="specialtyCode" id="title1" name="title1" type="text" autocomplete="title1"
                                class="select bg-white px-2 w-full  h-10 text-gray-900 placeholder-transparent    focus:outline-none  focus:border-0
                                    border-gray"
                                required>
                                <option value="">--{{__('contact.select')}}--</option>
                                <template x-for="(s, i) in specialties">
                                    <option :value="s.Sp_Cd" x-text="s.SpecialtyName"></option>
                                </template>
                            </select>
                        </div>
                        <div class="relative flex-grow">
                                <label class="font-bold label" for="title2">{{__('contact.doctor')}}</label>
                                <select x-model="doctorId" id="title2" name="title2" type="text" autocomplete="title2"
                                    class="select bg-white px-2 w-full  h-10 text-gray-900 placeholder-transparent    focus:outline-none  focus:border-0
                                        border-gray"
                                    required>
                                    <option value="">--{{__('contact.select')}}--</option>
                                    <template x-for="(d, i) in specialtyDoctors">
                                        <option :value="d.DoctorId" x-text="d.DoctorName"></option>
                                    </template>
                                </select>
                        </div>
                        <div class="relative flex-grow">
                                <label class="font-bold label" for="title2">{{__('contact.consultation_date')}}</label>
                                <select x-model="theDate" id="title2" name="title2" type="text" autocomplete="title2"
                                    class="select bg-white px-2 w-full  h-10 text-gray-900 placeholder-transparent    focus:outline-none  focus:border-0
                                        border-gray"
                                    required>
                                    <option value="">--{{__('contact.select')}}--</option>
                                    <template x-for="(d, i) in dates">
                                        <option :value="d.return_date" x-text="d.display_date"></option>
                                    </template>
                                </select>
                        </div>
                        <div class="relative flex-grow">
                            <label class="font-bold label" for="title2">{{__('contact.consultation_time')}}</label>
                            <select x-model="theSlot" id="title2" name="title2" type="text" autocomplete="title2"
                                class="select bg-white px-2 w-full  h-10 text-gray-900 placeholder-transparent    focus:outline-none  focus:border-0
                                    border-gray"
                                required>
                                <option value="">--{{__('contact.select')}}--</option>
                                <template x-for="(t, i) in timeslots">
                                    <option :value="t.return_time" x-text="t.display_time"></option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div id="personal-div" :style="`width: ${divWidth}px;`" class="flex flex-col gap-y-3 transition-all overflow-hidden bg-lightgray"
                        :class="divWidth == 0 || 'p-3 border border-lightgray border-l-transparent'">
                        <h3 class="font-bold mt-2 text-center overflow-hidden" :class="divWidth != 0 || 'text-nowrap'">{{__('contact.please_enter_your_contact_details')}}</h3>
                        <div class="relative text-sm text-error overflow-hidden" :class="divWidth != 0 || 'text-nowrap'">
                        {{__('contact.make_sure_correct_details_entered')}}
                        </div>
                        <div class="relative">
                            <label class="label font-bold" for="name">{{__('contact.name')}}</label>
                            <input x-model="name" name="name" type="text" autocomplete="name"
                                class="input bg-white w-full  h-10 text-gray-900 placeholder-transparent    focus:outline-none  focus:border-0
                                    border-gray"
                                required>
                            </input>
                        </div>
                        <div class="relative">
                            <label class="label font-bold" for="phone no.">{{__('contact.phone_no')}}</label>
                            <input x-model="phone" name="phone no." type="text" autocomplete="phone no."
                                class="input bg-white w-full  h-10 text-gray-900 placeholder-transparent    focus:outline-none  focus:border-0 border-gray"
                                required>
                            </input>
                        </div>
                        <div class="relative">
                            <label class="label font-bold" for="phone no.">{{__('contact.email_contact')}}</label>
                            <input x-model="email" name="email" type="text" autocomplete="email"
                                class="input bg-white w-full  h-10 text-gray-900 placeholder-transparent    focus:outline-none  focus:border-0 border-gray"
                                required>
                            </input>
                        </div>
                    </div>
                </div>
                <div x-show="solverOk" class="flex justify-center">
                    <form id="airpay-form"  action="https://payments.airpay.co.in/pay/index.php" method="post">
                        <div x-html="airpayFields"></div>
                    </form>
                    <button type="button" @click="getPaymentForm();" class="text-white bg-blue text-xs lg:text-sm py-2 px-4 lg:py-2 lg:px-6 tracking-widest cursor-pointer disabled:bg-opacity-70 disabled:cursor-crosshair" :disabled="!inputsReady()">{{__('contact.confirm')}}</button>
                </div>
                <div x-show="!solverOk" class="p-8 text-center">
                    THe booking server is unavailable now. Please try later.
                </div>
            </div>
        </div>
    </div>
    <x-footer/>
</x-guest-layout>



