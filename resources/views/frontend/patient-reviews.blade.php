<x-guest-layout>
    <div class="text-base">
        <div class="w-full px-12 max-w-[1500px] m-auto">
            <x-main-menu-component />
            <x-page-title title="Patient Reviews / Testimonials"  image="{{asset('images/reviews.webp')}}"/>
            {{-- {{dd($reviews)}} --}}
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
            <div>
                {{$reviews->links('frontend.tailwind-paginator')}}
            </div>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
