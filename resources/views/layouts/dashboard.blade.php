<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard | SmartXKetala Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('logo/logo1.png') }}">
        
        <!-- Daterangepicker css -->
        <link href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css">
        
        <!-- Vector Map css -->
        <link href="{{asset('assets/vendor/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css">
        
        <!-- Theme Config Js -->
        <script src="{{asset('assets/js/hyper-config.js')}}"></script>
        
        <!-- App css -->
        <link href="{{ asset('assets/css/app-saas.min.css') }}" rel="stylesheet"  type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        
        <!-- Datatables css -->
        <link href="{{asset('assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        
        <!-- file upload css -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/dropzone/dropzone.min.css') }}">

        <!-- Select2 css -->
        <link href="{{ asset('assets/vendor/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Quill css -->
        {{-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet" /> --}}
        <link rel="stylesheet" href="assets/vendor/quill/text-editor.css">
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

        <!--icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    </head> 
    <body>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar container-fluid">
                    <div class="d-flex align-items-center gap-lg-2 gap-1">
                        <!-- Topbar Brand Logo -->
                        <div class="logo-topbar">
                            <!-- Logo light -->
                            <a href="{{ route('/home') }}" class="logo-light">
                                <span class="logo-lg">
                                    <img src="{{ asset('logo/logo1.png') }}" alt="logo" >
                                </span>
                                <span class="logo-sm">
                                    <img src="{{ asset('logo/logo1.png') }}" alt="small logo">
                                </span>
                            </a>
                            <!-- Logo Dark -->
                            <a href="{{ route('/home') }}" class="logo-dark">
                                <span class="logo-lg">
                                    <img src="{{ asset('logo/logo1.png') }}" alt="dark logo">
                                </span>
                                <span class="logo-sm">
                                    <img src="{{ asset('logo/logo1.png') }}" alt="small logo">
                                </span>
                            </a>
                        </div>
                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <!-- Horizontal Menu Toggle Button -->
                        <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </button>
                        <!-- Topbar Search Form -->
                        {{-- <div class="app-search dropdown d-none d-lg-block">
                            <form>
                                <div class="input-group">
                                    <input type="search" class="form-control dropdown-toggle" placeholder="Search..."
                                        id="top-search">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                    <button class="input-group-text btn btn-primary" type="submit">Search</button>
                                </div>
                            </form>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                                </div>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-notes font-16 me-1"></i>
                                    <span>Analytics Report</span>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-life-ring font-16 me-1"></i>
                                    <span>How can I help you?</span>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-cog font-16 me-1"></i>
                                    <span>User profile settings</span>
                                </a>
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                </div>
                                <div class="notification-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg"
                                                alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Erwin Brown</h5>
                                                <span class="font-12 mb-0">UI Designer</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg"
                                                alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Jacob Deo</h5>
                                                <span class="font-12 mb-0">Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <ul class="topbar-menu d-flex align-items-center gap-3">
                        {{-- <li class="dropdown d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="ri-search-line font-22"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="search" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>    --}}

                        {{-- <li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="12">
                                <span class="align-middle d-none d-lg-inline-block">English</span> <i
                                    class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12">
                                    <span class="align-middle">German</span>
                                </a>    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12">
                                    <span class="align-middle">Italian</span>
                                </a>    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12">
                                    <span class="align-middle">Spanish</span>
                                </a>    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12">
                                    <span class="align-middle">Russian</span>
                                </a>    
                            </div>
                        </li>   
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="ri-notification-3-line font-22"></i>
                                <span class="noti-icon-badge"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                                <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 font-16 fw-semibold"> Notification</h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                                <small>Clear All</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>  
                                <div class="px-2" style="max-height: 300px;" data-simplebar>    
                                    <h5 class="text-muted font-13 fw-normal mt-2">Today</h5>
                                    <!-- item-->    
                                    <a href="javascript:void(0);"
                                        class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i
                                                    class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-primary">
                                                        <i class="mdi mdi-comment-account-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Datacorp <small
                                                            class="fw-normal text-muted ms-1">1 min ago</small></h5>
                                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on
                                                        Admin</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>    
                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i
                                                    class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-info">
                                                        <i class="mdi mdi-account-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Admin <small
                                                            class="fw-normal text-muted ms-1">1 hours ago</small></h5>
                                                    <small class="noti-item-subtitle text-muted">New user registered</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>    
                                    <h5 class="text-muted font-13 fw-normal mt-0">Yesterday</h5>    
                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i
                                                    class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon">
                                                        <img src="assets/images/users/avatar-2.jpg"
                                                            class="img-fluid rounded-circle" alt="" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Cristina Pride <small
                                                            class="fw-normal text-muted ms-1">1 day ago</small></h5>
                                                    <small class="noti-item-subtitle text-muted">Hi, How are you? What about
                                                        our next meeting</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>    
                                    <h5 class="text-muted font-13 fw-normal mt-0">30 Dec 2021</h5>  
                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i
                                                    class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-primary">
                                                        <i class="mdi mdi-comment-account-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Datacorp</h5>
                                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on
                                                        Admin</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>    
                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i
                                                    class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon">
                                                        <img src="assets/images/users/avatar-4.jpg"
                                                            class="img-fluid rounded-circle" alt="" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Karen Robinson</h5>
                                                    <small class="noti-item-subtitle text-muted">Wow ! this admin looks good
                                                        and awesome design</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>    
                                    <div class="text-center">
                                        <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                    </div>
                                </div>  
                                <!-- All-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item text-center text-primary notify-item border-top py-2">
                                    View All
                                </a>    
                            </div>
                        </li>   
                        <li class="dropdown d-none d-sm-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="ri-apps-2-line font-22"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">    
                                <div class="p-2">
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/slack.png" alt="slack">
                                                <span>Slack</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/github.png" alt="Github">
                                                <span>GitHub</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                                <span>Dribbble</span>
                                            </a>
                                        </div>
                                    </div>  
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                                <span>Bitbucket</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                                <span>Dropbox</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/g-suite.png" alt="G Suite">
                                                <span>G Suite</span>
                                            </a>
                                        </div>
                                    </div> <!-- end row-->
                                </div>  
                            </div>
                        </li>   
                        <li class="d-none d-sm-inline-block">
                            <a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                                <i class="ri-settings-3-line font-22"></i>
                            </a>
                        </li>   
                        <li class="d-none d-sm-inline-block">
                            <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Theme Mode">
                                <i class="ri-moon-line font-22"></i>
                            </div>
                        </li>   
                        <li class="d-none d-md-inline-block">
                            <a class="nav-link" href="#" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line font-22"></i>
                            </a>
                        </li>   assets/images/users/avatar-1.jpg --}}
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                
                                <span class="account-user-avatar">
                                    <img src="{{ !empty( auth()->user()->profile_image) ? env('STORAGE_URL') . '/' . str_replace('public/', '', auth()->user()->profile_image) : asset('dashboard/assets/images/avathar.png') }}"
                                        alt="admin-image" width="40" height="40" class="rounded-circle">
                                </span>
                                
                                <span class="d-lg-flex flex-column gap-1 d-none">
                                    <h5 class="my-0">{{ auth()->user()->name }}</h5>
                                    <h6 class="my-0 fw-normal">Admin</h6>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>  

                                <!-- item-->
                                <a href="{{ route('admin-profile') }}" class="dropdown-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>My Account</span>
                                </a>    

                                <!-- item-->
                                <form action="{{ route('admin-logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item border-0 bg-transparent w-100 text-start">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>

                                {{-- <form action="{{ route('admin-logout') }}" method="POST"> --}}
                                    {{-- @csrf --}}
                                    {{-- <button type="submit">Logout</button> --}}
                                {{-- </form> --}}
                                
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->   

            <!-- ========== Left Sidebar Start ========== style="height: 90px; width: 50%; margin-top: 10px;"-->
            <div class="leftside-menu">
                <!-- Brand Logo Light -->
                <a href="{{ route('users.show') }}" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('logo/logo-white.png') }}" alt="logo" style="height: 55px;">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('logo/logo1.png') }}" alt="small logo">
                    </span>
                </a>
                <!-- Brand Logo Dark -->
                <a href="{{ route('users.show') }}" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('logo/logo1.png') }}" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('logo/logo1.png') }}" alt="small logo">
                    </span>
                </a>    
                <!-- Sidebar Hover Menu Toggle Button -->
                <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
                    <i class="ri-checkbox-blank-circle-line align-middle"></i>
                </div>  

                <!-- Full Sidebar Menu Close Button -->
                <div class="button-close-fullsidebar">
                    <i class="ri-close-fill align-middle"></i>
                </div>  

                <!-- Sidebar -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!-- Leftbar User -->
                    <div class="leftbar-user">
                        <a href="#">
                            <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42"
                                class="rounded-circle shadow-sm">
                            <span class="leftbar-user-name mt-2"></span>
                        </a>
                    </div>  

                    <!--- Sidemenu -->
                    <ul class="side-nav">   

                        <li class="side-nav-title">User Management</li>   
                        <li class="side-nav-item">
                            <a href="{{ route('users.show') }}" class="side-nav-link">
                                <i class="fa-solid fa-users"></i>
                                <span> Users </span>
                            </a>
                        </li>  
                        {{-- <li class="side-nav-item"> --}}
                            {{-- <a href="{{ route('students.show') }}" class="side-nav-link"> --}}
                                {{-- <i class="uil-layer-group"></i> --}}
                                {{-- <span> Students </span> --}}
                            {{-- </a> --}}
                        {{-- </li>   --}}
                        {{-- <li class="side-nav-item"> --}}
                            {{-- <a href="{{ route('users.roles') }}" class="side-nav-link"> --}}
                                {{-- <i class="uil-layer-group"></i> --}}
                                {{-- <span> Roles and permissions </span> --}}
                            {{-- </a> --}}
                        {{-- </li>   --}}

                        <li class="side-nav-title">Website Management</li>   
                        <li class="side-nav-item">
                            <a href="{{ route('admin-home') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Home </span>
                            </a>
                        </li> 
                        <li class="side-nav-item">
                            <a href="{{ route('course-list') }}" class="side-nav-link">
                                <i class="fa-solid fa-list"></i>
                                <span> Courses </span>
                            </a>
                        </li> 
                        <li class="side-nav-item">
                            <a href="{{ route('training-center') }}" class="side-nav-link">
                                <i class="fa-solid fa-building-user"></i>
                                <span> Training Centers </span>
                            </a>
                        </li> 
                        <li class="side-nav-item">
                            <a href="{{ route('placement-cell') }}" class="side-nav-link">
                                <i class="fa-solid fa-building"></i>
                                <span> Placement Cells </span>
                            </a>
                        </li> 
                        <li class="side-nav-item">
                            <a href="{{ route('result') }}" class="side-nav-link">
                                <i class="fa-solid fa-square-poll-vertical"></i>
                                <span> Results </span>
                            </a>
                        </li> 
                        <li class="side-nav-item">
                            <a href="{{ route('admin-gallery') }}" class="side-nav-link">
                                <i class="fa-solid fa-image"></i>
                                <span> Gallery </span>
                            </a>
                        </li> 
                        <li class="side-nav-item">
                            <a href="{{ route('contact-us') }}" class="side-nav-link">
                                <i class="fa-solid fa-address-book"></i>
                                <span> Contact Us </span>
                            </a>
                        </li> 
                        <li class="side-nav-title">Certificate & Result Management</li> 
                       <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarOrders" aria-expanded="false" aria-controls="sidebarOrders" class="side-nav-link">
                                <i class="fa-solid fa-ranking-star"></i>
                                <span> MarkList </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarOrders">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{route('marklists.show')}}">MarkList</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('marklist.add') }}">Bulk Import</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('marklist.theme') }}">Theme</a>
                                    </li>
                                </ul>
                            </div>
                        </li> 
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarReports" aria-expanded="false" aria-controls="sidebarReports" class="side-nav-link">
                                <i class="fa-solid fa-certificate"></i>
                                <span> Certificates </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarReports">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('certificates.show') }}">Certificate</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('certificate.theme') }}">Theme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>   
                    </ul>
                    <!--- End Sidemenu -->  
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- ========== Left Sidebar End ========== --> 
            <!-- ============================================================== -->
            <!-- Start Page Content Here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        @yield('home')
                        @yield('analytics')
                        @yield('add-user')
                        @yield('list-user')
                        @yield('roles')
                        @yield('training-center')
                        @yield('add-training-center')
                        @yield('admin-home')
                        @yield('add-quicklink')
                        @yield('gallery')
                        @yield('add-gallery')
                        @yield('result')
                        @yield('add-result')
                        @yield('placement-cell')
                        @yield('add-placement-cell')
                        @yield('contact-us')
                        @yield('courses')
                        @yield('add-courses')
                        @yield('student')
                        @yield('add-student')
                        @yield('marklist')
                        @yield('add-marklist')
                        @yield('view-marklist-it')
                        @yield('view-marklist-fashion')
                        @yield('view-marklist-theme')
                        @yield('certifiates')
                        @yield('add-certificate')
                        @yield('preview-certificate-fashion')
                        @yield('preview-certificate-it')
                        @yield('view-certificate-theme')
                        @yield('admin-profile')
                        @yield('list-main-category')
                        @yield('add-category')
                        @yield('edit-categoty')
                        @yield('sub-category')
                        @yield('add-subcategory')
                        @yield('edit-subcategoty')
                        @yield('products')
                        @yield('add-product')
                        @yield('edit-product')
                        @yield('product-details')
                        @yield('brands')
                        @yield('add-brand')
                        @yield('edit-brands')
                        @yield('reviews')
                        @yield('tax-classes')
                        @yield('add-tax-classes')
                        @yield('edit-tax-classes')
                        @yield('tax-rates')
                        @yield('add-tax-rates')
                        @yield('edit-tax-rates')
                        @yield('vendors')
                        @yield('add-vendor')
                        @yield('sellers')
                        @yield('add-sellers')
                        @yield('orders')
                        @yield('order-details')
                        @yield('placed-orders')
                        @yield('processed-orders')
                        @yield('canceled-orders')
                        @yield('shipping-zone')
                        @yield('shipping-vendor')
                        @yield('shipping-charges')
                        @yield('shipping-promotions')
                        @yield('offer')
                        @yield('coupons')
                        @yield('notifications')
                        @yield('faq')
                        @yield('stock-report')
                        @yield('sales-report')
                        @yield('invoice-setting')
                        @yield('invoice-design')
                    </div>
                    <!-- container -->
                </div>
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Innerix Technologies LLP
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        
        </div>
        <!-- END wrapper -->
        <!-- Theme Settings -->
        {{-- <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
            <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
                <h5 class="text-white m-0">Theme Settings</h5>
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <div data-simplebar class="h-100">
                    <div class="card mb-0 p-3">
                        <h5 class="mt-0 font-16 fw-bold mb-3">Choose Layout</h5>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout01" name="data-layout" type="radio" value="vertical"
                                        class="form-check-input">
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                                                    <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                    <span
                                                        class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    <span
                                                        class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    <span
                                                        class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    <span
                                                        class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Vertical</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal"
                                        class="form-check-input">
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                                        <span class="d-flex h-100 flex-column">
                                            <span
                                                class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                <span
                                                    class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                <span
                                                    class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                <span
                                                    class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                <span
                                                    class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                            </span>
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Horizontal</h5>
                            </div>
                        </div>
                        <h5 class="my-3 font-16 fw-bold">Color Scheme</h5>
                        <div class="colorscheme-cardradio">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-bs-theme"
                                            id="layout-color-light" value="light">
                                        <label class="form-check-label p-0 avatar-md w-100" for="layout-color-light">
                                            <div id="sidebar-size">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column bg-white rounded-2">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>
                                            <div id="topnav-color" class="bg-white rounded-2 h-100">
                                                <span class="d-flex h-100 flex-column">
                                                    <span
                                                        class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                        <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    </span>
                                                    <span class="d-flex h-100 flex-column bg-white rounded-2">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-bs-theme"
                                            id="layout-color-dark" value="dark">
                                        <label class="form-check-label p-0 avatar-md w-100 bg-black"
                                            for="layout-color-dark">
                                            <div id="sidebar-size">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                            <span
                                                                class="d-block border border-secondary border-opacity-25 border-3 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-secondary border-opacity-25 border-3 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-secondary border-opacity-25 border-3 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-secondary border-opacity-25 border-3 rounded w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>
                                            <div id="topnav-color">
                                                <span class="d-flex h-100 flex-column">
                                                    <span
                                                        class="bg-light-lighten d-flex p-1 align-items-center border-bottom border-opacity-25 border-primary border-opacity-25">
                                                        <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                        <span
                                                            class="d-block border border-primary border-opacity-25 border-3 rounded ms-auto"></span>
                                                        <span
                                                            class="d-block border border-primary border-opacity-25 border-3 rounded ms-1"></span>
                                                        <span
                                                            class="d-block border border-primary border-opacity-25 border-3 rounded ms-1"></span>
                                                        <span
                                                            class="d-block border border-primary border-opacity-25 border-3 rounded ms-1"></span>
                                                    </span>
                                                    <span class="bg-light-lighten d-block p-1"></span>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                                </div>
                            </div>
                        </div>
                        <div id="layout-width">
                            <h5 class="my-3 font-16 fw-bold">Layout Mode</h5>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-mode"
                                            id="layout-mode-fluid" value="fluid">
                                        <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-fluid">
                                            <div id="sidebar-size">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column rounded-2">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>
                                        
                                            <div id="topnav-color">
                                                <span class="d-flex h-100 flex-column">
                                                    <span
                                                        class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                        <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    </span>
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                                </div>
                                <div class="col-4" id="layout-boxed">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-mode"
                                            id="layout-mode-boxed" value="boxed">
                                        <label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-mode-boxed">
                                            <div id="sidebar-size" class="border-start border-end">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column rounded-2">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>
                                        
                                            <div id="topnav-color" class="border-start border-end h-100">
                                                <span class="d-flex h-100 flex-column">
                                                    <span
                                                        class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                        <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    </span>
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                                </div>
                            
                                <div class="col-4" id="layout-detached">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-mode"
                                            id="data-layout-detached" value="detached">
                                        <label class="form-check-label p-0 avatar-md w-100" for="data-layout-detached">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-flex p-1 align-items-center border-bottom ">
                                                    <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                    <span
                                                        class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                    <span
                                                        class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    <span
                                                        class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    <span
                                                        class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                </span>
                                                <span class="d-flex h-100 p-1 px-2">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 flex-column p-1 px-2">
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                                <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                            </span>
                                        
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Detached</h5>
                                </div>
                            </div>
                        </div>
                        <h5 class="my-3 font-16 fw-bold">Topbar Color</h5>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar-color"
                                        id="topbar-color-light" value="light">
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                                        <div id="sidebar-size">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                    
                                        <div id="topnav-color">
                                            <span class="d-flex h-100 flex-column">
                                                <span
                                                    class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                    <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                    <span
                                                        class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                    <span
                                                        class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    <span
                                                        class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    <span
                                                        class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                </span>
                                                <span class="bg-light d-block p-1"></span>
                                            </span>
                                        </div>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>
                        
                            <div class="col-4" style="--ct-dark-rgb: 64,73,84;">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar-color"
                                        id="topbar-color-dark" value="dark">
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                                        <div id="sidebar-size">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-primary-lighten rounded mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-dark d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                    
                                        <div id="topnav-color">
                                            <span class="d-flex h-100 flex-column">
                                                <span
                                                    class="bg-dark d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                    <span class="d-block p-1 bg-primary-lighten rounded me-1"></span>
                                                    <span
                                                        class="d-block border border-primary border-opacity-25 border-3 rounded ms-auto"></span>
                                                    <span
                                                        class="d-block border border-primary border-opacity-25 border-3 rounded ms-1"></span>
                                                    <span
                                                        class="d-block border border-primary border-opacity-25 border-3 rounded ms-1"></span>
                                                    <span
                                                        class="d-block border border-primary border-opacity-25 border-3 rounded ms-1"></span>
                                                </span>
                                                <span class="bg-light d-block p-1"></span>
                                            </span>
                                        </div>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                        
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar-color"
                                        id="topbar-color-brand" value="brand">
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-brand">
                                        <div id="sidebar-size">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-primary bg-gradient d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                    
                                        <div id="topnav-color">
                                            <span class="d-flex h-100 flex-column">
                                                <span
                                                    class="bg-primary bg-gradient d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                    <span class="d-block p-1 bg-light opacity-25 rounded me-1"></span>
                                                    <span
                                                        class="d-block border border-3 border opacity-25 rounded ms-auto"></span>
                                                    <span
                                                        class="d-block border border-3 border opacity-25 rounded ms-1"></span>
                                                    <span
                                                        class="d-block border border-3 border opacity-25 rounded ms-1"></span>
                                                    <span
                                                        class="d-block border border-3 border opacity-25 rounded ms-1"></span>
                                                </span>
                                                <span class="bg-light d-block p-1"></span>
                                            </span>
                                        </div>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Brand</h5>
                            </div>
                        </div>
                    
                        <div>
                            <h5 class="my-3 font-16 fw-bold">Menu Color</h5>
                        
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-menu-color"
                                            id="leftbar-color-light" value="light">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-light">
                                            <div id="sidebar-size">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span
                                                            class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>
                                        
                                            <div id="topnav-color">
                                                <span class="d-flex h-100 flex-column">
                                                    <span
                                                        class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-opacity-25">
                                                        <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    </span>
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                                </div>
                            
                                <div class="col-4" style="--ct-dark-rgb: 64,73,84;">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-menu-color"
                                            id="leftbar-color-dark" value="dark">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-dark">
                                            <div id="sidebar-size">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-dark d-flex h-100 flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                            <span
                                                                class="d-block border border-secondary rounded border-opacity-25 border-3 w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-secondary rounded border-opacity-25 border-3 w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-secondary rounded border-opacity-25 border-3 w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border border-secondary rounded border-opacity-25 border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>
                                        
                                            <div id="topnav-color">
                                                <span class="d-flex h-100 flex-column">
                                                    <span
                                                        class="bg-light d-flex p-1 align-items-center border-bottom border-secondary border-primary border-opacity-25">
                                                        <span class="d-block p-1 bg-primary-lighten rounded me-1"></span>
                                                        <span
                                                            class="d-block border border-secondary rounded border-opacity-25 border-3 ms-auto"></span>
                                                        <span
                                                            class="d-block border border-secondary rounded border-opacity-25 border-3 ms-1"></span>
                                                        <span
                                                            class="d-block border border-secondary rounded border-opacity-25 border-3 ms-1"></span>
                                                        <span
                                                            class="d-block border border-secondary rounded border-opacity-25 border-3 ms-1"></span>
                                                    </span>
                                                    <span class="bg-dark d-block p-1"></span>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-menu-color"
                                            id="leftbar-color-brand" value="brand">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-brand">
                                            <div id="sidebar-size">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span
                                                            class="bg-primary bg-gradient d-flex h-100 flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                                                            <span
                                                                class="d-block border opacity-25 rounded border-3 w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border opacity-25 rounded border-3 w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border opacity-25 rounded border-3 w-100 mb-1"></span>
                                                            <span
                                                                class="d-block border opacity-25 rounded border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>
                                        
                                            <div id="topnav-color">
                                                <span class="d-flex h-100 flex-column">
                                                    <span
                                                        class="bg-light d-flex p-1 align-items-center border-bottom border-secondary">
                                                        <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-auto"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded ms-1"></span>
                                                    </span>
                                                    <span class="bg-primary bg-gradient d-block p-1"></span>
                                                </span>
                                            </div>
                                        
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Brand</h5>
                                </div>
                            </div>
                        </div>
                    
                        <div id="sidebar-size">
                            <h5 class="my-3 font-16 fw-bold">Sidebar Size</h5>
                        
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                                            id="leftbar-size-default" value="default">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-default">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                                </div>
                            
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                                            id="leftbar-size-compact" value="compact">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-compact">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                                </div>
                            
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                                            id="leftbar-size-small" value="condensed">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-small">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end flex-column"
                                                        style="padding: 2px;">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                                </div>
                            
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                                            id="leftbar-size-small-hover" value="sm-hover">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-small-hover">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end flex-column"
                                                        style="padding: 2px;">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                        <span
                                                            class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Hover View</h5>
                                </div>
                            
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                                            id="leftbar-size-full" value="full">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-full">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                                </div>
                            
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                                            id="leftbar-size-fullscreen" value="fullscreen">
                                        <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-fullscreen">
                                            <span class="d-flex h-100">
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Fullscreen Layout</h5>
                                </div>
                            </div>
                        </div>
                    
                        <div id="layout-position">
                            <h5 class="my-3 font-16 fw-bold">Layout Position</h5>
                        
                            <div class="btn-group radio" role="group">
                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                                    value="fixed">
                                <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>
                            
                                <input type="radio" class="btn-check" name="data-layout-position"
                                    id="layout-position-scrollable" value="scrollable">
                                <label class="btn btn-soft-primary w-sm ms-0"
                                    for="layout-position-scrollable">Scrollable</label>
                            </div>
                        </div>
                    
                        <div id="sidebar-user">
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <label class="font-16 fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" name="sidebar-user"
                                        id="sidebaruser-check">
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            
            </div>
            <div class="offcanvas-footer border-top p-3 text-center">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                    </div>
                    <div class="col-6">
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            target="_blank" role="button" class="btn btn-primary w-100">Buy Now</a>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <!-- Daterangepicker js -->
        <script src="{{asset('assets/vendor/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>

        <!-- Apex Charts js -->
        <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Vector Map Js -->
        <script src="{{asset('assets/vendor/jsvectormap/js/jsvectormap.min.js')}}"></script>
        <script src="{{asset('assets/vendor/jsvectormap/maps/world-merc.js')}}"></script>
        <script src="{{asset('assets/vendor/jsvectormap/maps/world.js')}}"></script>

        <!-- Dashboard App js -->
        <script src="{{asset('assets/js/pages/demo.dashboard.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>

        <!-- Datatables js -->
        <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
        
        <!-- Datatable Demo Aapp js -->
        <script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>
            
        <!-- Datatable js -->
        <script src="{{ asset('assets/vendor/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js') }}"></script>
        <!-- Product Demo App js -->
        <script src="{{ asset('assets/js/pages/demo.products.js') }}"></script>

        <!-- Code Highlight js -->
        <script src="{{ asset('assets/vendor/highlightjs/highlight.pack.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ asset('assets/js/hyper-syntax.js') }}"></script>

        <!-- Dropzone File Upload js -->
        <script src="{{ asset('assets/vendor/dropzone/dropzone-min.js') }}"></script>

        <!-- File Upload Demo js -->
        <script src="{{ asset('assets/js/ui/component.fileupload.js') }}"></script>
        
        <!-- plugin js -->
        <script src="{{ asset('assets/vendor/dropzone/min/dropzone.min.js') }}"></script>

        <!--  Select2 Js -->
        <script src="{{ asset('assets/vendor/select2/js/select2.min.js') }}"></script>

        <!-- Initialize Quill editor -->
        <script src="{{asset('assets/vendor/quill/text-editor.js') }}"></script>

        <!-- Include the Quill library -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>      

        <!-- Chart.js-->
        <script src="{{'assets/vendor/chart.js/chart.min.js'}}"></script>
        <!-- Sparkline Chart js -->
        <script src="{{ asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <!-- Sparkline Chart Demo js -->
        <script src="{{ asset('assets/js/pages/demo.sparkline.js') }}"></script>
        <script>
            function uploadFile() {
                let file = document.getElementById("file1").files[0];
                
                if (!file) {
                    alert("Please select a video file to upload.");
                    return;
                }

                let formdata = new FormData();
                formdata.append("video", file);

                let ajax = new XMLHttpRequest();

                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);

                ajax.open("POST", "/upload-video");  // Replace with your actual upload URL
                ajax.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}"); // Add CSRF token for Laravel
                ajax.send(formdata);
            }

            function progressHandler(event) {
                document.getElementById("loaded_n_total").innerHTML = 
                    "Uploaded " + event.loaded + " bytes of " + event.total;

                let percent = (event.loaded / event.total) * 100;
                document.getElementById("progressBar").value = Math.round(percent);
                document.getElementById("status").innerHTML = Math.round(percent) + "% uploaded... Please wait.";
            }

            function completeHandler(event) {
                document.getElementById("status").innerHTML = "Upload Complete!";
                document.getElementById("progressBar").value = 100;
            }

            function errorHandler(event) {
                document.getElementById("status").innerHTML = "Upload Failed!";
            }

            function abortHandler(event) {
                document.getElementById("status").innerHTML = "Upload Aborted!";
            }
            </script>

        <!-- Initialize Quill editor -->
        <script>
            var editor = new Quill('#editor', {
                theme: 'snow',
                placeholder: 'Write something...',
                // Any other configuration you need
            });         

            var editor2 = new Quill('#editor2', {
                theme: 'snow',
                placeholder: 'Write something...',
                // Any other configuration you need
            });         

        </script>

        <script>
            // Toggle file upload section based on media type
            document.getElementById('media_type').addEventListener('change', function() {
                const mediaType = this.value;       

                if (mediaType === 'VIDEO') {
                    document.getElementById('image-upload-section').style.display = 'none';
                    document.getElementById('youtube-upload-section').style.display = 'none';
                    document.getElementById('video-upload-section').style.display = 'block';
                } else if (mediaType === 'IMAGE') {
                    document.getElementById('image-upload-section').style.display = 'block';
                    document.getElementById('video-upload-section').style.display = 'none';
                    document.getElementById('youtube-upload-section').style.display = 'none';
                } else if (mediaType === 'YOUTUBE') {
                    document.getElementById('youtube-upload-section').style.display = 'block';
                    document.getElementById('image-upload-section').style.display = 'none';
                    document.getElementById('video-upload-section').style.display = 'none';
                } else {
                    // In case no option is selected, hide both sections
                    document.getElementById('image-upload-section').style.display = 'none';
                    document.getElementById('video-upload-section').style.display = 'none';
                    document.getElementById('youtube-upload-section').style.display = 'none';
                }
            });     

            // Initialize with default setting based on current selection (if any)
            document.addEventListener('DOMContentLoaded', function() {
                const mediaType = document.getElementById('media_type').value;      

                if (mediaType === 'VIDEO') {
                    document.getElementById('video-upload-section').style.display = 'block';
                    document.getElementById('image-upload-section').style.display = 'none';
                    document.getElementById('youtube-upload-section').style.display = 'none';
                } else if (mediaType === 'IMAGE') {
                    document.getElementById('image-upload-section').style.display = 'block';
                    document.getElementById('video-upload-section').style.display = 'none';
                    document.getElementById('youtube-upload-section').style.display = 'none';
                } else if (mediaType === 'YOUTUBE') {
                    document.getElementById('image-upload-section').style.display = 'none';
                    document.getElementById('video-upload-section').style.display = 'none';
                    document.getElementById('youtube-upload-section').style.display = 'block';
                } else {
                    document.getElementById('image-upload-section').style.display = 'none';
                    document.getElementById('video-upload-section').style.display = 'none';
                }
            });
        </script>
        

        <script>
            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: "Choose ...",
                    allowClear: true
                });
            });
        </script>       

        <script>

            $(document).ready(function() {
                $('.select2').select2();  // Initialize on page load
                // Reinitialize on modal open (if dropdown is inside a modal)
                $('#editCourseModal').on('shown.bs.modal', function() {
                    $('.select2').select2();
                });
                // Reinitialize if dropdown is loaded dynamically
                $(document).on('DOMNodeInserted', function() {
                    $('.select2').select2();
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var script = document.createElement("script");
                script.src = "https://code.jquery.com/jquery-3.6.0.min.js";
                script.onload = function() {
                    $(document).ready(function() {
                        $("#print-selected").on("click", function() {
                            var selectedCertificates = [];
                            $(".row-checkbox:checked").each(function() {
                                var certId = $(this).data("id");
                                if (certId) {
                                    selectedCertificates.push(certId);
                                }
                            });
                            if (selectedCertificates.length === 0) {
                                alert("Please select at least one certificate to print.");
                                return;
                            }
                            $.ajax({
                                url: "/certificate/print",
                                type: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    certificate_ids: selectedCertificates
                                },
                                success: function(response) {
                                    if (response.success) {
                                        generateCertificateHTML(response.certificates);
                                        setTimeout(function () {
                                            window.print();
                                        }, 700);
                                        var certIds = response.certificates.map(cert => cert.certificate.certificate_id);
                                        // Remove the certificates only when the print dialog is closed
                                        window.onafterprint = function () {
                                            $("#certificate-display").html(""); // Clear certificates after print/cancel
                                            updatePrintedStatus(certIds); 
                                        };

                                    } else {
                                        alert("Failed to fetch certificate data.");
                                    }
                                },
                                error: function() {
                                    alert("Error fetching certificate data.");
                                }
                            });
                        });

                        function updatePrintedStatus(certIds) {
                            $.ajax({
                                url: "/certificate/update-printed-status",
                                type: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    certificate_ids: certIds
                                },
                                success: function (response) {
                                    if (response.success) {
                                        location.reload();
                                    } else {
                                    }
                                },
                                error: function () {
                                    alert("Error updating printed status.");
                                }
                            });
                        }

                        function generateCertificateHTML(certificates) {
                            $("#certificate-display").empty();
                            certificates.forEach(function(data) {
                                var cert = data.certificate;
                                var category = data.category ? data.category.name : '';
                                var certificateHTML = "";
                                var issuedDate = new Date(cert.issued_date);
                                var day = issuedDate.getDate();
                                var month = issuedDate.toLocaleString("en-US", { month: "long" });
                                var year = issuedDate.getFullYear();
                                if (category === "Computer Courses") {
                                    certificateHTML = `

                                        <section class="main-section">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="container-fluid">
                                                                <div style="display: flex; align-items: end; gap: 20px; margin: 0px 0px 0px 40px;">
                                                                    <img class="img-fluid" src="assets/images/05.PNG" alt="" style="height:120px;">
                                                                    <div style="display: flex; gap: 20px; align-items: end; border-bottom: 2px solid #3fbbf2; padding: 0px 0px 4px 30px; width: 100%; margin-left: -40px;">
                                                                        <div>
                                                                            <img class="img-fluid" src="{{ asset('assets/images/08.PNG') }}" alt="" style="height: auto; width: 250px;">
                                                                            <h2 style="font-weight: 800; font-size: 13px; margin: 0; padding: 0;">VOCATIONAL TRAINING ORGANIZATION</h2>
                                                                        </div>
                                                                        <div style="height: 80px; width: 2px; background-color: #3fbbf2; position: relative; z-index: 100;"></div>
                                                                        <div>
                                                                            <h5 style="font-weight: 700; font-size: 17px; margin: 0; padding: 0;">Govt. Of Kerala Regd. CA 143/10</h5>
                                                                            <h6 style="font-weight: 700; font-size: 16px; margin: 0; padding: 0;">An ISO 9001-2015 Certified Organization</h6>
                                                                            <p style="font-weight: 600; font-size: 14px; margin: 0; padding: 0;">Mannarkkad, Palakkad, Kerala, India - 678 582<br>www.smartxkerala.com</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div style="display: flex; gap: 4rem;">
                                                                    <div>
                                                                        <img class="img-fluid" src="{{ asset('assets/images/04.PNG') }}" alt="" style="width: 140px; margin-left: 40px;">
                                                                        <div style="border-radius: 5px; border: 1px solid black; padding: 10px; width: 190px; position: relative; z-index: 100;">
                                                                            <h6 style="text-decoration: underline; font-size: 12px; font-weight: 600; text-align: center;">PERCENTAGE OF MARKS</h6>
                                                                            <div style="display: flex; margin-top: 1rem;">
                                                                                <p style="width: 90%; font-size: 12px; font-weight: 500;">80 & Above</p>
                                                                                <p style="font-size: 12px; font-weight: 500;">A+</p>
                                                                            </div>
                                                                            <div style="display: flex;">
                                                                                <p style="width: 90%; font-size: 12px; font-weight: 500;">60 & Below 80</p>
                                                                                <p style="font-size: 12px; font-weight: 500;">A</p>
                                                                            </div>
                                                                            <div style="display: flex;">
                                                                                <p style="width: 90%; font-size: 12px; font-weight: 500;">50 % Below 60</p>
                                                                                <p style="font-size: 12px; font-weight: 500;">B+</p>
                                                                            </div>
                                                                            <div style="display: flex;">
                                                                                <p style="width: 90%; font-size: 12px; font-weight: 500;">Below 50</p>
                                                                                <p style="font-size: 12px; font-weight: 500;">B</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: flex;flex-direction: column;">
                                                                        <div style="display: flex; align-items: end; gap: 104px; width: 100%; margin-top: 35px; margin-left: 15%;">
                                                                            <img class="img-fluid" src="{{ asset('assets/images/Certificate-head.png') }}" alt="" style="width: 350px;">
                                                                            <h3 style="font-weight: 700; font-size: 16px;">Reg. No. SX -${cert.register_no}</h3>
                                                                        </div>
                                                                        <div style="font-family: 'Times New Roman', serif; font-size: 23px; font-weight: 500; color: #4D4D4D; line-height: 35px; text-align: justify; margin: 2rem 6rem 2rem 0rem;">
                                                                            The Academic Council of Smart - X, “Vocational Training Organization” having duly examined <strong><span style="color:#0a68ca">${cert.student_name}</span></strong> during and after <strong>${cert.duration}</strong> months of study on the specified curriculum and having found the candidate’s performance to be <strong>${cert.performance}</strong> have pleasure in recognizing this attainment with the award of this advanced certificate in <strong><span style="color:#0a68ca">${cert.course_name}</span></strong> <strong>${cert.institute}</strong> given under our hand and seal on this, the <strong>${day}</strong> day of <strong>${month}, ${year}</strong> at <strong>${cert.location}</strong>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="display: flex;">
                                                                <img class="img-fluid" src="{{ asset('assets/images/01.png') }}" alt="" style="height: 60px; margin-top: 2rem;">
                                                                <img class="img-fluid" src="{{ asset('assets/images/03.PNG') }}" alt="" style="height: 120px; margin-left: 100px; margin-top: -60px;">
                                                                <div>
                                                                    <img class="img-fluid" src="{{ asset('assets/images/02.PNG') }}" alt="" style="height: 100px; margin-top: -60px;">
                                                                    <h4 style="font-weight: bold; font-size: 18px; text-align: right; margin-top: 10px;">DIRECTOR</h4>
                                                                </div>
                                                            </div>
                                                            <div style="margin-top: 60px;">
                                                                <div style="height: 1px; width: 100%; background-color: #3fbbf2;"></div>
                                                                <div style="background-color: #3fbbf2; width: 100%; height: 30px; margin-top: 1rem;">
                                                                    <div style="background-color: #0071bb; width: 70%; height: 30px; border-radius: 0px 50px 0px 0px;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    `;
                                } else if (category === "Fashion Designing Courses") {
                                    certificateHTML = `

                                        <section style="margin: 0; padding: 0; box-sizing: border-box; font-family: 'Metrophobic', sans-serif;">
                                            <div style="display: flex; align-items: end; gap: 20px; margin: 0px 0px 0px 40px;">
                                                <img class="img-fluid" src="{{ asset('assets/images/07.PNG') }}" alt="" style="height: 120px;">
                                                <div style="display: flex; gap: 20px; align-items: end; border-bottom: 2px solid #f1848d; padding: 0px 0px 4px 30px; width: 100%; margin-left: -40px;">
                                                    <div>
                                                        <img class="img-fluid" src="{{ asset('assets/images/09.PNG') }}" alt="" style="height: auto; width: 160px; margin-bottom: 5px;">
                                                        <h2 style="font-weight: 800; font-size: 13px; margin: 0; padding: 0;">Kerala Institute Of Fashion Designing<br>VOCATIONAL TRAINING ORGANIZATION</h2>
                                                    </div>
                                                    <div style="height: 80px; width: 2px; background-color: #f1848d; position: relative; z-index: 100;"></div>
                                                    <div>
                                                        <h5 style="font-weight: 700; font-size: 17px; margin: 0; padding: 0;">Govt. Of Kerala Regd. CA 143/10</h5>
                                                        <h6 style="font-weight: 700; font-size: 16px; margin: 0; padding: 0;">An ISO 9001-2015 Certified Organization</h6>
                                                        <p style="font-weight: 600; font-size: 14px; margin: 0; padding: 0;">Mannarkkad, Palakkad, Kerala, India - 678 582<br>www.smartxkerala.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="display: flex; gap: 4rem;">
                                                <div>
                                                    <img class="img-fluid" src="{{ asset('assets/images/04.PNG') }}" alt="" style="width: 140px; margin-left: 40px;">
                                                    <div style="border-radius: 5px; border: 1px solid black; padding: 10px; width: 190px; position: relative; z-index: 100;">
                                                        <h6 style="text-decoration: underline; font-size: 12px; font-weight: 600; text-align: center;">PERCENTAGE OF MARKS</h6>
                                                        <div style="display: flex; margin-top: 1rem;"><p style="width: 90%; font-size: 12px; font-weight: 500;">80 & Above</p><p>A+</p></div>
                                                        <div style="display: flex;"><p style="width: 90%; font-size: 12px; font-weight: 500;">60 & Below 80</p><p>A</p></div>
                                                        <div style="display: flex;"><p style="width: 90%; font-size: 12px; font-weight: 500;">50 % Below 60</p><p>B+</p></div>
                                                        <div style="display: flex;"><p style="width: 90%; font-size: 12px; font-weight: 500;">Below 50</p><p>B</p></div>
                                                    </div>
                                                </div>
                                                <div style="display: flex;flex-direction: column;">
                                                    <div style="display: flex; align-items: end; gap: 104px; width: 100%; margin-top: 35px; margin-left: 15%;">
                                                        <img class="img-fluid" src="{{ asset('assets/images/Certificate-head.png') }}" alt="" style="width: 350px;">
                                                        <h3 style="font-weight: 700; font-size: 16px;">Reg. No. KIFD - ${cert.register_no}</h3>
                                                    </div>
                                                    <div style="font-family: 'Times New Roman', serif; font-size: 23px; font-weight: 500; color: #4D4D4D; line-height: 35px; text-align: justify; margin: 2rem 6rem 2rem 0rem;">
                                                        The Academic Council of KIFD (Kerala Institute of Fashion Designing), “Vocational Training Organization” having duly examined <strong><span style="color:rgb(211, 5, 5)">${cert.student_name}</span></strong> during and after <strong>${cert.duration}</strong> months of study on the specified curriculum and having found the candidate’s performance to be <strong>${cert.performance}</strong> have pleasure in recognizing this attainment with the award of this advanced certificate in <strong><span style="color:rgb(211, 5, 5)">${cert.course_name}</span></strong>, <strong>${cert.institute}</strong> given under our hand and seal on this, the <strong>${day}</strong> day of <strong>${month}, ${year}</strong> at <strong>${cert.location}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="display: flex;">
                                                <img class="img-fluid" src="{{ asset('assets/images/01.png') }}" alt="" style="height: 60px; margin-top: 2rem;">
                                                <img class="img-fluid" src="{{ asset('assets/images/06.PNG') }}" alt="" style="height: 120px; margin-left: 100px; margin-top: -60px;">
                                                <div>
                                                    <img class="img-fluid" src="{{ asset('assets/images/02.PNG') }}" alt="" style="height: 100px; margin-top: -60px;">
                                                    <h4 style="font-weight: bold; font-size: 18px; text-align: right; margin-top: 10px;">DIRECTOR</h4>
                                                </div>
                                            </div>
                                            <div style="margin-top: 60px;">
                                                <div style="height: 1px; width: 100%; background-color: #f298b0;"></div>
                                                <div style="background-color: #f298b0; width: 100%; height: 30px; margin-top: 1rem;">
                                                    <div style="background-color: #ee5b72; width: 70%; height: 30px; border-radius: 0px 50px 0px 0px;"></div>
                                                </div>
                                            </div>
                                        </section>


                                    `;
                                }
                                $("#certificate-display").append(certificateHTML);
                            });
                        }
                        
                    });
                };
                document.head.appendChild(script);
            });
        </script>
        <div id="certificate-display"></div>
        <style>
            @media print {
                .datatable-wrapper, .dataTables_length, .dataTables_filter, .dataTables_info, .dataTables_paginate, table {
                    display: none !important;
                }
                body * {
                    visibility: hidden;
                }
                #certificate-display, #certificate-display * {
                    visibility: visible;
                }
                #certificate-display {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                }

                .certificate {
                    page-break-after: always;
                    break-inside: avoid; 
                    padding: 10px;
                    margin: 0 auto; 
                    max-height: 100vh; 
                    width: 100%;
                }

                h2, h3, h5, h6 {
                    font-size: 14px !important;
                    margin: 2px 0 !important;
                }
                p {
                    font-size: 12px !important;
                    margin: 2px 0 !important;
                }

                .img-fluid {
                    max-width: 100%;
                    height: auto;
                }

                .certificate div {
                    padding: 5px;
                    margin: 0;
                }

                .header, .footer, .navbar, .buttons {
                    display: none !important;
                }
            }

        </style>

        <script>
            
            document.addEventListener("DOMContentLoaded", function () {
                setTimeout(() => {
                    const syllabusContainer = document.querySelector(".overlay-text");
                    const screenWidth = window.innerWidth;
                    const lineHeight = parseFloat(window.getComputedStyle(syllabusContainer).lineHeight);
                    const totalLines = Math.floor(syllabusContainer.scrollHeight / lineHeight);

                    let columns = 1;
                    if (totalLines >= 50) { 
                        columns = 4;
                    } else if (totalLines >= 35) {
                        columns = 3;
                    } else if (totalLines >= 20) {
                        columns = 2;
                    } else {
                        columns = 1;
                    }
                    if (screenWidth < 768) {
                        columns = 1;
                    }
                    syllabusContainer.style.columnCount = columns;

                }, 100); 
            });

        </script>
    
    </body>

</html>