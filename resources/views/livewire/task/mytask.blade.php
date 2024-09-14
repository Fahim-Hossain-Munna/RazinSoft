<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row">


        <div class="col-lg-6">
            @if (session()->has('task_status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{ session('task_status') }}!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title">Task's Table</h4>
                    <label>Search:
                    <input wire:model.live='search' type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable-buttons">
                    </label>
                </div>
                <div class="card-body">
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
                                        <td>{{ $task->belongtask->title }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" wire:change="updateStatus({{ $task->id }})" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $task->status == 'complete' ? 'checked' : '' }}>
                                                <label class="form-check-label text-secondary" for="flexSwitchCheckChecked">{{ $task->status == 'complete' ? 'complete' : 'pending' }}</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start gap-3 align-items-center">
                                                <a data-bs-toggle="collapse" href="#inventorytask{{ $task->id }}">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <tr>
                                            <td colspan="4">
                                        {{-- show inventory of single task --}}
                                        <div class="collapse" id="inventorytask{{ $task->id }}" style="">
                                            <div class="card">
                                                <div class="card-header">
                                                    {{ $task->belongtask->title }} Details
                                                  </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">Title : {{ $task->belongtask->title }}</h5>
                                                    <p class="card-text">Description : {{ $task->belongtask->description }}</p>
                                                    <p class="card-text">Assign Date : {{ Carbon\Carbon::parse($task->assign_date)->format('M d ,Y') }}</p>
                                                    <p class="card-text">Expired Date : {{ Carbon\Carbon::parse($task->expire_date)->format('M d ,Y') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- show inventory of single task --}}
                                    </td>
                                </tr>
                            </tr>

                                @empty

                                <tr>
                                    <td colspan="4" class="text-danger text-center">no task assign yet!</td>
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
