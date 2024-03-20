<?php

namespace App\Http\Controllers;

use App\Models\PageTemplate;
use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use Modules\Ynotz\EasyAdmin\Traits\HasMVConnector;
use Modules\Ynotz\SmartPages\Http\Controllers\SmartController;

class ReviewController extends SmartController
{
    use HasMVConnector;

    public function __construct(Request $request, ReviewService $service)
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
        $template = PageTemplate::where('template_file', config('app_settings.review_translation_component'))
            ->get()->first();
            // dd($template);
        return $this->buildResponse(
            'admin.reviews.create',
            [
                'templateId' => $template->id
            ]
        );
    }

    public function edit($id)
    {
        $review = Review::find($id);

        $template = PageTemplate::where('template_file', config('app_settings.review_translation_component'))
            ->get()->first();
        return $this->buildResponse(
            'admin.reviews.edit',
            [
                'review' => $review,
                'reviewId' => $review->id,
                'templateId' => $template->id
            ]
        );
    }
}
