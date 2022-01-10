<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;

class DashboardEvidencesTest extends TestCase
{
    public function test_evidence_dashboard_view(){
        $total_evidences = 7;
        $evidence_by_committee = array(array('comittee_id' => 'CommitteTest', 'total' => 2),array('comittee_id' => 'CommitteTest2', 'total' => 2)
        ,array('comittee_id' => 'CommitteTest3', 'total' => 3));
        $evidences_by_status = array(array('draft' => 2),array('pending' => 1),array( 'accepted' => 2), array('rejected' => 2));
        $comittee_names_json = json_encode(array('CommitteTest','CommitteTest2','CommitteTest3'));
        $committee_values_json = json_encode(array(2,2,3));


        $view = $this->view('dashboard.evidences', ['evidences' => [
            'total_evidences' => $total_evidences,
            'evidences_by_commitee' => $evidence_by_committee,
            'evidences_by_status' => $evidences_by_status,
            'comittee_names_json' => $comittee_names_json,
            'comittee_values_json' => $committee_values_json
        ]]);
        $view->assertSee($total_evidences);

        foreach ($evidence_by_committee as $evidence_committee) {
            $view->assertSee($evidence_committee['comittee_id']);
            $view->assertSee($evidence_committee['total']);
        }
        foreach ($evidences_by_status as $evidence_status) {
            $view->assertSee(key($evidence_status));
            $view->assertSee(current($evidence_status));
        }
        foreach (json_decode($comittee_names_json) as $comittee_name) {
            $view->assertSee($comittee_name);
        }
        foreach (json_decode($committee_values_json) as $comittee_value) {
            $view->assertSee($comittee_value);
        }
    }





}
