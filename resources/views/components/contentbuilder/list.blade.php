@props(['data'])
<{{$data->listType}} class="list w-full">
    @foreach ($data->list as $li)
        <li>
            @foreach ($li->attribs as $a)
                <{{$a}}>
            @endforeach
            {{$li->text}}
            @foreach (array_reverse($li->attribs) as $a)
                </{{$a}}>
            @endforeach
        </li>
    @endforeach
</{{$data->listType}}>
