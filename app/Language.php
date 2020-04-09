<?php

namespace App;

use App\Pair;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = ['id'];

    public function pairs()
    {
    	return $this->hasMany(Pair::class);
    }
}
