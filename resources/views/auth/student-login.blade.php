<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Student Log In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('logo/logo1.png') }}">
        <!-- Theme Config Js -->
        <script src="{{asset('assets/js/hyper-config.js')}}"></script>
        <!-- App css -->
        <link href="{{ asset('assets/css/app-saas.min.css') }}" rel="stylesheet"  type="text/css" id="app-style" />
        <!-- Icons css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    </head> 

    <body class="authentication-bg position-relative">
        <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
            <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
                <g fill-opacity='0.22'>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100' />
                </g>
            </svg>
        </div>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <!-- Logo -->
                            <div class="card-header py-2 text-center bg-primary" style="height: 68px;">
                                <a href="index.html">
                                    <span style="color: #fff; text-transform: uppercase; font-size: 27px; font-weight: 800;">
                                        Examination Result
                                    </span>
                                </a>
                            </div>
                            <div class="card-body p-3">
                                <div class="text-center w-55 m-auto">
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>        
                                    <p class="text-muted mb-4">Enter your Register Number and Date of Birth</p>
                                </div>
                                <form action="{{ route('student-login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="register_noaddress" class="form-label">Register Number</label>
                                        <input class="form-control" type="text" id="register_noaddress" name="register_no" required placeholder="Enter your register number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <div class="input-group input-group-merge">
                                            <input type="date" id="date" class="form-control" name="dob" placeholder="Enter your date of birth" required>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        {{-- Display general messages --}}
                                        @if (session()->has('message'))
                                            <div class="alert alert-danger text-center w-75">
                                                <h6 class="text-center fw-bold">{{ session('message') }}</h6>
                                            </div>
                                        @endif
                                    
                                        {{-- Display validation error messages --}}
                                        @if ($errors->any())
                                            <div class="alert alert-danger text-center w-75">
                                                @foreach ($errors->all() as $error)
                                                <h6 class="text-center fw-bold">{{ $error }}</h6>
                                            @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>   
    </body>

</html>