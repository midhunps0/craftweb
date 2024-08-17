<!DOCTYPE html>
<html x-data="{theme: $persist('light'), href: '', currentpath: '{{url()->current()}}', currentroute: '{{ Route::currentRouteName() }}', compact: $persist(false), xtitle: '', metatags: [],
nameMetas() {
    return this.metatags.filter(
        (m) => {
            return m.name != undefined;
        }
    );
},
propertyMetas() {
    return this.metatags.filter(
        (m) => {
            return m.property != undefined;
        }
    );
},
metaHtml() {
    let tags = [];
    this.nameMetas().forEach((nm) => {
        tags.push(`<meta name='${nm.name}' content='${nm.content}'>`);
    });
    this.propertyMetas().forEach((pm) => {
        tags.push(`<meta property='${pm.property}' content='${pm.content}'>`);
    });
    return tags.join(' ');
},
setMetaHtml() {
    let headHtml = document.getElementsByTagName('head')[0].innerHTML;

    let temp = headHtml.split('<!--meta-->');
    temp[1] = this.metaHtml();

    document.getElementsByTagName('head')[0].innerHTML = temp.join('<!--meta-->');
    document.getElementsByTagName('title')[0].innerHTML = this.xtitle;
}
}"
{{-- @themechange.window="theme = $event.detail.darktheme ? 'newdark' : 'light';"  --}}

lang="{{ str_replace('_', '-', app()->getLocale()) }}"
x-init="
    console.log(theme);
    window.landingUrl = '{{\Request::getRequestUri()}}'; window.landingRoute = '{{ Route::currentRouteName() }}'; window.renderedpanel = 'pagecontent';

    let allTags = {{Js::from(session()->get('metatags'))}};
    console.log('all tags');
    console.log(allTags);
    if(allTags != null) {
        metatags = allTags.map((t) => {
            t.is_name = typeof t.name != 'undefined';
            return t;
        });
    }
    if (metatags.length > 0) {
        theLink = window.landunUrl;
        setTimeout(() => {
            if ($store.app.xpages == undefined) {
                $store.app.xpages = [];
            }
            if ($store.app.xpages[theLink] == undefined) {
                $store.app.xpages[theLink] = {};
            }
            $store.app.xpages[theLink].meta = JSON.stringify(metatags);
        }, 500);

    }
    {{-- @if(session()->get('title') != null)
    xtitle='{{addslashes(session()->get('title'))}}';
    @else
    xtitle='{{addslashes(config('app.name'))}}';
    @endif --}}
    console.log('title')
    console.log(xtitle)
    setMetaHtml();
    "
    @xmetachange="
        metatags = JSON.parse($event.detail.data);
        setMetaHtml();
    "
    @xtitlechange="
        xtitle = $event.detail.data;
        setMetaHtml();
    "
    @pagechanged.window="
    currentpath=$event.detail.currentpath;
    currentroute=$event.detail.currentroute;"
    @routechange.window="currentroute=$event.detail.route;"
{{-- :data-theme="theme" --}}

dir="{{App::currentLocale() == 'en' ? 'ltr' : 'rtl'}}"
lang="en"
>
    <head>
        @if(request()->session() != null)
        <title>{{addslashes(request()->session()->get('title'))}}</title>
        @endif
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--meta-->
        @if (request()->session()->get('metatags') != null)
        @foreach (request()->session()->get('metatags') as $tag)
            @if (isset($tag['by_props']))
                <meta
                @foreach ($tag as $attr => $v)
                    @if ($attr != 'by_props')
                    {{$attr}}="{{addslashes($v)}}"
                    @endif
                @endforeach
                 >
            @elseif (isset($tag['name']))
                <meta name="{{$tag['name']}}" content="{{addslashes($tag['content'])}}" >
            @elseif (isset($tag['property']))
                <meta name="{{$tag['property']}}" content="{{addslashes($tag['content'])}}" >
            @endif
        @endforeach
        @endif
        <!--meta-->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('css')
        @stack('header_js')
    </head>
    <body x-data="initPage" x-init="initAction().then(() => {});"
        @linkaction.window="initialised = false; fetchLink($event.detail); "
        @formsubmit.window="postForm($event.detail);"
        @popstate.window="historyAction($event)"
        class="font-sans antialiased text-sm transition-colors">
        <div class="min-h-screen bg-base-200 flex flex-col">
            <main class="flex flex-col items-stretch flex-grow w-full">
                <div x-data="{show: true}" x-show="show"
                @contentupdate.window="
                if ($event.detail.target == 'renderedpanel') {
                    {{-- show = false; --}}
                    $el.style.opacity = 0.7;
                    setTimeout(() => {
                        $el.innerHTML = $event.detail.content;
                        {{-- show = true; --}}
                        $el.style.opacity = 1;
                        document.body.scrollTop = document.documentElement.scrollTop = 0;
                    },
                        200
                    );
                }
                " id="renderedpanel"
                {{-- x-transition:enter="transition ease-out duration-250"
                x-transition:enter-start="translate-x-6"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-250"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="opacity-20 -translate-x-6" --}}
                class="transition-all duration-200 bg-white"
                {{-- class="bg-white" --}}
                >
                @fragment('page-content')
                    {{ $slot }}
                @endfragment
                </div>
            </main>
        </div>
        <x-progress-bar />
        <x-easyadmin::display.notice />
        <x-easyadmin::display.toast />
        @stack('js')
    </body>
</html>
