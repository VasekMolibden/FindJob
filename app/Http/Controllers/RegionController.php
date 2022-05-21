<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegionResource;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        return RegionResource::collection(Region::all());
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
        return new RegionResource(Region::findOrFail($id));
    }

    public function edit(Region $region)
    {
        //
    }

    public function update(Request $request, Region $region)
    {
        //
    }

    public function destroy(Region $region)
    {
        //
    }
}
