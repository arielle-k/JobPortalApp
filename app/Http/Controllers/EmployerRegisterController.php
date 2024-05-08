<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Job;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class EmployerRegisterController extends Controller
{

    Public function employerRegister(Request $request){
        $request->validate([
        'name'=>'required',
        'cname'=>'required|string|max:255',
        'email'=>'required|string|email|max:255|unique:users',
        'password'=>'required|string|min:8|confirmed'

]);

        $user = new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
             $user->role='employer';
            $user->save();
  $company = new Company();
            $company->user_id=$user->id;
            $company->cname=$request->cname;
            $company->slug =Str::str($request->cname);
            $company->save();

        return redirect()->back()->with('message','utilisateur creer');
    }
}
