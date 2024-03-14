@props(['webpage', 'locale'])
<div>
    <label class="label" for="">Title</label>
    <input name="data[title]" @change="$dispatch('titlechange', {key: 'edit-web-page', value: $el.value});" type="text" class="input input-bordered w-full"
            value="{{$webpage->translations_array[$locale]['title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Slug</label>
    <input @titlechange.window="if ($event.detail == 'edit-web-page') {$el.value = $event.detail.value.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');}" name="slug"
    value="{{$webpage->getTranslation($locale)->slug ?? ''}}" type="text" class="input input-bordered w-full" required />
</div>
<div class="form-control">
    <label class="label">
        <span class="label-text">Body</span>
    </label>
    <textarea name="data[body]" class="textarea textarea-bordered h-24">{{$webpage->translations_array[$locale]['body'] ?? ''}}</textarea>
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
        'data[cover_image]' => $webpage->getTranslation($locale) != null ? $webpage->getTranslation($locale)->cover_image : null
    ]"/>
<x-pageformtemplates.metatags :webpage="$webpage" locale="{{$locale}}"/>
