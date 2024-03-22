<?php
namespace App\Services;

use App\Models\PageTemplate;
use App\Models\User;
use Modules\Ynotz\EasyAdmin\Services\FormHelper;
use Modules\Ynotz\EasyAdmin\Services\IndexTable;
use Modules\Ynotz\EasyAdmin\Traits\IsModelViewConnector;
use Modules\Ynotz\EasyAdmin\Contracts\ModelViewConnector;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\CreatePageData;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\EditPageData;
use Modules\Ynotz\EasyAdmin\Services\ColumnLayout;
use Modules\Ynotz\EasyAdmin\Services\RowLayout;

class PageTemplateService implements ModelViewConnector {
    use IsModelViewConnector;
    private $indexTable;

    public function __construct()
    {
        $this->modelClass = PageTemplate::class;
        $this->indexTable = new IndexTable();
        $this->selectionEnabled = false;
        $this->exportsEnabled = false;

        // $this->idKey = 'id';
        // $this->selects = '*';
        // $this->selIdsKey = 'id';
        // $this->searchesMap = [];
        // $this->sortsMap = [];
        // $this->filtersMap = [
        //     'author' => 'user_id' // Example
        // ];
        // $this->orderBy = ['created_at', 'desc'];
        // $this->sqlOnlyFullGroupBy = true;
        // $this->defaultSearchColumn = 'name';
        // $this->defaultSearchMode = 'startswith';
        // $this->relations = [];
        // $this->selectionEnabled = false;
        // $this->downloadFileName = 'results';
    }

    protected function relations()
    {
        // return [];
        // // Example:
        return [
            'author' => [
                'search_column' => 'id',
                'filter_column' => 'id',
                'sort_column' => 'id',
            ],
        ];
    }
    protected function getPageTitle(): string
    {
        return "Page Templates";
    }

    protected function getIndexHeaders(): array
    {
        return $this->indexTable->addHeaderColumn(
            title: 'Template Name',
            // sort: ['key' => 'name'],
        )->addHeaderColumn(
            title: 'Template File',
        )->addHeaderColumn(
            title: 'Author',
            filter: ['key' => 'author', 'options' => User::all()->pluck('name', 'id')]
        )->addHeaderColumn(
            title: 'Actions'
        )->getHeaderRow();
    }

    protected function getIndexColumns(): array
    {
        return $this->indexTable->addColumn(
            fields: ['name'],
        )->addColumn(
            fields: ['template_file'],
        )->addColumn(
            fields: ['name'],
            relation: 'author',
        )->addActionColumn(
            editRoute: $this->getEditRoute(),
            deleteRoute: $this->getDestroyRoute(),
        )->getRow();
        // // Example:
        // return $this->indexTable->addColumn(
        //     fields: ['title'],
        // )->addColumn(
        //     fields: ['name'],
        //     relation: 'author',
        // )->addColumn(
        //     fields: ['score'],
        //     relation: 'reviewScore',
        // )
        // ->addActionColumn(
        //     editRoute: $this->getEditRoute(),
        //     deleteRoute: $this->getDestroyRoute(),
        // )->getRow();
    }

    public function getAdvanceSearchFields(): array
    {
        return [];
        // // Example:
        // return $this->indexTable->addSearchField(
        //     key: 'title',
        //     displayText: 'Title',
        //     valueType: 'string',
        // )
        // ->addSearchField(
        //     key: 'author',
        //     displayText: 'Author',
        //     valueType: 'list_string',
        //     options: User::all()->pluck('name', 'id')->toArray(),
        //     optionsType: 'key_value'
        // )
        // ->addSearchField(
        //     key: 'reviewScore',
        //     displayText: 'Review Score',
        //     valueType: 'numeric',
        // )
        // ->getAdvSearchFields();
    }

    public function getDownloadCols(): array
    {
        return [];
        // // Example
        // return [
        //     'title',
        //     'author.name'
        // ];
    }

    public function getDownloadColTitles(): array
    {
        return [
            'title' => 'Title',
            'author.name' => 'Author'
        ];
    }

    public function getCreatePageData(): CreatePageData
    {
        return new CreatePageData(
            title: 'Page Templates',
            form: FormHelper::makeForm(
                title: 'Create Page Template',
                id: 'form_pagetemplates_create',
                action_route: 'pagetemplates.store',
                success_redirect_route: 'pagetemplates.index',
                items: $this->getCreateFormElements(),
                // layout: $this->buildCreateFormLayout(),
                label_position: 'top'
            )
        );
    }

    public function getEditPageData($id): EditPageData
    {
        return new EditPageData(
            title: 'Edit PageTemplate',
            form: FormHelper::makeEditForm(
                title: 'Edit PageTemplate',
                id: 'form_pagetemplates_create',
                action_route: 'pagetemplates.update',
                action_route_params: ['id' => $id],
                success_redirect_route: 'pagetemplates.index',
                items: $this->getEditFormElements(),
                label_position: 'top'
            ),
            instance: $this->getQuery()->where('id', $id)->get()->first()
        );
    }

    /*
    public function getShowPageData($id): ShowPageData
    {
        return new ShowPageData(
            Str::ucfirst($this->getModelShortName()),
            $this->getQuery()->where($this->key, $id)->get()->first()
        );
    }
    */

    private function formElements(): array
    {
        return [
            'title' => FormHelper::makeInput(
                inputType: 'text',
                key: 'name',
                label: 'Name',
                properties: ['required' => true],
            ),
            'template_file' => FormHelper::makeInput(
                inputType: 'text',
                key: 'template_file',
                label: 'Template Blade File',
                properties: ['required' => true],
            ),
            'fields' => FormHelper::makeTextarea(
                key: 'fields',
                label: 'Fields data as JSON',
                properties: ['required' => true]
            ),
        ];
        // // Example:
        // return [
        //     'title' => FormHelper::makeInput(
        //         inputType: 'text',
        //         key: 'title',
        //         label: 'Title',
        //         properties: ['required' => true],
        //     ),
        //     'description' => FormHelper::makeTextarea(
        //         key: 'description',
        //         label: 'Description'
        //     ),
        // ];
    }

    private function getQuery()
    {
        return $this->modelClass::query();
        // // Example:
        // return $this->modelClass::query()->with([
        //     'author' => function ($query) {
        //         $query->select('id', 'name');
        //     }
        // ]);
    }

    public function getStoreValidationRules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:page_templates,name'],
            'template_file' => ['required', 'string'],
            'fields' => ['required', 'string'],
        ];
    }

    public function getUpdateValidationRules($id): array
    {
        return [
            'name' => ['required', 'string'],
            'template_file' => ['required', 'string'],
            'fields' => ['required', 'string'],
        ];
    }

    public function processBeforeStore(array $data): array
    {
        $data['created_by'] = auth()->user()->id;
        return $data;
    }

    public function processBeforeUpdate(array $data): array
    {
        $data['created_by'] = auth()->user()->id;
        return $data;
    }

    public function processAfterStore($instance): void
    {
        //Do something with the created $instance
    }

    public function processAfterUpdate($oldInstance, $instance): void
    {
        //Do something with the updated $instance
    }

    public function buildCreateFormLayout(): array
    {
        return (new ColumnLayout())->getLayout();
        // // Example
        //  $layout = (new ColumnLayout())
        //     ->addElements([
        //             (new RowLayout())
        //                 ->addElements([
        //                     (new ColumnLayout(width: '1/2'))->addInputSlot('title'),
        //                     (new ColumnLayout(width: '1/2'))->addInputSlot('description'),
        //                 ])
        //         ]
        //     );
        // return $layout->getLayout();
    }
}

?>
