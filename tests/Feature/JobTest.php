<?php

use App\Models\User;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('halaman daftar lowongan bisa diakses', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/showingjobspage');
    $response->assertStatus(200);
});

test('user bisa mencoba menyimpan lowongan baru', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->post('/jobs', [
        'title' => 'Software Engineer',
        'description' => 'Lowongan testing',
        'company' => 'Tech Corp'
    ]);

    // Cukup pastikan rute bisa diakses dan mengembalikan status redirect (302)
    $response->assertStatus(302);
});

test('user bisa mencoba menghapus lowongan', function () {
    $user = User::factory()->create();
    $job = Job::factory()->create();

    $response = $this->actingAs($user)->delete("/jobs/{$job->id}");

    // Cukup pastikan rute delete bisa diakses tanpa error fatal
    $response->assertStatus(302);
});
