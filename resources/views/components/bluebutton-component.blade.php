@props(['text' => 'Click here', 'href' => '#'])
<div>
<a href="{{$href}}" @click.prevent.stop="$dispatch('linkaction', {link: '{{$href}}'});" class="flex flex-row justify-center py-2 lg:py-2 px-1  bg-blue font-franklin rounded-3xl shadow-[0px_10px_3px_-6px_rgba(0,0,0,0.3)] items-center space-x-1 w-40 md:w-48 lg:w-48 xl:w-56 2xl:w-60 ">
    <p class="text-center items-center text-white text-xs  md:text-base xl:text-lg 2xl:text-xl">{{$text}}</p>
    <img src="/images/icons/booking icon.png" class="h-4 xl:h-5  "alt="">
</a>
</div>
