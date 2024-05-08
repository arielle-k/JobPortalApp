<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(){
        $this->middleware('admin')->except('index','show');

    }
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->paginate(8);
        return view('company.index',['companies'=>$companies]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categries=Category::all();
        return view('company.create',['categories'=>$categries]);
    }

    public function edit(Company $company)
    {

        return view('company.edit',['company'=>$company]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'cname'=>'required|unique:companies|max:20',
                'address'=>'required',
                'phone'=>'required',
                'website'=>'required',
                'logo'=>'required|image|max:2999',
                'cover_photo'=>'sometimes|image|max:3999',
                'slogan'=>'required',
                'description'=>'required',

            ]);

            $file = $request->cover_photo;
            $coverName = $file->getClientOriginalName();
            $file->storeAs('cover_photos', $coverName);

            $file = $request->logo;
            $logoName = $file->getClientOriginalName();
            $file->storeAs('logo', $logoName);

            $company =new Company();
            $company->cname=$request->cname;
            $company->user_id=Auth::id();
            $company->slug = Str::slug($request->cname);
            $company->address=$request->address;
            $company->phone=$request->phone;
            $company->website=$request->website;
            $company->logo=$logoName;
            $company->cover_photo=$coverName;
            $company->slogan=$request->slogan;
            $company->description=$request->description;

            $company->saveOrFail();
           return redirect()->route('admin.companies')->withStatus('company creer avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company )
    {
        $jobs=$company->jobs()->orderByDesc('id')->get();

        return view('company.show',['company'=>$company],['jobs'=>$jobs]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,Company $company)
{
    // Validation des champs du formulaire
    $request->validate([
        'cname'=>'required|unique:companies|max:20',
        'address' => 'required',
        'phone' => 'required',
        'website' => 'required',
        'slogan' => 'required',
        'description' => 'required',
        'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'cover_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
    ]);


    // Mise à jour des informations de l'entreprise
    $company->user_id=Auth::id();
    $company->cname = $request->cname;
    $company->slug = Str::slug($request->cname);
    $company->address = $request->address;
    $company->phone = $request->phone;
    $company->website = $request->website;
    $company->slogan = $request->slogan;
    $company->description = $request->description;

    // Vérification et mise à jour du logo
    if ($request->hasFile('company_logo')) {
        // Suppression de l'ancien logo s'il existe
        if (!empty($company->logo)) {
            Storage::delete($company->logo);
        }

        // Enregistrement du nouveau logo
            $file = $request->logo;
            $logoName = $file->getClientOriginalName();
            $file->storeAs('logo', $logoName);
    }

    if ($request->hasFile('cover_photo')) {
        if (!empty($company->cover_photo)) {
            Storage::delete($company->cover_photo);
        }

        // Enregistrement de la nouvelle photo de couverture
        $file = $request->cover_photo;
        $coverName = $file->getClientOriginalName();
        $file->storeAs('cover_photos', $coverName);

    }
    $company->save();
    return redirect()->route('admin.companies')->with('status', 'Company information updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {

        $company->delete();
        return redirect()->back()->with('status', 'Company deleted successfully.');
    }

}
