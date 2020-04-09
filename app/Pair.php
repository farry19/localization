<?php

namespace App;

use App\Language;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    protected $guarded = ['id'];

    public function language()
    {
    	return $this->belongsToOne(Language::class);
    }
}
