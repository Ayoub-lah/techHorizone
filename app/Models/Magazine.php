<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $attributes = [
        'number'=> 'integer',
    ];
    protected $fillable = ['number','is_public'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
