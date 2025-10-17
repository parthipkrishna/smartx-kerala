@extends('student-dashboard.layouts.dashboard')
@section('student-profile')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Student-Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    
    
    <div class="row">
        <div class="col-sm-12">
            <!-- Profile -->
            <div class="card bg-primary">
                <div class="card-body profile-user-box">
                    <div class="row">
                        @foreach ($profile as $item)
                            <div class="col-sm-10">
                          
                            
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar-lg">
                                            <img src="{{ !empty($item['image']) ? env('STORAGE_URL') . '/' . str_replace('public/', '', $item['image']) : asset('Frontend-assets/images/avathar.png') }}" alt="" height="90"
                                                class="rounded-circle img-thumbnail">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <h4 class="mt-1 mb-1 text-white">{{ $item['name'] }}</h4>
                                            <p class="font-13 text-white-50"> Student</p>
    
                                            <ul class="mb-0 list-inline text-light">
                                                <li class="list-inline-item me-5">
                                                    <h5 class="mb-1 text-white">{{ $item['register_no'] }}</h5>
                                                    <p class="mb-0 font-13 text-white-50">Register No.</p>
                                                </li>

                                                <li class="list-inline-item me-5">
                                                    <h5 class="mb-1 text-white">{{ $item['student_id_no'] }}</h5>
                                                    <p class="mb-0 font-13 text-white-50">Student ID
                                                    </p>
                                                </li>
                                                <li class="list-inline-item me-5">
                                                    <h5 class="mb-1 text-white">{{ $item['course'] }}</h5>
                                                    <p class="mb-0 font-13 text-white-50">Course
                                                    </p>
                                                </li>
                                                <li class="list-inline-item ">
                                                    <h5 class="mb-1 text-white">{{ $item['institute'] }}</h5>
                                                    <p class="mb-0 font-13 text-white-50">Institute
                                                    </p>
                                                </li>
                                            </ul>

                                            <ul class="mb-0 list-inline text-light mt-3">
                                                <li class="list-inline-item me-5">
                                                    <h5 class="mb-1 text-white">{{ $item['joined_date'] }}</h5>
                                                    <p class="mb-0 font-13 text-white-50">Joined Date</p>
                                                </li>

                                                <li class="list-inline-item me-5">
                                                    <h5 class="mb-1 text-white">{{ $item['dob'] }}</h5>
                                                    <p class="mb-0 font-13 text-white-50">Date of Birth
                                                    </p>
                                                </li>
                                                <li class="list-inline-item me-5">
                                                    <h5 class="mb-1 text-white">{{ $item['email'] }}</h5>
                                                    <p class="mb-0 font-13 text-white-50">Email
                                                    </p>
                                                </li>
                                                <li class="list-inline-item ">
                                                    <h5 class="mb-1 text-white">{{ $item['phone'] }}</h5>
                                                    <p class="mb-0 font-13 text-white-50">Phone
                                                    </p>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            
                            </div> <!-- end col-->
    
                            <div class="col-sm-2">
                                <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                    <button type="button" class="btn btn-light">
                                        <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-editProfile-modal{{ $item['student_id'] }}">
                                            <i class="mdi mdi-account-edit me-1"></i> Edit Profile
                                        </a>
                                    </button>
                                </div>
                            </div> <!-- end col-->

                            <!-- Edit Modal-->
                            <div class="modal fade" id="bs-editProfile-modal{{ $item['student_id'] }}" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel{{ $item['student_id'] }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="editProfileLabel{{ $item['student_id'] }}">Edit Profile</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('profile.update/{id}', $item['student_id']) }}" method="POST" enctype="multipart/form-data">
                                                @csrf                                        
                                                <div class="row">
                                                    <!-- Center Name -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="center_name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="center_name" name="name" value="{{ $item['name'] }}">
                                                        </div>
                            
                            
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Current Image</label><br>
                                                            @if ($item['image'])
                                                                <img src="{{ env('STORAGE_URL') . '/' . str_replace('public/', '', $item['image'])}}" class="me-2 img-fluid avatar-xl">
                                                            @else
                                                                <span class="small text-danger">No Image</span>
                                                            @endif
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Upload New Image</label>
                                                            <input type="file" name="image" class="form-control">
                                                        </div>
                                                    </div>
                             
                                                    <!-- Address -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="dob" class="form-label">Date of Birth</label>
                                                            <input type="date" class="form-control" id="dob" name="dob" value="{{ $item['dob'] }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email" name="email" value="{{ $item['email'] }}">
                                                        </div>
                            
                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Phone Number</label>
                                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $item['phone'] }}">
                                                        </div>
                                                        

                                                    </div>
                                                </div>
                                                                                                      
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            

                        @endforeach
                    </div> <!-- end row -->
    
                </div> <!-- end card-body/ profile-user-box-->
            </div><!--end profile/ card -->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
    
@endsection