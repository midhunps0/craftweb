<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\PageTemplate;
use App\Services\NewsService;
use Illuminate\Http\Request;
use Modules\Ynotz\EasyAdmin\Traits\HasMVConnector;
use Modules\Ynotz\SmartPages\Http\Controllers\SmartController;

class NewsController extends SmartController
{
    use HasMVConnector;

    public function __construct(Request $request, NewsService $service)
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

    public function create()
    {
        $template = PageTemplate::where('template_file', config('app_settings.news_translation_component'))
            ->get()->first();
            // dd($template);
        return $this->buildResponse(
            'admin.newss.create',
            [
                'templateId' => $template->id
            ]
        );
    }

    public function edit($id)
    {
        $news = News::find($id);
        $template = PageTemplate::where('template_file', config('app_settings.news_translation_component'))
            ->get()->first();
        return $this->buildResponse(
            'admin.newss.edit',
            [
                'news' => $news,
                'newsId' => $news->id,
                'templateId' => $template->id
            ]
        );
    }
}
