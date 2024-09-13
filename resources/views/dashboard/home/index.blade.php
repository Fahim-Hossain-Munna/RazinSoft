@extends('layouts.master')

@section('content')

    <!-- start page title -->
    <x-header-title title="Dashboard"></x-header-title>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">All Time</span>
                        <h5 class="card-title mb-0">Total User</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $users->count() }} Person
                            </h2>
                        </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;">
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">Today</span>
                        <h5 class="card-title mb-0">Register User</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $today_logged_users->count() }} Person
                            </h2>
                        </div>
                        {{-- <div class="col-4 text-end">
                            <span class="text-muted">12.5% <i class="mdi mdi-arrow-up text-success"></i></span>
                        </div> --}}
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;">
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div>
    </div>
@endsection
