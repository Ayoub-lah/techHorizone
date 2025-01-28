<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Article extends Model
{
    use HasFactory;

    protected $attributes = [
        'title'=> 'string',
        'content'=> 'string',
        'state' => 'string',
    ];
    protected $fillable = ['title','content','theme_id','user_id','state','is_public'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
     // Relation avec les visites
     public function visits()
     {
         return $this->hasMany(Visit::class);
     }
}
