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

    <div class="row">

        {{-- employee list --}}

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Total Employee</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-striped table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Employee #ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Joining Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee)
                                    <tr>
                                        <td>
                                            {{ substr(encrypt($employee->id),0,5) }}
                                        </td>
                                        <td class="table-user">
                                            <img src="{{ Avatar::create($employee->name)->toBase64() }}" alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                            <a href="javascript:void(0);" class="text-body font-weight-semibold">{{ $employee->name }}</a>
                                        </td>

                                        <td>
                                            {{ $employee->email }}
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($employee->created_at)->format('d M ,Y') }}
                                        </td>
                                    </tr>

                                @empty
                                <tr>
                                    <td colspan="4" class="text-danger text-center">no emplyee join yet!</td>
                                </tr>

                                @endforelse

                            </tbody>
                        </table>
                        {{ $employees->links() }}
                    </div>

                </div>
                <!--end card body-->

            </div>
            <!--end card-->
        </div>

        {{-- employee task --}}

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pending Task</h4>
                    <div class="table-responsive">
                        <table class="table table-centered table-striped table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Task Title</th>
                                    <th>Assign Date</th>
                                    <th>Expire Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tasksAssign as $task)
                                    <tr>
                                        <td class="table-user">
                                            <img src="{{ Avatar::create($task->belonguser->name)->toBase64() }}" alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                            <a href="javascript:void(0);" class="text-body font-weight-semibold">{{ $task->belonguser->name }}</a>
                                        </td>
                                        <td>
                                           {{ $task->belongtask->title }}
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($task->belongtask->assign_date)->format('d M ,Y') }}
                                        </td>
                                        <td>
                                            @php
                                                $expireDate = Carbon\Carbon::parse($task->belongtask->expire_date);
                                                $currentDate = Carbon\Carbon::now();
                                            @endphp
                                            @if ($currentDate->greaterThan($expireDate))
                                            <span class="text-danger">{{ $expireDate->format('d M, Y')  }}</span>
                                            @else
                                            <span class="text-success">{{ $expireDate->format('d M, Y')  }}</span>
                                            @endif
                                            {{-- @if (Carbon\Carbon::parse($task->belongtask->expire_date)->format('d M ,Y') !== )

                                            @endif
                                            {{ Carbon\Carbon::parse($task->belongtask->expire_date)->format('d M ,Y') }} --}}
                                        </td>
                                    </tr>

                                @empty
                                <tr>
                                    <td colspan="4" class="text-danger text-center">no emplyee join yet!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $tasksAssign->links() }}
                    </div>

                </div>
                <!--end card body-->

            </div>
            <!--end card-->
        </div>


    </div>
@endsection
