<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    protected $fillable = ['title' , 'short_description'];
    public $timestamps = false;


    public function scopeFilter($q, $search)
    {
        return $q->where('title', 'like', '%' . $search . '%')
            ->orWhere('short_description', 'like', '%' . $search . '%');
    }

}
