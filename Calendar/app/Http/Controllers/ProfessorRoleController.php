<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfessorRole as ProfessorRoleResource;
use App\ProfessorRole;
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
        return ProfessorRoleResource::collection(ProfessorRole::paginate(15));
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
     * @param  \App\ProfessorRole  $ProfessorRole
     * @return \Illuminate\Http\Response
     */
    public function show(ProfessorRole $ProfessorRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfessorRole  $ProfessorRole
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfessorRole $ProfessorRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfessorRole  $ProfessorRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfessorRole $ProfessorRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfessorRole  $ProfessorRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfessorRole $ProfessorRole)
    {
        //
    }
}
