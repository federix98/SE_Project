<?php

namespace App\Http\Controllers;

use App\Http\Resources\Degree_group as Degree_groupResource;
use App\Degree_group;
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
        return Degree_groupResource::collection(Degree_group::paginate(15));
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
        $degree_group = degree_group::create($request->all());

        return response()->json($degree_group, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\degree_group  $degree_group
     * @return \Illuminate\Http\Response
     */
    public function show(degree_group $degree_group)
    {
        return $degree_group;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\degree_group  $degree_group
     * @return \Illuminate\Http\Response
     */
    public function edit(degree_group $degree_group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\degree_group  $degree_group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, degree_group $degree_group)
    {
        $degree_group->update($request->all());

        return response()->json($degree_group, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\degree_group  $degree_group
     * @return \Illuminate\Http\Response
     */
    public function destroy(degree_group $degree_group)
    {
        $degree_group->delete();

        return response()->json(null, 204);
    }
}
