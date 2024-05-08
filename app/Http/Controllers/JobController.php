<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use App\Models\Company;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $jobs = Job::latest()->limit(10)->where('status',1)->get();
        $categories = Category::with('jobs')->get();
        $companies = Company::get()->random(4);
       return view('welcome',compact('jobs','companies','categories')) ;
    }

    public function alljobs(){

        $jobs=Job::orderby('id','desc')->paginate(6);
            $categories=Category::all();
            return view('jobs.alljobs', compact('jobs','categories'));

    }


    //recuperer tous ceux qui ont postuler aux differents jobs
    public function applicants()
    {
        $applicants = Candidature::all();
        return view('jobs.applicants', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
       return view('jobs.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:5',
            'description'=>'required',
            'roles'=>'required',
            'category'=>'required',
            'position'=>'required',
            'address'=>'required',
            'type'=>'required',
            'last_date'=>'required',
            'salary'=>'required'
        ]);

        $user_id=Auth::id();
    	$company = Company::where('user_id',$user_id)->first();
    	$company_id = $company->id;
    	Job::create([
    		'user_id'=>$user_id,
    		'company_id'=>$company_id,
    		'title'=>$request->title,
    		'slug' =>Str::slug($request->title),
    		'description'=>$request->description,
    		'roles'=>$request->roles,
    		'category_id'=>$request->category,
    		'position'=>$request->position,
    		'address'=>$request->address,
    		'type'=>$request->type,
    		'status'=>$request->status,
            'salary'=>$request->salary,
    		'last_date'=>$request->last_date


    	]);

    	return redirect()->route('admin.jobs')->with('status','Job posted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {

    	return view('jobs.show',compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $categories=Category::all();
     	return view('jobs.edit',['job'=>$job],['categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {


        $request->validate([
            'title'=>'required|min:5',
            'description'=>'required',
            'roles'=>'required',
            'category_id'=>'required',
            'position'=>'required',
            'address'=>'required',
            'type'=>'required',
            'last_date'=>'required',
            'salary'=>'required'

        ]);
        $job->user_id=Auth::id();
        $job->company_id=Auth::user()->company->id;
        $job->title=$request->title;
        $job->slug=Str::slug($request->title);
        $job->description=$request->description;
        $job->roles=$request->roles;
        $job->category_id=$request->category_id;
        $job->position=$request->position;
        $job->address=$request->address;
        $job->type=$request->type;
        $job->status=$request->status;
        $job->salary=$request->salary;
        $job->last_date=$request->last_date;
        $job->save();
        return redirect()->route('admin.jobs')->withStatus('Job modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->back()->with('status', 'Job deleted successfully.');
    }

    public function search(Request $request)
    {

        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $type = $request->input('type');

        $jobs = Job::query();

        if ($keyword)
            {
                $jobs->where(function (Builder $query) use ($keyword) {
                    $query->where('position', 'like', '%'.$keyword.'%');
                });
            }

        if ($category)
             {
                $jobs->orWhere('category_id', $category);
            }

        if ($type)
            {
                $jobs->orWhere('type', $type);
            }

         $jobs = $jobs->paginate(10);

        $categories=Category::all();
        return view('jobs.alljobs', compact('jobs','categories'));
    }


    public function application($jobId)
    {
        //dd($jobId);

        $user = auth()->user();
        $user_id=Auth::user()->id;

        if ($user->profile) {
            if ($user->candidatures()->where('job_id', $jobId)->exists()) {
                return redirect()->route('jobs.show', ['job'=>$jobId])->with('error', 'Vous avez déjà postulé à cette offre d\'emploi.');
            } else {
                // Créez une nouvelle candidature
                 $user->candidatures()->create([
                    'user_id'=>$user_id,
                    'job_id' =>$jobId,

                ]);

                return view('jobs.confirmation');
            }
        } else {
            return redirect()->route('profile.complete');
        }
    }




}
