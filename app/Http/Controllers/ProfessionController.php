<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfessionResource;
use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    public function index()
    {
        return ProfessionResource::collection(Profession::all());
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
        return new ProfessionResource(Profession::findOrFail($id));
    }

    public function edit(Profession $profession)
    {
        //
    }

    public function update(Request $request, Profession $profession)
    {
        //
    }

    public function destroy(Profession $profession)
    {
        //
    }
}
