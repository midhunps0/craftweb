@props(['data'])
<div class="video w-full" style="position:relative;padding-bottom:56.25%">
    <iframe width="100%" height="100%"
        class="w-full absolute top-0 left-0" src="{{$data->url}}"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
        referrerpolicy="origin" allowfullscreen></iframe>
</div>
