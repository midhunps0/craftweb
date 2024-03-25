@props(['content'])
{{-- {{dd($content)}} --}}
@foreach ($content as $row)
    <div class="row flex flex-row flex-wrap {{ $row->classes }}">
        @foreach ($row->cols as $col)
            <div class="col px-2 min-w-64 flex-grow {{ $col->classes }}">
                <div class="col-content w-full flex flex-col">
                    @foreach ($col->items as $item)
                        @switch($item->type)
                            @case('heading')
                                <x-contentbuilder.heading :data="$item" />
                                @break
                            @case('img')
                                <x-contentbuilder.image :data="$item" />
                                @break
                            @case('para')
                                <x-contentbuilder.para :data="$item" />
                                @break
                            @case('list')
                                <x-contentbuilder.list :data="$item" />
                                @break
                            @default
                                @break
                        @endswitch
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endforeach
