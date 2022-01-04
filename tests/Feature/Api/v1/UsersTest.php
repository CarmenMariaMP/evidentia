<?php

namespace Tests\Feature\Api\v1;

use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class CommitteeTest extends TestCase
{
    /**
     * Functional testing for the users of the REST API.
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

    public function createUser()
    {
        return $this->putJson('/api/21/v1/user', [
            'surname' => 'alum',
            'name' => 'alum',
            'username' => 'alumno3',
            'password' => 'alumno3',
            'email' => 'alumno3@alum.us.es',
            'block' => 'alumno3',
            'biography' => 'alumno3',
            'clean_name' => 'alum',
            'clean_surname' => 'alum'
        ], [
            'Authorization' => 'Bearer ' . $this->login()
        ])->decodeResponseJson();
    }
    public function testCreateUserSuccess()
    {
        $response = $this->putJson('/api/21/v1/user', [
            'surname' => 'alum',
            'name' => 'alum',
            'username' => 'alumno3',
            'password' => 'alumno3',
            'email' => 'alumno3@alum.us.es',
            'block' => 'alumno3',
            'biography' => 'alumno3',
            'clean_name' => 'alum',
            'clean_surname' => 'alum'
        ], [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
            'surname' => 'alum',
            'name' => 'alum',
            'username' => 'alumno3',
            'password' => 'alumno3',
            'email' => 'alumno3@alum.us.es',
            'block' => 'alumno3',
            'biography' => 'alumno3',
            'clean_name' => 'alum',
            'clean_surname' => 'alum'
            ]);
    }
    public function testCreateUserFail()
    {
        $response = $this->putJson('/api/21/v1/user', [
            'surname' => 'alum',
            'username' => 'alumno3',
            'password' => 'alumno3',
            'email' => 'alumno3@alum.us.es',
            'block' => 'alumno3',
            'biography' => 'alumno3',
            'clean_name' => 'alum',
            'clean_surname' => 'alum'
        ], [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->whereType('error', 'array')
                    ->whereType('error.name', 'array')
            );
    }


    public function testGetAllUsersSuccess()
    {
        $response = $this->getJson('/api/21/v1/user', [
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

    public function testGetAllUsersFail()
    {
        $response = $this->getJson('/api/21/v1/user');

        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('status', 'Authorization token not found')
            );
    }



    public function testGetUserSuccess()
    {
        $user = $this->createUser();

        $response = $this->getJson('/api/21/v1/user/' . $user['id'], [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson(
                [

                    'surname' => $user['surname'],
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'password' => $user['password'],
                    'email' => $user['email'],
                    'block' => $user['block'],
                    'biography' => $user['biography'],
                    'clean_name' => $user['clean_name'],
                    'clean_surname' => $user['clean_surname'],

                ]
            );
    }

    public function testGetUserFail()
    {
        $this->testCreateUserSuccess();

        $response = $this->getJson('/api/21/v1/user/-1', [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([]);
    }

    public function testUpdateUserSuccess()
    {
        $user = $this->createUser();
        $updatedUser = [
            'surname' => 'alumno',
            'name' => 'alumno',
            'username' => 'alumnoupdate',
            'password' => 'alumnoalumno',
            'email' => 'alumno@alum.us.es',
            'block' => 'alumno',
            'biography' => 'alumno',
            'clean_name' => 'alumno',
            'clean_surname' => 'alumno'
        ];
        $response = $this->postJson('/api/21/v1/user/' . $user['id'], $updatedUser, [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson(
                [
                    'surname' => $user['surname'],
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'password' => $user['password'],
                    'email' => $user['email'],
                    'block' => $user['block'],
                    'biography' => $user['biography'],
                    'clean_name' => $user['clean_name'],
                    'clean_surname' => $user['clean_surname'],
                ]
            );
    }

    public function testUpdateUserFail()
    {
        $user = $this->createUser();
        $updatedUser = [
            'surname' => 'alumno',
            'name' => 'alumno',
            'username' => 'alumnoupdate',
            'password' => 'alumnoalumno',
            'block' => 'alumno',
            'biography' => 'alumno',
            'clean_name' => 'alumno',
            'clean_surname' => 'alumno'
        ];
        $response = $this->postJson('/api/21/v1/user/' . $user['id'], $updatedUser, [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->whereType('error', 'array')
                    ->whereType('error.email', 'array')
            );
    }


    public function testDeleteUserSuccess()
    {
        $user = $this->createUser();

        $response = $this->deleteJson('/api/21/v1/user/' . $user['id'], [], [
            'Authorization' => 'Bearer ' . $this->login()
        ]);

        $response
            ->assertStatus(200);
    }



    public function testDeleteUserFail()
    {
        $user = $this->createUser();

        $response = $this->deleteJson('/api/21/v1/user/-45', [], [
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





