<x-guest-layout>
    <x-main-menu-component/>
    <x-page-title title="Booking Status" />
        <div  class="my-16 w-1/2 m-auto">
            @if($success)
                <div class="min-h-96">
                    <div class="font-bold text-center my-4 text-success text-lg">
                        <div class="w-12 h-12 flex items-center justify-center m-auto rounded-full bg-success text-white">
                            <x-easyadmin::display.icon icon="easyadmin::icons.tick" height="h-8" width="w-8" />
                        </div><br>
                        Your appointment is confirmed with the following details:
                    </div>
                    <div class="border border-gray p-4 m-auto font-bold">
                        <div class="flex flex-row w-full gap-6 text-center mb-2">
                            <div class="flex-grow">Appointment ID: {{$appointment_id }}</div>
                        </div>
                        <div class="flex flex-row w-full gap-6 text-center mb-2">
                            <div class="flex-grow">Consultation Date: {{$date }}</div>
                            <div class="flex-grow">Consultation Time: {{$time }}</div>
                        </div>
                        <div class="flex flex-row w-full gap-6 text-center mb-2">
                            <div class="flex-grow">Department: {{$sp_name }}</div>
                            <div class="flex-grow">Doctor: {{$cons_name }}</div>
                        </div>
                        <div class="flex flex-row w-full text-center mb-2">
                            <div class="flex-grow">Patient Name: {{$name }}</div>
                            <div class="flex-grow">Phone Number: {{$phone }}</div>
                        </div>
                        <div class="font-bold text-center mt-12">
                            The confirmation messase has been sent to your email id: {{$email }}.<br>
                            <span class="text-lg">Thank you!</span>
                        </div>
                    </div>
                </div>
            @else
                <div class="min-h-96 text-center">
                    <div class="w-12 h-12 flex items-center justify-center m-auto rounded-full bg-error text-white">
                        <x-easyadmin::display.icon icon="easyadmin::icons.close" height="h-8" width="w-8" />
                    </div>
                    @if ($status == 'payment_complete')
                    <p class="text-error text-lg">
                        Payment was complete; but failed to confirm your booking with our server. Please contact our customer care.
                    </p>
                    <p class="text-center my-4">
                        <span class="text-lg font-bold">Transaction ID:</span>&nbsp;
                        <span class="text-lg font-bold">{{$transaction_id}}</span>
                    </p>
                    @else
                    <p class="text-error text-lg">
                        Transaction failed. If the amount was deducted from your account, please contact our customer care.
                    </p>
                    <p class="text-center my-4">
                        <span class="text-lg font-bold">Reason for failure:</span>&nbsp;
                        <span class="text-lg font-bold">{{$reason}}</span>
                    </p>
                    <p class="text-center my-4">
                        <span class="text-lg font-bold">Transaction ID:</span>&nbsp;
                        <span class="text-lg font-bold">{{$transaction_id}}</span>
                    </p>
                    @endif
                    <div class="text-center my-4">
                        <a class="btn btn-sm btn-warning cursor-pointer" href="{{route('booking')}}" @click.prevent.submit="$dispatch('linkaction', {link: '{{route('booking')}}', route: 'booking', fresh: true});">Go Back To Booking Page</a>
                    </div>
                </div>
            @endif
        </div>
    <x-footer/>
</x-guest-layout>
