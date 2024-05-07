<div>
    <label class="label" for="">Reviewer Name</label>
    <input name="data[reviewer]" type="text" class="input input-bordered w-full" required />
</div>
<div class="form-control">
    <label class="label">
        <span class="label-text">Review</span>
    </label>
    <textarea name="data[review]" class="textarea textarea-bordered h-24"></textarea>
</div>
<div>
    <label class="label" for="">Review Stars</label>
    <input name="stars" type="number" step="1" min="1" class="input input-bordered w-full" required />
</div>
<div>
    <label class="label" for="">Display Priority</label>
    <input name="display_priority" type="number" step="1" min="1" class="input input-bordered w-full" required />
</div>
<x-easyadmin::inputs.imageuploader
    :element="[
        'key' => 'photo',
        'authorised' => true,
        'label' => 'Photo (Same across translations)',
        'validations' => ['size' => '100 kb'],
        'width' => 'full'
    ]"/>


