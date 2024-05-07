@props(['src'=>'/images/home/mohammed asharaf.png','name'=>'Prof. Dr. C Mohamed Ashraf','qualification'=>'MD, DGO, DPS (Germany),',
'designation'=>' Specialist Gynaecologist & Infertiologist, Laparoscopic Surgeon','content'=>''])
<div class="border-b border-r border-l border-gray shadow-lg w-full lg:w-1/2 flex flex-col justify-center items-center p-10 ">
    <div>
    <img src="{{$src}}" class="w-72 bg-grayishpink rounded-lg scale-x-[-1] " alt="">
        <div class="w-72 font-bold  text-sm sm:text-base lg:text-xl flex flex-col  items-center text-center justify-center">
            <p class="mt-4">{{$name}}</p>
            <p class="text-xs sm:text-sm lg:text-base  mt-3">{{$qualification}}</p>
            <p class="text-xs sm:text-sm lg:text-base">{{$designation}}</p>
        </div>
    </div>
    <div class="w-full mt-6 h-52 overflow-y-scroll">
        <p class="font-normal text-justify w-full text-xs  sm:text-sm lg:text-base">{{$content}}</p>
    </div>
</div>