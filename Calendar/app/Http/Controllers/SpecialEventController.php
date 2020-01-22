<?php

namespace App\Http\Controllers;

use App\Http\Resources\SpecialEvent as SpecialEventResource;
use App\SpecialEvent;
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
        return SpecialEventResource::collection(SpecialEvent::paginate(15));
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
     * @param  \App\SpecialEvent  $SpecialEvent
     * @return \Illuminate\Http\Response
     */
    public function show(SpecialEvent $SpecialEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SpecialEvent  $SpecialEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(SpecialEvent $SpecialEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SpecialEvent  $SpecialEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpecialEvent $SpecialEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SpecialEvent  $SpecialEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpecialEvent $SpecialEvent)
    {
        //
    }
}
