<?php

namespace App\Http\Controllers;

use App\Http\Resources\Building as BuildingResource;
use App\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BuildingResource::collection(Building::paginate(15));
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
     * @param  \App\Building  $Building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $Building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Building  $Building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $Building)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Building  $Building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $Building)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Building  $Building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $Building)
    {
        //
    }
}
