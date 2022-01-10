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
use App\Models\Bonus;
use App\Models\Event;

class DashBoardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroles:LECTURE');
    }

    public function getEvidencestatistic()
    {
        $instance = \Instantiation::instance();
        $total_evidences = Evidence::get_evidences_count();

        $get_all_committees = Comittee::get_all_comittees();
        $evidences_by_commitee = array();
        $comittee_names = array();
        $comittee_values = array();
        for($i = 0; $i < count($get_all_committees); $i++){
            $result = Evidence::get_evidences_by_group($get_all_committees[$i]['id']);

            $result[0]['comittee_id'] = $get_all_committees[$i]['name'];
            array_push($comittee_names,$get_all_committees[$i]['name']);
            array_push($comittee_values,$result[0]['total']);
            array_push($evidences_by_commitee, $result[0]);
        }
        $evidences_by_status = Evidence::get_evidences_by_status();
        $comittee_names_json = json_encode($comittee_names,JSON_HEX_QUOT );
        $comittee_values_json = json_encode($comittee_values,JSON_HEX_QUOT );

        //return response()->json($evidences_by_status[0]);
        return ['total_evidences' => $total_evidences,'evidences_by_commitee' =>$evidences_by_commitee,'evidences_by_status' =>$evidences_by_status,
        'comittee_names_json'=> $comittee_names_json, 'comittee_values_json' => $comittee_values_json];
    }

    public function getHoursStatistics()
    {
        $sumgroup_by_comittee = function($entities) {
            $hours_by_comittee = [];
            $total_hours = 0;
            foreach ($entities as $entity) {
                $comittee_name = (isset($entity['comittee'])) ? $entity['comittee']['name'] : 'Desconocido';

                if (!isset($hours_by_comittee[$comittee_name])) {
                    $hours_by_comittee[$comittee_name] = 0;
                }

                $hours_by_comittee[$comittee_name] += $entity['hours'];
                $total_hours += $entity['hours'];
            }
            return ['total_hours' => $total_hours, 'hours_by_comittee' => $hours_by_comittee];
        };

        $evidences = $sumgroup_by_comittee(Evidence::with('comittee')->get());
        $meetings = $sumgroup_by_comittee(Meeting::with('comittee')->get());
        $comittees = array_unique(array_merge(array_keys($evidences['hours_by_comittee']), array_keys($meetings['hours_by_comittee'])), SORT_REGULAR);

        foreach ($comittees as $comittee) {
            $evidences['hours_by_comittee'][$comittee] = isset($evidences['hours_by_comittee'][$comittee]) ? $evidences['hours_by_comittee'][$comittee] : 0;
            $meetings['hours_by_comittee'][$comittee] = isset($meetings['hours_by_comittee'][$comittee]) ? $meetings['hours_by_comittee'][$comittee] : 0;
        }

        return [
            'total_hours' => $evidences['total_hours'] + $meetings['total_hours'],
            'total_event_hours' => Event::sum('hours'),
            'total_bonus_hours' => Bonus::sum('hours'),
            'evidences' => $evidences,
            'meetings' => $meetings,
            'comittees' => $comittees
        ];
    }

    public function showStatistics()
    {
        $instance = \Instantiation::instance();

        return view('dashboard.statistics', [
            'instance' => $instance,
            'hours' => $this->getHoursStatistics(),
            'evidences' => $this->getEvidencestatistic()
        ]);
    }
}
