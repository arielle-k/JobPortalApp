@extends('admin.layouts.layout')

@section('page_title','Listes des utilisateurs')

@section('title', 'List Users - Dashboard')

@section('breadcrumb')

        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item"><a href="">Add New User</a></li>

@endsection
@section('content')
@if (session('status'))
    <div class="alert alert-success my-3">
         {{ session('status') }}
    </div>
 @endif
@foreach ($errors as $error)
    <div class="alert alert-danger my-3">
        {{ $error}}
    </div>
@endforeach

<h1>All Users</h1>
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
    <th  scope="col">Nom</th>
      <th scope="col">Adresse email</th>
      <th scope="col">Role</th>
      <th scope="col">Mot de passe</th>
      <th scope="col">Creer le</th>
      <th scope="col">Action</th>
    </tr>

  </thead>
  <tbody>
  		@foreach($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role}}</td>
        <td>{{$user->password}}</td>
        <td>{{$user->created_at}}</td>
        <td>
            <div class="d-flex justify-content-between">
                <a href="" class="btn btn-primary mx-2">Edit</a>
                <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
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
{{$users->links()}}
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
