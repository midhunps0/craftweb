@props(['data'])
<div class="img cb-img w-full">
    <img class="w-full {{$data->attribs->classes}}" src="{{$data->url}}"
        alt="{{$data->attribs->alt}}"
        width="{{$data->attribs->width}}"
        height="{{$data->attribs->height}}">
</div>
