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
                                            <div class="d-flex justify-content-around align-items-center">
                                                <i class="fa-regular fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#editTaskModal" wire:click="loadTask({{ $task->id }})"></i>
                                                <i class="fa-solid fa-user-pen"></i>
                                                <i wire:click='destroy({{ $task->id }})' class="fa-regular fa-trash-can"></i>
                                            </div>
                                        </td>
                                    </tr>


                                    {{-- edit modal start --}}
                                    <!-- Modal -->
                                    <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="location.reload()"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{-- row start --}}

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="header-title mb-3">Task Edit Form</h4>

                                                                <form wire:submit.prevent="taskedit">
                                                                    <div class="row mb-3">
                                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Title</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" wire:model="title" class="form-control" id="inputEmail3" placeholder="Enter Task Title">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Description</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea class="form-control" id="inputPassword3" wire:model="description"> </textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <label for="inputPassword5" class="col-sm-3 col-form-label">Assign Date</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="date" class="form-control" id="inputPassword5" wire:model="assign_date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <label for="inputPassword6" class="col-sm-3 col-form-label">Expire Date</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="date" class="form-control" id="inputPassword6" wire:model="expire_date">
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

                                                </div>

                                                {{-- row end --}}
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    {{-- edit modal end --}}
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




