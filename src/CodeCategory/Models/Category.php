<?php

namespace CodePress\CodeCategory\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;

    protected $table = 'codepress_categories';

    protected $fillable = [
        'name',
        'slug',
        'active',
        'parent_id'
    ];

    public function categorizable()
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Return a URL safe version of a string.
     *
     * @param string $string
     * @param string|array|null $options
     *
     * @return string
     *
     * @api
     */
    public function slugify($string, $options = null)
    {
        // TODO: Implement slugify() method.
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}