<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Service extends Model
{
    use Translatable;

    const FILLABLE = ['image', 'large_image', 'is_home', 'icon', 'short_description', 'features'];
    public $translatedAttributes = ['title', 'description'];
    public $translationModel = ServiceTranslation::class;

    protected $fillable = self::FILLABLE;

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'is_home' => 'boolean',
        ];
    }

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

    public function scopeIsHome($q)
    {
        return $q->where('is_home', 1);
    }
}
