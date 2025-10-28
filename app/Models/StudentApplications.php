<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentApplications extends Model
{
    protected $fillable = [
        'first_name','last_name','dob','gender','previous_school','class_applying_for',
        'guardian_name','guardian_phone','guardian_email','address','status','google_synced_at'
    ];

    protected $casts = [
        'dob' => 'date',
        'google_synced_at' => 'datetime',
    ];
}
