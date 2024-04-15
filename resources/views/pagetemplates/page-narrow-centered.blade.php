<x-guest-layout>
    <div class="text-base">
        <x-main-menu-component />
        <div class="w-full px-2 md:px-16 lg:px-24">
            <x-page-title title="{{$instance->current_translation->data['title']}}" />
            <div class="md:w-3/4 m-auto">
                @if (isset($instance->current_translation->display_image))
                    <div>
                        <img src="{{$instance->current_translation->display_image}}" alt="">
                    </div>
                @endif
                <div>
                    <x-contentbuilder.renderer :content="json_decode($instance->current_translation->data['body'])"/>
                </div>
            </div>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
