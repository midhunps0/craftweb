@props(['instance', 'locale'])
<div>
    <label class="label" for="">Reviewer Name</label>
    <input name="data[reviewer]" @change="$dispatch('titlechange', {key: 'edit-web-page', value: $el.value});" type="text" class="input input-bordered w-full"
            value="{{$instance->translations_array[$locale]['reviewer'] ?? ''}}" required />
</div>
<div class="form-control">
    <label class="label">
        <span class="label-text">Review</span>
    </label>
    <textarea name="data[review]" class="textarea textarea-bordered h-24">{{$instance->translations_array[$locale]['review'] ?? ''}}</textarea>
</div>
<div>
    <label class="label justify-start" for="">Review Stars &nbsp;<i class="text-xs text-warning">(Same for all translations)</i></label>
    <input name="stars" type="number" step="1" min="1" class="input input-bordered w-full"
        value="{{$instance->stars ?? ''}}" required />
</div>
<div>
    <label class="label justify-start" for="">Display Priority &nbsp;<i class="text-xs text-warning">(Same for all translations)</i></label>
    <input name="display_priority" type="number" step="1" min="1" class="input input-bordered w-full"
        value="{{$instance->display_priority ?? ''}}" required />
</div>
<x-easyadmin::inputs.imageuploader
    :element="[
        'key' => 'photo',
        'authorised' => true,
        'label' => 'Photo (Same across translations)',
        'validations' => ['size' => '100 kb'],
        'width' => 'full'
    ]"
    :_old="[
        'photo' => $instance->photo
    ]"/>
