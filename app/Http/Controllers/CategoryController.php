<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
public function index($id){
    $jobs = Job::where('category_id',$id)->paginate(20);
    $category=Category::findOrFail($id);
    //dd($jobs);
    return view('jobs.jobs-category',compact('jobs','category'));
}
}
