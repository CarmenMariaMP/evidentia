<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;

class DashboardMeetingsTest extends TestCase
{
    public function test_meeting_dashboard_view(){

        $meetings_count = 13;
        $meeting_by_commitee = array(array('comittee_id' => 'CommitteTest', 'total' => 2),array('comittee_id' => 'CommitteTest2', 'total' => 3)
        ,array('comittee_id' => 'CommitteTest3', 'total' => 3,array('comittee_id' => 'CommitteTest4', 'total' => 3),array('comittee_id' => 'CommitteTest7', 'total' => 2)));
        $comittee_names_json = json_encode(array('CommitteTest','CommitteTest2','CommitteTest3'));
        $committee_values_json = json_encode(array(2,3,3,3,2));


        $view = $this->view('dashboard.meetings', ['meetings' => [
            'meetings_count' => $meetings_count,
            'meeting_by_commitee' => $meeting_by_commitee,
            'comittee_names_json' => $comittee_names_json,
            'comittee_values_json' => $committee_values_json
        ]]);
        $view->assertSee($meetings_count);

        foreach ($meeting_by_commitee as $meeting_commitee) {
            $view->assertSee($meeting_commitee['comittee_id']);
            $view->assertSee($meeting_commitee['total']);
        }
        foreach (json_decode($comittee_names_json) as $comittee_name) {
            $view->assertSee($comittee_name);
        }
        foreach (json_decode($committee_values_json) as $comittee_value) {
            $view->assertSee($comittee_value);
        }
    }





}
