@props(['text' => 'View All', 'href' => '#'])
<a href="{{$href}}" @click.prevent.stop="$dispatch('linkaction', {link: '{{$href}}', fresh: true})" class="py-2 px-3 bg-blue font-franklin rounded-full shadow-sm flex flex-row justify-center items-center w-fit text-white space-x-2">
    <span class="text-xs
     md:text-sm">{{$text}}</span>
        <x-easyadmin::display.icon icon="easyadmin::icons.arrow-right"
            height="h-4 " width="w-4" />
</a>
