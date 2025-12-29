@extends('admin.admin_main')
@section('admin')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <div class="content pb-0">


        <div class="mb-4">
            <h4 class="mb-1">Role</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Role</li>
                </ol>

            </nav>
        </div>

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
            <div class="d-flex align-items-center gap-2 flex-wrap">

                <div class="input-icon input-icon-start position-relative">
                    <span class="input-icon-addon text-dark"><i class="ti ti-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>
            <div class="d-flex align-items-center gap-2 flex-wrap">

                
                <x-create-button href="{{ route('role.create') }}">
                    Create Role
                </x-create-button>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- start row -->
        <div class="row">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Roles</h4>

                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="table-search d-flex align-items-center">
                                <div class="search-input">
                                    <a href="javascript:void(0);" class="btn-searchset"><i
                                            class="isax isax-search-normal fs-12"></i></a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatable" class="table roleTable table-bordered dt-responsive table-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width:30px;">#</th>
                                            <th class="text-center">Roles Name</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody></tbody> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script> --}}

 
    <script>
        $(document).ready(function() {
            var table = $('.roleTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ route('role-datatable') }}",
                    type: "GET"
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'text-center',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-center',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-center',
                        orderable: false,
                        searchable: false
                    },
                ],
            });


            $(document).on('click', '.deleteBtn', function(event) {
                event.preventDefault();
                var url = $(this).data('url');

                Swal.fire({
                    title: "Are you sure?",
                    text: "Delete thie Data!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                table.ajax.reload();
                                toastr.success(response.message);
                            },
                            error: function(response) {
                                toastr.error('Delete failed!');
                            }

                        });
                    }
                });


            });
        });
    </script>
@endpush
