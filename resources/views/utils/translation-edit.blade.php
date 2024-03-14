<div x-data="{
    currentTab: 0,
    }">
    <div>
        <div class="flex flex-row m-0">
            @foreach (config('app_settings.enabled_locales') as $code => $language)
                <button type="button" @click.prevent.stop="currentTab = {{ $loop->index }};"
                    class="text-warning font-bold px-4 py-2 border border-base-content border-opacity-20 border-b-transparent rounded-tr-md rounded-tl-md"
                    :class="currentTab != {{ $loop->index }} || 'bg-base-200'">{{ $language }}</button>
            @endforeach
        </div>
        <div
            class="border border-base-content border-opacity-20 p-3 m-0 bg-base-200 rounded-tr-md rounded-bl-md rounded-br-md">
            @foreach (config('app_settings.enabled_locales') as $code => $language)
                <form x-show="currentTab == {{ $loop->index }}" action="#"
                    @submit.prevent.stop="saveTranslation($el);">
                    <div>
                        <h4 class="text-center underline font-bold">{{ $language }} content</h4>
                        @method('PUT')
                        <input type="hidden" name="template" value="{{ $templateId }}">
                        <input type="hidden" name="locale" value="{{ $code }}">
                        <x-pageformtemplates.sidebar-right.edit
                            :webpage="$webpage"
                            locale="{{$code}}"/>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
</div>
