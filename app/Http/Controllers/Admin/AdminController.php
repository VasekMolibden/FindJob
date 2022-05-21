<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Education;
use App\Models\Favourite;
use App\Models\Post;
use App\Models\PostType;
use App\Models\Region;
use App\Models\WorkExperience;
use \Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $categories_count = Category::all()->count();
        $cities_count = City::all()->count();
        $educations_count = Education::all()->count();
        $favourites_count = Favourite::all()->count();
        $posts_count = Post::all()->count();
        $post_types_count = PostType::all()->count();
        $regions_count = Region::all()->count();
        $roles_count = Role::all()->count();
        $users_count = User::all()->count();
        $work_experiences_count = WorkExperience::all()->count();
        $work_schedules_count = WorkSchedule::all()->count();

        return view('admin.index', [
            'categories_count' => $categories_count,
            'cities_count' => $cities_count,
            'educations_count' => $educations_count,
            'favourites_count' => $favourites_count,
            'posts_count' => $posts_count,
            'post_types_count' => $post_types_count,
            'regions_count' => $regions_count,
            'roles_count' => $roles_count,
            'users_count' => $users_count,
            'work_experiences_count' => $work_experiences_count,
            'work_schedules_count' => $work_schedules_count,
        ]);
    }
}
