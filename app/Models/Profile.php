<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidature;

class Profile extends Model
{
    protected $guarded =[];
    use HasFactory;

    public function candidatures()
{
    return $this->hasMany(Candidature::class);
}
}
