@extends('admin.admin_main')
@section('admin')
    <div class="content pb-0">

        <div class="mb-4">
            <h4 class="mb-1">Role</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Role</li>
                </ol>

            </nav>
        </div>


        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Create Role</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <form action="{{ route('role.store') }}" method="POST" id="submit-form">
                                    @csrf
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="role">


                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <br>
                                    <button class="btn btn-primary" type="submit" style="mb-100">Submit</button>
                                </form>
                            </div>

                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->

            </div> <!-- end col -->

        </div>
    </div>

    @push('scripts')
        {!! JsValidator::formRequest('App\Http\Requests\Role\RoleStoreRequest', '#submit-form') !!}
    @endpush
@endsection
