<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="row">
        {{-- task create form --}}

            <div class="col-lg-4">
                @if (session()->has('permission_update'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        {{ session('permission_update') }}!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('permission_update_error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-2"></i>
                        {{ session('permission_update_error') }}!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Role Assign Form</h4>

                        <form wire:submit.prevent="roleassign">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Employee's</label>
                                <div class="col-sm-9">
                                    <select class="form-control" data-toggle="select2" wire:model="user">
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
                                <label for="inputPassword5" class="col-sm-3 col-form-label">Roles</label>
                               <div class="col-sm-9">
                                    <select class="form-control" data-toggle="select2" wire:model="role">
                                        <option value="0">Select Role</option>
                                        <optgroup label="{{ env('APP_NAME') }}">
                                                <option value="create">Create Task</option>
                                                <option value="assign">Assign Task</option>
                                        </optgroup>
                                    </select>
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

            {{-- task create form --}}

            {{-- see only create permission employee --}}
            <div class="col-lg-8">
                @if (session()->has('permission_table'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    {{ session('permission_table') }}!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
             @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Task's Table</h4>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($permission_employees as $employee)
                                        <tr>
                                            <th scope="row">{{ $loop->index +1 }}</th>
                                            <td>{{ $employee->name }}</td>
                                            <td>
                                                {{ $employee->role }}
                                            </td>
                                            <td>
                                                @if ($employee->permission_create == true && $employee->permission_assign == true)
                                                    Superior
                                                @elseif($employee->permission_assign == true)
                                                    Task Assigntor
                                                    @else
                                                    Task Creator
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-start gap-3 align-items-center">
                                                    @if ($employee->permission_assign == 1)
                                                    <span style="cursor: pointer" wire:click="removerole('assign',{{ $employee->id }})" class="badge bg-info">undo assigntor</span>
                                                    @endif
                                                    @if ($employee->permission_create == 1)
                                                    <span style="cursor: pointer" wire:click="removerole('create',{{ $employee->id }})" class="badge bg-info">undo creator</span>
                                                    @endif

                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-danger text-center">employee not found!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->
                    </div>
                </div> <!-- end card -->
            </div>


        </div>
</div>
