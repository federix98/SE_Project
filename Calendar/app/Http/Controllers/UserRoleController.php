<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserRole as UserRoleResource;
use App\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserRoleResource::collection(UserRole::paginate(15));
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
     * @param  \App\UserRole  $UserRole
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $UserRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserRole  $UserRole
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRole $UserRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserRole  $UserRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRole $UserRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserRole  $UserRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRole $UserRole)
    {
        //
    }
}
