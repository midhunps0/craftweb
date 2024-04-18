<x-guest-layout>
    <div class="text-base">
        <div class="w-full px-2 max-w-[1500px] m-auto">
            <x-main-menu-component/>
            <x-page-title title="Contact Us" />
        </div>
        <div class=" max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto lg:flex flex-row gap-16 pb-8 ">
            <div class="mt-16 lg:w-1/2">
                <x-address-card/>
            </div>
            <div class=" mt-16 lg:w-1/2">
                <x-contact-form/>
            </div>
        </div>

        <x-footer />
    </div>
</x-guest-layout>
