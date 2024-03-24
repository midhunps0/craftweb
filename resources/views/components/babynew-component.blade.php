
@props(['count','text'])
<div>
<div class="flex flex-col lg:space-y-3 justify-center w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 lg:h-52 lg:w-52 border border-gray/30  bg-white  shadow-[1px_1px_3px_2px_rgba(0,0,0,0.3)] items-center">
    <img src="/images/icons/baby icon.png" class="h-12 md:h-14 lg:h-16 xl:20 2xl:h-20 mx-auto px-3 " alt="">
    <p class="text-center text-xs lg:text-base xl:text-4xl">{{$count}}</p>
    <p class="text-center text-xs lg:text-base xl:text-lg text-darkgray ml-2 mr-2">{{$text}}</p>
</div>
</div>
