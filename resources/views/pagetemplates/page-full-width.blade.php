<x-easyadmin::guest-layout>
    <div>
        <h1>{{$instance->current_translation->data['title']}}</h1>
        <div>
            <img src="{{$instance->current_translation->display_image}}" alt="">
        </div>
        <div>
            <x-contentbuilder.renderer :content="json_decode($instance->current_translation->data['body'])"/>
        </div>
    </div>
</x-easyadmin::guest-layout>
