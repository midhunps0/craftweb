<?php
namespace App\Traits;

use App\Models\Translation;

trait HasTranslatedPages {
    public function getTranslationBySlug(string $slug): Translation|null
    {
        return Translation::where('translatable_id', $this->id)
            ->Where('translatable_type', Self::class)
            ->where('slug', $slug)->get()->first();
    }
}
