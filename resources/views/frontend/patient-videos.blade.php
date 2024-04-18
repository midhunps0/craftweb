<x-guest-layout>
    <div class="text-base">
        <div class="w-full px-2 max-w-[1500px] m-auto">
            <x-main-menu-component />
            <x-page-title title="Patient Testimonial Videos" />
            <div class="flex flex-row flex-wrap justify-center items-stretch">
                @foreach ($videos as $v)
                    <div class="w-full sm:w-1/2 md:w-1/3 p-3 box-border">
                        <div class="relative z-10" style="position:relative;padding-bottom:56.25%">
                            <iframe width="100%" height="100%"
                                class="w-full absolute top-0 left-0" src="{{$v->link}}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                                referrerpolicy="origin" allowfullscreen></iframe>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
