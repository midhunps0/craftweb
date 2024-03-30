<?php

namespace App\Models;

use App\Traits\HasMetatags;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;
use Modules\Ynotz\MediaManager\Contracts\MediaOwner;
use Modules\Ynotz\MediaManager\Traits\OwnsMedia;

class Translation extends Model implements MediaOwner
{
    use HasFactory, OwnsMedia, HasMetatags;

    protected $guarded = [];

    protected $casts = [
        'data' => 'array'
    ];

    public function getMediaStorage(): array
    {
        return [
            'cover_image' => $this->storageLocation('public', 'articles')
        ];
    }

    public function Translatable(): MorphTo
    {
        return $this->morphTo();
    }


    public function coverImage(): Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return $this->getSingleMediaForEAForm('cover_image');
            }
        );
    }

    public function displayImage(): Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return Storage::url($this->getSingleMediaFilePath('cover_image'));
            }
        );
    }
}
