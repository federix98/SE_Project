<?php

namespace App\Http\Controllers;

use App\Http\Resources\Degree as DegreeResource;
use App\Degree;
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
        $degree = degree::create($request->all());

        return response()->json($degree, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function show(degree $degree)
    {
        return $degree;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function edit(degree $degree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, degree $degree)
    {
        $degree->update($request->all());

        return response()->json($degree, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function destroy(degree $degree)
    {
        $degree->delete();

        return response()->json(null, 204);
    }
}
