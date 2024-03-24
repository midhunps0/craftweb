<x-guest-layout>
    <div class="flex flex-row flex-wrap w-full space-x-8 space-y-8">
        @foreach ($icons as $i => $svg)
            <div class="h-28 w-28 flex flex-col space-y-4 justify-center items-center p-2 m-8 border border-base-content border-opacity-20 rounded-md">
                {!!$svg!!}
                <div class="text-sm w-full text-center">{{$i}}</div>
            </div>
        @endforeach
    </div>
</x-guest-layout>
