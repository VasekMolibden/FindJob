<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        return EducationResource::collection(Education::all());
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
        return new EducationResource(Education::findOrFail($id));
    }

    public function edit(Education $education)
    {
        //
    }

    public function update(Request $request, Education $education)
    {
        //
    }

    public function destroy(Education $education)
    {
        //
    }
}
