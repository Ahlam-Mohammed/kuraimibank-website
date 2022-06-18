<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ServicePoint extends Model
{
    use SoftDeletes, HasTranslations;

    protected $guarded = [];

    public $translatable = ['name', 'address', 'working_hours'];

    /**
     * Get City
     */
    public function city() : BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
