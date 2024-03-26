<?php
namespace App\Services;

use App\Models\Doctor;
use App\Models\HilightFeature;
use App\Models\MetatagsList;
use App\Models\PageTemplate;
use App\Models\Review;
use App\Models\Translation;
use App\Models\WebPage;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Modules\Ynotz\EasyAdmin\Services\FormHelper;
use Modules\Ynotz\EasyAdmin\Services\IndexTable;
use Modules\Ynotz\EasyAdmin\Traits\IsModelViewConnector;
use Modules\Ynotz\EasyAdmin\Contracts\ModelViewConnector;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\CreatePageData;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\EditPageData;
use Modules\Ynotz\EasyAdmin\Services\ColumnLayout;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\ShowPageData;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class WebPageService implements ModelViewConnector {
    use IsModelViewConnector;
    private $indexTable;

    public function __construct()
    {
        $this->modelClass = WebPage::class;
        $this->indexTable = new IndexTable();
        // $this->selectionEnabled = true;

        $this->idKey = 'slug';
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
        $this->selectionEnabled = false;
        $this->exportsEnabled = false;
        // $this->downloadFileName = 'results';
    }

    public function getShowPageData($slug): ShowPageData
    {

        $item = WebPage::with(['translations'])
            ->wherehas('translations', function ($q) use ($slug) {
                $q->where('locale', App::currentLocale())
                ->where('slug', $slug);
            })
            ->get()->first();
        if($item == null && App::currentLocale() != config('app_settings.default_locale')) {
            $item = WebPage::with(['translations'])
            ->wherehas('translations', function ($q) use ($slug) {
                $q->where('locale', config('app_settings.default_locale'))
                ->where('slug', $slug);
            })
            ->get()->first();
        }
        if($item == null) {
            throw new ResourceNotFoundException("Couldn't find the page you are looking for.");
        }

        $thedata = [];
        if ($slug == 'home') {
            $hfeatures = HilightFeature::all();
            foreach ($hfeatures as $f) {
                $thedata['hfeatures'][$f->display_location] = $f;
            }
            $thedata['reviews'] = Review::orderBy('id', 'desc')->limit(12)->get();
            $thedata['videos'] = Review::orderBy('id', 'desc')->limit(6)->get();
            $thedata['doctors'] = Doctor::orderBy('id', 'desc')->limit(6)->get();
            // dd($thedata['doctors']);
        }

        return new ShowPageData(
            title: Str::ucfirst($this->getModelShortName()),
            instance: $item,
            data: $thedata
        );
    }

    public function getFileFields(): array
    {
        return ['cover_image'];
    }

    protected function relations()
    {
        return [
            'pageTemplate' => [
                'search_column' => 'id',
                'filter_column' => 'id',
                'sort_column' => 'id',
            ],
            'translations' => [],
        ];
    }
    protected function getPageTitle(): string
    {
        return "Web Pages";
    }

    protected function getIndexHeaders(): array
    {
        return $this->indexTable->addHeaderColumn(
            title: 'Title',
            // sort: ['key' => 'title'],
        )
        ->addHeaderColumn(
            title: 'Slug',
        )
        ->addHeaderColumn(
            title: 'Page Template',
            filter: ['key' => 'pageTemplate', 'options' => PageTemplate::all()->pluck('name', 'id')]
        )
        ->addHeaderColumn(
            title: 'Actions'
        )->getHeaderRow();
    }

    protected function getIndexColumns(): array
    {
        return $this->indexTable->addColumn(
            fields: ['defaultTitle'],
        )
        ->addColumn(
            fields: ['default_slug'],
        )
        ->addColumn(
            fields: ['template_file'],
            relation: 'pageTemplate'
        )
        ->addActionColumn(
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
            title: 'Create WebPage',
            form: FormHelper::makeForm(
                title: 'Create WebPage',
                id: 'form_webpages_create',
                action_route: 'webpages.store',
                success_redirect_route: 'webpages.index',
                items: $this->getCreateFormElements(),
                layout: $this->buildCreateFormLayout(),
                label_position: 'top'
            )
        );
    }

    public function getEditPageData($id): EditPageData
    {
        return new EditPageData(
            title: 'Edit WebPage',
            form: FormHelper::makeEditForm(
                title: 'Edit WebPage',
                id: 'form_webpages_create',
                action_route: 'webpages.update',
                action_route_params: ['id' => $id],
                success_redirect_route: 'webpages.index',
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
        return auth()->user()->hasPermissionTo('Web Page: Create');
    }

    public function authoriseStore(): bool
    {
        return auth()->user()->hasPermissionTo('Web Page: Create');
    }

    public function authoriseEdit($id): bool
    {
        return auth()->user()->hasPermissionTo('Web Page: Edit');
    }

    public function authoriseUpdate($item): bool
    {
        return auth()->user()->hasPermissionTo('Web Page: Edit');
    }

    public function authoriseDestroy($item): bool
    {
        return auth()->user()->hasPermissionTo('Web Page: Delete');
    }

    public function getStoreValidationRules(): array
    {
        return [
            'template' => ['required', 'string'],
            'locale' => ['required', 'string'],
            'slug' => [
                'required',
                Rule::unique('translations', 'slug')
                ->where(fn ($query) => $query->where('translatable_type', WebPage::class))
                ->where('locale', App::currentLocale())
            ],
            'data' => ['required', 'array'],
        ];
    }

    public function getUpdateValidationRules($id): array
    {
        return [
            'template' => ['required', 'string'],
            'locale' => ['required', 'string'],
            'slug' => [
                'required',
                Rule::unique('translations', 'slug')
                ->where(static function ($query) use ($id) {
                        return $query->where('translatable_type', WebPage::class)
                        ->where('locale', App::currentLocale())
                        ->whereNotIn('translatable_id', [$id]);
                    }
                )
            ],
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
            $wp = WebPage::create([
                    'template_id' => $data['template']
                ]
            );
            $coverImage = $data['data']['cover_image'] ?? null;
            if ($coverImage) {
                unset($data['data']['cover_image']);
            }

            $translation = Translation::create(
                [
                    'translatable_id' => $wp->id,
                    'translatable_type' => WebPage::class,
                    'locale' => $data['locale'],
                    'slug' => $data['slug'],
                    'data' => $data['data'],
                    'created_by' => auth()->user()->id,
                ]
            );
            if ($coverImage) {
                $translation->addMediaFromEAInput('cover_image', $coverImage);
            }

            MetatagsList::create([
                'translation_id' => $translation->id,
                'title' => $data['data']['metatags']['title'],
                'description' => $data['data']['metatags']['description'],
                'og_title' => $data['data']['metatags']['title'],
                'og_description' => $data['data']['metatags']['description'],
                'og_type' => $data['data']['metatags']['og_type'],
            ]);

            DB::commit();
            return $wp->refresh();
        } catch (\Throwable $e) {
            DB::rollBack();
            info($e->__toString());
            throw new Exception($e->__toString());
        }
    }

    public function update($id, array $data)
    {
        info('inside update');
        try {
            DB::beginTransaction();
            info('data');
            info($data['data']);
            $coverImage = $data['data']['cover_image'] ?? null;
            if ($coverImage) {
                unset($data['data']['cover_image']);
            }
            /**
             * @var WebPage
             */
            $wp = WebPage::find($id);
            /**
             * @var Translation
             */
            $translation = $wp->getTranslation($data['locale']);
            if ($translation != null) {
                $translation->data = $data['data'];
                $translation->slug = $data['slug'];
                $translation->last_updated_by = auth()->user()->id;
                $translation->save();
            } else {
                /**
                 * @var Translation
                 */
                $translation = Translation::create(
                    [
                        'translatable_id' => $wp->id,
                        'translatable_type' => WebPage::class,
                        'locale' => $data['locale'],
                        'slug' => $data['slug'],
                        'data' => $data['data'],
                        'created_by' => auth()->user()->id,
                    ]
                );
            }

            MetatagsList::where('translation_id', $translation->id)
                ->updateOrCreate(
                    ['translation_id' => $translation->id],
                    [
                        'title' => $data['data']['metatags']['title'],
                        'description' => $data['data']['metatags']['description'],
                        'og_title' => $data['data']['metatags']['title'],
                        'og_description' => $data['data']['metatags']['description'],
                        'og_type' => $data['data']['metatags']['og_type'],
                ]);

            if ($coverImage) {
                $translation->syncMedia('cover_image', $coverImage);
            }


            DB::commit();
            return $wp->refresh();
        } catch (\Throwable $e) {
            DB::rollBack();
            info($e->__toString());
            throw new Exception($e->__toString());
        }
    }
}

?>
