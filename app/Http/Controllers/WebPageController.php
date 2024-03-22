<?php

namespace App\Http\Controllers;

use App\Models\PageTemplate;
use App\Models\WebPage;
use App\Services\WebPageService;
use Exception;
use Illuminate\Http\Request;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\ShowPageData;
use Modules\Ynotz\EasyAdmin\Traits\HasMVConnector;
use Modules\Ynotz\SmartPages\Http\Controllers\SmartController;

class WebPageController extends SmartController
{
    use HasMVConnector;

    public function __construct(Request $request, WebPageService $service)
    {
        parent::__construct($request);
        $this->connectorService = $service;
        // $this->itemName = null;
        // $this->unauthorisedView = 'easyadmin::admin.unauthorised';
        // $this->errorView = 'easyadmin::admin.error';
        // $this->indexView = 'easyadmin::admin.indexpanel';
        // $this->showView = 'pagetemplates.sidebar-right';
        // $this->createView = 'easyadmin::admin.form';
        // $this->editView = 'easyadmin::admin.form';
        // $this->itemsCount = 10;
        // $this->resultsName = 'results';
    }

    public function show($locale, $slug)
    {
        try {
            $showPageData = $this->connectorService->getShowPageData($slug);
            $template = PageTemplate::find($showPageData->instance->template_id);
            if (!($showPageData instanceof ShowPageData)) {
                throw new Exception('getShowPageData() of connectorService must return an instance of ' . ShowPageData::class);
            }
            return $this->buildResponse('pagetemplates.'.$template->name, $showPageData->getData());
        } catch (\Throwable $e) {
            info($e);
            return $this->buildResponse($this->errorView, ['error' => $e->__toString()]);
        }
    }

    public function create()
    {
        $templates = PageTemplate::all();
        // dd($templates);
        return $this->buildResponse(
            'admin.webpages.create',
            [
                'templates' => $templates
            ]
        );
    }

    public function edit($id)
    {
        $templates = PageTemplate::all();
        $webPage = WebPage::find($id);
        return $this->buildResponse(
            'admin.webpages.edit',
            [
                'templates' => $templates,
                'webpageId' => $id,
                'templateId' => $webPage->template_id
            ]
        );
    }
}
