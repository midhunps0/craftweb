@props(['instance' => null, 'locale' => null])
<fieldset class="border border-base-content border-opacity-20 p-2 rounded-md mt-4">
    <legend class="text-warning">Metatags</legend>
    <div>
        <label class="label" for="">Meta Title</label>
        <input name="data[metatags][title]" type="text" class="input input-bordered w-full"
        value="{{$instance->translations_array[$locale]['metatags']['title'] ?? ''}}" />
    </div>
    <div class="form-control">
        <label class="label">
            <span class="label-text">Meta Description</span>
        </label>
        <textarea name="data[metatags][description]" class="textarea textarea-bordered h-24">{{$instance->translations_array[$locale]['metatags']['description'] ?? ''}}
        </textarea>
    </div>
    <div>
        <label class="label" for="">OG Meta Title</label>
        <input name="data[metatags][og_title]" type="text" class="input input-bordered w-full"
        value="{{$instance->translations_array[$locale]['metatags']['og_title'] ?? ''}}" />
    </div>
    <div class="form-control">
        <label class="label">
            <span class="label-text">OG Meta Description</span>
        </label>
        <textarea name="data[metatags][og_description]" class="textarea textarea-bordered h-24">{{$instance->translations_array[$locale]['metatags']['og_description'] ?? ''}}
        </textarea>
    </div>
    <div>
        <label class="label" for="">OG Meta Type</label>
        <input name="data[metatags][og_type]" type="text" class="input input-bordered w-full"
        value="{{$instance->translations_array[$locale]['metatags']['og_type'] ?? ''}}" />
    </div>
<fieldset>

