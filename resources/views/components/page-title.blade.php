@props(['title' => 'Page Title'])
<div class="reltive px-2 py-4 text-4xl font-franklin relative border-b border-gray mb-4">
    <div class="absolute z-0 top-0 ltr:left-0 rtl:right-0 bg-gray h-full w-1/5 md:w-1/6 ltr:-translate-x-2/3 rtl:translate-x-2/3"></div>
    <div class="flex flex-row items-center justify-between">
        <h1 class="relative z-10 flex-grow">{{$title}}</h1>
        <div class="flex flex-row gap-8">
            <img src="/images/icons/nabh-logo.png" class="w-24" alt="">
            <img src="/images/icons/logo20years.png" class="w-24" alt="">
        </div>
    </div>
</div>
