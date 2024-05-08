@extends('layouts.main')
@section('title','details job')
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
   <div class="album text-muted">
     <div class="container">

       <div class="row mt-6" id="app">
            <img src="{{asset('hero-job-image.jpg')}}" style="width: 100%;">

          <div class="col-lg-8">


            <div class="p-4 mb-8 bg-white">
              <!-- icon-book mr-3-->
                <div class="title" style="margin-top: 20px;">
                    <h2 class="text-center fw-bold my-5">{{$job->title}}</h2>
                </div>
              <h3 class="h5 text-black mb-3"><i class="fa fa-book" style="color: blue;">&nbsp;</i>Description <a href="#"data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-envelope-square" style="font-size: 34px;float:right;color:green;"></i></a></h3>
              <p> {{$job->description}}.</p>


            </div>
            <div class="p-4 mb-8 bg-white">
              <!--icon-align-left mr-3-->
              <h3 class="h5 text-black mb-3"><i class="fa fa-user" style="color: blue;">&nbsp;</i>Roles and Responsibilities</h3>
              <p>{{$job->roles}} .</p>

            </div>
            <div class="p-4 mb-8 bg-white">
              <h3 class="h5 text-black mb-3"><i class="fa fa-venus-mars" style="color: blue;">&nbsp;</i>Position</h3>
              <p>{{$job->position}} </p>

            </div>
            <div class="p-4 mb-8 bg-white">
              <h3 class="h5 text-black mb-3"><i class="fa fa-dollar" style="color: blue;">&nbsp;</i>Salary</h3>
              <p>{{$job->salary}}</p>
            </div>

          </div>


            <div class="col-md-4 p-4 site-section bg-light">
              <h3 class="h5 text-black mb-3 text-center">Short Info</h3>
                  <p>Company name:{{$job->company->cname}}</p>
                <p>Address:{{$job->address}}</p>
                <p>Employment Type:{{$job->type}}</p>
                <p>Position:{{$job->position}}</p>
                <p>Posted:{{$job->created_at->diffForHumans()}}</p>
                <p>Last date to apply:{{ date('F d, Y', strtotime($job->last_date)) }}</p>
              <p><a href="{{route('companies.show',$job->company->id)}}" class="btn btn-warning" style="width: 100%;">Visit Company Page</a></p>
            @auth()
            <p><a href="{{ route('job.applications',$job->id) }}" class="btn btn-primary" style="width: 100%;">Apply for this job</a></p>
            <p><a href="" class="btn btn-dark" style="width: 100%;" data-toggle="modal" data-target="#exampleModal1">Share</a></p>
            @endauth
            @guest()
            <p><a href="{{ route('login') }}" class="btn btn-danger" style="width: 100%;">Please login before apply</a></p>
            @endguest





</div>





<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sent job to your friend</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">@csrf
      <div class="modal-body">
      	<input type="hidden" name="job_id" value="{{$job->id}}">
      	<input type="hidden" name="job_slug" value="{{$job->slug}}">
       <div class="form-group">
        <label>Your name *</label>
        <input type="text" name="your_name" class="form-control" required="">
      </div>
      <div class="form-group">
        <label>Your email *</label>
        <input type="email" name="your_email" class="form-control" required="">
      </div>
      <div class="form-group">
        <label>Friend name *</label>
        <input type="text" name="friend_name" class="form-control" required="">
      </div>
      <div class="form-group">
        <label>Friend email *</label>
        <input type="email" name="friend_email" class="form-control" required="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Mail this job</button>
      </div>
  </form>
    </div>
  </div>
</div>

</div>

</div>
</div>
</div>

<script src="{‌{ asset('js/app.js') }}"></script>

@endsection
