<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Company;
use App\Models\Category;


class Job extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function company(){
    	return $this->belongsTo(Company::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }


}
