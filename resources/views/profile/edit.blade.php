@extends('admin.admin_main')
@section('admin')
    <div class="content">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Edit Profile</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            <i class="ti ti-settings-cog me-2"></i>Profile Settings
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
                    <form action="{{ route('admin-user.update', $user->id) }}" method="POST" id="submit-form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="form-text1" class="form-label fs-14">Enter Name</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="ti ti-user"></i></div>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="form-text1" class="form-label fs-14">Enter Email</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="ti ti-mail"></i></div>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3" hidden>
                            <label for="form-password1" class="form-label fs-14">Enter Password</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="ti ti-lock"></i></div>
                                <input type="password" class="form-control" name="password">

                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="form-password1" class="form-label fs-14">Enter Phone</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="ti ti-phone-call"></i></div>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ old('phone', $user->phone) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address:</label>
                            <textarea name="address" class="form-control">{{ $user->address }}</textarea>
                        </div>


                        <div class="mb-3">
                            <label for="validationDefault02" class="form-label">Admin User
                                Image:</label>
                            <input type="file" class="form-control" name="photo" id="admin_user_image">
                        </div>

                        <div class="mb-3">
                            <label for="validationDefault02" class="form-label"></label>
                            <img id="showImage"
                                src="{{ !empty($user->photo) ? asset('upload/user_images/' . $user->photo) : asset('upload/no_image.jpg') }}"
                                class="img-thumbnail mt-2" style="width:100px;height:100px;object-fit:cover;"
                                alt="image profile">
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
        {!! JsValidator::formRequest('App\Http\Requests\AdminUser\AdminUserUpdateRequest', '#submit-form') !!}

        <script type="text/javascript">
            $(document).ready(function() {
                $('#admin_user_image').on('change', function() {
                    if (this.files && this.files[0]) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            $('#showImage')
                                .attr('src', e.target.result)
                                .show();
                        };
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });
        </script>

        </script>
    @endpush
@endsection
