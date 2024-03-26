<?php
namespace App\Traits;

use App\Models\Translation;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasTranslatedPages {
    public function getTranslationBySlug(string $slug): Translation|null
    {
        return Translation::where('translatable_id', $this->id)
            ->Where('translatable_type', Self::class)
            ->where('slug', $slug)->get()->first();
    }
    public function defaultSlug(): Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return $this->getTranslation()->slug;
            }
        );
    }
}
