<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkScheduleRequest;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;

class WorkScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work_schedules = WorkSchedule::orderBy('id')->paginate(12);

        return view('admin.work_schedule.index', [
            'work_schedules' => $work_schedules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.work_schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkScheduleRequest $request)
    {
        $request->validated();

        $work_schedule = new WorkSchedule();
        $work_schedule->work_schedule = $request->work_schedule;
        $work_schedule->save();

        return redirect()->route('work_schedule.index')->withSuccess('График работы успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkSchedule  $work_schedule
     * @return \Illuminate\Http\Response
     */
    public function show(WorkSchedule $work_schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkSchedule  $work_schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkSchedule $work_schedule)
    {
        return view('admin.work_schedule.edit', [
            'work_schedule' => $work_schedule
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkSchedule  $work_schedule
     * @return \Illuminate\Http\Response
     */
    public function update(WorkScheduleRequest $request, WorkSchedule $work_schedule)
    {
        $request->validated();

        $work_schedule->work_schedule = $request->work_schedule;
        $work_schedule->save();

        return redirect()->route('work_schedule.index')->withSuccess('График работы успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkSchedule  $work_schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkSchedule $work_schedule)
    {
        $work_schedule->delete();
        return redirect()->back()->withSuccess('График работы успешно удален');
    }
}
