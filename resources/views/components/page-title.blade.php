@props(['title' => 'Page Title', 'image' => null])
<div class="reltive px-2 py-4 text-4xl font-franklin relative border-b border-gray mt-2 mb-4">
    {{-- <div class="absolute z-0 top-0 ltr:left-0 rtl:right-0 bg-gray h-full w-1/5 ltr:-translate-x-2/3 rtl:translate-x-2/3"></div> --}}
    @if (isset($image))
        <div class="absolute top-0 left-0 z-0 w-full h-full overflow-hidden bg-white">
            <img src="{{$image}}" alt="" class="object-cover opacity-50">
        </div>
    @endif
    <div class="flex flex-row items-center justify-between z-10">
        <h1 class="relative z-10 flex-grow">{{$title}}</h1>
        <div class="flex flex-row gap-8 z-10">
            <img src="/images/icons/nabh-logo.png" class="hidden md:block w-16 lg:w-24 max-h-full" alt="">
            <img src="/images/icons/logo20years.png" class="hidden md:block w-16 lg:w-24 max-h-full" alt="">
        </div>
    </div>
</div>
