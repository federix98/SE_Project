<?php

namespace App\Http\Controllers;

use App\Http\Resources\Professor_role as Professor_roleResource;
use App\Professor_role;
use Illuminate\Http\Request;

class ProfessorRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Professor_roleResource::collection(Professor_role::paginate(15));
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
     * @param  \App\professor_role  $professor_role
     * @return \Illuminate\Http\Response
     */
    public function show(professor_role $professor_role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\professor_role  $professor_role
     * @return \Illuminate\Http\Response
     */
    public function edit(professor_role $professor_role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\professor_role  $professor_role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, professor_role $professor_role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\professor_role  $professor_role
     * @return \Illuminate\Http\Response
     */
    public function destroy(professor_role $professor_role)
    {
        //
    }
}
