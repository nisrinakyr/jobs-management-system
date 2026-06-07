<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            // Nambahin kolom work_mode dengan nilai default on-site
            $table->enum('work_mode', ['on-site', 'hybrid', 'remote'])->default('on-site')->after('location');
        });
    }

    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->dropColumn('work_mode');
        });
    }
};
