<?php

use App\Models\User;

test('halaman daftar lowongan bisa diakses dengan aman', function () {
    // 1. Bikin 1 user dummy agar melewati proteksi login (jika ada)
    $user = User::factory()->create();

    // 2. Akses halamannya menggunakan rute asli dari web.php kamu
    $response = $this->actingAs($user)->get('/showingjobspage');

    // 3. Pastikan halamannya merespons dengan sukses (HTTP 200 OK)
    $response->assertStatus(200);
});
