<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Filterable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post_type()
    {
        return $this->belongsTo(PostType::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function work_experience()
    {
        return $this->belongsTo(WorkExperience::class);
    }

    public function work_schedule()
    {
        return $this->belongsTo(WorkSchedule::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function favourites() {
        return $this->hasMany(Favourite::class, 'post_id', 'id');
    }

    protected $fillable = [
        'post_type_id',
        'user_id',
        'name',
        'description',
        'category_id',
        'education_id',
        'salary',
        'work_experience_id',
        'work_schedule_id',
        'contacts',
        'image',
        'city_id',
        'published',
    ];

    protected $hidden = [

    ];
}
