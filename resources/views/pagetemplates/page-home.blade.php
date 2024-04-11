<x-guest-layout>
    <div class="bg-white items-center max-w-8xl  mx-auto text-base-content ">
        <div>
            <div class="relative flex flex-col items-center">
                <x-main-menu-component />
                <div class="absolute z-0 top-0 left-0 h-full w-full flex flex-row">
                    <div class="h-full w-full flex flex-col justify-between items-end">
                        <div class="bg-gray w-1/2 md:w-72 lg:w-77 h-28 md:h-28 lg:h-30"></div>
                        <div class="bg-gray w-1/2 md:w-72 lg:w-77 h-28 md:h-28 lg:h-30"></div>
                    </div>
                    <div class="h-full w-32 lg:w-36 bg-gray"></div>
                </div>

                <div class="md:flex w-full md:px-16 lg:px-24 z-10">
                    <div
                        class=" lg:w-1/2 hidden lg:flex lg:mt-24 lg:text-4xl xl:text-[2.75rem] font-thin font-franklin lg:flex-col justify-center">
                        <p class="text-darkgray leading-[3.25rem]">
                            {!! $instance->current_translation->data['title'] !!}
                        </p>
                        <div class="lg:flex lg:mt-12 lg:space-x-1">
                            <x-bluebutton-component text="{{ __('button.book_an_appointment') }}" href="{{route('booking')}}" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('booking')}}', route: 'booking'})" />
                            <x-pinkbutton-component text="{{ __('button.chat_with_us') }}" href="https://wa.me/918590462565" />
                        </div>
                        <p class="mt-8 font-bold md:text-base xl:text-lg 2xl:text-xl flex font-gothic">
                            Feel Free To Call Us Any Time
                        </p>
                        <div class="flex  mt-2 flex-row items-center space-x-1">
                            <img src="/images/icons/Phone.png" class="h-3  2xl:h-5 "alt="">
                            <p class="text-black text-sm  md:text-base xl:text-lg 2xl:text-xl font-light">+91 8590462565
                            </p>
                        </div>
                        <p class="text-sm text-darkpink  md:text-base font-normal xl:text-lg  mt-2 md:mt-4">
                            Kochi | Kodungallur
                        </p>
                    </div>
                    <div class="lg:w-1/2">
                        <div class="flex justify-center lg:flex lg:justify-normal">
                            <img src="/images/home/baby.jpg"
                                class="w-2/3 sm:w-4/5 md:w-3/4 lg:w-10.5/12 shadow-[5px_5px_4px_2px_rgba(0,0,0,0.3)] relative z-10 "alt="baby_image">
                        </div>
                        <div class="flex justify-center">
                            <div
                                class="flex flex-col justify-center lg:hidden absolute  bg-lightgray/80 z-20  text-center font-franklin w-4/5 sm:w-11/12 md:w-11/12  text-2xl md:text-3xl py-6 md:py-12 md:-mt-16  -mt-12 shadow-[0px_10px_12px_-4px_rgba(0,0,0,0.3)]">
                                <p class="text-darkgray">The <span class="text-pink">Most Trusted</span> Hospital</p>
                                <p class="text-darkgray">For <span class="text-blue">Infertility Treatment</span></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="lg:hidden mt-24 sm:mt-28 sm:pt-0 relative ">
                    <div class="flex justify-center ltr:space-x-2 rtl:space-x-2 rtl:space-x-reverse md:mt-36">
                        <x-bluebutton-component />
                        <x-pinkbutton-component />
                    </div>
                    <div class="">
                        <p class="mt-8 font-bold md:text-base text-center  font-gothic">Feel Free To Call Us Any Time
                        </p>
                        <div class="flex justify-center  mt-2 flex-row items-center space-x-1">
                            <img src="/images/icons/Phone.png" class="h-3  2xl:h-5 "alt="">
                            <p class="text-black text-sm  md:text-base xl:text-lg 2xl:text-xl font-light">+91 8590462565
                            </p>
                        </div>
                        <p class="text-sm text-darkpink text-center md:text-base font-normal xl:text-lg  mt-2 md:mt-4">
                            Kochi
                            | Kodungallur</p>
                    </div>


                </div>
                <div class="mt-10 z-10">
                    <p
                        class="  lg:block text-sm italic text-pink  md:text-base xl:text-lg 2xl:text-xl font-normal text-center ">
                        <span class="font-bold">55,000 </span> little angles & counting...
                    </p>
                    <div
                        class="flex justify-center space-x-4  sm:space-x-6    md:space-x-8  lg:space-x-32  rtl:space-x-reverse z-20 relative mt-6 pb-12">
                        <x-babynew-component :count="'14,000'" :text="'IVF-ICFSI'" />
                        <x-babynew-component :count="'3,800'" :text="'MTESE-TESA ICSI'" />
                        <x-babynew-component :count="'500'" :text="'PGS/PGD'" />
                    </div>
                </div>

            </div>
        </div>

        <div class="my-20 flex flex-col w-full px-2 md:px-16 lg:px-24 z-10">
            <h2 class="text-darkgray text-3xl text-center font-franklin">What our Patients Are Saying</h2>

            <div class="ltr:flex flex-row w-full rtl:flex-reverse  mt-4">
                <img src="/images/icons/google icon.webp" class="h-6 lg:h-8 xl:h-10 rounded-full border border-gray"
                    alt="">
                <p
                    class="text-darkgray font-franklin ltr:text-left rtl:text-right  text-base lg:text-lg xl:text-xl xl:p-2">
                    Reviews</p>
            </div>

            {{-- <div class="mt-8 flex justify-center md:hidden">
                <x-review-component />
            </div> --}}

            <div class="mt-8 justify-between">
                <div x-data="{
                        dir: 'ltr',
                        itemWidth: 0,
                        reviews: [],
                        currentItems: [],
                        slideForward() {
                            if (this.currentItems.length == 3 && this.currentItems[2] != this.reviews.length -1 ) {
                                this.currentItems = [this.currentItems[1], this.currentItems[2], this.currentItems[2] + 1];
                            } else if (this.currentItems.length == 1 && this.currentItems[0] != this.reviews.length - 1) {
                                this.currentItems = [this.currentItems[0] + 1];
                            }
                        },
                        slideBackward() {
                            if (this.currentItems.length == 3 && this.currentItems[0] != 0 ) {
                                this.currentItems = [this.currentItems[0] - 1, this.currentItems[0], this.currentItems[1]];
                            } else if (this.currentItems.length == 1 && this.currentItems[0] != 0) {
                                this.currentItems = [this.currentItems[0] - 1];
                            }
                        },
                        setItemWidth() {
                            this.itemWidth = itemWidth = $el.offsetWidth / this.currentItems.length;
                        },
                        setCurrentItems () {
                            if (window.innerWidth > 768) {
                                if(this.currentItems.length != 3) {
                                    let rlen = this.reviews.length;
                                    this.currentItems = this.dir == 'ltr' ? [0, 1, 2] : [rlen - 3, rlen - 2, rlen - 1];
                                }
                            } else {
                                if(this.currentItems.length != 1) {
                                    this.currentItems = this.dir == 'ltr' ? [0] : [this.reviews.length - 1];
                                }
                            }
                            this.setItemWidth();
                        }
                    }"
                    x-init="
                        dir = '{{App::currentLocale() == 'en' ? 'ltr' : 'rtl'}}';
                        $nextTick(() => {
                            reviews = {{Js::from($data['reviews'])}};
                            setCurrentItems();

                        });
                    "
                    @resize.window="setCurrentItems();"
                    class="relative flex ltr:flex-row rtl:flex-row-reverse justify-between w-full overflow-x-hidden p-0 m-0"
                    >
                    <div  class="absolute z-10 h-full top-0 left-0 flex flex-row items-center" :class="currentItems[0] != 0 || 'hidden'">
                        <button type="button" @click.prevent.stop="slideBackward();" class="text-darkgray opacity-40 hover:opacity-100 cursor-pointer">
                            <x-easyadmin::display.icon icon="icons.chevron_left" height="h-20" width="w-20" />
                        </button>
                    </div>
                    <div class="relative flex ltr:flex-row rtl:flex-row-reverse justify-between w-full overflow-x-hidden p-0 m-0">
                        <template x-for="(r, i) in reviews">
                            <div class="transition-all overflow-hidden flex flex-row flex-nowrap justify-center" :style="currentItems.includes(i) ? `width: ${itemWidth}px` : 'width: 0px'" >
                                <div class="w-full lg:max-w-96 my-3" :style="`min-width: ${itemWidth - 20}px`">
                                    <div class="bg-base-100 bg-opacity-40 rounded-sm shadow-[0px_1px_3px_2px_rgba(0,0,0,0.3)] mx-2 pb-5">
                                        <div class="flex w-full p-2 items-center">
                                            <div>
                                                <img src="/images/icons/double qoute left1.png" class="h-16" alt="">
                                            </div>
                                            <div>
                                                <div>
                                                    <p class="font-franklin font-bold text-sm" x-text="r.current_translation.data.reviewer"></p>
                                                </div>
                                                <div class="flex flex-row">
                                                <x-easyadmin::display.icon icon="icons.star" height="h-4" width="w-4" />
                                                <x-easyadmin::display.icon icon="icons.star" height="h-4" width="w-4" />
                                                <x-easyadmin::display.icon icon="icons.star" height="h-4" width="w-4" />
                                                <x-easyadmin::display.icon icon="icons.star" height="h-4" width="w-4" />
                                                <x-easyadmin::display.icon icon="icons.star" height="h-4" width="w-4" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 max-h-52 md:h-52 overflow-y-scroll">
                                            <p class="text-sm lg:leading-5 font-franklin font-normal text-left" x-text="r.current_translation.data.review"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    <div :class="currentItems[currentItems.length - 1] != reviews.length - 1 || 'hidden'" class="absolute z-10 h-full top-0 right-0 flex flex-row items-center">
                        <button type="button" @click.prevent.stop="slideForward();" class="text-darkgray opacity-40 hover:opacity-100 cursor-pointer">
                            <x-easyadmin::display.icon icon="icons.chevron_right" height="h-20" width="w-20" />
                        </button>
                    </div>
                </div>
            </div>

            <div
                class="mt-6 flex ltr:justify-end rtl:justify-end ltr:md:justify-center rtl:md:justify-center ltr:mr-10  rtl:ml-10 ltr:sm:mr-40 rtl:sm:ml-40 ltr:md:mr-0 rtl:md:ml-0 ">
                <x-viewallbutton-component text="{{ __('button.more_reviews') }}" href="{{route('patientreviews.loc', ['locale' => app()->currentLocale()])}}"/>
            </div>
        </div>

        <div class="relative my-20 w-full z-10 px-2 md:px-0">
            <div class="absolute bg-gray w-full md:w-1/2 h-full top-0 ltr:left-0 rtl:right-0 z-0 "></div>
            <div class="flex flex-col md:flex-row relative w-full md:px-16 lg:px-24 z-10">
                <div class="w-full md:w-1/2 py-4 md:py-16 relative">
                    <div class="absolute z-0 top-0 py-10 left-0 h-full w-full">
                        <img src="/images/icons/qouteleftgray.png" class="h-full hidden md:block z-0 dir-img"alt="">
                    </div>
                    <h2 class="text-3xl text-darkgray font-franklin pt-6 relative z-40">Video
                        Testimonials</h2>
                    <p class="z-40 relative w-2/3 text-2xl text-darkgray font-franklin mt-3 lg:mt-8 ">Our patients are
                        our best
                        advocates, hear the inspiring stories of their treatment journey</p>
                    <div class="hidden md:block mt-4 lg:mt-8 z-20 relative"><x-viewallbutton-component
                            text="{{ __('button.all_testimonials') }}" href="{{route('videotestimonials.loc', ['locale' => app()->currentLocale()])}}"/></div>
                </div>
                <div x-data="{
                        dir: 'ltr',
                        itemWidth: 0,
                        itemHeight: 0,
                        wrapperWidth: 0,
                        videos: [],
                        currentItems: [],
                        wrapperOffset: 0,
                        slideForward() {
                            if (this.currentItems[0] != this.videos.length - 1) {
                                this.wrapperOffset = this.wrapperOffset - this.itemWidth;
                                this.currentItems[0]++;
                            }
                        },
                        slideBackward() {
                            if (this.currentItems[0] != 0) {
                                this.wrapperOffset = this.wrapperOffset + this.itemWidth;
                                this.currentItems[0]--;
                            }
                        },
                        setItemWidth() {
                            this.itemWidth = document.getElementById('video-container').offsetWidth;
                            this.wrapperWidth = this.itemWidth * this.videos.length;
                        },
                        setCurrentItems () {
                            this.currentItems = this.dir == 'ltr' ? [0] : [this.videos.length - 1];
                            this.setItemWidth();
                        }
                    }"
                    x-init="
                        dir = '{{App::currentLocale() == 'en' ? 'ltr' : 'rtl'}}';
                        $nextTick(() => {
                            videos = {{Js::from($data['videos'])}};
                            setCurrentItems();
                            setItemWidth();
                            console.log('videos');
                            console.log(videos);
                        });
                    "
                    @resize.window="setItemWidth();"
                    class="w-full md:w-1/2 relative py-4 md:py-16">
                    <div class="absolute top-0 ltr:left-0 rtl:right-0 bg-gray w-1/2 h-full z-0">
                    </div>
                    <div id="video-container" class="w-full overflow-hidden">
                        <div :style="`width: ${wrapperWidth}px; transform: translate(${wrapperOffset}px);`" class="flex flex-row transition-all">
                            <template x-for="(v, i) in videos">
                                <div :style="`width: ${itemWidth}px`">
                                    <div class="relative z-10" style="position:relative;padding-bottom:56.25%">
                                        <iframe width="100%" height="100%"
                                            class="w-full absolute top-0 left-0" :src="v.link"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                                            referrerpolicy="origin" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="relative mt-4 flex ltr:flex-row rtl:flex-row-reverse justify-center space-x-4">
                        <button type="button" @click.prevent.stop="slideBackward();"
                            class="border border-gray bg-darkgray text-white p-2 w-7-h-7 rounded-full flex items-center justify-center disabled:bg-gray shadow-lg" :disabled="currentItems[0] == 0">
                            <x-easyadmin::display.icon icon="icons.chevron_left" height="h-6"
                                width="w-6" />
                        </button>
                        <button type="button" @click.prevent.stop="slideForward();"
                            class="border border-gray bg-darkgray text-white p-2 w-7-h-7 rounded-full flex items-center justify-center disabled:bg-gray shadow-lg" :disabled="currentItems[currentItems.length - 1] == videos.length - 1">
                            <x-easyadmin::display.icon icon="icons.chevron_right" height="h-6"
                                width="w-6" />
                        </button>
                    </div>
                    <div class="md:hidden mt-8 lg:mt-8 z-20 relative flex flex-row justify-center">
                        <x-viewallbutton-component
                            text="All Testimonials" href="{{route('videotestimonials.loc', ['locale' => app()->currentLocale()])}}"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <h2 class="text-darkgray text-3xl text-center font-franklin">Why Is Your IVF Cycle In Craft Most Likely To
                Be Successful </h2>
        </div>
        <div class=" relative my-10 flex flex-col lg:hidden justify-center w-full md:px-16 lg:px-24 z-10 h-fit items-stretch">
            <div class="flex flex-row flex-wrap w-full items-center justify-center">
                <div class="p-2 w-full sm:w-1/2 min-w-64 max-w-96"><x-feature-component :feature="$data['hfeatures']['L00']" /></div>
                <div class="p-2 w-full sm:w-1/2 min-w-64 max-w-96"><x-feature-component :feature="$data['hfeatures']['L01']" /></div>
            </div>
            <div class="flex flex-row flex-wrap w-full items-center justify-center">
                <div class="p-2 w-full sm:w-1/2 min-w-64 max-w-96"><x-feature-component :feature="$data['hfeatures']['L10']" /></div>
                <div class="p-2 w-full sm:w-1/2 min-w-64 max-w-96"><x-feature-component :feature="$data['hfeatures']['L11']" /></div>
            </div>
            <div class="flex flex-row flex-wrap w-full items-center justify-center">
                <div class="p-2 w-full sm:w-1/2 min-w-64 max-w-96"><x-feature-component :feature="$data['hfeatures']['R00']" /></div>
                <div class="p-2 w-full sm:w-1/2 min-w-64 max-w-96"><x-feature-component :feature="$data['hfeatures']['R01']" /></div>
            </div>
            <div class="flex flex-row flex-wrap w-full items-center justify-center">
                <div class="p-2 w-full sm:w-1/2 min-w-64 max-w-96"><x-feature-component :feature="$data['hfeatures']['R10']" /></div>
                <div class="p-2 w-full sm:w-1/2 min-w-64 max-w-96"><x-feature-component :feature="$data['hfeatures']['R11']" /></div>
            </div>
        </div>

        <div x-data="{
                    features: [],
                    currentKey: 'L00'
                }"
                x-init="
                    features = {{Js::from($data['hfeatures'])}};
                    console.log('features')
                    console.log(features)
                "
                @hfeature.window="currentKey = $event.detail.ref;" class="hidden relative my-16 lg:flex flex-row justify-center w-full md:px-16 lg:px-24 z-10 h-fit">
            <div
                class="relative w-1/2 border border-gray p-8">
                <div class="absolute h-full w-full top-0 left-0 z-0 flex justify-center">
                    <img src="/images/icons/vector women pink_Mesa de trabajo 1.png" class="h-full opacity-40 dir-img"
                        alt="pregnant_lady_image">
                </div>
                <div class="relative z-40">
                        <div class="flex justify-center items-center min-h-96">
                            <div>
                                <div class="flex justify-center items-center">
                                    <div class="text-pink">
                                        <x-easyadmin::display.icon icon="icons.sperm" height="h-16"
                                            width="w-16" />
                                    </div>
                                    <div class="items-center mt-1">
                                        <h3 class="font-bold text-2xl font-questrial "
                                            x-text="features[currentKey] != undefined ? features[currentKey].current_translation.data.title : ''">100% non-donor policy</h3>
                                    </div>
                                </div>
                                <div
                                    class="flex justify-center z-40 text-sm lg:text-base font-normal font-questrial text-justify w-3/4 m-auto px-[6%]"
                                    x-text="features[currentKey] != undefined ? features[currentKey].current_translation.data.description : ''">
                                    We’re
                                    the only centre in India that strictly follows a non-donor (self-parentage) IVF
                                    policy. We
                                    truly believe in 100% biological parentage. Hence with us, the end result is your
                                    own blood.
                                    To ensure that all babies born through IVF are biologically yours, we use an RI
                                    Witnessing
                                    system through Radio Frequency Identification (RFID) to detect and monitor all
                                    activity in
                                    the IVF Laboratory. The system helps mitigate the risk of human error there by
                                    ensuring that
                                    all embryos transferred are yours and yours alone.
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="absolute h-full w-full z-10 top-0 left-0 flex justify-center items-center">
                <div
                    class="w-full lg:w-10/12 xl:4/5 flex ltr:flex-row rtl:flex-row-reverse justify-between items-center">
                    <div class="flex flex-col ltr:justify-end rtl:justify-start space-y-8">
                        <div class="flex flex-row">
                            <x-cycle-component :title="$data['hfeatures']['L00']->current_translation->data['title']" ref_key="L00"/>
                            <div class="p-4"></div>
                            <x-cycle-component :title="$data['hfeatures']['L01']->current_translation->data['title']" ref_key="L01"/>
                        </div>
                        <div class="flex">
                            <x-cycle-component :title="$data['hfeatures']['L10']->current_translation->data['title']" ref_key="L10"/>
                            <div class="p-4"></div>
                            <x-cycle-component :title="$data['hfeatures']['L11']->current_translation->data['title']" ref_key="L11"/>
                        </div>
                    </div>
                    <div class="flex-col ltr:justify-start rtl:justify-end space-y-8">
                        <div class="flex">
                            <x-cycle-component :title="$data['hfeatures']['R00']->current_translation->data['title']"  ref_key="R00"/>
                            <div class="p-4"></div>
                            <x-cycle-component :title="$data['hfeatures']['R01']->current_translation->data['title']"  ref_key="R01"/>
                        </div>
                        <div class="flex">
                            <x-cycle-component :title="$data['hfeatures']['R10']->current_translation->data['title']"  ref_key="R10"/>
                            <div class="p-4"></div>
                            <x-cycle-component :title="$data['hfeatures']['R11']->current_translation->data['title']"  ref_key="R11"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative my-20 flex flex-col lg:flex-row justify-center items-center w-full md:px-16 lg:px-24 z-10">
            <div class="w-full lg:w-1/3">
                <p class="text-4xl text-darkgray font-franklin my-6 relative z-40">
                    Our Experienced And<br>Certified Doctors
                </p>
                <p>
                    <x-viewallbutton-component text="{{ __('button.all_doctors') }}" href="{{route('doctors.loc', ['locale' => app()->currentLocale()])}}"/>
                </p>
            </div>
            <div x-data="{
                    dir: 'ltr',
                    itemWidth: 0,
                    doctors: [],
                    currentItems: [],
                    slideForward() {
                        if (this.currentItems.length == 3 && this.currentItems[2] != this.doctors.length -1 ) {
                            this.currentItems = [this.currentItems[1], this.currentItems[2], this.currentItems[2] + 1];
                        } else if (this.currentItems.length == 1 && this.currentItems[0] != this.doctors.length - 1) {
                            this.currentItems = [this.currentItems[0] + 1];
                        }
                    },
                    slideBackward() {
                        if (this.currentItems.length == 3 && this.currentItems[0] != 0 ) {
                            this.currentItems = [this.currentItems[0] - 1, this.currentItems[0], this.currentItems[1]];
                        } else if (this.currentItems.length == 1 && this.currentItems[0] != 0) {
                            this.currentItems = [this.currentItems[0] - 1];
                        }
                    },
                    setItemWidth() {
                        this.itemWidth = itemWidth = $el.offsetWidth / this.currentItems.length;
                    },
                    setCurrentItems () {
                        if (window.innerWidth > 640) {
                            if(this.currentItems.length != 3) {
                                let rlen = this.doctors.length;
                                this.currentItems = this.dir == 'ltr' ? [0, 1, 2] : [rlen - 3, rlen - 2, rlen - 1];
                            }
                        } else {
                            if(this.currentItems.length != 1) {
                                this.currentItems = this.dir == 'ltr' ? [0] : [this.doctors.length - 1];
                            }
                        }
                        this.setItemWidth();
                    }
                }"
                x-init="
                    dir = '{{App::currentLocale() == 'en' ? 'ltr' : 'rtl'}}';
                    $nextTick(() => {
                        doctors = {{Js::from($data['doctors'])}};
                        setCurrentItems();
                    });
                "
                @resize.window="setCurrentItems();"
                class="w-full lg:w-2/3">
                <div class="w-full flex ltr:flex-row rtl:flex-row-reverse md:flex-nowrap justify-center md:justify-between overflow-hidden">
                    <template x-for="(d,i) in doctors">
                        <div :style="currentItems.includes(i) ? `width: ${itemWidth}px` : 'width: 0px'"
                            class="flex flex-row justify-center md:justify-between transition-all overflow-x-hidden">
                            <div class="mx-3">
                                <div class="w-56 relative shadow-[0px_10px_12px_-4px_rgba(0,0,0,0.3)] ">
                                   <div class="px-4">
                                      <p class="text-xl font-franklin pt-6 min-h-20" x-text="d.current_translation.data.name"></p>
                                   </div>

                                   <div class="relative flex flex-row justify-end">
                                      <img :src="d.photo_url" class="h-52 dir-img" alt="doctor_image">
                                   </div>

                                   <div class="absolute flex ltr:flex-row rtl:flex-row-reverse items-center space-x-2 -rotate-90 origin-top-left bottom-10 ltr:left-2 rtl:-right-24">
                                         <img src="/images/icons/Copy of icone-d-information-noir.png" class="opacity-40 h-8 w-8 rotate-90" alt="">
                                         <p class="text-gray text-xs font-normal">Craft IVF Hospital</p>
                                   </div>

                                   <div class="bg-gray-600 py-3 h-20 flex flex-col w-full justify-center items-center">
                                      <p class="text-white font-questrial font-normal text-sm text-center overflow-y-hidden" x-text="d.current_translation.data.designation"></p>
                                      <p class="text-white font-questrial font-normal text-sm text-center" x-text="d.current_translation.data.qualification"></p>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="flex-row mt-6">
                    <div class="relative mt-4 flex ltr:flex-row rtl:flex-row-reverse justify-center gap-4">
                        <button type="button" @click.prevent.stop="slideBackward();"
                            class="border border-gray bg-darkgray text-white p-2 rounded-full flex items-center justify-center disabled:bg-gray shadow-lg" :disabled="currentItems[0] == 0">
                            <x-easyadmin::display.icon icon="icons.chevron_left" height="h-6"
                                width="w-6" />
                    </button>
                        <button type="button" @click.prevent.stop="slideForward();"
                            class="border border-gray bg-darkgray text-white p-2 flex items-center justify-center disabled:bg-gray rounded-full shadow-lg" :disabled="currentItems[currentItems.length - 1] == doctors.length - 1">
                            <x-easyadmin::display.icon icon="icons.chevron_right" height="h-6"
                                width="w-6" />
                    </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative my-20 flex flex-col w-full md:px-16 lg:px-24 z-10">
            <div class="absolute top-0 left-0 z-0 bg-gray w-1/12 h-full"></div>
            <div x-data="{
                    dir: 'ltr',
                    itemWidth: 0,
                    itemHeight: 0,
                    newsitems: [],
                    currentItems: [],
                    wrapperOffset: 0,
                    slideForward() {
                        if (this.currentItems[0] != this.newsitems.length - (this.currentItems.length - 1)) {
                            this.wrapperOffset = this.wrapperOffset - this.itemWidth;

                            if (this.currentItems.length == 3 && this.currentItems[2] != this.newsitems.length -1 ) {
                                this.currentItems = [this.currentItems[1], this.currentItems[2], this.currentItems[2] + 1];
                            } else if (this.currentItems.length == 1 && this.currentItems[0] != this.newsitems.length - 1) {
                                this.currentItems = [this.currentItems[0] + 1];
                            }
                        }
                    },
                    slideBackward() {
                        if (this.currentItems[0] >= 0) {
                            this.wrapperOffset = this.wrapperOffset + this.itemWidth;

                            if (this.currentItems.length == 3 && this.currentItems[0] != 0 ) {
                                this.currentItems = [this.currentItems[0] - 1, this.currentItems[0], this.currentItems[1]];
                            } else if (this.currentItems.length == 1 && this.currentItems[0] != 0) {
                                this.currentItems = [this.currentItems[0] - 1];
                            }
                        }
                    },

                    setItemWidth() {
                        if (this.currentItems.length > 1) {
                            this.itemWidth = document.getElementById('news-container').offsetWidth / 2;
                        } else {
                            this.itemWidth = $el.offsetWidth
                        }
                        this.itemHeight = document.getElementById('news-container').offsetHeight;
                    },
                    setCurrentItems () {
                        if (window.innerWidth > 640) {
                            if(this.currentItems.length != 3) {
                                let rlen = this.newsitems.length;
                                this.currentItems = this.dir == 'ltr' ? [0, 1, 2] : [rlen - 3, rlen - 2, rlen - 1];
                            }
                        } else {
                            if(this.currentItems.length != 1) {
                                this.currentItems = this.dir == 'ltr' ? [0] : [this.newsitems.length - 1];
                            }
                        }
                        this.setItemWidth();
                        this.setWrapperOffset();
                    },
                    setWrapperOffset() {
                        this.wrapperOffset = this.currentItems.length > 1 ? -this.itemWidth / 2 : 0;
                    }
                }"
                x-init="
                    dir = '{{App::currentLocale() == 'en' ? 'ltr' : 'rtl'}}';
                    $nextTick(() => {
                        newsitems = {{Js::from($data['newsitems'])}};
                        setCurrentItems();
                        setWrapperOffset();
                    });
                "
                @resize.window="setCurrentItems();"
                class="relative z-10 my-12 min-h-84">
                <h2 class="text-4xl text-darkgray font-franklin pt-6 relative z-40">News And Announcements</h2>
                <div id="news-container" class="relative z-10 overflow-hidden py-4">
                    <div  class="absolute z-10 h-full top-0 left-0 flex flex-row items-center" :class="currentItems[0] != 0 || 'hidden'">
                        <button type="button" @click.prevent.stop="slideBackward();" class="text-white hover:opacity-40 cursor-pointer">
                            <x-easyadmin::display.icon icon="icons.chevron_left" height="h-20" width="w-20" />
                        </button>
                    </div>
                    <div class="w-fit flex flex-row transition-all" :style="`transform: translate(${wrapperOffset}px);`">
                        <template x-for="(n,i) in newsitems">
                        <div :style="`width: ${itemWidth}px`" class="overflow-hidden">
                            <div class="m-2 p-4 h-84 shadow-[3px_3px_4px_2px_rgba(0,0,0,0.2)] bg-white">
                                <div class="h-72 overflow-hidden">
                                    <img :src="n.image_url" alt="" class="max-w-full">
                                </div>
                                <div class="text-center p-2 mt-4" x-text="n.current_translation.data.title"></div>
                            </div>
                        </div>
                        </template>
                    </div>
                    <div :class="currentItems[currentItems.length - 1] != newsitems.length - 1 || 'hidden'" class="absolute z-50 h-full top-0 right-0 flex flex-row items-center">
                        <button type="button" @click.prevent.stop="slideForward();" class="text-white hover:opacity-40 cursor-pointer">
                            <x-easyadmin::display.icon icon="icons.chevron_right" height="h-20" width="w-20" />
                        </button>
                    </div>
                </div>
                <div class="relative flex flex-row ltr:justify-end rtl:justify-end w-full mt-6">
                    <x-viewallbutton-component text="{{ __('button.more_news') }}" href="{{route('news.loc', ['locale' => app()->currentLocale()])}}"/>
                </div>
            </div>
        </div>

        <div class="relative flex flex-col w-full md:px-16 lg:px-24 z-10">
            <div x-data="{
                dir: 'ltr',
                itemWidth: 0,
                itemHeight: 0,
                articles: [],
                currentItems: [],
                wrapperOffset: 0,
                slideForward() {
                    if (this.currentItems[0] < this.articles.length - this.currentItems.length) {
                        this.wrapperOffset = this.wrapperOffset - this.itemWidth;

                        if (this.currentItems.length == 3 && this.currentItems[2] != this.articles.length -1 ) {
                            this.currentItems = [this.currentItems[1], this.currentItems[2], this.currentItems[2] + 1];
                        } else if (this.currentItems.length == 1 && this.currentItems[0] != this.articles.length - 1) {
                            this.currentItems = [this.currentItems[0] + 1];
                        }
                    }
                },
                slideBackward() {
                    if (this.currentItems[0] > 0) {
                        this.wrapperOffset = this.wrapperOffset + this.itemWidth;

                        if (this.currentItems.length == 3 && this.currentItems[0] != 0 ) {
                            this.currentItems = [this.currentItems[0] - 1, this.currentItems[0], this.currentItems[1]];
                        } else if (this.currentItems.length == 1 && this.currentItems[0] != 0) {
                            this.currentItems = [this.currentItems[0] - 1];
                        }
                    }
                },

                setItemWidth() {
                    if (this.currentItems.length > 1) {
                        this.itemWidth = document.getElementById('articles-container').offsetWidth / 3;
                    } else {
                        this.itemWidth = $el.offsetWidth
                    }
                    this.itemHeight = document.getElementById('articles-container').offsetHeight;
                },
                setCurrentItems () {
                    if (window.innerWidth > 640) {
                        if(this.currentItems.length != 3) {
                            let rlen = this.articles.length;
                            this.currentItems = this.dir == 'ltr' ? [0, 1, 2] : [rlen - 3, rlen - 2, rlen - 1];
                        }
                    } else {
                        if(this.currentItems.length != 1) {
                            this.currentItems = this.dir == 'ltr' ? [0] : [this.articles.length - 1];
                        }
                    }
                    this.setItemWidth();
                },
                setWrapperOffset() {
                    this.wrapperOffset = this.currentItems.length > 1 ? -this.itemWidth / 2 : 0;
                }
            }"
            x-init="
                dir = '{{App::currentLocale() == 'en' ? 'ltr' : 'rtl'}}';
                $nextTick(() => {
                    articles = {{Js::from($data['articles'])}};
                    setCurrentItems();
                });
            "
            @resize.window="setCurrentItems();"
            class="relative z-10">
                <h2 class="text-4xl text-darkgray font-franklin relative z-40">Blog</h2>
                <div id="articles-container" class="relative z-10 overflow-hidden py-4">
                    <div  class="absolute z-50 h-full top-0 left-0 flex flex-row items-center" :class="currentItems[0] != 0 || 'hidden'">
                        <button type="button" @click.prevent.stop="slideBackward();" class="text-gray md:text-white hover:opacity-40 cursor-pointer">
                            <x-easyadmin::display.icon icon="icons.chevron_left" height="h-20" width="w-20" />
                        </button>
                    </div>
                    <div class="w-fit flex flex-row transition-all" :style="`transform: translate(${wrapperOffset}px);`">
                    {{-- <template x-for="(a,i) in articles"> --}}
                        @foreach ($data['articles'] as $a)
                        <div :style="`width: ${itemWidth}px`" class="overflow-hidden">
                            <div class="w-full flex flex-row justify-center md:justify-between">
                                <div class="mx-2 w-full">
                                    <x-blogcard-component
                                    title="{{$a->current_translation->data['title']}}"
                                    image_url="{{$a->current_translation->display_image}}"
                                    slug="{{$a->current_translation->slug}}"/>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    {{-- </template> --}}
                    </div>
                    <div :class="currentItems[currentItems.length - 1] != articles.length - 1 || 'hidden'" class="absolute z-50 h-full top-0 right-0 flex flex-row items-center">
                        <button type="button" @click.prevent.stop="slideForward();" class="text-gray md:text-white hover:opacity-40 cursor-pointer">
                            <x-easyadmin::display.icon icon="icons.chevron_right" height="h-20" width="w-20" />
                        </button>
                    </div>
                </div>
                <div class="relative flex flex-row ltr:justify-end rtl:justify-end w-full mt-4">
                    <x-viewallbutton-component text="{{ __('button.more_articles') }}" href="{{route('blog.loc', ['locale' => app()->currentLocale()])}}"/>
                </div>
            </div>
        </div>
        {{-- <div class="mb-2 relative flex flex-row ltr:justify-start rtl:justify-end w-full md:px-16 lg:px-24 z-10">
            <div class="flex ltr:flex-row rtl:flex-row-reverse justify-start mt-16 w-1/2">
                <div class="mr-4">
                    <img src="/images/icons/faq.png" class="h-24" alt="">
                </div>
                <div>
                    <h2 class="text-3xl"><a href="{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'frequently-asked-questions'])}}"
                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'frequently-asked-questions'])}}', route: 'webpages.guest.show'})">Frequently Asked Questions</a></h2>
                    <h4 class="text-sm mt-4">The answers to your questions can be found here</h4>
                </div>
            </div>
        </div>
        <div class="relative w-full lg:px-24 z-10 lg:h-0 overflow-visible">
            <div class="relative lg:absolute lg:z-50 lg:-bottom-24 ltr:right-0 rtl:left-0 lg:w-5/12 h-fit">
                <x-bookappointment-component/>
            </div>
        </div> --}}
        <div class="relative w-full z-0 h-0 overflow-visible">
            <x-footer />
        </div>
    </div>
</x-guest-layout>
