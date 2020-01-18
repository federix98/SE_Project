<?php

namespace App\Http\Controllers;

use App\Http\Resources\Teaching as TeachingResource;
use App\Http\Resources\Professor as ProfessorResource;
use App\Teaching;
use App\professor;
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
        return new TeachingResource($teaching);
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
        $teaching->update($request->all());

        return response()->json($teaching, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function destroy(teaching $teaching)
    {
        $degree->delete();

        return response()->json(null, 204);
    }

    /**
     * Display a listing of professors by teaching
     *
     * @param  \App\teaching  $professor
     * @return \Illuminate\Http\Response
     */
    public function getProfessors(teaching $teaching)
    {
        $teachingObj = teaching::find($teaching->id);
        return ProfessorResource::collection($teachingObj->professors);
    }

    /**
     * Store professor in teaching
     *
     * @param  \App\teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function storeProfessor(Request $request, teaching $teaching)
    {
        $professor = professor::find($request->id);
        if(is_null($professor)) {
            return response()->json("Professore non esistente", 404);
        }

        $teaching = teaching::find($teaching->id);
        $teaching->professors()->attach($professor->id);
        
        return response()->json(new TeachingResource($teaching), 201);
    }

    /**
     * Destroy professor in teaching
     *
     * @param  \App\professor  $professor
     * @param  \App\teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function destroyProfessor(Request $request, teaching $teaching, professor $professor)
    {
        $professor = professor::find($professor->id);
        $teaching = teaching::find($teaching->id);

        if(is_null($professor)) {
            return response()->json("Professore non esistente", 404);
        }

        if(is_null($teaching->professors()->find($professor->id))) {
            return response()->json("Professore non esistente sull'insegnamento", 404);
        }

        $teaching->professors()->detach($professor->id);
        
        return response()->json(new TeachingResource($teaching), 200);
    }
    
    /**
     * Search teaching
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // DA IMPLEMENTARE
    }
}
