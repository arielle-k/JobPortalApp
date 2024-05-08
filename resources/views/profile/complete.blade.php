@extends('layouts.main')
@section('title','complete profile')
@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-md-12 mt-5">
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
    <div class="row my-5">
        <div class="col-md-12 my-5 bg-danger py-3 text-center text-light"> SVP completez votre profil avant de postuler à cette offre d'emploi</div>
        <div class="col-md-12">
            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="mb-3">
                  <label for="address" class="form-label">Adresse</label>
                  <input type="text" class="form-control" id="address" name="address" value="{{ old('adress') }}">
                </div>

                <div class="mb-3">
                  <label for="gender" class="form-label">Genre</label>
                  <select class="form-select" id="gender" name="gender" >
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="address" name="phone" value="{{ old('phone') }}">
                  </div>

                <div class="mb-3">
                  <label for="birthdate" class="form-label">Date de naissance</label>
                  <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate') }} ">
                </div>

                <div class="mb-3">
                  <label for="experience" class="form-label">Nombre d'expérience</label>
                  <input type="number" class="form-control" id="experience" name="experience" value="{{ old('experience') }}" >
                </div>

                <div class="mb-3">
                  <label for="bio" class="form-label">Biographie</label>
                  <textarea class="form-control" id="bio" name="bio" rows="3" >{{ old('bio') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="resume" class="form-label">Lettre de motivation</label>
                    <input type="file" class="form-control" id="cover_letter" name="cover_letter" accept=".pdf" >
                  </div>

                <div class="mb-3">
                  <label for="cv" class="form-label">CV</label>
                  <input type="file" class="form-control" id="cv" name="cv" accept=".pdf" >
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Photo de profile</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" >
                  </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </form>
        </div>
    </div>
</div>
</div>
</div>

@endsection
