<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Doctor;
use App\Models\HilightFeature;
use App\Models\News;
use App\Models\PageTemplate;
use App\Models\Review;
use App\Models\VideoTestimonial;
use App\Models\WebPage;
use App\Services\PageTemplateService;
use Illuminate\Http\Request;
use Modules\Ynotz\EasyAdmin\Traits\HasMVConnector;
use Modules\Ynotz\SmartPages\Http\Controllers\SmartController;
use SebastianBergmann\Template\Template;

class PageTemplateController extends SmartController
{
    use HasMVConnector;

    public function __construct(Request $request, PageTemplateService $service)
    {
        parent::__construct($request);
        $this->connectorService = $service;
        // $this->itemName = null;
        // $this->unauthorisedView = 'easyadmin::admin.unauthorised';
        // $this->errorView = 'easyadmin::admin.error';
        // $this->indexView = 'easyadmin::admin.indexpanel';
        // $this->showView = 'easyadmin::admin.show';
        // $this->createView = 'easyadmin::admin.form';
        // $this->editView = 'easyadmin::admin.form';
        // $this->itemsCount = 10;
        // $this->resultsName = 'results';
    }

    public function getTemplateInputsForm(Request $request)
    {
        $data = [];
        $viewFile = '';
        if ($request->input('article_id') != null) {
            $template = PageTemplate::where('template_file', config('app_settings.article_translation_component'))->get()->first();
        }
        else if ($request->input('webpage_id') != null) {
            $template = PageTemplate::find($request->template_id);
        }
        else if ($request->input('review_id') != null) {
            $template = PageTemplate::where('template_file', config('app_settings.review_translation_component'))->get()->first();
        }
        else if ($request->input('videotestimonial_id') != null) {
            $template = PageTemplate::where('template_file', config('app_settings.vtestimonial_translation_component'))->get()->first();
        }
        else if ($request->input('doctor_id') != null) {
            $template = PageTemplate::where('template_file', config('app_settings.doctor_translation_component'))->get()->first();
        }
        else if ($request->input('news_id') != null) {
            $template = PageTemplate::where('template_file', config('app_settings.news_translation_component'))->get()->first();
        }
        else if ($request->input('hfeature_id') != null) {
            $template = PageTemplate::where('template_file', config('app_settings.hfeature_translation_component'))->get()->first();
        }
        switch($request->form_type) {
            case 'create':
                $viewFile = 'utils.translation-create';
                $data['templateId'] = $request->template_id;
                $template = PageTemplate::find($request->template_id);
                $data['formComponent'] = "pageformtemplates.{$template->template_file}.create";
                break;
            case 'edit':
                if ($request->input('article_id') != null) {
                    $data['instance'] = Article::find($request->article_id);
                    $data['formComponent'] = "pageformtemplates.{$template->template_file}.edit";
                }
                else if ($request->input('review_id') != null) {
                    $data['instance'] = Review::find($request->review_id);
                    $data['formComponent'] = "pageformtemplates.{$template->template_file}.edit";
                }
                else if ($request->input('videotestimonial_id') != null) {
                    $data['instance'] = VideoTestimonial::find($request->videotestimonial_id);
                    $data['formComponent'] = "pageformtemplates.{$template->template_file}.edit";
                }
                else if ($request->input('webpage_id') != null) {
                    $data['instance'] = WebPage::find($request->webpage_id);
                    $data['formComponent'] = "pageformtemplates.{$template->template_file}.edit";
                }
                else if ($request->input('doctor_id') != null) {
                    $data['instance'] = Doctor::find($request->doctor_id);
                    $data['formComponent'] = "pageformtemplates.{$template->template_file}.edit";
                }
                else if ($request->input('news_id') != null) {
                    $data['instance'] = News::find($request->news_id);
                    $data['formComponent'] = "pageformtemplates.{$template->template_file}.edit";
                }
                else if ($request->input('hfeature_id') != null) {
                    $data['instance'] = HilightFeature::find($request->hfeature_id);
                    $data['formComponent'] = "pageformtemplates.{$template->template_file}.edit";
                }
                $data['templateId'] = $template->id;
                $viewFile = 'utils.translation-edit';
                // $viewFile = config('app_settings.form_templates_folder').'.'.
                // $template->template_file.'.edit';
                break;
        }
        // $t = PageTemplate::find($request->template_id);
        // dd($t);
        return response()->json(
            [
                'form' => view(
                    $viewFile,
                    $data
                )->render()
            ]
        );
    }
}
