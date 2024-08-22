@props(['data'])
@php
    $id = explode('embed/', $data->url)[1];
    $id = explode('?si=', $id)[0];
    $thumbnail = "https://img.youtube.com/vi/{$id}/hqdefault.jpg";
@endphp
<div x-data="{videoOn: false}" class="video w-full relative" style="position:relative;padding-bottom:56.25%">
    <template x-if="!videoOn">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
            <img @click="videoOn = true;" src="{{$thumbnail}}" alt="video testimonial" class="w-full">
            <div @click="videoOn = true;" class="absolute top-0 left-0 z-40 bg-transparent flex w-full h-full justify-center items-center">
                <img src="{{asset('images/icons/yt_logo.png')}}" alt="">
            </div>
        </div>
    </template>

    <template x-if="videoOn">
    <iframe width="100%" height="100%"
        class="w-full absolute top-0 left-0" src="{{$data->url}}&autoplay=1"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
        referrerpolicy="origin" allowfullscreen></iframe>
    </template>
</div>
