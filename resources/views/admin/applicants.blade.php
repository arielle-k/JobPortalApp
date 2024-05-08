@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @foreach($applicants as $applicant)
                <div class="card-header"><a href="{{route('jobs.show',$applicant->id)}}">{{ $applicant->job->title }}</a></div>

                <div class="card-body">
                 <table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Addresse</th>
      <th>Gender</th>
      <th>Bio</th>
      <th>COVER LETTER:</th>
      <th>Resume:</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>Name: {{ $applicant->user->name }}</td>
        <td>Email: {{ $applicant->user->email }}</td>
        @if ($applicant->user->profile)
            <td>Address: {{ $applicant->user->profile->address }}</td>
            <td>Gender: {{ $applicant->user->profile->gender }}</td>
            <td>Bio: {{ $applicant->user->profile->bio }}</td>
            <td><a href="{{ asset('storage/cover_letters/'.$applicant->user->profile->cover_letter) }}" target="_blank">Cover letter</a></td>
            <td><a href="{{ asset('storage/CV/'.$applicant->user->profile->resume) }}" target="_blank">Resume</a></td>

        @else
            <td colspan="3">Profile not available</td>
        @endif

    </tr>
  </tbody>
        </table>
              </div>
              @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
