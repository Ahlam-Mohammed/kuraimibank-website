<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use SoftDeletes, HasTranslations;

    protected $guarded = [];

    public $translatable = ['name', 'desc', 'other_advantage', 'service_condition'];

    /**
     * Get sub Category
     */
    public function subCategory() : BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    /**
     * Get Category
     */
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
