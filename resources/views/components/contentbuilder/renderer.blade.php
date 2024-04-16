@props(['content'])
{{-- {{dd($content)}} --}}
@foreach ($content as $row)
    <div class="row flex flex-row {{ $row->classes }} flex-wrap">
        @foreach ($row->cols as $col)
        @php
            $x = [];
            foreach (explode(' ', $col->classes) as $c) {
                $c = trim($c);
                if (str_starts_with($c, 'w-')) {
                    $c = 'md:'.$c;
                }
                $x[] = $c;
            }
            $classes = implode(' ', $x);
        @endphp
            <div class="col px-2 w-full">
                <div class="col-content w-full {{ $classes }}">
                    @foreach ($col->items as $item)
                        @switch($item->type)
                            @case('heading')
                                <x-contentbuilder.heading :data="$item" />
                                @break
                            @case('img')
                                <x-contentbuilder.image :data="$item" />
                                @break
                            @case('tsixty_img')
                                <x-contentbuilder.tsixty-image :data="$item" />
                                @break
                            @case('yt_video')
                                <x-contentbuilder.yt-video :data="$item" />
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
