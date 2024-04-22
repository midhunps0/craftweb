@if (session('translation_link') != null)
    @php
        $link = session('translation_link');
    @endphp
    <a href="{{$link}}"
        {{-- @click.prevent.stop="$dispatch('linkaction', {link: '{{$link}}'});" --}}
        class="px-2 py-1 bg-pink text-white hidden md:inline-block border border-pink">
        {{app()->currentLocale() == 'en' ? 'عربي' : 'English'}}
    </a>
    <a href="{{$link}}"
        {{-- @clikc.prevent.stop="$dispatch('linkaction', {link: '{{$link}}'});" --}}
        class="px-2 py-1 bg-pink text-white inline-block md:hidden border border-pink">
        {{app()->currentLocale() == 'en' ? 'آر' : 'En'}}
    </a>
@endif
