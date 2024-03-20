@props(['instance', 'locale'])
<div>
    <label class="label" for="">Title</label>
    <input name="data[title]" type="text" class="input input-bordered w-full"
            value="{{$instance->translations_array[$locale]['title'] ?? ''}}" required />
</div>
<div class="form-control">
    <label class="label">
        <span class="label-text">Description</span>
    </label>
    <textarea name="data[description]" class="textarea textarea-bordered h-24">{{$instance->translations_array[$locale]['description'] ?? ''}}</textarea>
</div>

<x-easyadmin::inputs.imageuploader
    :element="[
        'key' => 'image',
        'authorised' => true,
        'label' => 'Image',
        'validations' => ['size' => '100 kb'],
        'width' => 'full',
    ]"
    :_old="[
        'image' => $instance->image
    ]"/>
<div>
    <label class="label" for="">Display Location</label>
    <input name="display_location" type="text" class="input input-bordered w-full" value="{{$instance->display_location}}" required />
</div>
