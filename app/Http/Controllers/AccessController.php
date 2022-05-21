<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccessResource;
use App\Models\Access;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function index()
    {
        return AccessResource::collection(Access::all());
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
        return new AccessResource(Access::findOrFail($id));
    }

    public function edit(Access $access)
    {
        //
    }

    public function update(Request $request, Access $access)
    {
        //
    }

    public function destroy(Access $access)
    {
        //
    }
}
