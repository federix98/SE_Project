<?php

namespace App\Http\Controllers;

use App\Http\Resources\Professor as ProfessorResource;
use App\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProfessorResource::collection(Professor::paginate(15));
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
     * @param  \App\professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(professor $professor)
    {
        return new ProfessorResource(professor::find($professor->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(professor $professor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, professor $professor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(professor $professor)
    {
        //
    }

    /**
     * ritorna la lista dei professori dell'utente che ha eseguito il login
     */
    public function getMyProfessors()
    {
        $collection = collect();
        $teachingIDs = app('App\Http\Controllers\TeachingController')->getMyTeachings();

        foreach( $teachingIDs as $teachingID)
        {
            $professors = DB::table('professor_teaching')
            ->where('professor_teaching.teaching_id', '=', $teachingID->teaching_id ) 
            ->select('professors.*')
            ->join('professors', 'professor_teaching.professor_id', '=', 'professors.id')
            ->get();

            foreach( $professors as $professor ) $collection->push($professor);
        }

        return $collection;
    }
}
