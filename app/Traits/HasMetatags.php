<?php
namespace App\Traits;

use App\Models\MetatagsList;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Request;

trait HasMetatags {

    public function metatagsList()
    {
        return $this->hasOne(
            MetatagsList::class,
            'translation_id',
            'id'
        );
    }

    public function metaTitle():Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return $this->metatagsList->title ?? $this->title;
            }
        );
    }

    public function metaDescription():Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return $this->metatagsList->description ?? substr($this->body, 0 , 300);
            }
        );
    }

    public function metaOgTitle():Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return $this->metatagsList->og_title ?? $this->title;
            }
        );
    }

    public function metaOgDescription():Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return $this->metatagsList->og_description ?? substr($this->body, 0 , 300);
            }
        );
    }

    public function metaOgType():Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return $this->metatagsList->og_type ?? 'Article';
            }
        );
    }

    public function metaOgImage():Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return $this->cover_image;
            }
        );
    }

    public function metaOgUrl(): Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return Request::url();
            }
        );
    }
}
