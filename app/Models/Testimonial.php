<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['name', 'position', 'company', 'image', 'content', 'rating', 'ordering', 'is_active'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'rating' => 'integer',
            'ordering' => 'integer',
        ];
    }

    public function scopeActive($q)
    {
        return $q->where('is_active', true)->orderBy('ordering');
    }
}
