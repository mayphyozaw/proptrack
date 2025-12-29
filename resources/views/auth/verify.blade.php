<!DOCTYPE html>
<html lang="en">



<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Verification Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Streamline your business with our advanced CRM template. Easily integrate and customize to manage sales, support, and customer interactions efficiently. Perfect for any business size">
    <meta name="keywords"
        content="Advanced CRM template, customer relationship management, business CRM, sales optimization, customer support software, CRM integration, customizable CRM, business tools, enterprise CRM solutions">
    <meta name="author" content="Dreams Technologies">
    <meta name="robots" content="index, follow">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/img/favicon.png') }}">

    <!-- Apple Icon -->
    <link rel="apple-touch-icon" href="{{ asset('backend/assets/img/apple-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/tabler-icons/tabler-icons.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}" id="app-style">

</head>

<body class="account-page bg-white">

    <!-- Begin Wrapper -->
    <div class="main-wrapper">

        <div class="overflow-hidden p-3 acc-vh">

            <!-- start row -->
            <div class="row vh-100 w-100 g-0">

                <div class="col-lg-6 vh-100 overflow-y-auto overflow-x-hidden">

                    <!-- start row -->
                    <div class="row">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif

                        <div class="col-md-10 mx-auto">
                            <form method="POST" action="{{ route('custom.verification.verify') }}"
                                class=" vh-100 d-flex flex-column p-4 pb-0" >
                                @csrf
                                
                                <div class="auth-logo">
                                    <img src="{{ asset('upload/images/logo.png') }}" class="img-fluid" alt="Logo"
                                        style="width:400px;">
                                </div>
                                <br>
                                <div class="py-5">
                                    
                                    <div class="mb-3 ">
                                        <label class="form-label">Email Address</label>
                                        <div class="input-group input-group-flat">
                                            <input  class="form-control" type="text" id="code" name="code"
                                                required="" placeholder="Enter your code">
                                            @error('code')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary w-100">Verify</button>
                                    </div>
                                    </form>
                                    <div class="or-login text-center position-relative mb-3">
                                        <h6 class="fs-14 mb-0 position-relative text-body">or sign in with</h6>
                                    </div>
                                    <div class="text-center text-muted mb-4">
                                        <p class="mb-0">Don't have an account ?<a class='text-sanger ms-2 fw-medium'
                                                href='{{ route('register') }}'>Sing up</a></p>
                                    </div>
                                </div>
                                
                            
                        </div> <!-- end col -->

                    </div>
                    <!-- end row -->

                </div>

                <div class="col-lg-6 account-bg-01"></div> <!-- end col -->

            </div>
            <!-- end row -->

        </div>

    </div>
    <!-- End Wrapper -->

    <!-- jQuery -->
    <script src="{{asset('backend/assets/js/jquery-3.7.1.min.js')}}" type="3be99bae6a68750dd6593592-text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}" type="3be99bae6a68750dd6593592-text/javascript"></script>

    <!-- Main JS -->
    <script src="{{asset('backend/assets/js/script.js')}}" type="3be99bae6a68750dd6593592-text/javascript"></script>

    <script src="{{ asset('backend/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="3be99bae6a68750dd6593592-|49" defer></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"95bddd3158a72b12","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.6.2","token":"3ca157e612a14eccbb30cf6db6691c29"}'
        crossorigin="anonymous"></script>
</body>


</html>
