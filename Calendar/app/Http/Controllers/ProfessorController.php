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
        $user = auth()->user();
        if( $user->personal_calendar == 0 ) $teaching_ids = $user->degree->teachings->pluck('id');
        else $teaching_ids = $user->teachings->pluck('id');

        $my_professors = professor::whereHas('teachings', function($query) use($teaching_ids) {
            $query->whereIn('teachings.id', $teaching_ids);
        })->get();

        return ProfessorResource::collection($my_professors);
    }

    /**
     * Search professor
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // DA IMPLEMENTARE
    }
}
