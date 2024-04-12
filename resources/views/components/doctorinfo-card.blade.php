@props(['name', 'designation', 'qualification', 'photo_url', 'department', 'specialisations', 'exp_summary', 'video_link'])
<div class="flex flex-col md:flex-row border border-blue/50 md:gap-x-3 lg:gap-x-1  p-4 w-full relative"
    x-data="{
        showScreen: false,
        openScreen() {
            this.showScreen = true;
        },
        closeScreen() {
            this.showScreen = false;
        }
    }"
>
    <div class="md:w-1/3 flex flex-col justify-center md:justify-start items-center mt-6 mx-auto">
        <x-doctorcard-component
            name="{{$name}}"
            designation="{{$designation}}"
            qualification="{{$qualification}}"
            photo_url="{{$photo_url}}"
            department="{{$department}}"
            />
        @if (isset($video_link) && trim($video_link) != '')
        <div class="flex justify-end mt-4">
            <button @click.prevent.stop="openScreen();" class="flex flex-row justify-center py-2 lg:py-2 bg-blue font-franklin rounded-3xl shadow-[0px_10px_3px_-6px_rgba(0,0,0,0.3)] items-center gap-4 w-fit px-6">
            <span class="text-center items-center text-white text-xs md:text-base xl:text-lg 2xl:text-xl">video</span>
            <span class="fill-current text-white flex items-center"><x-easyadmin::display.icon icon="icons.youtube-icon" height="h-5" width="w-5"/></span>
            </button>
        </div>
        @endif
    </div>
    <div class="mt-6 md:w-2/3 flex flex-col justify-end items-center lg:items-start gap-y-3 font-franklin text-sm lg:text-base my-auto mx-auto">

        <div class="flex flex-col md:justify-end lg:justify-start gap-y-1 w-5/6">
        <p class="font-semibold">Designation:</p>
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
        @if (trim($specialisations) != '')
        <div class="flex flex-col  md:justify-end lg:justify-start  gap-y-1  w-5/6">
        <p class=" font-semibold">Specialization:</p>
        <p class="">{{$specialisations}}</p>
        </div>
        @endif
        @if (trim($exp_summary) != '')
        <div class="flex flex-col  md:justify-end lg:justify-start  gap-y-1  w-5/6">
        <p class=" font-semibold">Experience & Expertise:</p>
        <p class=" min-h-32 text-justify overflow-y-scroll">{{$exp_summary}}</p>
        </div>
        @endif

    </div>
    <div x-show="showScreen" class="absolute z-10 top-0 left-0 w-full h-full flex justify-center items-center bg-darkgray bg-opacity-95 transition-all" x-transition>
        <button type="button" @click.prevent.stop="closeScreen();" class="btn btn-sm btn-error text-white absolute top-4 right-4">
            <x-easyadmin::display.icon icon="easyadmin::icons.close" height="h-4" width="w-4" />
        </button>
        <div class="md:w-2/3 lg:w-1/2">
            <div class="relative z-10" style="position:relative;padding-bottom:56.25%">
                <iframe width="100%" height="100%"
                    class="w-full absolute top-0 left-0" src="{{$video_link}}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                    referrerpolicy="origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
