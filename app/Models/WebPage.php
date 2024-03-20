<?php

namespace App\Models;

use App\Traits\HasTranslatedPages;
use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebPage extends Model
{
    use HasFactory, HasTranslations, HasTranslatedPages;

    protected $guarded = [];

    protected $appends = [
        'translations_array',
        'current_translation'
    ];

    public function pageTemplate()
    {
        return $this->belongsTo(PageTemplate::class, 'template_id', 'id');
    }
}
