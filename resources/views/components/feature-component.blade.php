@props(['icon', 'ref_key'])
<div class="border border-gray flex flex-col justify-center w-full min-w-64 max-w-96 bg-white shadow-[0px_10px_12px_-4px_rgba(0,0,0,0.3)] hover:shadow-[0px_0px_0px_0px_rgba(0,0,0,0.3)]  p-3">
        <div class="flex justify-center items-center">
            <x-easyadmin::display.icon icon="{{$icon}}" height="h-8 sm:h-10" width="w-8 sm:w-10" />
            <h4 class="font-medium hover:font-bold text-base xl:text-lg font-questrial text-center
            " x-text="typeof features['{{$ref_key}}'] != 'undefined' && features['{{$ref_key}}'] != null ? features['{{$ref_key}}'].current_translation.data.title : ''"></h4>
        </div>
        <div class="z-40 text-sm lg:text-base font-normal font-questrial text-justify m-auto" x-text="typeof features['{{$ref_key}}'] != 'undefined' && features['{{$ref_key}}'] != null ? features['{{$ref_key}}'].current_translation.data.description : ''"></div>
</div>
