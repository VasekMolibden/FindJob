<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\PostAddRequest;
use App\Http\Requests\PostFilterRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\City;
use App\Models\Education;
use App\Models\Post;
use App\Models\PostType;
use App\Models\Region;
use App\Models\WorkExperience;
use App\Models\WorkSchedule;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class PostController extends Controller
{
    public function search(PostFilterRequest $request)
    {
        $post_types = PostType::all();
        $categories = Category::all();
        $educations = Education::all();
        $work_experiences = WorkExperience::all();
        $work_schedules = WorkSchedule::all();
        $cities = City::all();
        $regions = Region::all();

        $data = $request->all();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->orderBy('id', 'desc')->paginate(7);
        return view('search', compact('posts','post_types', 'categories', 'educations', 'work_experiences','work_schedules', 'cities', 'regions'));
    }

    public function index()
    {
        $posts = Post::where('city_id', session('city.id'))->orderBy('id', 'desc')->paginate(7);
        $all_posts = Post::where('city_id', session('city.id'))->orderBy('id', 'desc')->get();
        $categories = Category::all();

        return view('index', compact('posts', 'categories', 'all_posts'));
    }

    public function create()
    {
        $post_types = PostType::all();
        $categories = Category::all();
        $educations = Education::all();
        $work_experiences = WorkExperience::all();
        $work_schedules = WorkSchedule::all();
        $cities = City::all();
        $regions = Region::all();
        return view('create', compact('post_types', 'categories', 'educations', 'work_experiences', 'work_schedules', 'cities', 'regions'));
    }

    public function store(PostAddRequest $request)
    {
        $data = $request->validated();
        $data["user_id"] = Auth::id();
        $data["image"] = $request->image? $request->image->store('public/img/user_img'):'img/user_img/placeholder.jpg';
        $post = Post::create($data);
        return redirect(RouteServiceProvider::HOME)->with('success', 'Публикация успешно размещена.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post', ['post' => $post]);
    }


    public function edit(Post $post)
    {
        $post_types = PostType::all();
        $categories = Category::all();
        $educations = Education::all();
        $work_experiences = WorkExperience::all();
        $work_schedules = WorkSchedule::all();
        $cities = City::all();
        $regions = Region::all();

        return view('post_edit', compact('post','post_types', 'categories', 'educations', 'work_experiences', 'work_schedules', 'cities', 'regions'));
    }

    public function update(Request $request, Post $post)
    {
        $post->name = $request->name;
        $post->post_type_id = $request->post_type_id;
        $post->city_id = $request->city_id;
        $post->category_id = $request->category_id;
        $post->education_id = $request->education_id;
        $post->salary = $request->salary;
        $post->work_experience_id = $request->work_experience_id;
        $post->description = $request->description;
        $post->work_schedule_id = $request->work_schedule_id;
        $post->contacts = $request->contacts;
        if(isset($request->image)){
            $post->image = $request->image->store('public/img/user_img');
        }
        $post->save();

        return redirect()->route('post', $post->id)->withSuccess('Публикация успешно обновлена');
    }


    public function destroy(Post $post)
    {
        if(!str_contains($post->image, 'img/user_img/placeholder.jpg') && isset($post->image)){
            unlink(base_path().'/'.$post->image);
        }
        $post->delete();
        return redirect(RouteServiceProvider::HOME)->with('success', 'Публикация удалена.');
    }
}
