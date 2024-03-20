<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Review extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    protected $appends = [
        'translations_array',
        'current_translation',
    ];

    public function defaultName(): Attribute
    {
        return Attribute::make(
            get: function() {
                return ($this->translations()->where('locale', App::getLocale())->get()->first()->data)['reviewer'] ?? '';
            }
        );
    }
}
