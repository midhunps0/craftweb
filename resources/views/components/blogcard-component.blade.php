@props(['title', 'image_url', 'slug'])
@php
    $link = route('articles.view', ['slug' => $slug]);
@endphp
<div class="flex flex-col h-full max-w-96 p-4 rounded-sm border border-gray bg-base-100 shadow-[1px_1px_2px_2px_rgba(0,0,0,0.3)] text-sm">
    <img src="{{$image_url}}" class="w-full"
        alt="ivf_image" />
    <div class="flex flex-col flex-grow">
        <h4 class="font-questrial text-center font-bold min-h-10 flex-grow">{{$title}}</h4>
        {{-- <p class="font-questrial text-left  ml-2 mt-2">Women who are diagnosed to have cancer recently-do they
            have option to...</p> --}}
        <div class="flex flex-row justify-end text-xs">
            <a class="flex flex-row text-pink justify-center items-center p-1 gap-1 px-2" href="{{$link}}">
                <span>Read</span>
                <x-easyadmin::display.icon icon="easyadmin::icons.arrow-right"
                    height="h-3" width="w-3" class="ltr:rotate-0 rtl:rotate-180" />
            </a>
        </div>
    </div>
</div>
