@extends('admin.admin_main')
@section('admin')
    <div class="content pb-0">

        <div class="mb-4">
            <h4 class="mb-1">Role</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
                </ol>

            </nav>
        </div>


        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Role</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <form action="{{ route('role.update',$role->id) }}" method="post" id="submit-form">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="validationCustom03">Role</label>
                                            <input type="text" class="form-control" name="name" value="{{$role->name}}">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                            </div>

                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->

            </div> <!-- end col -->

        </div>
    </div>

    @push('scripts')
        {!! JsValidator::formRequest('App\Http\Requests\Role\RoleUpdateRequest', '#submit-form') !!}
    @endpush
@endsection
