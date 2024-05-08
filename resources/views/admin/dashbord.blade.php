@extends('admin.layouts.layout')


@section('title', 'JobPortal - Dashboard')

@section('breadcrumb')

        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>

@endsection

@section('content')

<div class="container">
    <div class="row my-5">
        <div class="col-lg-4">
            <div class="card card-margin">
                <div class="card-header no-border">
                    <h5 class="card-title">Jobs</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="widget-49">
                        <div class="widget-49-title-wrapper">
                            <div class="widget-49-date-primary">
                                <span class="widget-49-date-day">{{ $jobs->count() }}</span>
                            </div>
                            <div class="widget-49-meeting-info">
                            </div>
                        </div>
                        <ol class="widget-49-meeting-points">
                            <li class="widget-49-meeting-item"><span>Add new jobs</span></li>
                            <li class="widget-49-meeting-item"><span>See applicants</span></li>
                            <li class="widget-49-meeting-item"><span>Edit and add new job</span></li>
                        </ol>
                        <div class="widget-49-meeting-action">
                            <a href="{{ route('admin.jobs') }}" class="btn btn-sm btn-flash-border-primary">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-margin">
                <div class="card-header no-border">
                    <h5 class="card-title">Users</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="widget-49">
                        <div class="widget-49-title-wrapper">
                            <div class="widget-49-date-warning">
                                <span class="widget-49-date-day">{{ $users->count() }}</span>
                            </div>
                            <div class="widget-49-meeting-info">
                            </div>
                        </div>
                        <ol class="widget-49-meeting-points">
                            <li class="widget-49-meeting-item"><span>See all users</span></li>
                            <li class="widget-49-meeting-item"><span>Add New user with role</span></li>
                            <li class="widget-49-meeting-item"><span>Edit and delete user</span></li>
                        </ol>
                        <div class="widget-49-meeting-action">
                            <a href="{{ route('admin.users') }}" class="btn btn-sm btn-flash-border-warning">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-margin">
                <div class="card-header no-border">
                    <h5 class="card-title">Companies</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="widget-49">
                        <div class="widget-49-title-wrapper">
                            <div class="widget-49-date-success">
                                <span class="widget-49-date-day">{{ $companies->count() }}</span>
                            </div>
                            <div class="widget-49-meeting-info">
                            </div>
                        </div>
                        <ol class="widget-49-meeting-points">
                            <li class="widget-49-meeting-item"><span>See all company</span></li>
                            <li class="widget-49-meeting-item"><span>Create new company</span></li>
                            <li class="widget-49-meeting-item"><span>Edit and delete all company</span></li>
                        </ol>
                        <div class="widget-49-meeting-action">
                            <a href="{{ route('admin.companies') }}" class="btn btn-sm btn-flash-border-success">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('custom-script')


@endpush
