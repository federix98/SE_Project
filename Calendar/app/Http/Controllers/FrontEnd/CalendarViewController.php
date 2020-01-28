<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Degree;

class CalendarViewController extends Controller
{
    //
    public function getCalendar(Request $request){
        $degree = degree::find($request->input('opt'));
        
        return view('calendar', ['degree' => $degree]);
    }
}
