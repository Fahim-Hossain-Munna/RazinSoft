<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="row">

        {{-- task list table --}}

        <div class="col-lg-6">
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div>
            </div> <!-- end card -->
        </div>

        {{-- task list table --}}

        {{-- task create table --}}

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Task Create Form</h4>

                    <form wire:submit.prevent="tasksubmit">
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


        {{-- task create table --}}

    </div>


</div>
