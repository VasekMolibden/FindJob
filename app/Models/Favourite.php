<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
    ];

    public function user()
    {
        //return $this->hasMany(User::class,'id','user_id');
        return $this->belongsTo(User::class);

    }

    public function post()
    {
        //return $this->hasMany(Post::class,'id','post_id')->orderBy('id','desc');
        return $this->belongsTo(Post::class);
    }
}
