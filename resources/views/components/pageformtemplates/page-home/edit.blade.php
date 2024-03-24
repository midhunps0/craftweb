@props(['instance', 'locale'])
<div class="form-control">
    <label class="label">
        <span class="label-text">Title</span>
    </label>
    <textarea name="data[title]" class="textarea textarea-bordered h-24">
    {{$instance->translations_array[$locale]['title'] ?? ''}}
    </textarea>
</div>
<div>
    <label class="label" for="">Book Appointment Button Text</label>
    <input name="data[book_appointment]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['book_appointment'] ?? ''}}"  required />
</div>
<div>
    <label class="label" for="">Chat With Us</label>
    <input name="data[chat_with_us]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['chat_with_us'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Free to call text</label>
    <input name="data[free_to_call]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['free_to_call'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Phone No.</label>
    <input name="data[phone_no]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['phone_no'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Branches</label>
    <input name="data[branches]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['branches'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Little Angels Caption</label>
    <input name="data[angels_caption]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['angels_caption'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Info Count 1</label>
    <input name="data[indo_1]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['indo_1'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Info Count 2</label>
    <input name="data[indo_2]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['indo_2'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Info Count 1</label>
    <input name="data[indo_3]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['indo_3'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Review Section Header</label>
    <input name="data[review_header]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['review_header'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Google Review Title</label>
    <input name="data[google_review_title]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['google_review_title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">View All Reviews Button</label>
    <input name="data[view_all_reviews]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['view_all_reviews'] ?? ''}}"  required />
</div>
<div>
    <label class="label" for="">Video Title</label>
    <input name="data[video_title]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['video_title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Video Subtitle</label>
    <input name="data[video_subtitle]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['video_subtitle'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">View All Testimonials Button</label>
    <input name="data[view_all_testimonials]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['view_all_testimonials'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Features Section Header</label>
    <input name="data[features_header]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['features_header'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Doctors Section Header</label>
    <input name="data[doctors_header]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['doctors_header'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">View All Doctors Button</label>
    <input name="data[view_all_doctors]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['view_all_doctors'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">News Section Header</label>
    <input name="data[news_header]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['news_header'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">View All News Button</label>
    <input name="data[view_all_news]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['view_all_news'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Blog Section Header</label>
    <input name="data[blog_header]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['blog_header'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">View All Articles Button</label>
    <input name="data[view_all_srticles]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['view_all_srticles'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">FAQ title</label>
    <input name="data[faq_title]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['faq_title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">FAQ Sub-text</label>
    <input name="data[faq_sub_text]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['faq_sub_text'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Appointment title</label>
    <input name="data[appointment_title]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['appointment_title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Appointment Sub-text</label>
    <input name="data[appointment_subtext]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['appointment_subtext'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Mail title</label>
    <input name="data[mail_title]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['mail_title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Mail Sub-text</label>
    <input name="data[mail_subtext]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['mail_subtext'] ?? ''}}" required />
</div>



<div>
    <label class="label" for="">Slug</label>
    <input name="slug"  class="input input-bordered w-full"
    value="{{$instance->getTranslation($locale)->slug ?? ''}}" required />
</div>
<x-pageformtemplates.metatags />


<!--

<div>
    <label class="label" for="">Title</label>
    <input name="data[title]" @change="$dispatch('titlechange', {key: 'edit-web-page', value: $el.value});" type="text" class="input input-bordered w-full"
            value="{{$instance->translations_array[$locale]['title'] ?? ''}}" required />
</div>
-->
