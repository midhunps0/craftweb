<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class VideoTestimonial extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    protected $appends = [
        'translations_array',
        'current_translation',
        'thumbnail_url'
    ];

    public function defaultName(): Attribute
    {
        return Attribute::make(
            get: function() {
                return ($this->translations()->where('locale', App::getLocale())->get()->first()->data)['reviewer'] ?? '';
            }
        );
    }

    public function summary(): Attribute
    {
        return Attribute::make(
            get: function() {
                $story = ($this->translations()->where('locale', App::getLocale())->get()->first()->data)['story'];
                return ($story != null ? Str::substr($story, 0, 100) : '');
            }
        );
    }

    public function thumbnailUrl(): Attribute
    {
        return Attribute::make(
            get: function() {
                $id = explode('embed/', $this->link)[1];
                $id = explode('?si=', $id)[0];
                return "https://img.youtube.com/vi/{$id}/hqdefault.jpg";
            }
        );
    }
}
