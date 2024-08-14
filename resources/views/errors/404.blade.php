<x-guest-layout>
    <div class="text-base">
        <div class="w-full px-12 max-w-[1500px] m-auto">
            <x-main-menu-component />
            {{-- <x-page-title title="Blog" image="{{asset('images/blog.webp')}}"/> --}}
            <div class="flex flex-row justify-center items-center min-h-1/2">
                <h3 class="tex-2xl font bold text-error">
                    The page you have requested does not exist.
                </h3>
            </div>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
