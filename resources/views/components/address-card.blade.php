<div class="flex flex-col gap-4 gap-y-8 p-6 font-franklin text-sm ">
    <div class="flex flex-row items-center gap-6">
        <div class="flex justify-center items-center border border-rounded-sm border-gray p-2 bg-gray">
            <x-easyadmin::display.icon icon="icons.map-pin" height="h-8" width="w-8"/>
        </div>
        <div class="flex-grow">
           <p class="font-bold mb-4">{{__('footer.our_location')}}</p>
           <p>{{__('contact.craft_address_kodungallur')}}</p>
           <p>{{__('contact.craft_address_kochi')}}</p>
        </div>
    </div>
    <div  class="flex flex-row items-center gap-6">
        <div class="flex justify-center items-center border border-rounded-sm border-gray p-2 bg-gray">
                <x-easyadmin::display.icon icon="icons.phone-icon" height="h-8" width="w-8"/>
        </div>
        <div class="flex-grow">
           <p class="font-bold mb-4">
                {{__('contact.phone_no')}}
            </p>
            <p>
            {{__('contact.tel')}}: 0480 2800200<br>
            {{__('contact.mob')}}: +919544180011<br>
            {{__('contact.whatsapp')}}: +918590904036<br>
            {{__('contact.kochi')}} : +91 9526196000<br>
            </p>

        </div>
    </div>
    <div   class="flex flex-row items-center gap-6">
        <div class="justify-center items-center border border-rounded-sm border-gray  p-2 bg-gray">
                <x-easyadmin::display.icon icon="icons.envelope-icon" height="h-8" width="w-8"/>
        </div>
        <div class="flex-grow">
           <p class="font-bold mb-4">
           {{__('contact.email_address')}}
           </p>
           <p>
            {!!__('contact.email')!!}
            </p>

        </div>
    </div>

</div>
