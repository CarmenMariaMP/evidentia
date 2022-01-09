<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\Comittee;
use App\Models\Coordinator;
use App\Models\Evidence;
use App\Models\Meeting;
use App\Models\Role;
use App\Models\Secretary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashBoardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroles:LECTURE');
    }

    public function statistic_list()
    {
        $instance = \Instantiation::instance();
        $total_evidences = Evidence::get_evidences_count();

        $get_all_committees = Comittee::get_all_comittees();
        $evidences_by_commitee = array();
        for($i = 0; $i < count($get_all_committees); $i++){
            $result = Evidence::get_evidences_by_group($get_all_committees[$i]['id']);

            $result[0]['comittee_id'] = $get_all_committees[$i]['name'];
            array_push($evidences_by_commitee, $result[0]);
        }
        $evidences_by_status = Evidence::get_evidences_by_status();


        //return response()->json($evidences_by_status[0]);
        return ['total_evidences' => $total_evidences,'evidences_by_commitee' =>$evidences_by_commitee,'evidences_by_status' =>$evidences_by_status];
    }


    public function showStatistics()
    {
        $instance = \Instantiation::instance();

        return view('dashboard.statistics', [
            'instance' => $instance,
            'evidences' => $this->statistic_list()
        ]);
    }
}
