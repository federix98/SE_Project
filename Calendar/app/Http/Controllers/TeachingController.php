<?php

namespace App\Http\Controllers;

use App\teaching;
use Illuminate\Http\Request;

class TeachingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return teaching::all();
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
        return $teaching;
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
}
