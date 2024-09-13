<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="row">
            {{-- task create table --}}

                <div class="col-lg-6">
                    @if (session()->has('task_update'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            {{ session('task_update') }}!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Task Create Form</h4>

                            <form wire:submit.prevent="taskupdate({{ $task->id }})">
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
</div>
