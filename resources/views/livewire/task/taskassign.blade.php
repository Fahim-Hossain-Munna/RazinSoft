<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="row">
        {{-- task create table --}}

            <div class="col-lg-6">
                @if (session()->has('task_assign'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        {{ session('task_assign') }}!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('task_assign_error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-2"></i>
                        {{ session('task_assign_error') }}!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Task Assign Form</h4>

                        <form wire:submit.prevent="taskassign({{ $task->id }})">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Employee's</label>
                                <div class="col-sm-9">
                                    <select class="form-control" data-toggle="select2" wire:model="user_id">
                                        <option value="0">Select</option>
                                        <optgroup label="{{ env('APP_NAME') }}">
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputPassword5" class="col-sm-3 col-form-label">Assign Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="inputPassword5" wire:model="assign_time">
                                    @error('assign_time')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- task create table --}}


        {{-- assign list table --}}

        <div class="col-lg-6">
            @if (session()->has('task_assign_undo'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{ session('task_assign_undo') }}!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title">Assign User Table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    @can('admin')

                                    <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($task_assign as $task)
                                    <tr>
                                        <th scope="row">{{ $loop->index +1 }}</th>
                                        <td>{{ $task->belonguser->name }}</td>
                                        @can('admin')
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model="status" wire:change="undoTask({{ $task->id }})" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                <label class="form-check-label text-secondary" for="flexSwitchCheckChecked">undo</label>
                                            </div>
                                        </td>
                                        @endcan
                                    </tr>

                                @empty

                                <tr>
                                    <td colspan="5" class="text-danger text-center">no task create yet!</td>
                                </tr>

                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div>
            </div> <!-- end card -->
        </div>

    {{-- task assign table --}}

        </div>
</div>
