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
        $this->showView = 'pagetemplates.webpage';
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

    public function homeAr()
    {
        App::setlocale('ar');
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

    public function news($locale = null)
    {
        $locale = $locale ?? 'en';
        App::setlocale($locale);
        $news = $this->connectorService->getNewsData($locale);
        return $this->buildResponse(
            'frontend.news',
            [
                'news' => $news
            ]
        );
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

    public function doctors($locale = null)
    {
        $locale = $locale = $locale ?? 'en';
        App::setlocale($locale);
        $doctors = $this->connectorService->getDoctorsData($locale);
        return $this->buildResponse(
            'frontend.doctors',
            [
                'doctors' => $doctors
            ]
        );
    }

    public function patientVideos($locale = null)
    {
        $locale = $locale = $locale ?? 'en';
        App::setlocale($locale);
        $videos = $this->connectorService->getVideoTestomonialsData($locale);
        return $this->buildResponse(
            'frontend.patient-videos',
            [
                'videos' => $videos
            ]
        );
    }

    public function patientReviews($locale = null)
    {
        $locale = $locale = $locale ?? 'en';
        App::setlocale($locale);
        $reviews = $this->connectorService->getReviewsData($locale);
        return $this->buildResponse(
            'frontend.patient-reviews',
            [
                'reviews' => $reviews
            ]
        );
    }

    public function contact()
    {
        App::setlocale('en');
        return $this->show('en','contact-us');
    }

    public function contactAr()
    {
        App::setlocale('ar');
        return $this->show('ar','contact-us');
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

    public function homeReviews($locale)
    {
        $data = $this->connectorService->getHomeReviews($locale);
        return response()->json([
            $data
        ]);
    }

    public function homeFeatures($locale)
    {
        $data = $this->connectorService->getHomwFeatures($locale);
        return response()->json([
            $data
        ]);
    }

    public function homeDoctors($locale)
    {
        $data = $this->connectorService->getHomeDoctors($locale);
        return response()->json([
            $data
        ]);
    }

    public function homeNews($locale)
    {
        $data = $this->connectorService->getHomeNews($locale);
        return response()->json([
            $data
        ]);
    }

    public function homeArticles($locale)
    {
        $data = $this->connectorService->getHomeArticles($locale);
        return response()->json([
            $data
        ]);
    }
}
