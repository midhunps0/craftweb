<?php
namespace App\Traits;

use App\Models\Translation;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\App;

trait HasTranslations {
    public function translations(): MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    public function defaultTranslation(): MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable')
            ->where('locale', 'en');
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
        $t = Translation::where('translatable_id', $this->id)
            ->Where('translatable_type', Self::class)
            ->where('locale', $code ?? App::currentLocale())->get()->first() ?? Translation::where('translatable_id', $this->id)
            ->Where('translatable_type', Self::class)
            ->where('locale', $code ?? 'en')->get()->first();
        if ($t == null) {
            return $t;
        }
        if (is_string($t->data)) {
            $t->data = json_decode($t->data, true);
        }
        return $t;
    }

    public function currentTranslation(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->getTranslation();
                // if (is_string($t->data)) {
                //     $t->data = json_decode($t->data, true);
                // }
                // return $t;
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
                    if(count($ar[$c]) == 0) {
                        $ar[$c] = ($this->getTranslation(config('app_settings.default_locale')))->data;
                    }
                }
                return $ar;
            }
        );
    }

    public function translationsSlugs(): Attribute
    {
        return Attribute::make(
            get: function ($v) {
                $ar = [];
                foreach (config('app_settings.enabled_locales') as $c => $l) {
                    $t = $this->getTranslation($c);
                    $ar[$c] = $t != null ? ($t->slug ?? '#') : $this->getTranslation(config('app_settings.default_locale'))->slug;
                }
                return $ar;
            }
        );
    }



}
