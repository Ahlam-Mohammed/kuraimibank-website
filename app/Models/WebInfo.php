<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class WebInfo extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

//    public $table = 'web_infos';
    protected $guarded = [];

    public array $translatable = ['value'];
}
