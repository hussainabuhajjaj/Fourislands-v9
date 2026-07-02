<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'excerpt', 'content', 'meta_title', 'meta_description'];
}
