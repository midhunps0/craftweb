<?php

namespace App\Http\Controllers;

use App\Models\PageTemplate;
use App\Models\WebPage;
use App\Services\PageTemplateService;
use Illuminate\Http\Request;
use Modules\Ynotz\EasyAdmin\Traits\HasMVConnector;
use Modules\Ynotz\SmartPages\Http\Controllers\SmartController;

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
        $template = PageTemplate::find($request->template_id);
        $data['templateId'] = $template->id;

        switch($request->form_type) {
            case 'create':
                $viewFile = 'utils.translation-create';
                break;
            case 'edit':
                $data['webpage'] = WebPage::find($request->webpage_id);;
                $viewFile = 'utils.translation-edit';
                // $viewFile = config('app_settings.form_templates_folder').'.'.
                // $template->template_file.'.edit';
                break;
        }

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
