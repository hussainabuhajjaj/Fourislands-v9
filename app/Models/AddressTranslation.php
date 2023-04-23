<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['city','address'];
}
