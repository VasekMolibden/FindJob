<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work_experiences = WorkExperience::orderBy('id')->paginate(12);

        return view('admin.work_experience.index', [
            'work_experiences' => $work_experiences
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.work_experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $work_experience = new WorkExperience();
        $work_experience->work_experience = $request->work_experience;
        $work_experience->save();

        return redirect()->route('work_experience.index')->withSuccess('Опыт работы успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkExperience  $work_experience
     * @return \Illuminate\Http\Response
     */
    public function show(WorkExperience $work_experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkExperience  $work_experience
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkExperience $work_experience)
    {
        return view('admin.work_experience.edit', [
            'work_experience' => $work_experience
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkExperience  $work_experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkExperience $work_experience)
    {
        $work_experience->work_experience = $request->work_experience;
        $work_experience->save();

        return redirect()->route('work_experience.index')->withSuccess('Опыт работы успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkExperience  $work_experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkExperience $work_experience)
    {
        $work_experience->delete();
        return redirect()->back()->withSuccess('Опыт работы успешно удален');
    }
}
