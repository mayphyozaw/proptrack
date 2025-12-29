<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Streamline your business with our real estate. Easily integrate and customize to manage sales, support, and customer interactions efficiently. Perfect for any business size">
    <meta name="robots" content="index, follow">

    <link rel="shortcut icon" href="{{ asset('backend/assets/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('backend/assets/img/apple-icon.png') }}">
    <script src="{{asset('backend/assets/js/theme-script.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">



    <style>
        #toast-container>.toast-success {
            background-color: #51A351 !important;
        }

        #toast-container>.toast-error {
            background-color: #BD362F !important;
        }

        #toast-container>.toast-warning {
            background-color: #F89406 !important;
        }

        #toast-container>.toast-info {
            background-color: #2F96B4 !important;
        }
    </style>


    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/tabler-icons/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/simplebar/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}" id="app-style">

</head>

<body>
    <div class="main-wrapper">

        @include('admin.body.header')
        @include('admin.body.sidebar')
        <div class="page-wrapper">
            @yield('admin')
            @include('admin.body.footer')
        </div>
    </div>

    <script src="{{ asset('backend/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/simplebar/simplebar.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{ asset('backend/assets/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{asset('backend/assets/js/moment.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/daterangepicker/daterangepicker.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/apexchart/apexcharts.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/apexchart/chart-data.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/js/jsonscript.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/js/script.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{ asset('backend/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="2feec2ecac7da57f288991d1-|49" defer></script>


    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>


    <script>
        @if (session()->has('message'))
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right",
                timeOut: 3000
            };

            switch ("{{ session('alert-type', 'success') }}") {
                case 'info':
                    toastr.info("{{ session('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ session('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ session('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ session('message') }}");
                    break;
            }
        @endif
    </script>

    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    @stack('scripts')

</body>

</html>
