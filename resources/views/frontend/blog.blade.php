<x-guest-layout>
    <div class="text-base">
        <div class="w-full px-12 max-w-[1500px] m-auto">
            <x-main-menu-component />
            <x-page-title title="Blog" />
            <div class="flex flex-row flex-wrap justify-center items-stretch">
                @foreach ($blog as $a)
                {{-- {{dd($a->current_translation)}} --}}
                    <div class="md:w-1/3 p-3 box-border">
                        <x-blogcard-component
                            title="{{$a->current_translation->data['title']}}"
                            image_url="{{$a->current_translation->display_image}}"
                            slug="{{$a->current_translation->slug}}"/>
                    </div>
                @endforeach
            </div>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
