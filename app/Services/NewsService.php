<?php
namespace App\Services;

use App\Models\News;
use App\Models\Translation;
use Exception;
use Illuminate\Support\Facades\DB;
use Modules\Ynotz\EasyAdmin\Services\FormHelper;
use Modules\Ynotz\EasyAdmin\Services\IndexTable;
use Modules\Ynotz\EasyAdmin\Traits\IsModelViewConnector;
use Modules\Ynotz\EasyAdmin\Contracts\ModelViewConnector;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\CreatePageData;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\EditPageData;
use Modules\Ynotz\EasyAdmin\Services\ColumnLayout;
use Modules\Ynotz\EasyAdmin\Services\RowLayout;

class NewsService implements ModelViewConnector {
    use IsModelViewConnector;
    private $indexTable;

    public function __construct()
    {
        $this->modelClass = News::class;
        $this->indexTable = new IndexTable();
        $this->selectionEnabled = false;

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
        $this->exportsEnabled = false;
        // $this->downloadFileName = 'results';
    }

    protected function relations()
    {
        return [];
        // // Example:
        // return [
        //     'author' => [
        //         'search_column' => 'id',
        //         'filter_column' => 'id',
        //         'sort_column' => 'id',
        //     ],
        //     'reviewScore' => [
        //         'search_column' => 'score',
        //         'filter_column' => 'id',
        //         'sort_column' => 'id',
        //     ],
        // ];
    }
    protected function getPageTitle(): string
    {
        return "News";
    }

    protected function getIndexHeaders(): array
    {
        return $this->indexTable->addHeaderColumn(
            title: 'Title',
            sort: ['key' => 'title'],
        )->addHeaderColumn(
            title: 'Actions'
        )->getHeaderRow();
    }

    protected function getIndexColumns(): array
    {
        return $this->indexTable->addColumn(
            fields: ['defaultTitle'],
        )->addActionColumn(
            editRoute: $this->getEditRoute(),
            deleteRoute: $this->getDestroyRoute(),
        )->getRow();
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
            title: 'Create News',
            form: FormHelper::makeForm(
                title: 'Create News',
                id: 'form_news_create',
                action_route: 'news.store',
                success_redirect_route: 'news.index',
                items: $this->getCreateFormElements(),
                layout: $this->buildCreateFormLayout(),
                label_position: 'top'
            )
        );
    }

    public function getEditPageData($id): EditPageData
    {
        return new EditPageData(
            title: 'Edit News',
            form: FormHelper::makeEditForm(
                title: 'Edit News',
                id: 'form_news_create',
                action_route: 'news.update',
                action_route_params: ['id' => $id],
                success_redirect_route: 'news.index',
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
        return [];
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
            'locale' => ['required', 'string'],
            'image' => ['required', 'string'],
            'data' => ['required', 'array'],
        ];
    }

    public function getUpdateValidationRules($id): array
    {
        return [
            'locale' => ['required', 'string'],
            'image' => ['required', 'string'],
            'data' => ['required', 'array'],
        ];
    }

    public function processBeforeStore(array $data): array
    {
        // // Example:
        // $data['user_id'] = auth()->user()->id;

        return $data;
    }

    public function processBeforeUpdate(array $data): array
    {
        // // Example:
        // $data['user_id'] = auth()->user()->id;

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

    public function store(array $data)
    {
        try {
            DB::beginTransaction();
            $n = News::create();
            $n->addMediaFromEAInput('cover_image', $data['image']);
            $translation = Translation::create(
                [
                    'translatable_id' => $n->id,
                    'translatable_type' => News::class,
                    'locale' => $data['locale'],
                    'data' => $data['data'],
                    'created_by' => auth()->user()->id,
                ]
            );

            DB::commit();
            return $n->refresh();
        } catch (\Throwable $e) {
            DB::rollBack();
            info($e->__toString());
            throw new Exception($e->__toString());
        }
    }

    public function update($id, array $data)
    {
        info('inside article update');
        try {
            DB::beginTransaction();
            info('data');
            info($data['data']);
            /**
             * @var News
             */
            $n = News::find($id);
            $n->syncMedia('image', $data['image']);
            /**
             * @var Translation
             */
            $translation = $n->getTranslation($data['locale']);
            if ($translation != null) {
                $translation->data = $data['data'];
                $translation->last_updated_by = auth()->user()->id;
                $translation->save();
            } else {
                /**
                 * @var Translation
                 */
                $translation = Translation::create(
                    [
                        'translatable_id' => $n->id,
                        'translatable_type' => News::class,
                        'locale' => $data['locale'],
                        'data' => $data['data'],
                        'created_by' => auth()->user()->id,
                    ]
                );
            }

            DB::commit();
            return $n->refresh();
        } catch (\Throwable $e) {
            DB::rollBack();
            info($e->__toString());
            throw new Exception($e->__toString());
        }
    }
}

?>
