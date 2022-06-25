<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostAddRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Education;
use App\Models\Post;
use App\Models\PostType;
use App\Models\Region;
use App\Models\WorkExperience;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id')->paginate(12);

        return view('admin.post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post_types = PostType::all();
        $categories = Category::all();
        $educations = Education::all();
        $work_experiences = WorkExperience::all();
        $work_schedules = WorkSchedule::all();
        $cities = City::all();
        $regions = Region::all();

        return view('admin.post.create', compact('post_types', 'categories', 'educations', 'work_experiences', 'work_schedules', 'cities', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostAddRequest $request)
    {
        $request->validated();

        $post = new Post();
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
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('post.index')->withSuccess('Публикация успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post_types = PostType::all();
        $categories = Category::all();
        $educations = Education::all();
        $work_experiences = WorkExperience::all();
        $work_schedules = WorkSchedule::all();
        $cities = City::all();
        $regions = Region::all();

        return view('admin.post.edit', compact('post','post_types', 'categories', 'educations', 'work_experiences', 'work_schedules', 'cities', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(PostAddRequest $request, Post $post)
    {
        $request->validated();

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

        return redirect()->route('post.index')->withSuccess('Публикация успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(!str_contains($post->image, 'img/user_img/placeholder.jpg') && isset($post->image)){
            unlink(base_path().'/'.$post->image);
        }
        $post->delete();
        return redirect()->back()->withSuccess('Публикация успешно удалена');
    }
}
