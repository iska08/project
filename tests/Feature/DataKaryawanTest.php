<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateKaryawan()
    {
        $response = $this->get('/karyawan/create');

        $response->assertStatus(302);
    }

    public function testReadKaryawan()
    {
        $response = $this->get('/karyawan/{id}');

        $response->assertStatus(302);
    }

    public function testUploadKaryawan()
    {
        $response = $this->get('/karyawan/{id}/edit');

        $response->assertStatus(302);
    }

    public function testDeleteKaryawan()
    {
        $response = $this->get('/karyawan');

        $response->assertStatus(302);
    }
}
