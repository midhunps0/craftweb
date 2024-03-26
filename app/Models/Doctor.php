<?php

namespace App\Models;

use App\Traits\HasTranslatedPages;
use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Modules\Ynotz\MediaManager\Contracts\MediaOwner;
use Modules\Ynotz\MediaManager\Traits\OwnsMedia;

class Doctor extends Model implements MediaOwner
{
    use HasFactory, HasTranslations, HasTranslatedPages, OwnsMedia;

    protected $guarded = [];

    protected $appends = [
        'translations_array',
        'current_translation',
        'photo_url'
    ];

    public function defaultName(): Attribute
    {
        return Attribute::make(
            get: function() {
                return ($this->translations()->where('locale', App::getLocale())->get()->first()->data)['name'] ?? '';
            }
        );
    }

    public function defaultDepartment(): Attribute
    {
        return Attribute::make(
            get: function() {
                return ($this->translations()->where('locale', App::getLocale())->get()->first()->data)['department'] ?? '';
            }
        );
    }

    public function defaultDesignation(): Attribute
    {
        return Attribute::make(
            get: function() {
                return ($this->translations()->where('locale', App::getLocale())->get()->first()->data)['designation'] ?? '';
            }
        );
    }

    public function getMediaStorage(): array
    {
        return [
            'photo' => $this->storageLocation('public', 'doctors')
        ];
    }

    public function photo(): Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return $this->getSingleMediaForEAForm('photo');
            }
        );
    }

    public function photoUrl(): Attribute
    {
        return Attribute::make(
            get: function ($v) {
                return asset($this->getSingleMediaFilePath('photo'));
            }
        );
    }
}
