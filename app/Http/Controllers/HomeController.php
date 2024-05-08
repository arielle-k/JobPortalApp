<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {

        $this->middleware(['auth','verified']);
    }
    public function index()
    {
            if(Auth::id()){
                $role= Auth()->user()->role;
                if($role==='user'){
                    $jobs =Job::orderBy('id', 'asc')->paginate(4);
                    $categories = Category::with('jobs')->get();
                    $companies = Company::get()->random(4);
                   return view('home',compact('jobs','companies','categories')) ;
                }
                else if($role==='admin'){

                    $jobs= Job::all();
                    $companies= Company::all();
                    $users= User::all();
                    return view('admin.dashbord',compact('jobs','companies','users'));

                }
            }
    }

    public function dashbord(){
        $user = auth()->user();
        $candidatures = $user->candidatures;
        return view('dashboard', compact('user', 'candidatures'));
    }
}
