<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $attributes = [
        'name'=> 'string',
    ];
    protected $fillable = ['name','description','user_id'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    
}
