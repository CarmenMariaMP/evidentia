<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\User;

class DashboardUsersTest extends TestCase
{
    public function test_dashboard_users_view()
    {
        $user1=['surname1', 'name1', 'username1', 'password1', 'email1', 'block1', 'biography1', 'clean_name1', 'clean_surname1'];
        $user2=['surname2', 'name2', 'username2', 'password2', 'email2', 'block2', 'biography2', 'clean_name2', 'clean_surname2'];
        $user3=['surname3', 'name3', 'username3', 'password3', 'email3', 'block3', 'biography3', 'clean_name3', 'clean_surname3'];

        $expectedParticipations = ['Organización', 'Intermedio', 'Asistencia'];
        $users_collection_1=collect();
        $users_collection_1->push($user1);
        $users_collection_2=collect();
        $users_collection_2->push($user2);
        $users_collection_3=collect();
        $users_collection_3->push($user3);
        $expectedUsersCollections = [$users_collection_1, $users_collection_2, $users_collection_3];
        $studentUserCount = 3;

        $view = $this->view('dashboard.users', ['users' => [
            'student_users_count' => $studentUserCount,
            'participations' => $expectedUsersCollections
        ]]);


        $view->assertSee($studentUserCount);

        foreach ($expectedParticipations as $expectedParticipation) {
            $view->assertSee($expectedParticipation);
        }
    }
}
