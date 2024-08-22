@props(['name', 'designation', 'qualification', 'photo_url', 'departmant'])
<div>
   <div class="w-64 relative shadow-[0px_10px_12px_-4px_rgba(0,0,0,0.3)] ">
      {{-- <div class="px-4">
        <p class="text-xl font-franklin pt-6 min-h-20">
            {{$name}}
        </p>
     </div> --}}
      <div class="relative flex flex-row justify-end w-full">
         <img src="{{$photo_url}}" class="w-full min-h-52 dir-img" alt="doctor_image">
      </div>

      {{-- <div class="absolute flex ltr:flex-row rtl:flex-row-reverse items-center space-x-2 -rotate-90 origin-top-left bottom-10 ltr:left-2 rtl:-right-24">
            <img src="/images/icons/Copy of icone-d-information-noir.png" class="opacity-40 h-8 w-8 rotate-90" alt="">
            <p class="text-gray text-xs font-normal">{{__('homecontent.craft_ivf_hospital')}}</p>
      </div> --}}

      <div class="bg-gray-600 py-3 h-20 overflow-hidden">
         <p class="text-white font-questrial text-sm text-center font-bold">{{$name}}</p>
         <p class="text-white font-questrial font-normal text-sm text-center">{{$department}}</p>
      </div>
   </div>
</div>
