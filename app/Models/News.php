<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Modules\Ynotz\MediaManager\Contracts\MediaOwner;
use Modules\Ynotz\MediaManager\Traits\OwnsMedia;

class News extends Model implements MediaOwner
{
    use HasFactory, HasTranslations, OwnsMedia;

    protected $guarded = [];

    protected $appends = [
        'translations_array',
        'current_translation',
        'image',
        'image_url'
    ];

    public function getMediaStorage(): array
    {
        return [
            'image' => $this->storageLocation('public', 'news')
        ];
    }

    public function image(): Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return $this->getSingleMediaForEAForm('image');
            }
        );
    }

    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return Storage::url($this->getSingleMediaFilePath('image'));
            }
        );
    }
}
