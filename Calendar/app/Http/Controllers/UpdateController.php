<?php

namespace App\Http\Controllers;

use App\Http\Resources\Update as UpdateResource;
use App\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utility\StaticMethod\Retrievable;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UpdateResource::collection(Update::paginate(15));
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
     * @param  \App\Update  $Update
     * @return \Illuminate\Http\Response
     */
    public function show(Update $Update)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Update  $Update
     * @return \Illuminate\Http\Response
     */
    public function edit(Update $Update)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Update  $Update
     * @return \Illuminate\Http\Response
     */
    public function Update(Request $request, Update $Update)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Update  $Update
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update $Update)
    {
        //
    }

    /**
     * Controlla se ci sono nuove notifiche sugli insegnamenti seguiti dall'utente
     * ritorna 1 se ci sono nuove notifiche, 0 se non ci sono
     */
    public function checkNewUpdates()
    {
        $user = $request->user();
        if( $user->personal_calendar == 0 ) $teaching_ids = $user->degree->teachings->pluck('id');
        else $teaching_ids = $user->teachings->pluck('id');
        
        $Updates = Update::whereHas('teaching', function($query) use($teaching_ids) {
            $query->whereIn('teachings.id', $teaching_ids)->whereDate('updates.created_at', '>',  auth()->user()->LAU);
        })->get();

        if ($Updates->isEmpty()) return false;
        return true;
    }
}
