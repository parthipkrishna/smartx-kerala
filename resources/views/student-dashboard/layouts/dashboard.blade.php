<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SmartXKetala Student Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('logo/logo.jpeg') }}">
        
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
                                    <img src="{{ asset('logo/logo.jpeg') }}" alt="logo" >
                                </span>
                                <span class="logo-sm">
                                    <img src="{{ asset('logo/logo.jpeg') }}" alt="small logo">
                                </span>
                            </a>
                            <!-- Logo Dark -->
                            <a href="{{ route('/home') }}" class="logo-dark">
                                <span class="logo-lg">
                                    <img src="{{ asset('logo/logo.jpeg') }}" alt="dark logo">
                                </span>
                                <span class="logo-sm">
                                    <img src="{{ asset('logo/logo.jpeg') }}" alt="small logo">
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
                    </div>
                    <ul class="topbar-menu d-flex align-items-center gap-3">
                        <li class="dropdown">
                            @php
                                $student = \App\Models\Student::find(session('student_id'));
                            @endphp                             
                            <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="{{ !empty($student->image) ?env('STORAGE_URL') . '/' . str_replace('public/', '', $student->image) : asset('Frontend-assets/images/avathar.png') }}" 
                                        alt="student-image" width="40" height="40" class="rounded-circle">
                                </span>
                                
                                @if($student)
                                    <span class="d-lg-flex flex-column gap-1 d-none">
                                        <h5 class="my-0">{{ $student->name }}</h5>
                                        <h6 class="my-0 fw-normal">Student</h6>
                                    </span>
                                @else
                                    <span class="d-lg-flex flex-column gap-1 d-none">
                                        <h5 class="my-0">Guest</h5>
                                        <h6 class="my-0 fw-normal">Student</h6>
                                    </span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>  

                                <!-- item-->
                                <a href="{{ route('student-profile', session('student_id')) }}" class="dropdown-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>My Account</span>
                                </a>    

                                <!-- item-->
                                <form action="{{ route('student-logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item border-0 bg-transparent w-100 text-start">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                                
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->   

            <!-- ========== Left Sidebar Start ========== style="height: 90px; width: 50%; margin-top: 10px;"-->
            <div class="leftside-menu">
                <!-- Brand Logo Light -->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('logo/logo-white.png') }}" alt="logo" style="height: 55px;">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('logo/logo.jpeg') }}" alt="small logo">
                    </span>
                </a>
                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('logo/logo.jpeg') }}" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('logo/logo.jpeg') }}" alt="small logo">
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
                        <a href="pages-profile.html">
                            <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42"
                                class="rounded-circle shadow-sm">
                            <span class="leftbar-user-name mt-2"></span>
                        </a>
                    </div>  

                    <!--- Sidemenu -->
                    <ul class="side-nav">   

                        <li class="side-nav-title">Student Management</li>   
                            @if(session()->has('student_id'))
                                <li class="side-nav-item"> 
                                    <a href="{{ route('student-certificate', session('student_id')) }}" class="side-nav-link">
                                        <i class="fa-solid fa-certificate"></i>
                                        <span> Certificates </span>
                                    </a>
                                </li> 
                            @else
                                <li class="side-nav-item"> 
                                    <a href="#" class="side-nav-link disabled">
                                        <i class="fa-solid fa-certificate"></i>
                                        <span> Certificates </span>
                                    </a>
                                </li> 
                            @endif
                            
                            @if(session()->has('student_id'))
                                {{-- <li class="side-nav-item"> 
                                    <a href="{{ route('student-certificate', session('student_id')) }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span> Certificates </span>
                                    </a>
                                </li>  --}}
                                <li class="side-nav-item">
                                    <a href="{{ route('student-marklist', session('student_id')) }}" class="side-nav-link">
                                        <i class="fa-solid fa-ranking-star"></i>
                                        <span> MarkList </span>
                                    </a>
                                </li>
                            @else
                                <li class="side-nav-item">
                                    <a href="#" class="side-nav-link">
                                        <i class="fa-solid fa-ranking-star"></i>
                                        <span> MarkList </span>
                                    </a>
                                </li>
                            @endif

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
                        @yield('student-home')
                        @yield('student-profile')
                        @yield('preview-certificate')
                        @yield('preview-marklist')
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

        {{-- download --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

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
            document.getElementById("downloadCertificate").addEventListener("click", function () {
                const element = document.getElementById("certificateSection"); 
                html2pdf()
                    .set({
                        margin: 10,
                        filename: 'certificate.pdf',
                        image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 2, useCORS: true },
                        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                    })
                    .from(element)
                    .save();
            });
        </script>

        <script>
            document.getElementById("downloadMarklist").addEventListener("click", function () {
                const element = document.getElementById("marklistSection"); 
                html2pdf()
                    .set({
                        margin: 10,
                        filename: 'marklist.pdf',
                        image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 2, useCORS: true },
                        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                    })
                    .from(element)
                    .save();
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- jsPDF and html2canvas -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script>
            document.getElementById("downloadPDF").addEventListener("click", function () {
                const { jsPDF } = window.jspdf;
                let doc = new jsPDF("p", "mm", "a4");

                let content = document.querySelector(".main-section"); // Select content
                let button = document.getElementById("downloadPDF"); // Get the button

                button.style.display = "none"; // Temporarily hide the button

                html2canvas(content, { scale: 2 }).then((canvas) => {
                    let imgData = canvas.toDataURL("image/png");
                    let imgWidth = 210; // A4 width in mm
                    let pageHeight = 297; // A4 height in mm
                    let imgHeight = (canvas.height * imgWidth) / canvas.width;
                    let topMargin = 20; // Add 20mm space at the top

                    if (imgHeight > pageHeight - topMargin) {
                        let y = topMargin;
                        while (imgHeight > 0) {
                            let heightToPrint = imgHeight > pageHeight - y ? pageHeight - y : imgHeight;
                            doc.addImage(imgData, "PNG", 0, y, imgWidth, heightToPrint);
                            imgHeight -= heightToPrint;
                            if (imgHeight > 0) {
                                doc.addPage();
                                y = 10; // Maintain 10mm space on new pages
                            }
                        }
                    } else {
                        doc.addImage(imgData, "PNG", 0, topMargin, imgWidth, imgHeight);
                    }

                    doc.save("marklist.pdf");

                    button.style.display = "block"; // Restore button after download
                });
            });
        </script>
        <script>
                document.getElementById("downloadPDFcertificate").addEventListener("click", function () {
                const { jsPDF } = window.jspdf;
                const certificate = document.querySelector(".main-section"); // Target certificate section
                const downloadButton = document.getElementById("downloadPDFcertificate"); 

                // Hide the download button before capturing
                downloadButton.style.display = "none";

                html2canvas(certificate, { scale: 2 }).then((canvas) => {
                    const imgData = canvas.toDataURL("image/png");
                    const imgWidth = 210; // A4 width in mm
                    const pageHeight = 297; // A4 height in mm
                    const imgHeight = (canvas.height * imgWidth) / canvas.width; // Maintain aspect ratio

                    const pdf = new jsPDF("p", "mm", "a4"); 
                    const yPosition = (pageHeight - imgHeight) / 2; // Center vertically
                    
                    pdf.addImage(imgData, "PNG", 0, yPosition, imgWidth, imgHeight);
                    pdf.save("certificate.pdf");

                    // Show the download button again
                    downloadButton.style.display = "block";
                });
            });

        </script>

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