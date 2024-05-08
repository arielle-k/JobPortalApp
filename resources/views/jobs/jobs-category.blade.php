@extends('layouts.main')
@section('title','jobs by category')
@section('content')

<div class="container mt-5">
    <div class="row  mt-5">
        <div class="col-md-12 my-5">
            <h2 class="text-uppercase fw-bold text-center">{{ $category->name }}</h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <table class="table">
       <thead>
           <th>Logo of company</th>
           <th>Position And Type</th>
           <th>Adresse</th>
           <th>Date</th>
           <th>Action</th>

       </thead>
       <tbody>

        @foreach($jobs as $job)
        <tr>
            <td><img src="{{asset('storage/logo')}}/{{$job->company->logo}}" width="80"></td>
            <td>Position:{{$job->position}}
             <br>
             <i class="fa fa-clock-o" aria-hidden="true">
              </i>&nbsp;Fulltime


            </td>
            <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Adress:{{$job->address}}</td>
            <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Date:{{$job->created_at->diffForHumans()}}</td>
            <td>
             <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                <button class="btn btn-success btn-sm">Apply</button>
             </a>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>
    {{$jobs->links()}}
    </div>


</div>


@endsection
<style>
    .fa{
        color:#4183D7;
    }

 </style>




