@props(['instance', 'locale'])
<div>
    <label class="label" for="">Title</label>
    <input name="data[title]" @change="$dispatch('titlechange', {key: 'edit-web-page', value: $el.value});" type="text" class="input input-bordered w-full"
            value="{{$instance->translations_array[$locale]['title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Slug</label>
    <input @titlechange.window="if ($event.detail.key == 'edit-web-page') {$el.value = $event.detail.value.toLowerCase().replace(/ /g, '-').replace(/[@#\$%\^\&*()_\+=\[\]{};':\\\|,\.<>\/\?~`]/g, '');}" name="slug"
    value="{{$instance->getTranslation($locale)->slug ?? ''}}" type="text" class="input input-bordered w-full" required />
</div>
<div class="form-control">
    <label class="label">
        <span class="label-text">Body</span>
    </label>
    <textarea name="data[body]" class="textarea textarea-bordered h-24">{{$instance->translations_array[$locale]['body'] ?? ''}}</textarea>
</div>
<x-easyadmin::inputs.imageuploader
    :element="[
        'key' => 'data[cover_image]',
        'authorised' => true,
        'label' => 'Cover Image',
        'validations' => ['size' => '100 kb'],
        'width' => 'full',
    ]"
    :_old="[
        'data[cover_image]' => $instance->getTranslation($locale) != null ? $instance->getTranslation($locale)->cover_image : null
    ]"/>
<x-pageformtemplates.metatags :instance="$instance" locale="{{$locale}}"/>
