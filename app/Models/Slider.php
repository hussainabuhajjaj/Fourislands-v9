<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Slider extends Model
{
    use Translatable;

    const FILLABLE = [
       'image'
    ];

    public $translatedAttributes = [ 'title' , 'short_description' ];
    public $translationModel = SliderTranslation::class;

    protected $fillable = self::FILLABLE;

    protected $with = ['imageObject' , 'translations'];

    public function createTranslation(Request $request)
    {
        foreach (locales() as $key => $language) {
            foreach ($this->translatedAttributes as $attribute) {
                if ($request->get($attribute . '_' . $key) != null && !empty($request->$attribute . $key)) {
                    $this->{$attribute . ':' . $key} = $request->get($attribute . '_' . $key);
                }
            }
            $this->save();
        }
        return $this;
    }

    public function imageObject()
    {
        return $this->belongsTo(Image::class,'image','id')->withDefault();
    }



    public function scopeFilter($q, $search)
    {
        return $q->whereHas('product', function ($q) use ($search) {
            $q->filter($search);
        })->orWhereHas('translation', function ($q) use ($search) {
            $q->filter($search);
        });
    }

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::parse($created_at)->format('Y-m-d g:i a');
    }
}
