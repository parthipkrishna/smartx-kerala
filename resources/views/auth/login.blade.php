<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In  </title>
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
    <body class="authentication-bg pb-0">   
        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="card-body d-flex flex-column h-100 gap-3">  
                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-start " style="margin-bottom: 0;">
                        <a href="#" class="logo-dark">
                            <span><img src="{{ asset('logo/logo1.png') }}" alt="dark logo"  style=" width: auto; height: 77px;"></span>
                        </a>
                        <a href="#" class="logo-light">
                            <span><img src="{{ asset('logo/logo1.png') }}" alt="logo"  style="width: auto; height: 77px;"></span>
                        </a>
                    </div>  
                    <div class="">
                        <!-- title-<div class="my-auto">-->
                        <h4 class="mt-0">Sign In</h4>
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
                        <p class="text-muted mb-4">Enter your email address and password to access account.</p> 
                        <!-- form -->
                        <form action="{{ route('/admin-login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" id="emailaddress" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input class="form-control" type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Enter your password" required>
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="mdi mdi-eye-off"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember">
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="d-grid mb-0 text-center">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Log In </button>
                            </div>
                        </form>

                        <!-- end form-->
                    </div>  
                    <!-- Footer-->
                    <footer class="footer footer-alt">
                        {{-- <p class="text-muted">Don't have an account? <a href="{{route('/signup')}}" class="text-muted ms-1"><b>Sign Up</b></a></p> --}}
                    </footer>   
                </div> <!-- end .card-body -->
            </div> <!-- end auth-fluid-form-box--> 
            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3">I love the color!</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very much! . <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <p>
                        - Hyper Admin User
                    </p>
                </div> <!-- end auth-user-testimonial-->
            </div> <!-- end Auth fluid right content -->
        </div> <!-- end auth-fluid-->

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>
        
        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script> 
        <script>
    document.getElementById("togglePassword").addEventListener("click", function () {
        var passwordField = document.getElementById("password");
        var icon = this.querySelector("i");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("mdi-eye-off");
            icon.classList.add("mdi-eye");
        } else {
            passwordField.type = "password";
            icon.classList.remove("mdi-eye");
            icon.classList.add("mdi-eye-off");
        }
    });
</script>
                <script>
                // Function to set a cookie
                function setCookie(name, value, days) {
                    let expires = "";
                    if (days) {
                        let date = new Date();
                        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                        expires = "; expires=" + date.toUTCString();
                    }
                    document.cookie = name + "=" + value + ";" + expires + "; path=/";
                }

                // Function to get a cookie value
                function getCookie(name) {
                    let nameEQ = name + "=";
                    let ca = document.cookie.split(';');
                    for (let i = 0; i < ca.length; i++) {
                        let c = ca[i].trim();
                        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                    }
                    return null;
                }

                // Save "Remember Me" state when form is submitted
                document.querySelector("form").addEventListener("submit", function () {
                    let rememberMe = document.getElementById("rememberMe").checked;
                    setCookie("rememberMe", rememberMe, 30); // Store for 30 days
                });

                // On page load, check if the cookie is set and update the checkbox
                window.onload = function () {
                    let rememberMe = getCookie("rememberMe");
                    if (rememberMe === "true") {
                        document.getElementById("rememberMe").checked = true;
                    }
                };
            </script>
  
    </body> 
</html>