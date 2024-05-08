@extends('layouts.main')
@section('title','companies')
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-6 my-4">
        </div>
    </div>
</div>
<div class="container">
    <h2 class="text-center text-uppercase py-3">Companies</h2>
    <div class="row">

        @foreach($companies as $company)
        <div class="col-md-3">
            <div class="card" style="width: 100%;">
                @if(empty($company->logo))
                    <img class="card-img-top" src="{{ asset('avatar/man.jpg') }}" style="width: 200px; height: auto;">
                @else
                    <img class="card-img-top image-fluid" src="{{ asset('storage/logo') }}/{{ $company->logo }}" style="width: 100px; height: auto;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $company->cname }}</h5>
                    <a href="{{ route('companies.show', $company->id) }}" class="btn btn-primary">View company</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
{{$companies->links()}}
@endsection
