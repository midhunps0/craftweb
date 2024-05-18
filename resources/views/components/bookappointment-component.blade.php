<div class="bg-gray  pb-4">
    <div class="flex flex-row ">
        <div  class="items-center flex justify-center w-1/4">
           <img src="/images/icons/bookappointmentbgremove.png" class="h-20 md:h-28 mt-4" alt="">
        </div>
        <div class="items-center 3/4">
            <p class="font-franklin font-medium items-center text-xl md:text-2xl lg:text-3xl pt-6 ml-3"><a href="{{route('booking', ['locale' => app()->currentLocale()])}}" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('booking', ['locale' => app()->currentLocale()])}}', route: 'booking'})">{{ __('button.book_an_appointment') }}</a></p>
            <p class="font-franklin font-medium items-center text-xs md:text-sm lg:text-base ml-3">{{ __('footer.book_appointment_content') }}</p>
        </div>

    </div>
    <div class="flex flex-row ">
        <div  class="items-center w-1/5 flex justify-center">
        <img src="/images/icons/envelopebgremove.png" class="h-8 md:h-12 mt-6 ml-2 md:ml-6" alt="">
        </div>
        <div class="items-center ml-4 md:ml-10 xl:ml-12 2xl:ml-12 4/5">
            <p class="font-franklin font-medium items-center text-left text-xl pt-6 md:text-2xl lg:text-3xl "><a href="{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'contact-us'])}}" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'contact-us'])}}', route: 'contact'})">{{ __('footer.send_us_message') }}<a></p>
            <p class="font-franklin font-medium items-center text-left text-xs md:text-sm lg:text-base">{{ __('footer.emails_craft') }}</p>
        </div>

    </div>
</div>
