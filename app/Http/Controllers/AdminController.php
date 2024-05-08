<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Candidature;
use App\Models\Company;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashbord');
    }

    public function getAllJobs(){
        $jobs = Job::latest()->paginate(6);
        return view('admin.job',compact('jobs'));
    }


    //recuperer tous ceux qui ont postuler aux differents jobs
    public function applicants()
    {
        $applicants = Candidature::all();
        return view('admin.applicants', compact('applicants'));
    }

    public function getAllCompany()
    {
    	$companies = Company::latest()->paginate(6);
        return view('admin.company',compact('companies'));
    }

    public function getAllUsers()
    {
        $users = User::latest()->paginate(6);
        return view('admin.user',['users'=>$users]);
    }

    public function home()
    {
        $jobs= Job::all();
        $companies= Company::all();
        $users= User::all();
        return view('admin.dashbord',compact('jobs','companies','users'));
    }


}
