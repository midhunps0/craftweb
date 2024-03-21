@props(['data'])
<h{{$data->level}} class="heading {{$data->classes ?? ''}}">
    {{$data->content}}
</h{{$data->level}}>
