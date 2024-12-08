<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RoleAccessTest extends TestCase
{
    use RefreshDatabase;
    

    public function test_guru_can_access_guru_dashboard()
    {
        $guru = User::factory()->create(['role' => 'guru']);
        /** @var \App\Models\User $guru */
        $guru = User::factory()->create(['role' => 'guru']);
        $response = $this->actingAs($guru)->get('/guru/dashboard');
        $response->assertStatus(200); // Guru bisa mengakses
    }

    public function test_siswa_cannot_access_guru_dashboard()
    {
        $siswa = User::factory()->create(['role' => 'siswa']);

        /** @var \App\Models\User $siswa */
        $siswa = User::factory()->create(['role' => 'siswa']);
        $response = $this->actingAs($siswa)->get('/guru/dashboard');
        $response->assertRedirect('/'); // Siswa dialihkan
    }
}

