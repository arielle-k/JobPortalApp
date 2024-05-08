@extends('admin.layouts.layout')
@section('page_title','Add new job')

@section('title', 'List Jobs - Dashboard')

@section('breadcrumb')

        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.jobs') }}">All Jobs</a></li>

@endsection
@section('content')
     @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create a job</div>
                <div class="card-body">

             <form action="{{route('jobs.store')}}" method="POST" novalidate>
                @csrf

          <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" name="title" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" value="{{old('title')}}">
              @if ($errors->has('title'))
              <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('title')}}</strong>
              </span>
              @endif
          </div>

           <div class="form-group">
              <label for="description">Category:</label>
              <select name="category" class="form-control">
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>

                @endforeach
               </select>
          </div>

           <div class="form-group">
              <label for="role">Role:</label>
              <textarea name="roles" class="form-control {{$errors->has('roles') ? 'is-invalid' : ''}}" >{{old('roles')}}</textarea>
               @if ($errors->has('roles'))
              <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('roles')}}</strong>
              </span>
              @endif

          </div>

           <div class="form-group">
              <label for="description">Description:</label>
              <textarea name="description"  class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}">{{old('description')}}</textarea>
               @if ($errors->has('description'))
              <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('description')}}</strong>
              </span>
              @endif
          </div>

           <div class="form-group">
              <label for="position">Position:</label>
              <input type="text" name="position" class="form-control {{$errors->has('position') ? 'is-invalid' : ''}}" value="{{old('position')}}">
               @if ($errors->has('position'))
              <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('position')}}</strong>
              </span>
              @endif
          </div>

            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" name="address"  class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" value="{{old('address')}}">
               @if ($errors->has('address'))
              <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('address')}}</strong>
              </span>
              @endif

          </div>

         <div class="form-group">
              <label for="type">Salary:</label>
               <select class="form-control" name="salary">
                   <option value="negotiable">Negotiable</option>
                   <option value="2000-5000">2000-5000</option>
                   <option value="5000-10000">5000-10000</option>
                   <option value="10000-20000">10000-20000</option>
                    <option value="30000-500000">30000-500000</option>
                         <option value="500000-600000">500000-500000</option>
                              <option value="600000 plus">600000 plus</option>
               </select>
          </div>
          </div>

            <div class="form-group">
              <label for="type">Type:</label>
               <select class="form-control" name="type">
                   <option value="fulltime">fulltime</option>
                   <option value="parttime">parttime</option>
                   <option value="casual">casual</option>
               </select>
          </div>

          <div class="form-group">
              <label for="status">Status:</label>
               <select class="form-control" name="status">
                   <option value="1">live</option>
                   <option value="0">draft</option>
               </select>
          </div>

           <div class="form-group">
              <label for="lastdate">Last date:</label>
              <input type="date"  name="last_date" class="form-control {{$errors->has('last_date') ? 'is-invalid' : ''}}" value="{{old('last_date')}}">
               @if ($errors->has('last_date'))
              <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('last_date')}}</strong>
              </span>
              @endif

          </div>

           <div class="form-group">
              <button type="submit" class="btn btn-success">Submit</button>
          </div>

          @if(Session::has('status'))
          <div class="alert alert-success">
              {{Session::get('status')}}
          </div>
          @endif

</form>


</div>
</div>

        </div>
    </div>
</div>
@endsection

@push('custom-script')


@endpush
