@props(['data'])
{{-- {{dd($data->content)}} --}}
<div class="para">
@foreach ($data->content as $c)
    <p>
    @foreach ($c->attribs as $a)
        <{{$a}}>
    @endforeach
    @if (isset($c->link))
        @if ($c->link->external)
        <a href="{{$c->link->url}}" target="_blank">{{$c->text}}</a>
        @else
        <a @click.prevent.stop="$dispatch('linkaction', {link: '{{$c->link->url}}'})" href="{{$c->link->url}}" target="_blank">{{$c->text}}</a>
        @endif
    @else
    {{$c->text}}
    @endif
    @foreach (array_reverse($c->attribs) as $a)
        </{{$a}}>
    @endforeach
    </p>
@endforeach
</div>
