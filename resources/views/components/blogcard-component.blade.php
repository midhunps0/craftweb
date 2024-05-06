@props(['title', 'image_url', 'slug'])
@php
    $link = route('articles.guest.show', ['slug' => $slug, 'locale' => app()->currentLocale()]);
@endphp
<div class="flex flex-col h-full p-4 rounded-sm border border-lightgray shadow-[1px_1px_2px_2px_rgba(4,4,4,0.1)] text-sm">
    <div class="w-full relative overflow-hidden border border-lightgray" style="padding-bottom:56.25%">
    <img src="{{$image_url}}" class="absolute w-full"
        alt="ivf_image" />
    </div>
    <div class="flex flex-col flex-grow">
        <h4 class="font-questrial text-left font-bold min-h-10 flex-grow text-md mt-3">{{$title}}</h4>
        {{-- <p class="font-questrial text-left  ml-2 mt-2">Women who are diagnosed to have cancer recently-do they
            have option to...</p> --}}
        <div class="flex flex-row justify-end text-xs">
            <a class="flex flex-row text-pink justify-center items-center p-1 gap-1 px-2" href="{{$link}}" @click.prevent.stop="$dispatch('linkaction', {
                link: '{{$link}}', route: 'articles.guest.show'
            })">
                <span>{{__('contact.read')}}</span>
                <x-easyadmin::display.icon icon="easyadmin::icons.arrow-right"
                    height="h-3" width="w-3" class="ltr:rotate-0 rtl:rotate-180" />
            </a>
        </div>
    </div>
</div>
