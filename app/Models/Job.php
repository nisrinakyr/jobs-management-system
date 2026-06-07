<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Tell Laravel the actual table name
    protected $table = 'job_listings';

    protected $fillable = [
        'title',
        'description',
        'location',
        'work_mode',
        'currency',
        'salary',
        'employment_type',
        'experience_level',
    ];
}
