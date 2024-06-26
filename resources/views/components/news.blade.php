@props(['title' => 'An announcement from Craft', 'img' => ''])
<div class="m-2 p-4 max-w-full shadow-[3px_3px_4px_2px_rgba(0,0,0,0.2)] h-full">
    <div @click="$dispatch('newsclick', {imgsrc: '{{$img}}'})" class="h-72 overflow-auto flex justify-center items-center border border-lightgray cursor-pointer">
        <img src="{{$img}}" alt="" class="w-full">
    </div>
    <div class="text-center p-2 mt-4">
        {{$title}}
    </div>
</div>
