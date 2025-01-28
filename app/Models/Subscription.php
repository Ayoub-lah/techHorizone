<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','theme_id'] ;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
