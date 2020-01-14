<?php

namespace app\Utility\StaticMethod\Retrievable;

use App;
use App\Teaching;
use Illuminate\Support\Facades\DB;

class Retrievable
{
    /** 
     * ritorna la lista degli id degli insegnamenti dell'utente loggato
    */
    public static function getMyTeachings()
    {
        $user = auth()->user();

        if( $user->personal_calendar == 0 )  
        {
            $teachingIDs = DB::table('degree_teaching')
            ->where('degree_teaching.degree_id', '=', $user->degree_id ) 
            ->select('degree_teaching.teaching_id')
            ->get();
        }
        else
        {
            $teachingIDs = DB::table('teaching_user')
            ->where('teaching_user.user_id', '=', $user->id ) 
            ->select('teaching_user.teaching_id')
            ->get();
        }

        return $teachingIDs;
    }
}
