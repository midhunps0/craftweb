<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\App;
use Modules\Ynotz\MediaManager\Contracts\MediaOwner;
use Modules\Ynotz\MediaManager\Services\MediaHelper;
use Modules\Ynotz\MediaManager\Traits\OwnsMedia;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class WebPage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'translations_array',
        'current_translation'
    ];

    // public function getMediaStorage(): array
    // {
    //     return [
    //         'cover_image' => $this->storageLocation('public', 'cover_image')
    //     ];
    // }

    public function pageTemplate()
    {
        return $this->belongsTo(PageTemplate::class, 'template_id', 'id');
    }

    public function translations(): MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    public function defaultTitle(): Attribute
    {
        return Attribute::make(
            get: function() {
                return ($this->translations()->where('locale', App::getLocale())->get()->first()->data)['title'];
            }
        );
    }

    public function getTranslation(string $code = null): Translation|null
    {
        return Translation::where('translatable_id', $this->id)
            ->Where('translatable_type', Self::class)
            ->where('locale', $code ?? App::currentLocale())->get()->first();
    }

    public function currentTranslation(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->getTranslation();
            }
        );
    }

    public function translationsArray(): Attribute
    {
        return Attribute::make(
            get: function ($v) {
                $ar = [];
                foreach (config('app_settings.enabled_locales') as $c => $l) {
                    $t = $this->getTranslation($c);
                    $ar[$c] = $t != null ? $t->data : [];
                }
                return $ar;
            }
        );
    }
    // Search text in one or more fields
    // public function scopeHasText($query, string $text, array $fields, string $locale): void
    // {
    //     $query->whereHas('translations', function ($q) {
    //         $q->jsonContains('')
    //     })
    // }
}
