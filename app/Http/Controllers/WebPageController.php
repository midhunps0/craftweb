<?php

namespace App\Http\Controllers;

use App\Models\PageTemplate;
use App\Models\WebPage;
use App\Services\WebPageService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

    public function home()
    {
        App::setlocale('en');
        return $this->show('en','home');
    }

    public function quickShow($slug)
    {
        App::setlocale('en');
        return $this->show('en', $slug);
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
            return $this->buildResponse($this->errorView, [
                'error' => $e->__toString()
            ]);
        }
    }

    public function blog($locale = null)
    {
        $locale = $locale ?? 'en';
        App::setlocale($locale);
        $articles = $this->connectorService->getBlogData($locale);
        return $this->buildResponse(
            'frontend.blog',
            [
                'blog' => $articles
            ]
        );
    }

    public function doctors($slug = null)
    {
        $locale = isset($slug) ?? 'en';
        App::setLocale($locale);
        $doctors = $this->connectorService->getDoctorsData($locale);
        return $this->buildResponse(
            'frontend.doctors',
            [
                'doctors' => $doctors
            ]
        );
    }

    public function patientVideos($slug = null)
    {
        $locale = isset($slug) ?? 'en';
        App::setLocale($locale);
        $videos = $this->connectorService->getVideoTestomonialsData($locale);
        return $this->buildResponse(
            'frontend.patient-videos',
            [
                'videos' => $videos
            ]
        );
    }

    public function patientReviews($slug = null)
    {
        $locale = isset($slug) ?? 'en';
        App::setLocale($locale);
        $reviews = $this->connectorService->getReviewsData($locale);
        return $this->buildResponse(
            'frontend.patient-reviews',
            [
                'reviews' => $reviews
            ]
        );
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
