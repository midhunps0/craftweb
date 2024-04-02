@props(['data'])
<div class="video w-full" style="position:relative;padding-bottom:56.25%">
    <iframe width="100%" height="100%"
        class="w-full h-full absolute top-0 left-0 border-none" src="{{$data->url}}"
        title="YouTube video player" frameborder="0"
        referrerpolicy="origin" allowfullscreen='' loading='lazy'></iframe>
</div>
