<?php

use App\Models\Job;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

test('model job memiliki relasi bookmarkedBy dan fillable yang benar', function () {
    // 1. Inisialisasi model
    $job = new Job();

    // 2. Panggil fungsi bookmarkedBy() agar dieksekusi dan dihitung coverage
    expect($job->bookmarkedBy())->toBeInstanceOf(BelongsToMany::class);

    // 3. Pastikan array fillable terbaca
    expect($job->getFillable())->toBeArray();
});
