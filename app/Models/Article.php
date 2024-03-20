<?php

namespace App\Models;

use App\Traits\HasTranslatedPages;
use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, HasTranslations, HasTranslatedPages;

    protected $appends = [
        'translations_array',
        'current_translation'
    ];
}
