<?php

namespace App\Http\Controllers;

use App\Http\Resources\Degree as DegreeResource;
use App\Http\Resources\ViewWeeklyLesson as CalendarResource;
use App\Http\Resources\Professor as ProfessorResource;
use App\Http\Resources\Teaching as TeachingResource;
use App\Http\Resources\SpecialEvent as SpecialEventResource;
use App\Degree;
use App\Lesson;
use Carbon\Carbon;
use App\ViewWeeklyLesson;
use App\Professor;
use App\SpecialEvent;
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

    public function getAll() {
        return DegreeResource::collection(Degree::all());
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

        // variabile per giorno della settimana
        $weekMap = [
            0 => 6,
            1 => 0,
            2 => 1,
            3 => 2,
            4 => 3,
            5 => 4,
            6 => 5,
        ];
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $weekday = $weekMap[$dayOfTheWeek];

        // Secondi passati dall'inizio della giornata
        $now_ts = $actual_ts - $today_ts;

        // 15 min = 900 sec
        $now_slot = floor($now_ts / 900);
        // Lezioni che mi interessano : start_time <= now AND start_time + duration > now

        $current_lessons = $my_weekly_lessons->where([
            ['start_time', '<=', $now_slot],
            ['week_day', '=', $weekday]
        ])->whereRaw('start_time + duration > ?', [$now_slot])->get();

        return CalendarResource::collection($current_lessons);

    }

    /**
     * Get Calendar from Degree
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */

    public function getCalendar(Request $request, Degree $degree) 
    {
        $current = $request->input('current');
        if($current == true) return DegreeController::getCurrentLessons($degree);
        $teaching_ids = $degree->teachings->pluck('id');   
        $lessons = ViewWeeklyLesson::whereIn('teaching_id', $teaching_ids)->get();

        $event_ids = $degree->specialEvents->pluck('id');   
        $events = ViewWeeklyLesson::where('type', '=', '2')->whereIn('lesson_id', $event_ids)->get();
        foreach($events as $event) {
            $lessons->push($event);
        }

        return CalendarResource::collection($lessons);
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
