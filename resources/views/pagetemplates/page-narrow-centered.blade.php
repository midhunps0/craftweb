<x-guest-layout>
    <div>
        <x-main-menu-component />
        <h1>{{$instance->current_translation->data['title']}}</h1>
        <div>
            <img src="{{$instance->current_translation->display_image}}" alt="">
        </div>
        <div class="max-w-3/4 m-auto">
            <x-contentbuilder.renderer :content="json_decode($instance->current_translation->data['body'])"/>
        </div>
    </div>
</x-guest-layout>
