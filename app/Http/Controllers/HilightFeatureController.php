<?php

namespace App\Http\Controllers;

use App\Models\HilightFeature;
use App\Models\PageTemplate;
use App\Services\HilightFeatureService;
use Illuminate\Http\Request;
use Modules\Ynotz\EasyAdmin\Traits\HasMVConnector;
use Modules\Ynotz\SmartPages\Http\Controllers\SmartController;

class HilightFeatureController extends SmartController
{
    use HasMVConnector;

    public function __construct(Request $request, HilightFeatureService $service)
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
        $template = PageTemplate::where('template_file', config('app_settings.hfeature_translation_component'))
            ->get()->first();
            // dd($template);
        return $this->buildResponse(
            'admin.hfeature.create',
            [
                'templateId' => $template->id
            ]
        );
    }

    public function edit($id)
    {
        $hfeature = HilightFeature::find($id);
        $template = PageTemplate::where('template_file', config('app_settings.hfeature_translation_component'))
            ->get()->first();
        return $this->buildResponse(
            'admin.hfeature.edit',
            [
                'hfeature' => $hfeature,
                'hfeatureId' => $hfeature->id,
                'templateId' => $template->id
            ]
        );
    }
}
