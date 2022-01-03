<?php

namespace App\Http\Controllers;

use App\Models\Evidence;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroles:LECTURE');
    }

    public function numberOfTotalUsers()
    {
        $instance = \Instantiation::instance();

        $student_users= User::student_users();
        $student_users_count = $student_users->count();

        $participations=User::student_users_by_participation();
        #return response()->json($student_users_count);


        return view('dashboard.statistics',
            ['instance' => $instance, 'student_users_count' => $student_users_count,'participations' => $participations]);

    }
}
