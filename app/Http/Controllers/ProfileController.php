<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function index()
     {
        $user = auth()->user();
        $candidatures = $user->candidatures;
        return view('profile.index', compact('user', 'candidatures'));
     }

     public function complete()
     {
         return view('profile.complete');
     }

     public function store(Request $request)
    {
         $request->validate([
            'address' => 'required|string',
            'gender' => 'required|in:male,female,other',
            'phone'=>'required',
            'birthdate' => 'required|date',
            'experience' => 'required|integer',
            'bio' => 'required|string',
            'cover_letter' =>  'required|mimes:pdf|max:2048',
            'cv' => 'required|mimes:pdf|max:2048',
            'avatar' => 'required|image|max:2048',
        ]);
        $user_id = auth()->user()->id;


        $file = $request->avatar;
        $avatarName = $file->getClientOriginalName();
        $file->storeAs('avatars', $avatarName);

        $file = $request->cv;
        $cvName = $file->getClientOriginalName();
        $file->storeAs('cv', $cvName);

        $file = $request->cover_letter;
        $coverLetterName = $file->getClientOriginalName();
        $file->storeAs('cover_letters', $coverLetterName);
        Profile::updateOrCreate(
            ['user_id' => $user_id],
            [
                'address' => $request->address,
                'gender' => $request->gender,
                'dob' => $request->birthdate,
                'experience' => $request->experience,
                'bio' => $request->bio,
                'cover_letter' =>$coverLetterName,
                'resume' => $cvName,
                'avatar' => $avatarName,
                'phone' => $request->phone,
            ]
        );
        return redirect()->route('profile.index')->withStatus('merci d\'avoir completer votre profile. vous pouvez a present postuler pour une offre!');
    }


    public function update(Request $request, Profile $profile)
    {
        // Validez les champs du formulaire
        $request->validate([
            'address' => 'required|string',
            'gender' => 'required|in:male,female',
            'birthdate' => 'required|date',
            'experience' => 'required|integer',
            'bio' => 'required|string',
            'cover_letter' => 'nullable|mimes:pdf',
            'resume' => 'nullable|mimes:pdf',
            'avatar' => 'nullable|image',
            'phone' => 'required|min:10',
        ]);
        $profile->address = $request->address;
        $profile->gender = $request->gender;
        $profile->phone = $request->phone;
        $profile->dob = $request->birthdate;
        $profile->experience = $request->experience;
        $profile->bio = $request->bio;

        if ($request->hasFile('cover_letter')) {
            $file = $request->file('cover_letter');
            $coverLetterName = $file->getClientOriginalName();
            $file->storeAs('cover_letters', $coverLetterName);
            $profile->cover_letter = $coverLetterName;
        }

        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $cvName = $file->getClientOriginalName();
            $file->storeAs('cv', $cvName);
            $profile->resume = $cvName;
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $avatarName = $file->getClientOriginalName();
            $file->storeAs('avatars', $avatarName);
            $profile->avatar = $avatarName;
        }
        $profile->save();

        return redirect()->route('profile.index')->with('status', 'Profile modifié avec succès');
    }




    public function edit(Profile $profile)
    {
            return view('profile.edit',['profile'=>$profile]);
    }

    /**
     * Update the user's profile information.
     */


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }







}
