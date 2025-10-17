@extends('layouts.dashboard')
@section('student')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Students</li>
                    </ol>
                </div>
                <h4 class="page-title">Students</h4>
            </div>
        </div>
      </div>
    <!-- end page title -->
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{ route('students.add') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add </a>
                        </div>
                        <div class="col-sm-7">
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck1">
                                            <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Student</th>
                                    <th>Name</th>
                                    <th>Register No.</th>  
                                    <th>Student ID</th>                             
                                    <th>Course</th>
                                    <th>Batch</th>
                                    <th style="width: 75px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student_main as $student)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td class="table-user">
                                            @if ($student['profile_image'])
                                                <img src="{{ env('APP_URL') . '/' . str_replace('public/', '', $student['profile_image']) }}" class="me-2 rounded-circle">
                                            @else
                                                <span class="small text-danger">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $student['name'] }}</td>
                                        <td>{{ $student['email'] }}</td>
                                        <td><span class="fw-semibold">{{ $student['phone_number'] }}</span></td>
                                        <td>{{ $student['user_role'] }}</td>
                                        <td>
                                            @if($student['status'] == 1)
                                                <button type="button" class="btn btn-soft-success rounded-pill">Active</button>
                                            @else
                                                <button type="button" class="btn btn-soft-danger rounded-pill">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-editStudent-modal{{ $student['student_id'] }}">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#delete-alert-modal{{ $student['student_id'] }}">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal-->
                                    <div class="modal fade" id="bs-editStudent-modal{{ $student['student_id'] }}" tabindex="-1" role="dialog" aria-labelledby="editStudentLabel{{ $student['student_id'] }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editStudentLabel{{ $student['student_id'] }}">Edit User</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('student.update/{id}', $student['student_id']) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf                                        
                                                        <div class="row">
                                                            <!-- Center Name -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="center_name" class="form-label">Name</label>
                                                                    <input type="text" class="form-control" id="center_name" name="name" value="{{ $student['name'] }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="district" class="form-label">User Role</label>
                                                                    <select class="form-select" id="example-select" name="user_role" >
                                                                        <option value="">{{ $student['user_role'] }}</option>
                                                                        <option value="">Select option</option>
                                                                        @foreach ($roles as $item)
                                                                            <option value="{{ $item->role_id }}">{{ $item->role_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Current Image</label><br>
                                                                    @if ($student['profile_image'])
                                                                        <img src="{{ env('APP_URL') . '/' . str_replace('public/', '', $student['profile_image']) }}" class="me-2 img-fluid avatar-xl">
                                                                    @else
                                                                        <span class="small text-danger">No Image</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                     
                                                            <!-- Address -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $student['email'] }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="phone_number" class="form-label">Phone Number</label>
                                                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $student['phone_number'] }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label">Status: </label></br/>
                                                                    <input type="hidden" name="status" value="0"> 
                                                                    <input type="checkbox" name="status" id="switch{{ $student['student_id'] }}" value="1"  {{ $student['status'] == 1 ? 'checked' : '' }}  data-switch="success" />  
                                                                    <label for="switch{{ $student['student_id'] }}" data-on-label="" data-off-label=""></label>
                                                                </div>                                                                                                                            
                                                                
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Upload New Image</label>
                                                                    <input type="file" name="profile_image" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                              
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                    <!-- Delete Alert Modal  -->
                                    <div id="delete-alert-modal{{ $student['student_id'] }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body p-4">
                                                    <div class="text-center">
                                                        <i class="ri-information-line h1 text-info"></i>
                                                        <h4 class="mt-2">Heads up!</h4>
                                                        <p class="mt-3">Do you want to delete this User?</p>
                                                        <form action="{{ route('student.delete/{id}', $student['student_id']) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger my-2">Delete</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    

                                @endforeach
                            </tbody>
                        </table>
                    </div>             
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

 
@endsection