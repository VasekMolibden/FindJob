<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'work_schedule',
    ];
}
