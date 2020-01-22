<?php

namespace App\Http\Controllers;

use App\Http\Resources\DegreeGroup as DegreeGroupResource;
use App\DegreeGroup;
use Illuminate\Http\Request;

class DegreeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DegreeGroupResource::collection(DegreeGroup::paginate(15));
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
        $DegreeGroup = DegreeGroup::create($request->all());

        return response()->json($DegreeGroup, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DegreeGroup  $DegreeGroup
     * @return \Illuminate\Http\Response
     */
    public function show(DegreeGroup $DegreeGroup)
    {
        return $DegreeGroup;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DegreeGroup  $DegreeGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(DegreeGroup $DegreeGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DegreeGroup  $DegreeGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DegreeGroup $DegreeGroup)
    {
        $DegreeGroup->update($request->all());

        return response()->json($DegreeGroup, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DegreeGroup  $DegreeGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(DegreeGroup $DegreeGroup)
    {
        $DegreeGroup->delete();

        return response()->json(null, 204);
    }

    
}
