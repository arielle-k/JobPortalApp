@extends('layouts.main')
@section('title','my profile')
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-12 my-5">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        </div>
    </div>
</div>
<div class="container">
    <div class="row mb-5">
        <div class="col-md-12 mb-5">
            <div class="card ">
                @if (empty(Auth::user()->profile))
                        <p class="py-4 text-center bg-secondary text-light">Votre profil est incomplet. Veuillez le compléter en <a href="{{ route('profile.complete') }}">cliquant ici</a>.</p>
                @else
                <div class="card-header">Your Information</div>
                <div class="card-body">
                <p>Name:{{Auth::user()->name}}</p>
                <p>Email:{{Auth::user()->email}}</p>
                <p>Email:{{Auth::user()->profile->address}}</p>
                <p>Phone number:{{Auth::user()->profile->phone}}
                <p>Gender:{{Auth::user()->profile->gender}}</p>
                <p>Experience:{{Auth::user()->profile->experience}}</p>
                <p>Bio:{{Auth::user()->profile->bio}}</p>
                 <p>Member on:{{date('F d Y',strtotime(Auth::user()->profile->created_at))}}</p>

                 @if(!empty(Auth::user()->profile->cover_letter))
                 <p><a href="{{ asset('storage/cover_letters/'.Auth::user()->profile->cover_letter) }}" target="_blank">Lettre de motivation</a></p>
                 @else
                 <p>Please Upload Cover letter</p>
                 @endif


                 @if(!empty(Auth::user()->profile->resume))
                 <p><a href="{{ asset('storage/cv/'.Auth::user()->profile->resume) }}" target="_blank">CV </a></p>
                 @else
                 <p>Please Upload resume</p>
                 @endif

             </div>
             <a href="{{ route('profile.edit',Auth::user()->profile) }}" class="nav-link my-3 btn btn-warning">Update my profile</a>
            </div>
            @endif
            <br>

 @endsection

