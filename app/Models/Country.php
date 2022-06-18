<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use SoftDeletes, HasTranslations;

    protected $guarded = [];

    public $translatable = ['name'];

    /**
     * Get cities
     */
    public function cities() : HasMany
    {
        return $this->hasMany(City::class);
    }
}
