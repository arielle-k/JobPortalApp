@extends('admin.layouts.layout')
@section('page_title','Create company')

@section('title', 'Admin - Dashboard')

@section('breadcrumb')

        <li class="breadcrumb-item"><a href="{{ route('admin.companies') }}">AllCompanies</a></li>
        <li class="breadcrumb-item active">Dashboard</li>

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
  <div class="account-layout border">
    <div class=" bg-primary text-white border-5 text-center py-3">
         Create Company
    </div>
    <div class="account-bdy p-3">
     <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-group">
            <div class="py-3">
              <p>Company Name</p>
            </div>
            <input type="text" placeholder="Company name" class="form-control @error('cname') is-invalid @enderror" name="cname" value="{{ old('name') }}" >
              @error('cname')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
        <div class="pb-3">
          <div class="py-3">
            <p>Company logo</p>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="" name="logo" >
            <label class="custom-file-label" for="validatedCustomFile">Choose logo</label>
            @error('logo')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="py-3">
            <p>Company Address</p>
          </div>
          <input type="text" placeholder="Company Adresse" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" >
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="py-3">
            <p>Company Phone</p>
          </div>
          <input type="text" placeholder="Company phone" class="form-control @error('number') is-invalid @enderror" name="phone" value="{{ old('phone') }}" >
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
          <div class="py-3">
            <p>Company Website Url</p>
            <p class="text-primary">For example : https://www.examplecompany.com</p>
          </div>
          <input type="text" placeholder="Company Website" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website')}}" required>
            @error('website')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="pb-3">
          <div class="py-3">
            <p>Company banner/cover</p>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="cover_photo" >
            <label class="custom-file-label">Choose cover img...</label>
            @error('cover_img')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="pt-2">
          <p class="mt-3 alert alert-primary">Provide a short paragraph description about your company</p>
        </div>
        <div class="form-group">
          <textarea class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="pt-2">
            <p class="mt-3 alert alert-primary">Provide a slogan about your company</p>
          </div>
          <div class="form-group">
            <textarea class="form-control @error('slogan') is-invalid @enderror" name="slogan" required>{{ old('slogan') }}</textarea>
              @error('slogan')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

        <div class="line-divider"></div>
        <div class="my-4 ">
          <button type="submit" class="btn primary-btn bg-primary">Create company</button>
          <a href="" class="btn primary-outline-btn">Cancel</a>
        </div>
      </form>
    </div>
  </div>

</div>
@endsection

@push('custom-script')


@endpush
