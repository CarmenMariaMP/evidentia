<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_dashboard_hours_view()
    {
        $expectedComittees = ['Comite1', 'Comite2', 'Comite3', 'Comite4', 'Comite5'];
        $expectedValues = range(1, 15);

        $view = $this->view('dashboard.hours', ['hours' => [
            'total_hours' => $expectedValues[0],
            'total_event_hours' => $expectedValues[1],
            'total_bonus_hours' => $expectedValues[2],
            'evidences' => [
                'total_hours' => $expectedValues[3],
                'hours_by_comittee' => [
                    $expectedComittees[0] => $expectedValues[4],
                    $expectedComittees[1] => $expectedValues[5],
                    $expectedComittees[2] => $expectedValues[6],
                    $expectedComittees[3] => $expectedValues[7],
                    $expectedComittees[4] => $expectedValues[8]
                ]
            ],
            'meetings' => [
                'total_hours' => $expectedValues[9],
                'hours_by_comittee' => [
                    $expectedComittees[0] => $expectedValues[10],
                    $expectedComittees[1] => $expectedValues[11],
                    $expectedComittees[2] => $expectedValues[12],
                    $expectedComittees[3] => $expectedValues[13],
                    $expectedComittees[4] => $expectedValues[14]
                ]
            ],
            'comittees' => $expectedComittees
        ]]);

        foreach ($expectedValues as $expectedValue) {
            $view->assertSee($expectedValue);
        }

        foreach ($expectedComittees as $expectedComittee) {
            $view->assertSee($expectedComittee);
        }
    }
}
