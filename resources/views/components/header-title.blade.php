<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->

    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">{{ Illuminate\Support\Str::ucfirst($title) }}</h4>
            </div>
            <div class="col-lg-6">
               <div class="d-none d-lg-block">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ Illuminate\Support\Str::ucfirst(env('APP_NAME')) }}</a></li>
                    <li class="breadcrumb-item active">{{ Illuminate\Support\Str::ucfirst($title) }}</li>
                </ol>
               </div>
            </div>
        </div>
    </div>
</div>
