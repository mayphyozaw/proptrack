@extends('admin.admin_main')
@section('admin')
    <div class="content">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Change Password</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html">Password</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Change</li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light shadow" data-bs-toggle="tooltip"
                    data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i
                        class="ti ti-refresh"></i></a>
                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light shadow" data-bs-toggle="tooltip"
                    data-bs-placement="top" aria-label="Collapse" data-bs-original-title="Collapse" id="collapse-header"><i
                        class="ti ti-transition-top"></i></a>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="card border-0">
            <div class="card-body pb-0 pt-0 px-2">
                <ul class="nav nav-tabs nav-bordered nav-bordered-primary">
                    <li class="nav-item me-3">
                        <a href="profile-settings.html" class="nav-link p-2 active">
                            <i class="ti ti-settings-cog me-2"></i>Change Password Settings
                        </a>
                    </li>


                </ul>
            </div> <!-- end card body -->
        </div> <!-- end card -->

        <!-- start row -->
        <div class="row">
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Personal Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('change-password.update') }}" method="POST" id="submit-form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="form-password1" class="form-label fs-14">Current Password</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="ti ti-lock"></i></div>
                                <input type="password"
                                    class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                    name="current_password">
                                @error('current_password', 'updatePassword')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="form-password1" class="form-label fs-14">New Password</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="ti ti-lock"></i></div>
                                <input type="password" id="new_password" name="new_password"
                                    class="form-control @error('new_password', 'updatePassword') is-invalid @enderror">
                                @error('new_password', 'updatePassword')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="form-password1" class="form-label fs-14">Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="ti ti-lock"></i></div>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                    class="form-control">
                            </div>
                        </div>

                        <br>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div> <!-- end col -->

        </div>
        <!-- end row -->

    </div>
    @push('scripts')
        {!! JsValidator::formRequest('App\Http\Requests\ChangePasswordRequest', '#submit-form') !!}
    @endpush
@endsection

{{-- 
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\ChangePasswordRequest', '#submit-form') !!}
@endpush --}}
