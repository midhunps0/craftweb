<div>
    <label class="label" for="">Title</label>
    <input name="data[title]" type="text" class="input input-bordered w-full" required />
</div>
<div class="form-control">
    <label class="label">
        <span class="label-text">Description</span>
    </label>
    <textarea name="data[description]" class="textarea textarea-bordered h-24"></textarea>
</div>
<x-easyadmin::inputs.imageuploader
    :element="[
        'key' => 'image',
        'authorised' => true,
        'label' => 'Image',
        'validations' => ['size' => '200 kb'],
        'width' => 'full'
    ]"/>


