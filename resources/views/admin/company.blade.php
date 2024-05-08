@extends('admin.layouts.layout')

@section('page_title','Listes des companies')

@section('title', 'List Companies - Dashboard')

@section('breadcrumb')

        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>

@endsection
@section('content')
@foreach ($errors as $error)
    <div class="alert alert-danger my-3">
        {{ $error}}
    </div>
@endforeach

<h1>All Companies</h1>
	@if(Session::has('status'))
	      <div class="alert alert-success">{{Session::get('status')}}</div>
	@endif
	<div class="row">
 <div class="col-md-12">
 <div class="card">
        <div class="card-header">

		<table class="table">
  <thead class="thead-dark">

    <tr>
    <th  scope="col">Logo</th>
      <th scope="col">Company name</th>
      <th scope="col">address</th>
      <th scope="col">Phone</th>
      <th scope="col">Description</th>
      <th scope="col">Website</th>
      <th scope="col">Action</th>

       <th scope="col"></th>
    </tr>

  </thead>
  <tbody>
  		@foreach($companies as $company)
    <tr>
        <td><img src="{{asset('storage/logo')}}/{{$company->logo}}" alt="Image" class="img-fluid mx-auto"></td>
        <td>{{$company->cname}}</td>
        <td>{{$company->address}}</td>
        <td>{{$company->phone}}</td>
        <td>{{$company->description}}</td>
        <td><a href="{{ $company->website }}" target="_blank">View website</a></td>
        <td>
            <div class="d-flex justify-content-between">
                <a href="{{ route('companies.edit', $company) }}" class="btn btn-primary mx-2">Edit</a>
                <form action="{{ route('companies.destroy', $company) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </td>
    </tr>
      @endforeach

  </tbody>
</table>


     </div>
 </div>
</div>
{{$companies->links()}}
</div>
</div>

@endsection

@push('custom-script')

<script>
    function confirmDelete(event, formId) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete?')) {
            document.getElementById(formId).submit();
        }
    }
</script>
@endpush
