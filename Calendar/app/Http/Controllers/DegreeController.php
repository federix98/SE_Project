<?php

namespace App\Http\Controllers;

use App\Http\Resources\Degree as DegreeResource;
use App\Http\Resources\ViewWeeklyLesson as CalendarResource;
use App\Http\Resources\Professor as ProfessorResource;
use app\Http\Resources\Teaching as TeachingResource;
use App\Degree;
use Carbon\Carbon;
use App\ViewWeeklyLesson;
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
        $Degree = Degree::create($request->all());

        return response()->json($Degree, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Degree  $Degree
     * @return \Illuminate\Http\Response
     */
    public function show(Degree $Degree)
    {
        return new DegreeResource($Degree);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Degree  $Degree
     * @return \Illuminate\Http\Response
     */
    public function edit(Degree $Degree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Degree  $Degree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Degree $Degree)
    {
        $Degree->update($request->all());

        return response()->json($Degree, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Degree  $Degree
     * @return \Illuminate\Http\Response
     */
    public function destroy(Degree $Degree)
    {
        $Degree->delete();

        return response()->json(null, 204);
    }

    /**
     * Get Calendar from Degree
     *
     * @param  \App\Degree  $Degree
     * @return \Illuminate\Http\Response
     */
    public function getCalendar(Degree $Degree) 
    {
        $teaching_ids = $Degree->teachings->pluck('id');   
        return CalendarResource::collection(ViewWeeklyLesson::whereIn('teaching_id', $teaching_ids)->get());
    }


    /**
     * Get Current Lessons from Degree
     *
     * @param  \App\Degree  $Degree
     * @return \Illuminate\Http\Response
     */
    public function getCurrentLessons(Degree $Degree) {
        
        $teaching_ids = $Degree->teachings->pluck('id');
        $my_weekly_lessons = ViewWeeklyLesson::whereIn('teaching_id', $teaching_ids);
        
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
     * @param  \App\Degree  $Degree
     * @return \Illuminate\Http\Response
     */
    public function getProfessors(Degree $Degree)
    {
        $teaching_ids = $Degree->teachings->pluck('id');
        
        $my_professors = professor::whereHas('teachings', function($query) use($teaching_ids) {
            $query->whereIn('teachings.id', $teaching_ids);
        })->get();
        
        return ProfessorResource::collection($my_professors);
    }

    /**
     * Get Teachings from Degree
     *
     * @param  \App\Degree  $Degree
     * @return \Illuminate\Http\Response
     */
    public function getTeachings(Degree $Degree)
    {
        return TeachingResource::collection($Degree->teachings);
    }
}
