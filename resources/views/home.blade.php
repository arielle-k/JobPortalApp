@extends('layouts.main')
@section('title','home')
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md my-3 mt-4">
            <h3 class="bg-info text-center text-uppercase mt-3 py-3">Voici les dernieres offres d'emploi depuis votre deniere visite</h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            @if(Auth::user()->role=='user')
            @foreach($jobs as $job)
            <div class="card">
                <div class="card-header">{{$job->title}}</div>
                <small style="width:200px;" class="badge badge-primary">{{$job->position}}</small>
                <div class="card-body">
                   {{$job->description}}
               </div>
               <div class="card-footer">
            <span><a href="{{route('jobs.show',$job->id)}}">Read</a></span>
            <span class="float-right">Last date:{{$job->created_at->diffForHumans()}}</span>
               </div>
            </div><br>
            @endforeach
            @endif
        </div>
    </div>
    {{$jobs->links()}}
</div>

@endsection
