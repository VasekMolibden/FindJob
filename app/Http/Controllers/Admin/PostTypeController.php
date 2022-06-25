<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostTypeRequest;
use App\Models\PostType;
use Illuminate\Http\Request;

class PostTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_types = PostType::orderBy('id')->paginate(12);

        return view('admin.post_type.index', [
            'post_types' => $post_types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostTypeRequest $request)
    {
        $request->validated();

        $post_type = new PostType();
        $post_type->post_type = $request->post_type;
        $post_type->save();

        return redirect()->route('post_type.index')->withSuccess('Тип публикации успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostType  $post_type
     * @return \Illuminate\Http\Response
     */
    public function show(PostType $post_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostType  $post_type
     * @return \Illuminate\Http\Response
     */
    public function edit(PostType $post_type)
    {
        return view('admin.post_type.edit', [
            'post_type' => $post_type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostType  $post_type
     * @return \Illuminate\Http\Response
     */
    public function update(PostTypeRequest $request, PostType $post_type)
    {
        $request->validated();

        $post_type->post_type = $request->post_type;
        $post_type->save();

        return redirect()->route('post_type.index')->withSuccess('Тип публикации успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostType  $post_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostType $post_type)
    {
        $post_type->delete();
        return redirect()->back()->withSuccess('Тип публикации успешно удален');
    }
}
