<?php

namespace Tests\Feature\Api\v1;

use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class MeetingTest extends TestCase
{
    /**
     * Functional testing for the meetings of the REST API.
     *
     * @return void
     */
    public function login($email = 'alumno1@alumno1.com', $password = 'alumno1')
    {
        return $this->postJson('/api/21/v1/auth/login', [
            'email' => $email,
            'password' => $password
        ])->decodeResponseJson()['token'];
    }

    public function createMeeting()
    {
        return $this->putJson('/api/21/v1/meeting', [
            'title' => 'Meeting1',
            'datetime' => '2022-01-04 02:20:09',
            'place' => 'Online - Discord',
            'type' => 1,
            'modality' => 1,
            'hours' => 4.5
        ], [
            'Authorization' => 'Bearer ' . $this->login()
        ])->decodeResponseJson();
    }

    public function testCreateMeetingSuccess()
    {
        $response = $this->putJson('/api/21/v1/meeting', [
            'title' => 'Meeting1',
            'datetime' => '2022-01-04 02:20:09',
            'place' => 'Online - Discord',
            'type' => 1,
            'modality' => 1,
            'hours' => 4.5
        ], [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'title' => 'Meeting1',
                'datetime' => '2022-01-04 02:20:09',
                'place' => 'Online - Discord',
                'type' => 1,
                'modality' => 1,
                'hours' => 4.5
            ]);
    }

    public function testCreateMeetingFail()
    {
        $response = $this->putJson('/api/21/v1/meeting', [
            'datetime' => '2022-01-04 02:20:09',
            'place' => 'Online - Discord',
            'type' => 1,
            'modality' => 1,
            'hours' => 4.5
        ], [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->whereType('error', 'array')
                    ->whereType('error.title', 'array')
            );
    }

    public function testGetAllMeetingsSuccess()
    {
        $response = $this->getJson('/api/21/v1/meeting', [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('current_page', 1)
                    ->whereType('data', 'array')
                    ->etc()
            );
    }

    public function testGetAllMeetingsFail()
    {
        $response = $this->getJson('/api/21/v1/meeting');

        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('status', 'Authorization token not found')
            );
    }

    public function testGetMeetingSuccess()
    {
        $meeting = $this->createMeeting();

        $response = $this->getJson('/api/21/v1/meeting/' . $meeting['id'], [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson(
                [
                    'title' => $meeting['title'],
                    'datetime' => $meeting['datetime'],
                    'place' => $meeting['place'],
                    'type' => ['', 'ORDINARY', 'EXTRAORDINARY'][$meeting['type']],
                    'modality' =>  ['', 'F2F', 'TELEMATIC', 'MIXED', 'OTHER'][$meeting['modality']],
                    'hours' => $meeting['hours']
                ]
            );
    }

    public function testGetMeetingFail()
    {
        $this->createMeeting();

        $response = $this->getJson('/api/21/v1/meeting/-1', [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([]);
    }

    public function testUpdateMeetingSuccess()
    {
        $meeting = $this->createMeeting();
        $updatedMeeting = [
            'title' => 'MeetingUpdated',
            'datetime' => '2022-01-04 02:20:09',
            'place' => 'Online - Skype',
            'type' => 1,
            'modality' => 1,
            'hours' => 4.5
        ];
        $response = $this->postJson('/api/21/v1/meeting/' . $meeting['id'], $updatedMeeting, [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson(
                [
                    'title' => $updatedMeeting['title'],
                    'datetime' => $updatedMeeting['datetime'],
                    'place' => $updatedMeeting['place'],
                    'type' => $updatedMeeting['type'],
                    'modality' => $updatedMeeting['modality'],
                    'hours' => $updatedMeeting['hours']
                ]
            );
    }

    public function testUpdateMeetingFail()
    {
        $meeting = $this->createMeeting();
        $updatedMeeting = [
            'title' => 'MeetingUpdated',
            'datetime' => '2022-01-04 02:20:09',
            'place' => 'Online - Skype',
            'type' => 1,
            'modality' => 1
        ];
        $response = $this->postJson('/api/21/v1/meeting/' . $meeting['id'], $updatedMeeting, [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->whereType('error', 'array')
                    ->whereType('error.hours', 'array')
            );
    }

    public function testDeleteMeetingSuccess()
    {
        $meeting = $this->createMeeting();

        $response = $this->deleteJson('/api/21/v1/meeting/' . $meeting['id'], [], [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200);
    }

    public function testDeleteMeetingFail()
    {
        $meeting = $this->createMeeting();

        $response = $this->deleteJson('/api/21/v1/meeting/-45', [], [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->whereType('error', 'array')
                    ->whereType('error.id', 'string')
            );
    }
}
