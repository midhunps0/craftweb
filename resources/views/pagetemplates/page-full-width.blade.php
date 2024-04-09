<x-guest-layout>
    <div>
        <x-main-menu-component />
        <div class="w-full px-2 md:px-16 lg:px-24">
            <x-page-title title="{{$instance->current_translation->data['title']}}" />
            <div>
                <img src="{{$instance->current_translation->display_image}}" alt="">
            </div>
            <div>
                <x-contentbuilder.renderer :content="json_decode($instance->current_translation->data['body'])"/>
            </div>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
