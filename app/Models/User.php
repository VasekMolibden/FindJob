<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles;

    public function generateToken()
    {
        $this->update([
            'api_token'=>Str::random(25),
        ]);
        return $this->api_token;
    }

    public function logoutToken()
    {
        $this->update([
            'api_token'=>NULL,
        ]);
    }

    public function access()
    {
        return $this->belongsTo(Access::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('id','desc');
    }

    public function hasAccess($accesses)
    {
        return in_array($this->access->access, $accesses);
    }

    public function favourites()
    {
        return $this->belongsToMany(Favourite::class, 'favourites');
    }

    public function favourite_posts()
    {
        return $this->hasMany(Favourite::class);
    }

    protected $fillable = [
        'name',
        'api_token',
        'phone',
        'password',
        'email',
        'image',
        'description',
        'access_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
