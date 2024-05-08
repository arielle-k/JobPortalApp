@extends('layouts.main')
@section('title','details company')
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-12 my-5"></div>
    </div>
</div>
   <div class="album text-muted">
     <div class="container">
       <div class="row" id="app">
          <div class="title" style="margin-top: 20px; ">
                <h2></h2>
          </div>
      @if(empty($company->cover_photo))

   <img src="{{ asset('uploads/coverphoto/cover.jpg') }}" style="width:100%;">
   @else
   <img src="{{asset('storage/cover_photos')}}/{{$company->cover_photo}}" style="width: 100%;">

   @endif
          <div class="col-lg-12">
            <div class="p-4 mb-8 bg-white">
			<div class="company-desc">
			@if(empty($company->logo))
			<img width="100" src="{{asset('storage/logo/man.jpg')}}">
			@else
			<img width="100" src="{{asset('storage/logo')}}/{{$company->logo}}">
			@endif

            <p> <span class="text-info">Description:</span>{{$company->description}}</p>
                <h1>{{$company->cname}}</h1>
                <p><span class="text-info">Slogan</span>::{{$company->slogan}}&nbsp;<span class="text-info">Address</span>::{{$company->address}}&nbsp; <span class="text-info">Phone</span>::{{$company->phone}}&nbsp; <span class="text-info">Website</span>::<a href="{{ $company->website }}" target="_blank">View website</a></p>

            </div>

        </div>
        <h2 class="text-center bg-primary text-light my-4">Nos derniere offres d'emplois</h2>
            @if($jobs->isEmpty())
            <p class="h5 bg-danger my-3 text-center p-2">Aucune offre d'emploi n'est disponible pour le moment.</p>
            @else

        <table class="table">

            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td>
                        @if(empty($company->logo))
                            <img width="100" src="{{asset('avatar/man.jpg')}}">
                        @else
                            <img width="100" src="{{asset('storage/logo')}}/{{$company->logo}}">
                         @endif
                    </td>
                    <td>Position:{{$job->position}}
                        <br>
                        <i class="fa fa-clock-o"aria-hidden="true"></i>&nbsp;{{$job->type}}
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address:{{$job->address}}</td>
                    <td><i class="fa fa-globe"aria-hidden="true"></i>&nbsp;Date:{{$job->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('login')}}">
                            <button class="btn btn-success ">Apply</button>
                        </a>
                    </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        @endif

            </div>

          </div>

     </div>
   </div>
@endsection
