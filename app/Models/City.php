<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use SoftDeletes, HasTranslations;

    protected $guarded = [];

    public $translatable = ['name'];

    /**
     * Get country
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get service points
     */
    public function points(): HasMany
    {
        return $this->hasMany(ServicePoint::class);
    }

}
