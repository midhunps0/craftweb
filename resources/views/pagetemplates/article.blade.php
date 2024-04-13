<x-guest-layout>
    <div class="text-base">
        <x-main-menu-component />
        <div class="w-full px-2 md:px-16 lg:px-24">
            <x-page-title title="{{$instance->current_translation->data['title']}}" />
            <div class="flex flex-row">
                {{-- main body --}}
                <div class="md:w-3/4">
                    <div>
                        @if (isset($instance->current_translation->data['body']))
                        <x-contentbuilder.renderer :content="json_decode($instance->current_translation->data['body'])"/>
                        @endif
                    </div>
                </div>
                {{-- Sidebar --}}
                <div class="md:w-1/4">
                    <div class="w-full max-h-full overflow-y-scroll">
                        <div class="py-2 mb-4">
                            <x-bluebutton-component text="{{ __('button.book_an_appointment') }}" href="{{route('booking')}}" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('booking')}}', route: 'booking'})" />
                        </div>
                        <h3 class="bg-lightgray font-bold p-2">Other Articles</h3>
                        @foreach ($data['allArticles'] as $i)
                            <p class="p-2">
                                <a href="{{route('articles.guest.show', ['locale' => app()->currentLocale(), 'slug' => $i['slug']])}}"
                                    class="hover:text-pink underline">{{$i['title']}}</a>
                            </p>
                        @endforeach

                        @if (isset($instance->current_translation->data['sidebar']))
                        <div class="border border-gray bg-lightgray rounded-md p-2">
                        <x-contentbuilder.renderer :content="json_decode($instance->current_translation->data['sidebar'])"/>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
