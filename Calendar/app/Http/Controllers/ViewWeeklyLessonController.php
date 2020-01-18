<?php

namespace App\Http\Controllers;

use App\Http\Resources\View_weekly_lesson as View_weekly_lessonResource;
use App\View_weekly_lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utility\StaticMethod\Retrievable;

class ViewWeeklyLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View_weekly_lessonResource::collection(View_weekly_lesson::paginate(15));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\view_weekly_lesson  $view_weekly_lesson
     * @return \Illuminate\Http\Response
     */
    public function show(view_weekly_lesson $view_weekly_lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\view_weekly_lesson  $view_weekly_lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(view_weekly_lesson $view_weekly_lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\view_weekly_lesson  $view_weekly_lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, view_weekly_lesson $view_weekly_lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\view_weekly_lesson  $view_weekly_lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(view_weekly_lesson $view_weekly_lesson)
    {
        //
    }

    /**
     * ritorna il mio calendario delle lezioni di questa settimana
     */
    public function getMyCalendar()
    {
        $user = auth()->user();
        if( $user->personal_calendar == 0 ) $teaching_ids = $user->degree->teachings->pluck('id');
        else $teaching_ids = $user->teachings->pluck('id');

        $eventIDs = $user->degree->specialEvents->pluck('id');

        $collection = collect();

        $lessons = DB::table('view_weekly_lessons')
        ->whereIn('lesson_id', $teaching_ids)
        ->where('view_weekly_lessons.type', '!=', 2 )
        ->select('view_weekly_lessons.*')
        ->get();

        foreach( $lessons as $lesson ) $collection->push($lesson);

        $events = DB::table('view_weekly_lessons')
        ->whereIn('lesson_id', $eventIDs)
        ->where('view_weekly_lessons.type', '=', 2 )
        ->select('view_weekly_lessons.*')
        ->get();

        foreach( $events as $event ) $collection->push($event);

        return View_weekly_lessonResource::collection($collection);
    }
}
