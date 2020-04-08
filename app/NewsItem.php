<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class NewsItem extends Model
{
    use HasTranslations;

    protected $guarded = ['id'];
    protected $translatable = ['name', 'body'];
}
