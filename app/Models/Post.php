<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
    use Translatable;

    const FILLABLE = ['category_id', 'image', 'slug', 'published_at', 'is_published'];
    public $translatedAttributes = ['title', 'excerpt', 'content', 'meta_title', 'meta_description'];
    public $translationModel = PostTranslation::class;

    protected $fillable = self::FILLABLE;

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'date',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopePublished($q)
    {
        return $q->where('is_published', true)->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function scopeRecent($q, $limit = 6)
    {
        return $q->published()->orderBy('published_at', 'desc')->limit($limit);
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
