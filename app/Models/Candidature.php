<?php

namespace App\Models;
use App\Models\Job;
use App\Models\User;
use App\Models\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;
protected $fillable = ['user_id', 'job_id', /* autres attributs si nécessaire */];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
