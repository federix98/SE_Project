<?php

namespace App\Http\Controllers;

use App\Http\Resources\Degree as DegreeResource;
use App\Http\Resources\View_weekly_lesson as CalendarResource;
use App\Http\Resources\Professor as ProfessorResource;
use App\Degree;
use Carbon\Carbon;
use App\view_weekly_lesson;
use App\Professor;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DegreeResource::collection(Degree::paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $degree = degree::create($request->all());

        return response()->json($degree, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function show(degree $degree)
    {
        return new DegreeResource($degree);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function edit(degree $degree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, degree $degree)
    {
        $degree->update($request->all());

        return response()->json($degree, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function destroy(degree $degree)
    {
        $degree->delete();

        return response()->json(null, 204);
    }

    /**
     * Get Calendar from degree
     *
     * @param  \App\degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function getCalendar(degree $degree) {

        $teaching_ids = $degree->teachings->pluck('id');
        
        return CalendarResource::collection(view_weekly_lesson::whereIn('teaching_id', $teaching_ids)->get());
    }


    /**
     * Get Current Lessons from degree
     *
     * @param  \App\degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function getCurrentLessons(degree $degree) {
        
        $teaching_ids = $degree->teachings->pluck('id');
        $my_weekly_lessons = view_weekly_lesson::whereIn('teaching_id', $teaching_ids);
        
        $actual_ts = Carbon::now()->timestamp;
        $today_ts = Carbon::today()->timestamp;

        // Secondi passati dall'inizio della giornata
        $now_ts = $actual_ts - $today_ts;

        // 15 min = 900 sec
        $now_slot = floor($now_ts / 900);
        // Lezioni che mi interessano : start_time <= now AND start_time + duration > now

        $current_lessons = $my_weekly_lessons->where([
            ['start_time', '<=', $now_slot]
        ])->whereRaw('start_time + duration > ?', [$now_slot])->get();

        return CalendarResource::collection($current_lessons);

    }

    /**
     * Get Professors from Degree
     *
     * @param  \App\degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function getProfessors(degree $degree)
    {
        $teaching_ids = $degree->teachings->pluck('id');
        
        $my_professors = professor::whereHas('teachings', function($query) use($teaching_ids) {
            $query->whereIn('teachings.id', $teaching_ids);
        })->get();
        
        return ProfessorResource::collection($my_professors);
    }

    /**
     * Get Teachings from Degree
     *
     * @param  \App\degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function getTeachings(degree $degree)
    {
        // DA IMPLEMENTARE
    }
}
