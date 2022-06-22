<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use SoftDeletes, HasTranslations;

    protected $guarded = [];

    public $translatable = ['name'];

//    /**
//     * Get branches
//     */
//    public function branches() : HasMany
//    {
//        return $this->hasMany(SubCategory::class);
//    }

    /**
     * Get services
     */
    public function services() : HasMany
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Get Branches
     */
    public function branches() : HasMany
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    /**
     * Get Parent
     */
    public function parent() : BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
