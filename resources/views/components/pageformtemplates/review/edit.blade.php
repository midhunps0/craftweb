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
