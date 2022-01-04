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

    public function numberOfTotalmeetings()
    {
        $instance = \Instantiation::instance();
        $total_meeting = Meeting::get_meeting_count();

        $get_all_committees = Comittee::get_all_comittees();
        $meeting_by_commitee = array();
        for ($i = 0; $i < count($get_all_committees); $i++) {
            $result = Meeting::get_meeting_by_comite($get_all_committees[$i]['id']);

            $result[0]['comittee_id'] = $get_all_committees[$i]['name'];
            array_push($meeting_by_commitee, $result[0]);
        }
    }
}
