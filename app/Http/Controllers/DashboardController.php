<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\User;
use App\Models\Comittee;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroles:LECTURE');
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

    public function getMeetingStatistics()
    {
        $instance = \Instantiation::instance();
        $meetings_count= Meeting::get_meeting_count();
        $get_all_committees = Comittee::get_all_comittees();
        $meeting_by_commitee = array();
        for ($i = 0; $i < count($get_all_committees); $i++) {
            $result = Meeting::get_meeting_by_comite($get_all_committees[$i]['id']);

            $result[0]['comittee_id'] = $get_all_committees[$i]['name'];
            array_push($meeting_by_commitee, $result[0]);
        }

        return view('dashboard.statistics',
        ['instance' => $instance, 'meetings_count' => $meetings_count, 'meeting_by_commitee' => $meeting_by_commitee]);

        //return response()->json($meeting_by_commitee);


    }
    public function showStatistics()
    {
        $instance = \Instantiation::instance();

        return view('dashboard.statistics', [
            'instance' => $instance,
            'hours' => $this->getMeetingStatistics()
            'hours' => $this->getHoursStatistics()
        ]);
    }
}
