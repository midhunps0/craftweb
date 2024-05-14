<x-guest-layout>
    <div class="text-base">
        <div class="w-full px-12 max-w-[1500px] m-auto text-justify">
            <x-main-menu-component />
            <x-page-title title="Our Doctors"  image="{{asset('images/about_us.webp')}}"/>
            <div class="my-12">
                {{__('doctors.our_doctor_description')}}
            </div>
            <div class="flex flex-row flex-wrap justify-center items-stretch">
                @foreach ($doctors as $d)
                {{-- {{dd($d->current_translation->data)}} --}}
                {{-- {{dd($d->current_translation)}} --}}
                    <div class="box-border mb-8 w-full">
                        <x-doctorinfo-card
                            name="{{$d->current_translation->data['name']}}"
                            photo_url="{{$d->photo_url}}"
                            designation="{{$d->current_translation->data['designation']}}"
                            department="{{$d->current_translation->data['department']}}"
                            qualification="{{$d->current_translation->data['qualification']}}"
                            specialisations="{{$d->current_translation->data['specialisations']}}"
                            exp_summary="{{$d->current_translation->data['exp_summary']}}"
                            video_link="{{$d->current_translation->data['video_link'] ?? null}}"
                            slug="{{$d->current_translation->slug}}"/>
                    </div>
                @endforeach
            </div>
            <div>
                {{$doctors->links('frontend.tailwind-paginator')}}
            </div>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
