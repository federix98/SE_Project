<?php

namespace App\Http\Controllers;

use App\Http\Resources\Teaching as TeachingResource;
use App\Teaching;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeachingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TeachingResource::collection(Teaching::paginate(15));
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
        $teaching = teaching::create($request->all());

        return response()->json($teaching, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function show(teaching $teaching)
    {
        return new TeachingResource(teaching::find($teaching->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function edit(teaching $teaching)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teaching $teaching)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function destroy(teaching $teaching)
    {
        //
    }

    /** 
     * ritorna la lista degli id degli insegnamenti dell'utente loggato
    */
    public function getMyTeachings()
    {
        $user = auth()->user();

        if( $user->personal_calendar == 0 )  
        {
            $teachingIDs = DB::table('degree_teaching')
            ->where('degree_teaching.degree_id', '=', $user->degree_id ) 
            ->select('degree_teaching.teaching_id')
            ->get();
        }
        else
        {
            $teachingIDs = DB::table('teaching_user')
            ->where('teaching_user.user_id', '=', $user->id ) 
            ->select('teaching_user.teaching_id')
            ->get();
        }

        return $teachingIDs;
    }
}
