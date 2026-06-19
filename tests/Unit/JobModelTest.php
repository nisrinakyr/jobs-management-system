<?php

use App\Models\Job;

test('model job dapat diinisialisasi dan mengecek fillable', function () {
    $job = new Job();

    // Mengecek apakah file model benar-benar ada dan bisa dipanggil
    expect($job)->toBeInstanceOf(Job::class);

    // Mengecek apakah pengaturan array fillable di dalamnya terbaca
    expect($job->getFillable())->toBeArray();
});
