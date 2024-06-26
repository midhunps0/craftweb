<x-guest-layout>
    <div class="text-base">
        <div class="w-full px-12 max-w-[1500px] m-auto">
            <x-main-menu-component />
            <x-page-title title="News"  image="{{asset('images/patient_guide.webp')}}"/>
            <div class="flex flex-row flex-wrap justify-center items-stretch">
                @foreach ($news as $n)
                {{-- {{dd($n->current_translation)}} --}}
                    <div class="md:w-1/4 p-3 box-border items-stretch">
                        <x-news
                            title="{{$n->current_translation->data['title']}}"
                            img="{{$n->image_url}}"/>
                    </div>
                @endforeach
            </div>
        </div>
        <div x-data="{
                src: '',
                show: false,
                setShow(e) {
                    this.src = e.detail.imgsrc;
                    this.show = true;
                }
            }" x-show="show" @newsclick.window="setShow($event);" class="fixed top-0 left-0 z-50 w-full h-full flex justify-center items-center bg-white bg-opacity-90">
            <div @click.outside="show = false;" class="h-fit w-fit flex p-3 border border-gray bg-white">
                <img :src="src" class="max-h-[80vh] max-w-200">
            </div>
            <button @click.prevent.stop="show = false;" type="button" class="btn btn-sm btn-error text-white absolute top-4 right-4">
                <x-easyadmin::display.icon icon="easyadmin::icons.close" height="h-4" width="w-4" />
            </button>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
