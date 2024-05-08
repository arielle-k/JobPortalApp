@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row my-5">
        <div class="col-md-12 my-4">
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
<div class="col-md-6 offset-3">
    <div class="card">
    <div class="card-header">Update Your Profile</div>

    <form action="{{route('profile.update',$profile) }}" method="POST">
        @method('PUT')
        @csrf
    <div class="card-body">
        <div class="form-group">
         <label for="">Address</label>
         <input type="text" class="form-control" name="address" value="{{$profile->address }}">
    </div>
    <div class="card-body">
        <div class="form-group">
         <label for="">gender</label>
         <select class="form-select" id="gender" name="gender" required>
            <option value="male" {{ $profile->gender === 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $profile->gender === 'female' ? 'selected' : '' }}>Female</option>
        </select>

       </div>
        <div class="form-group">
         <label for="">Phone number</label>
         <input type="text" class="form-control" name="phone" value="{{$profile->phone}}">
        </div>
      <div class="form-group">
        <label for="birthdate" class="form-label">Date de naissance</label>
        <input type="date" class="form-control" id="birthdate" name="birthdate" value={{ $profile->dob }}>
      </div>
       <div class="form-group">
         <label for="">Experience</label>
         <input type="number" name="experience"class="form-control" value={{$profile->experience}}>
        </div>

        </div>

        <div class="form-group">
            <label for="">Bio</label>
            <textarea name="bio"class="form-control">
                {{$profile->bio}}
            </textarea>
        </div>

        <div class="form-group">
                <label for="resume" class="form-label">Lettre de motivation</label>
                <input type="file" class="form-control" id="cover_letter" name="cover_letter" accept=".pdf"value={{ $profile->cover_letter }}  >

        </div>
            <div class="form-group">
                <label for="resume" class="form-label">resume</label>
                <input type="file" class="form-control" id="cover_letter" name="resume" accept=".pdf"value={{ $profile->resume }}  >
            </div>
            <div class="card-body">
                <div class="form-group">
                 <label for="">Avatar</label>

                 <img src="{{asset('storage/avatars')}}/{{Auth::user()->profile->avatar}}"width="50" style="width:100%;" class="image-fluid">

            </div>
            <div class="card-body">
                <input type="file" class="form-control" name="avatar"><br>
             </div>
         <div class="form-group">
         <button class="btn btn-success" type="submit">Update</button>

        </div>
    </form>
     </div>
</div>

</div>
@endsection
