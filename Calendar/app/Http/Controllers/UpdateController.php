<?php

namespace App\Http\Controllers;

use App\Http\Resources\Update as UpdateResource;
use App\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @param  \App\update  $update
     * @return \Illuminate\Http\Response
     */
    public function show(update $update)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\update  $update
     * @return \Illuminate\Http\Response
     */
    public function edit(update $update)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, update $update)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy(update $update)
    {
        //
    }

    /**
     * Controlla se ci sono nuove notifiche sugli insegnamenti seguiti dall'utente
     * ritorna 1 se ci sono nuove notifiche, 0 se non ci sono
     */
    public function checkNewUpdates()
    {
        $teachingIDs = app('App\Http\Controllers\TeachingController')->getMyTeachings();
        
        $updates = DB::table('updates')
        ->whereDate('updates.created_at', '>', auth()->user()->LAU)
        ->select('updates.teaching_id')
        ->get();

        foreach ($updates as $update) 
        {
            foreach($teachingIDs as $teachingID){ if( $teachingID->teaching_id = $update->teaching_id ) return true; }
        }
        return false;
    }
}
