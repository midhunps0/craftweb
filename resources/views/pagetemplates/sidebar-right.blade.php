<x-easyadmin::guest-layout>
    <div>
        <h1>{{$instance->current_translation->data['title']}}</h1>
        @if (isset($instance->current_translation->display_image))
            <div>
                <img src="{{$instance->current_translation->display_image}}" alt="">
            </div>
        @endif
        <div>
            <x-contentbuilder.renderer :content="json_decode($instance->current_translation->data['body'])"/>
        </div>
    </div>
</x-easyadmin::guest-layout>
