<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostTypeResource;
use App\Models\Post_type;
use App\Models\PostType;
use Illuminate\Http\Request;

class PostTypeController extends Controller
{
    public function index()
    {
        return PostTypeResource::collection(PostType::all());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return new PostTypeResource(PostType::findOrFail($id));
    }

    public function edit(PostType $post_type)
    {
        //
    }

    public function update(Request $request, PostType $post_type)
    {
        //
    }

    public function destroy(PostType $post_type)
    {
        //
    }
}
