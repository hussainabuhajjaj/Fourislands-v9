<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    use Translatable;

    const FILLABLE = ['slug', 'ordering', 'is_active'];
    public $translatedAttributes = ['name'];
    public $translationModel = CategoryTranslation::class;

    protected $fillable = self::FILLABLE;

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'ordering' => 'integer',
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function publishedPosts()
    {
        return $this->hasMany(Post::class)->where('is_published', true)->whereNotNull('published_at');
    }

    public function createTranslation(Request $request)
    {
        foreach (locales() as $key => $language) {
            foreach ($this->translatedAttributes as $attribute) {
                $value = $request->get($attribute . '_' . $key);
                if ($value) {
                    $this->{$attribute . ':' . $key} = $value;
                }
            }
            $this->save();
        }
        return $this;
    }
}
