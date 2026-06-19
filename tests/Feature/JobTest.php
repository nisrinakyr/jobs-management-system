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

test('user bisa melihat detail lowongan (show)', function () {
    $user = User::factory()->create();
    $job = Job::factory()->create();

    $response = $this->actingAs($user)->get("/jobs/{$job->id}");

    // assertSuccessful mentoleransi status 200 OK
    $response->assertSuccessful();
});

test('user bisa membuka halaman edit lowongan', function () {
    $user = User::factory()->create();
    $job = Job::factory()->create();

    $response = $this->actingAs($user)->get("/jobs/{$job->id}/edit");
    $response->assertSuccessful();
});

test('user bisa mencoba menyimpan lowongan baru (store)', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->post('/jobs', [
        'title' => 'Software Engineer',
        'description' => 'Lowongan testing',
        'company' => 'Tech Corp'
    ]);

    $response->assertStatus(302);
});

test('user bisa mencoba mengubah lowongan (update)', function () {
    $user = User::factory()->create();
    $job = Job::factory()->create();

    $response = $this->actingAs($user)->put("/jobs/{$job->id}", [
        'title' => 'Updated Title',
        'description' => 'Updated description',
        'company' => 'Updated Company'
    ]);

    $response->assertStatus(302);
});

test('user bisa mencoba menghapus lowongan (destroy)', function () {
    $user = User::factory()->create();
    $job = Job::factory()->create();

    $response = $this->actingAs($user)->delete("/jobs/{$job->id}");
    $response->assertStatus(302);
});
