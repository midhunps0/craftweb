<x-guest-layout>
    <div class="text-base">
        <x-main-menu-component />
        <div class="w-full px-2 md:px-16 lg:px-24">
            <x-page-title title="News" />
            <div class="flex flex-row flex-wrap justify-center items-stretch">
                @foreach ($news as $n)
                {{-- {{dd($n->current_translation)}} --}}
                    <div class="md:w-1/2 p-3 box-border">
                        <x-news
                            title="{{$n->current_translation->data['title']}}"
                            img="{{$n->image_url}}"/>
                    </div>
                @endforeach
            </div>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
