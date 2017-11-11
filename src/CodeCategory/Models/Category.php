<?php

namespace CodePress\CodeCategory\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'codepress_categories';

    protected $fillable = [
        'name',
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
}