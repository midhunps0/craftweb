<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\PageTemplate;
use App\Services\DoctorService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\ShowPageData;
use Modules\Ynotz\EasyAdmin\Traits\HasMVConnector;
use Modules\Ynotz\SmartPages\Http\Controllers\SmartController;

class DoctorController extends SmartController
{
    use HasMVConnector;

    public function __construct(Request $request, DoctorService $service)
    {
        parent::__construct($request);
        $this->connectorService = $service;
        // $this->itemName = null;
        // $this->unauthorisedView = 'easyadmin::admin.unauthorised';
        // $this->errorView = 'easyadmin::admin.error';
        // $this->indexView = 'easyadmin::admin.indexpanel';
        $this->showView = 'pagetemplates.doctor';
        // $this->createView = 'easyadmin::admin.form';
        // $this->editView = 'easyadmin::admin.form';
        // $this->itemsCount = 10;
        // $this->resultsName = 'results';
    }

    public function show($locale, $slug)
    {
        $tl = $locale == 'en' ? 'ar' : 'en';
        session(['translation_link' => route('doctors.guest.show', ['locale' => $tl, 'slug' => $slug])]);
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

    public function redirect($slug)
    {
        info('inside doctor redirect show');
        App::setlocale('en');
        $newSlug = config("oldslug_redirect.$slug");
        if (!isset($newSlug)) {
            return $this->buildResponse('errors.404');
        }
        return redirect($newSlug,301);
    }

    public function create()
    {
        $template = PageTemplate::where('template_file', config('app_settings.doctor_translation_component'))
            ->get()->first();
            // dd($template);
        return $this->buildResponse(
            'admin.doctors.create',
            [
                'templateId' => $template->id
            ]
        );
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);
        $template = PageTemplate::where('template_file', config('app_settings.doctor_translation_component'))
            ->get()->first();
        return $this->buildResponse(
            'admin.doctors.edit',
            [
                'doctor' => $doctor,
                'doctorId' => $doctor->id,
                'templateId' => $template->id
            ]
        );
    }
}
