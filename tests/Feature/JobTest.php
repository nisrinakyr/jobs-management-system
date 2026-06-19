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

test('user bisa menyimpan lowongan baru', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->post('/jobs', [
        'title' => 'Software Engineer',
        'description' => 'Lowongan testing',
        'company' => 'Tech Corp'
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('jobs', ['title' => 'Software Engineer']);
});

test('user bisa menghapus lowongan', function () {
    $user = User::factory()->create();
    $job = Job::factory()->create();

    $response = $this->actingAs($user)->delete("/jobs/{$job->id}");

    $response->assertStatus(302);
    $this->assertDatabaseMissing('jobs', ['id' => $job->id]);
});
