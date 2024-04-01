<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\PageTemplate;
use App\Services\ArticleService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\ShowPageData;
use Modules\Ynotz\EasyAdmin\Traits\HasMVConnector;
use Modules\Ynotz\SmartPages\Http\Controllers\SmartController;

class ArticleController extends SmartController
{
    use HasMVConnector;

    public function __construct(Request $request, ArticleService $service)
    {
        parent::__construct($request);
        $this->connectorService = $service;
        // $this->itemName = null;
        // $this->unauthorisedView = 'easyadmin::admin.unauthorised';
        // $this->errorView = 'easyadmin::admin.error';
        // $this->indexView = 'easyadmin::admin.indexpanel';
        $this->showView = 'pagetemplates.article';
        // $this->createView = 'easyadmin::admin.form';
        // $this->editView = 'easyadmin::admin.form';
        // $this->itemsCount = 10;
        // $this->resultsName = 'results';
    }

    public function quickShow($slug)
    {
        App::setlocale('en');
        return $this->show('en', $slug);
    }

    public function old(Request $request)
    {
        App::setlocale('en');
        $slug = $request->path();
        return $this->show('en', $slug);
    }

    public function show($locale, $slug)
    {
        try {
            $showPageData = $this->connectorService->getShowPageData($slug);

            if (!($showPageData instanceof ShowPageData)) {
                throw new Exception('getShowPageData() of connectorService must return an instance of ' . ShowPageData::class);
            }
            return $this->buildResponse($this->showView, $showPageData->getData());
        } catch (\Throwable $e) {
            info($e);
            return $this->buildResponse($this->errorView, ['error' => $e->__toString()]);
        }
    }

    public function create()
    {
        $template = PageTemplate::where('template_file', config('app_settings.article_translation_component'))
            ->get()->first();
            // dd($template);
        return $this->buildResponse(
            'admin.articles.create',
            [
                'templateId' => $template->id
            ]
        );
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $template = PageTemplate::where('template_file', config('app_settings.article_translation_component'))
            ->get()->first();
        return $this->buildResponse(
            'admin.articles.edit',
            [
                'article' => $article,
                'articleId' => $article->id,
                'templateId' => $template->id
            ]
        );
    }
}
