<footer class="bg-white">
    <div class="mb-2 relative flex flex-row w-full max-w-[1500px] m-auto px-2 md:px-12 z-10">
        <div class="flex flex-row justify-start mt-16 w-1/2">
            <div class="mr-4">
                <img src="/images/icons/faq.png" class="h-24" alt="">
            </div>
            <div>
                <h2 class="text-3xl">{{__('homecontent.frequently_asked_questions')}}</h2>
                <h4 class="text-sm mt-4">{{__('homecontent.the_answer_to your_question _can_be_found')}}</h4>
            </div>
        </div>
    </div>
    <div class="relative w-full max-w-[1500px] m-auto px-2 md:px-12 z-10 lg:h-0 overflow-visible">
        <div class="relative lg:absolute lg:z-50 lg:-bottom-24 ltr:right-0 rtl:left-0 lg:w-5/12 h-fit">
            <x-bookappointment-component />
        </div>
    </div>
    <div
        class="w-full max-w-[1500px] m-auto px-2 md:px-12 flex flex-col md:flex-row md:justify-between bg-darkgray cursor-pointer lg:pt-4 lg:pb-10 text-base-100">
        <div
            class="w-full flex flex-col md:flex-row md:justify-between bg-darkgray cursor-pointer lg:pt-4 lg:pb-10 text-base-100 max-w-[1500px] m-auto">
            <div
                class="md:flex md:flex-row md:w-7/12 justify-between mt-8 lg:mt-0 pr-8 m-auto">
                <div class="flex flex-col justify-start items-start">
                    <img src="{{ asset('/images/icons/craftfertility (1).webp') }}" alt=""
                        class="w-16 bg-white shadow md:w-32 rounded-sm">
                    <ul class="flex justify-between items-center mt-4">
                        <li class="p-1 mr-2 bg-pink-500 shadow rounded text-xl  hover:bg-pink-400">
                            <a href="https://www.facebook.com/craftivf/" target="_blank"><x-easyadmin::display.icon icon="icons.fb" height="h-6" width="w-6" /></a>
                    </li>
                    <li class="p-1 mr-2 bg-pink-500 shadow rounded text-xl  hover:bg-pink-400">
                        <a href="https://www.instagram.com/craftivf/" target="_blank"><x-easyadmin::display.icon icon="icons.insta" height="h-6" width="w-6"/></a>
                        </li>
                        <li class="p-1 mr-2 bg-pink-500 shadow rounded text-xl  hover:bg-pink-400">
                            <a href="https://wa.me/918590462565" target="_blank"><x-easyadmin::display.icon icon="icons.whatsapp" height="h-6" width="w-6" /></a>
                        </li>
                        <li class="p-1 mr-2 bg-pink-500 shadow rounded text-xl  hover:bg-pink-400">
                            <a href="https://twitter.com/craftivf/" target="_blank"><x-easyadmin::display.icon icon="icons.x-logo" height="h-6" width="w-6" /></a>
                        </li>
                        <li class="p-1 mr-2 bg-pink-500 shadow rounded text-xl  hover:bg-pink-400">
                            <a href="https://www.youtube.com/channel/UCCajQAeJaBGY19_ekaym3eQ" target="_blank"><x-easyadmin::display.icon icon="icons.youtube" height="h-6" width="w-6" /></a>
                        </li>
                    </ul>
                    <p class="leading-6 mt-4">{!! __('footer.craft_address_kodungallur') !!}</p>
                </div>
                <div class="flex flex-col justify-start items-left">

                    <div class="text-gray-300 text-xs  flex flex-col items-left ">

                    <h3 class="uppercase font-semibold text-white">{{ __('footer.other_location') }}</h3>
                    <h4 class="uppercase font-semibold text-white mt-4">{{ __('homecontent.kochi') }}</h4>
                    <p class=" leading-6">
                    {!! __('footer.craft_address_kochi') !!}
                    </p>
                    <h4 class="uppercase font-semibold text-white mt-4">{{ __('homecontent.perinthalmanna') }}</h4>
                    <p class=" leading-6">
                    {!! __('footer.craft_address_perinthalmanna') !!}
                    </p>
                </div>
            </div>
            <div class="flex flex-col justify-start">
                <h3 class="uppercase font-semibold text-white">{{ __('footer.opening_hours') }}</h3>
                <div class="text-gray-300 text-xs  flex flex-col items-left ">
                    <p class="py-2 leading-6">
                    {!! __('footer.opening_hours_kochi') !!}
                    {!! __('footer.opening_hours_kodungallur') !!}
                    </p>

                        <h3 class="uppercase font-semibold text-white mt-4">{{ __('footer.general_info') }}</h3>
                        <p class="py-2 px-4 leading-6">
                        <ul>
                            <li class="list-disc"><a href="{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'terms-and-conditions'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'terms-and-conditions'])}}'})"
                                     class="block w-full px-4 py-2 underline">{{ __('footer.terms_and_conditions') }}</a></li>
                            <li class="list-disc"><a href="{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'privacy-policy'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'privacy-policy'])}}'})"
                                    class="block w-full px-4 py-2 underline">{{ __('footer.privacy_policy') }}</a></li>
                            <li class="list-disc"><a href="{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'refund-policy'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'refund-policy'])}}'})"
                                    class="block w-full px-4 py-2 underline">{{ __('footer.refund_policy') }}</a></li>
                            <li class="list-disc"><a href="{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'contact-us'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'contact-us'])}}', route: 'contact'})"
                                    class="block w-full px-4 py-2 underline">{{ __('footer.contact_us') }}</a></li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center flex-col lg:flex-row md:w-5/12">
                <div class="flex justify-center items-center flex-col w-full">
                    <div
                        class="flex justify-end items-center mt-10 flex-col-reverse lg:flex-col  w-full ltr:pr-12 rtl:pl-12">
                        <div class="flex flex-col lg:flex-row lg:my-6">
                            <div>
                                <img src="/images/icons/nabh-logo.png" alt="" class="lg:w-24 mr-4 w-16">
                            </div>
                            <div>
                                <img src="/images/icons/logo20years.png" alt="" class="lg:w-24 lg:mr-4 w-16">
                            </div>
                        </div>
                        <div class="">
                            <h3 class="text-xs text-white">{{ __('footer.our_sister_concerns') }}</h3>
                            <div class="flex flex-col lg:flex-row gap-2 justify-center items-center">
                            <img src="/images/icons/ar_logonew.webp" alt="" class="lg:w-52 w-40 lg:mb-0 mb-4">
                            <img src="/images/icons/craftnursingnew.webp" alt="" class="w-20 lg:w-28 lg:mb-0 mb-4 rounded-lg" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
