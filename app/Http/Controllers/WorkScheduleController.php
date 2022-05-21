<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkScheduleResource;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;

class WorkScheduleController extends Controller
{
    public function index()
    {
        return WorkScheduleResource::collection(WorkSchedule::all());
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
        return new WorkScheduleResource(WorkSchedule::findOrFail($id));
    }

    public function edit(WorkSchedule $workSchedule)
    {
        //
    }

    public function update(Request $request, WorkSchedule $workSchedule)
    {
        //
    }

    public function destroy(WorkSchedule $workSchedule)
    {
        //
    }
}
