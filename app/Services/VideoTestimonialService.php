<?php
namespace App\Services;

use App\Models\Translation;
use App\Models\VideoTestimonial;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Ynotz\EasyAdmin\Services\FormHelper;
use Modules\Ynotz\EasyAdmin\Services\IndexTable;
use Modules\Ynotz\EasyAdmin\Traits\IsModelViewConnector;
use Modules\Ynotz\EasyAdmin\Contracts\ModelViewConnector;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\CreatePageData;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\EditPageData;
use Modules\Ynotz\EasyAdmin\Services\ColumnLayout;
use Modules\Ynotz\EasyAdmin\Services\RowLayout;

class VideoTestimonialService implements ModelViewConnector {
    use IsModelViewConnector;
    private $indexTable;

    public function __construct()
    {
        $this->modelClass = VideoTestimonial::class;
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
        return "Video Testimonials";
    }

    protected function getIndexHeaders(): array
    {
        return $this->indexTable->addHeaderColumn(
            title: 'Reviewer',
            // sort: ['key' => 'title'],
        )->addHeaderColumn(
            title: 'Story',
        )->addHeaderColumn(
            title: 'Actions'
        )->getHeaderRow();
    }

    protected function getIndexColumns(): array
    {
        return $this->indexTable->addColumn(
            fields: ['default_name'],
        )->addColumn(
            fields: ['summary'],
        )->addActionColumn(
            editRoute: $this->getEditRoute(),
            deleteRoute: $this->getDestroyRoute(),
        )->getRow();
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
            title: 'Create VideoTestimonial',
            form: FormHelper::makeForm(
                title: 'Create VideoTestimonial',
                id: 'form_videotestimonials_create',
                action_route: 'videotestimonials.store',
                success_redirect_route: 'videotestimonials.index',
                items: $this->getCreateFormElements(),
                layout: $this->buildCreateFormLayout(),
                label_position: 'top'
            )
        );
    }

    public function getEditPageData($id): EditPageData
    {
        return new EditPageData(
            title: 'Edit VideoTestimonial',
            form: FormHelper::makeEditForm(
                title: 'Edit VideoTestimonial',
                id: 'form_videotestimonials_create',
                action_route: 'videotestimonials.update',
                action_route_params: ['id' => $id],
                success_redirect_route: 'videotestimonials.index',
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

    public function authoriseIndex(): bool
    {
        return true;
    }

    public function authoriseShow($item): bool
    {
        return true;
    }

    public function authoriseCreate(): bool
    {
        return auth()->user()->hasPermissionTo('Video Testimonial: Create');
    }

    public function authoriseStore(): bool
    {
        return auth()->user()->hasPermissionTo('Video Testimonial: Create');
    }

    public function authoriseEdit($id): bool
    {
        return auth()->user()->hasPermissionTo('Video Testimonial: Edit');
    }

    public function authoriseUpdate($item): bool
    {
        return auth()->user()->hasPermissionTo('Video Testimonial: Edit');
    }

    public function authoriseDestroy($item): bool
    {
        return auth()->user()->hasPermissionTo('Video Testimonial: Delete');
    }

    public function getStoreValidationRules(): array
    {
        return [
            'locale' => ['required', 'string'],
            'data' => ['required', 'array'],
            'link' => ['required', 'string'],
            'display_priority' => ['sometimes', 'integer'],
        ];
    }

    public function getUpdateValidationRules($id): array
    {
        return [
            'locale' => ['required', 'string'],
            'data' => ['required', 'array'],
            'link' => ['required', 'string'],
            'display_priority' => ['sometimes', 'integer'],
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

    public function processAfterDelee($id)
    {
        $rids = VideoTestimonial::orderBy('id', 'desc')->limit(6)->get()->pluck('id')->toArray();
        foreach ($rids as $r) {
            if ($id > $r) {
                Cache::forget('home_page');
                Cache::forget('home_page_ar');
                break;
            }
        }
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
            $testimonial = VideoTestimonial::create(
                [
                    'link' => $data['link'],
                    'display_priority' => $data['display_priority'],
                ]
            );
            $translation = Translation::create(
                [
                    'translatable_id' => $testimonial->id,
                    'translatable_type' => VideoTestimonial::class,
                    'locale' => $data['locale'],
                    'data' => $data['data'],
                    'created_by' => auth()->user()->id,
                ]
            );

            DB::commit();
            $testimonial->refresh();
            $aids = VideoTestimonial::orderBy('id', 'desc')->limit(6)->get()->pluck('id')->toArray();
            if (in_array($testimonial->id, $aids)) {
                Cache::forget('home_page');
                Cache::forget('home_page_ar');
            }

            Artisan::call('cache:clear');

            return $testimonial;
        } catch (\Throwable $e) {
            DB::rollBack();
            info($e->__toString());
            throw new Exception($e->__toString());
        }
    }

    public function update($id, array $data)
    {
        try {
            DB::beginTransaction();
            info('data --');
            info($data['data']);
            /**
             * @var VideoTestimonial
             */
            $testimonial = VideoTestimonial::find($id);
            $testimonial->link = $data['link'];
            $testimonial->display_priority = $data['display_priority'];
            $testimonial->save();
            /**
             * @var Translation
             */
            $translation = $testimonial->getTranslation($data['locale']);
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
                        'translatable_id' => $testimonial->id,
                        'translatable_type' => VideoTestimonial::class,
                        'locale' => $data['locale'],
                        'data' => $data['data'],
                        'created_by' => auth()->user()->id,
                    ]
                );
            }

            DB::commit();
            $testimonial->refresh();
            $aids = VideoTestimonial::orderBy('id', 'desc')->limit(6)->get()->pluck('id')->toArray();
            if (in_array($testimonial->id, $aids)) {
                Cache::forget('home_page');
                Cache::forget('home_page_ar');
            }

            Artisan::call('cache:clear');

            return $testimonial;
        } catch (\Throwable $e) {
            DB::rollBack();
            info($e->__toString());
            throw new Exception($e->__toString());
        }
    }
}

?>
