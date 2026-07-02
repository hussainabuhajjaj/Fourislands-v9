<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Faq extends Model
{
    use Translatable;

    const FILLABLE = ['ordering'];
    public $translatedAttributes = ['question', 'answer'];
    public $translationModel = FaqTranslation::class;

    protected $fillable = self::FILLABLE;

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
}
