<?php
namespace App\Traits;

use App\Models\Translation;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

trait HasTranslations {
    public function translations(): MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    public function defaultTitle(): Attribute
    {
        return Attribute::make(
            get: function() {
                return ($this->translations()->where('locale', App::getLocale())->get()->first()->data)['title'] ?? '';
            }
        );
    }

    public function getTranslation(string $code = null): Translation|null
    {
        return Translation::where('translatable_id', $this->id)
            ->Where('translatable_type', Self::class)
            ->where('locale', $code ?? App::currentLocale())->get()->first() ?? Translation::where('translatable_id', $this->id)
            ->Where('translatable_type', Self::class)
            ->where('locale', $code ?? 'en')->get()->first();
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

}
