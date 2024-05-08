
@extends('admin.layouts.layout')

@section('page_title','Listes des jobs')

@section('title', 'List Jobs - Dashboard')

@section('breadcrumb')

        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('jobs.create') }}">Add New</a></li>

@endsection

@section('content')
<h1>All jobs</h1>
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
      <th scope="col">Created date</th>
      <th scope="col">Position</th>
        <th scope="col">Company</th>
      <th scope="col">View</th>

       <th scope="col">Action</th>
    </tr>

  </thead>
  <tbody>
  		@foreach($jobs as $job)
    <tr>
      <th scope="row">{{date('Y-m-d',strtotime($job->created_at))}}</th>

      <td>{{$job->position}}</td>
        <td>{{$job->company->cname}}</td>
      <td><a href="{{route('jobs.show',[$job->id,$job->slug])}}" target="_blank">Read</a></td>
      <td>
        <div class="d-flex justify-content-between">
            <a href="{{ route('jobs.edit', $job) }}" class="btn btn-primary mx-2">Edit</a>
            <form action="{{ route('jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
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
        <div class="card-body">
         </div>
 </div>
</div>

{{$jobs->links()}}
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
