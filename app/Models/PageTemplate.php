<?php

namespace App\Models;

use App\Services\PageTemplateService;
use App\TemplateHelpers\TemplatehelperInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PageTemplate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
