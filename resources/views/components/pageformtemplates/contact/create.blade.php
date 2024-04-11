<div>
    <label class="label" for="">Title</label>
    <input @change="$dispatch('titlechange', {key: 'create-web-page', value: $el.value});" name="data[title]" type="text" class="input input-bordered w-full" required />
</div>
<div>
    <label class="label" for="">Slug</label>
    <input @titlechange.window="if ($event.detail.key == 'create-web-page') {$el.value = $event.detail.value.toLowerCase().replace(/ /g, '-').replace(/[@#\$%\^\&*()_\+=\[\]{};':\\\|,\.<>\/\?~`]/g, '');}" name="slug" type="text" class="input input-bordered w-full" required />
</div>
<div class="form-control">
    <label class="label">
        <span class="label-text">Body</span>
    </label>
    {{-- <textarea name="data[body]" class="textarea textarea-bordered h-24"></textarea> --}}
    <x-inputs.content-builder key="data[body]" />
</div>
<div class="form-control">
    <label class="label">
        <span class="label-text">Sidebar</span>
    </label>
    <x-inputs.content-builder key="data[sidebar]" />
</div>
<x-easyadmin::inputs.imageuploader
    :element="[
        'key' => 'data[cover_image]',
        'authorised' => true,
        'label' => 'Cover Image',
        'validations' => ['size' => '100 kb'],
        'width' => 'full'
    ]"/>
<x-pageformtemplates.metatags />

