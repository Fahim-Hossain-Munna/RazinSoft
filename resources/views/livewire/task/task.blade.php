<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="row">

        {{-- task list table --}}

        <div class="col-lg-6">
            @if (session()->has('task_status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{ session('task_status') }}!
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
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tasks as $task)
                                    <tr>
                                        <th scope="row">{{ $loop->index +1 }}</th>
                                        <td>{{ $task->title }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:model="status" wire:change="updateStatus({{ $task->id }})" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $task->status == 'complete' ? 'checked' : '' }}>
                                                <label class="form-check-label text-secondary" for="flexSwitchCheckChecked">{{ $task->status == 'complete' ? 'complete' : 'pending' }}</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start gap-3 align-items-center">
                                                <a data-bs-toggle="collapse" href="#inventorytask{{ $task->id }}">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                @can('isAdmin')
                                                <a href="{{ route('task.edit',$task->id) }}">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <i wire:click='destroy({{ $task->id }})' class="fa-regular fa-trash-can"></i>
                                                @endcan
                                                @can('assigntask')
                                                <a href="{{ route('task.assign',$task->id) }}">
                                                    <i class="fa-solid fa-user-pen"></i>
                                                </a>
                                                @endcan
                                            </div>
                                        </td>

                                        {{-- show inventory of single task --}}
                                        <div class="collapse" id="inventorytask{{ $task->id }}" style="">
                                            <div class="card">
                                                <div class="card-header">
                                                    {{ $task->title }} Details
                                                  </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">Title : {{ $task->title }}</h5>
                                                    <p class="card-text">Description : {{ $task->description }}</p>
                                                    <p class="card-text">Assign Date : {{ Carbon\Carbon::parse($task->assign_date)->format('M d ,Y') }}</p>
                                                    <p class="card-text">Expired Date : {{ Carbon\Carbon::parse($task->expire_date)->format('M d ,Y') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- show inventory of single task --}}
                                    </tr>

                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div>
            </div> <!-- end card -->
        </div>

        {{-- task list table --}}

        {{-- task create table --}}



        @can ('createtask')
            <div class="col-lg-6">
                @if (session()->has('task_upload'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        {{ session('task_upload') }}!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Task Create Form</h4>

                        <form wire:submit.prevent="tasksubmit">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" wire:model="title" class="form-control" id="inputEmail3" placeholder="Enter Task Title">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="inputPassword3" wire:model="description"> </textarea>
                                    {{-- @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputPassword5" class="col-sm-3 col-form-label">Assign Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="inputPassword5" wire:model="assign_date">
                                    @error('assign_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputPassword6" class="col-sm-3 col-form-label">Expire Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="inputPassword6" wire:model="expire_date">
                                    @error('expire_date')
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
        @endcan



        {{-- task create table --}}

    </div>


    <script>
        document.addEventListener('livewire:init', () => {
        // Open modal when 'openModal' event is dispatched from Livewire
        Livewire.on('openModal', () => {
            var editTaskModal = new bootstrap.Modal(document.getElementById('editTaskModal'));
            editTaskModal.show();
        });

        });
    </script>

</div>




