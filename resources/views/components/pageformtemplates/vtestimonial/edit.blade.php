@props(['instance', 'locale'])
<div>
    <label class="label" for="">Reviewer Name</label>
    <input name="data[reviewer]" type="text" class="input input-bordered w-full"
            value="{{$instance->translations_array[$locale]['reviewer'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Title</label>
    <input name="data[title]" type="text" class="input input-bordered w-full"
            value="{{$instance->translations_array[$locale]['title'] ?? ''}}" required />
</div>
<div class="form-control">
    <label class="label">
        <span class="label-text">Story</span>
    </label>
    <textarea name="data[story]" class="textarea textarea-bordered h-24">{{$instance->translations_array[$locale]['story'] ?? ''}}</textarea>
</div>
<div>
    <label class="label" for="">Link</label>
    <input name="link" type="text" class="input input-bordered w-full"
            value="{{$instance->link ?? ''}}" required />
</div>
