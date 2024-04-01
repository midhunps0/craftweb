<x-guest-layout>
    <div class="text-base">
        <x-main-menu-component />
        <div class="w-full px-2 md:px-16 lg:px-24">
            <x-page-title title="Patient Reviews / Testimonials" />
            <div class="">
                @foreach ($reviews as $r)
                {{-- {{dd($r->current_translation, $r)}} --}}
                    <div class="p-3 box-border">
                        <x-patient-review
                            stars="{{$r->stars}}"
                            reviewer="{{$r->current_translation->data['reviewer']}}"
                            review="{{$r->current_translation->data['review']}}"
                            photo_url="{{$r->photo_url}}"/>
                    </div>
                @endforeach
            </div>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
