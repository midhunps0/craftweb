@props(['content'])
{{-- {{dd($content)}} --}}
@foreach ($content as $row)
    <div class="row flex flex-row {{ $row->classes }}">
        @foreach ($row->cols as $col)
            <div class="w-full">
                <div class="col w-full flex flex-col {{ $col->classes }}">
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
