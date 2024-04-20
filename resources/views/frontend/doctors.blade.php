<x-guest-layout>
    <div class="text-base">
        <x-main-menu-component />
        <div class="w-full px-12 max-w-[1500px] m-auto text-justify">
            <x-page-title title="Our Doctors" />
            <div class="my-12">
                Craft IVF is a reputable fertility clinic that houses some of the best IVF doctors in India. With a team of experienced and skilled fertility specialists, including renowned doctors from Kerala, Craft IVF is a trusted destination for those seeking top-notch reproductive care. Their expertise in the field of IVF and their commitment to personalized treatment makes them the best choice for patients looking for the best IVF doctor in Kerala. Craft IVF is dedicated to helping individuals and couples achieve their dreams of parenthood, offering advanced techniques and comprehensive care under the guidance of the finest IVF doctors in Kerala.
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
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
