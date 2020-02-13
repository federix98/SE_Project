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
     * @param  \App\Professor  $Professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $Professor)
    {
        return new ProfessorResource(Professor::find($Professor->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professor  $Professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $Professor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professor  $Professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $Professor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professor  $Professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $Professor)
    {
        //
    }

    /**
     * ritorna la lista dei Professori dell'utente che ha eseguito il login
     */
    public function getMyProfessors(Request $request)
    {   
        $user = $request->user();
        if( $user->personal_calendar == 0 ) $teaching_ids = $user->degree->teachings->pluck('id');
        else $teaching_ids = $user->teachings->pluck('id');

        $my_Professors = Professor::whereHas('teachings', function($query) use($teaching_ids) {
            $query->whereIn('teachings.id', $teaching_ids);
        })->get();

        return ProfessorResource::collection($my_Professors);
    }
}
