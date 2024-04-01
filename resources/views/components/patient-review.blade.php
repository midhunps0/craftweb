@props(['review', 'stars' => null, 'reviewer' => '', 'photo_url' => null])
<div>
    <div class="bg-base-100 bg-opacity-40 rounded-sm shadow-[0px_1px_4px_2px_rgba(0,0,0,0.3)] p-2 flex flex-row flex-wrap">
        {{-- @if (isset($photo_url) && strlen(trim($photo_url)) > 0) --}}
            <div class="w-full md:w-1/2 lg:w-1/3 flex justify-center items-center bg-lightgray rounded-md">
                <img src="{{strlen(trim($photo_url)) > 0 ? $photo_url : '/images/icons/google_icon.webp'}}" alt="" @if (strlen(trim($photo_url)) == 0)
                    class="w-32"
                @endif>
            </div>
        {{-- @endif --}}
        <div class="w-full md:1/2 lg:w-2/3">
            <div class="flex p-2 items-center">
                <div>
                    <img src="/images/icons/double qoute left1.png" class="h-16" alt="">
                </div>
                <div>
                    <div>
                        <p class="font-franklin font-bold text-sm">{{$reviewer}}</p>
                    </div>
                    @if (isset($stars))
                    <div class="flex flex-row">
                        @for ($i = 0; $i < intval($stars); $i++)
                        <x-easyadmin::display.icon icon="icons.star" height="h-4" width="w-4" />
                        @endfor
                    </div>
                    @endif
                </div>
            </div>
            <div class="p-4">
                <p class="text-sm lg:leading-5 font-franklin font-normal text-left">{{$review}}</p>
            </div>
        </div>
    </div>
</div>
