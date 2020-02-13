<?php

namespace App\Http\Controllers;

use App\Http\Resources\Teaching as TeachingResource;
use App\Http\Resources\Professor as ProfessorResource;
use App\Http\Resources\Lesson as LessonResource;
use App\Lesson;
use App\Teaching;
use App\Professor;
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
        $Teaching = Teaching::create($request->all());

        return response()->json($Teaching, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teaching  $Teaching
     * @return \Illuminate\Http\Response
     */
    public function show(Teaching $Teaching)
    {
        return new TeachingResource($Teaching);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teaching  $Teaching
     * @return \Illuminate\Http\Response
     */
    public function edit(Teaching $Teaching)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teaching  $Teaching
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teaching $Teaching)
    {
        $Teaching->update($request->all());

        return response()->json($Teaching, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teaching  $Teaching
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teaching $Teaching)
    {
        $degree->delete();

        return response()->json(null, 204);
    }

    /**
     * Display a listing of professors by Teaching
     *
     * @param  \App\Teaching  $professor
     * @return \Illuminate\Http\Response
     */
    public function getProfessors(Teaching $Teaching)
    {
        $TeachingObj = Teaching::find($Teaching->id);
        return ProfessorResource::collection($TeachingObj->professors);
    }

    /**
     * Store professor in Teaching
     *
     * @param  \App\Teaching  $Teaching
     * @return \Illuminate\Http\Response
     */
    public function storeProfessor(Request $request, Teaching $Teaching)
    {
        $professor = professor::find($request->id);
        if(is_null($professor)) {
            return response()->json("Professore non esistente", 404);
        }

        $Teaching = Teaching::find($Teaching->id);
        $Teaching->professors()->attach($professor->id);
        
        return response()->json(new TeachingResource($Teaching), 201);
    }

    /**
     * Destroy professor in Teaching
     *
     * @param  \App\professor  $professor
     * @param  \App\Teaching  $Teaching
     * @return \Illuminate\Http\Response
     */
    public function destroyProfessor(Request $request, Teaching $Teaching, professor $professor)
    {
        $professor = professor::find($professor->id);
        $Teaching = Teaching::find($Teaching->id);

        if(is_null($professor)) {
            return response()->json("Professore non esistente", 404);
        }

        if(is_null($Teaching->professors()->find($professor->id))) {
            return response()->json("Professore non esistente sull'insegnamento", 404);
        }

        $Teaching->professors()->detach($professor->id);
        
        return response()->json(new TeachingResource($Teaching), 200);
    }

    /**
     * Display a listing of professors by Teaching
     *
     * @param  \App\Teaching  $Teaching
     * @return \Illuminate\Http\Response
     */
    public function getLessons(Teaching $Teaching)
    {
        $TeachingObj = Teaching::find($Teaching->id);
        return LessonResource::collection($TeachingObj->lessons);
    }
}
