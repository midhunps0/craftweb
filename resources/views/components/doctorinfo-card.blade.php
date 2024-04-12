@props(['name', 'designation', 'qualification', 'photo_url', 'department', 'specialisations', 'exp_summary'])
<div class="flex flex-col md:flex-row border border-blue/50 md:gap-x-3 lg:gap-x-1  p-4 w-full">
    <div class="md:w-1/3 flex flex-col justify-center md:justify-start items-center mt-6 mx-auto">
        <x-doctorcard-component
            name="{{$name}}"
            designation="{{$designation}}"
            qualification="{{$qualification}}"
            photo_url="{{$photo_url}}"
            department="{{$department}}"
            />
        <div class=" flex justify-end  mt-4">
            <button href="#"class="mb-8 flex flex-row justify-center py-2 lg:py-2 px-3  bg-blue font-franklin rounded-3xl shadow-[0px_10px_3px_-6px_rgba(0,0,0,0.3)] items-center space-x-1 w-fit  ">
            <p class="text-center items-center text-white text-xs  md:text-base xl:text-lg 2xl:text-xl">video</p>
            <span class="fill-current text-white flex items-center"><x-easyadmin::display.icon icon="icons.youtube-icon" height="h-5" width="w-5"/></span>
            </button>
        </div>
    </div>
    <div class="mt-6 md:w-2/3 flex  flex-col  justify-end items-center  lg:items-start gap-y-3 font-franklin text-sm lg:text-base my-auto mx-auto">

        <div class="flex  flex-col  md:justify-end lg:justify-start gap-y-1 w-5/6  ">
        <p class=" font-semibold">Designation:</p>
        <p class="">{{$designation}}</p>
        </div>
        <div class="flex flex-col  md:justify-end lg:justify-start gap-y-1  w-5/6">
        <p class=" font-semibold">Department:</p>
        <p class="">{{$department}}</p>
        </div>
        <div class="flex flex-col  md:justify-end lg:justify-start  gap-y-1  w-5/6">
        <p class=" font-semibold">Qualification:</p>
        <p class="">{{$qualification}}</p>
        </div>
        <div class="flex flex-col  md:justify-end lg:justify-start  gap-y-1  w-5/6">
        <p class=" font-semibold">Specialization:</p>
        <p class="">{{$specialisations}}</p>
        </div>
        @if (trim($exp_summary) != '')
        <div class="flex flex-col  md:justify-end lg:justify-start  gap-y-1  w-5/6">
        <p class=" font-semibold">Experience & Expertise:</p>
        <p class=" min-h-56 text-justify overflow-y-scroll">{{$exp_summary}}</p>
        </div>
        @endif

    </div>
</div>
