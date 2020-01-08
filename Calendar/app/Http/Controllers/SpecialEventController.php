<?php

namespace App\Http\Controllers;

use App\Http\Resources\Special_event as Special_eventResource;
use App\Special_event;
use Illuminate\Http\Request;

class SpecialEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Special_eventResource::collection(Special_event::paginate(15));
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
     * @param  \App\special_event  $special_event
     * @return \Illuminate\Http\Response
     */
    public function show(special_event $special_event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\special_event  $special_event
     * @return \Illuminate\Http\Response
     */
    public function edit(special_event $special_event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\special_event  $special_event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, special_event $special_event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\special_event  $special_event
     * @return \Illuminate\Http\Response
     */
    public function destroy(special_event $special_event)
    {
        //
    }
}
