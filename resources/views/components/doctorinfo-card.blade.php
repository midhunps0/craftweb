@props(['name', 'designation', 'qualification', 'photo_url'])
<div class="flex flex-col md:flex-row border border-blue/50 md:gap-x-3 lg:gap-x-1  p-4">
    <div class="md:w-1/3 flex flex-col justify-center md:justify-start items-center mt-6 mx-auto">
        <x-doctorcard-component
            name="{{$name}}"
            designation="{{$designation}}"
            qualification="{{$qualification}}"
            photo_url="{{$photo_url}}"
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
        <p class="">Chairman & Medical director</p>
        </div>
        <div class="flex flex-col  md:justify-end lg:justify-start gap-y-1  w-5/6">
        <p class=" font-semibold">Department:</p>
        <p class="">Department</p>
        </div>
        <div class="flex flex-col  md:justify-end lg:justify-start  gap-y-1  w-5/6">
        <p class=" font-semibold">Qualification:</p>
        <p class="">MD, DGO, DPS (GERMANY)</p>
        </div>
        <div class="flex flex-col  md:justify-end lg:justify-start  gap-y-1  w-5/6">
        <p class=" font-semibold">Specialization:</p>
        <p class="">MD, DGO, DPS (GERMANY)</p>
        </div>
        <div class="flex flex-col  md:justify-end lg:justify-start  gap-y-1  w-5/6">
        <p class=" font-semibold">Experience & Expertise:</p>
        <p class=" min-h-56 text-justify overflow-y-scroll">More than 30 years of Experience and a dedicated spirit. Leading Fertility Consultant in India and Abroad. Fulfilling each dream of parenthood is his goal. An Eminent Gynecologist, Fertility Specialist and Endoscopic Surgeon having almost 25 years of professional experience and now leading 5 super specialty healthcare organizations in India and Middle-East as Chairman and Medical Director, Dr.Mohammed Ashraf is one of the leading Fertility Consultant both in India and Abroad. Since 1998 he has been a visiting specialist gynecologist and laparoscopic surgeon in Dubai, since 2007 consultant gynecologist in Doha and Senior consultant in OBS-GYN at Muscat since 2010..</p>
        </div>


    </div>
</div>
