<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Comment extends Model
{
    use HasFactory;

    protected $attributes = [
        'content'=> 'string',
    ];
    protected $fillable = ['content','user_id','article_id','magazine_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }
    // Relation pour le commentaire parent
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->orderBy('created_at', 'asc');
    }

    
}
