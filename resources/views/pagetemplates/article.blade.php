<x-guest-layout>
    <div class="text-base">
        <div class="w-full px-12 max-w-[1500px] m-auto">
            <x-main-menu-component />
            <x-page-title title="{{$instance->current_translation->data['title']}}" />
            <div class="flex flex-row">
                {{-- main body --}}
                {{-- <div> --}}
                    <div class="md:w-3/4 m-auto">
                        @if (isset($instance->current_translation->data['body']))
                        <x-contentbuilder.renderer :content="json_decode($instance->current_translation->data['body'])"/>
                        @endif
                    </div>
                {{-- </div> --}}
                {{-- Sidebar --}}
                {{-- <div class="md:w-1/4">
                    <div class="w-full max-h-full overflow-y-scroll">
                        <div class="py-2 mb-4">
                            <x-bluebutton-component text="{{ __('button.book_an_appointment') }}" href="{{route('booking')}}" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('booking')}}', route: 'booking'})" />
                        </div>
                        <h3 class="bg-lightgray font-bold p-2">{{doctors.other_articles}}</h3>
                        @foreach ($data['allArticles'] as $i)
                            <p class="p-2">
                                <a @click.prevent.stop="$dispatch('linkaction', {link: '{{route('articles.guest.show', ['locale' => app()->currentLocale(), 'slug' => $i['slug']])}}', route: 'articles.guest.show'});" href="{{route('articles.guest.show', ['locale' => app()->currentLocale(), 'slug' => $i['slug']])}}"
                                    class="hover:text-pink underline">{{$i['title']}}</a>
                            </p>
                        @endforeach

                        @if (isset($instance->current_translation->data['sidebar']))
                        <div class="border border-gray bg-lightgray rounded-md p-2">
                        <x-contentbuilder.renderer :content="json_decode($instance->current_translation->data['sidebar'])"/>
                        </div>
                        @endif
                    </div>
                </div> --}}
            </div>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
