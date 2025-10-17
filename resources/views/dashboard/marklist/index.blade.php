@extends('layouts.dashboard')
@section('marklist')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">MarkLists</li>
                    </ol>
                </div>
                <h4 class="page-title">MarkLists</h4>
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
                            <a href="{{ route('marklist.add') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add </a>
                        </div>
                        <div class="col-sm-7">
                            <div class="text-sm-end">
                                {{-- <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button> --}}
                                <button type="button" class="btn btn-light mb-2 me-1">
                                    <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-importMarkList-modal">
                                        <i class="mdi mdi-square-edit-outline"></i>
                                        Import
                                    </a>
                                </button>
                                {{-- <button type="button" class="btn btn-light mb-2">Export</button> --}}
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>Student</th>
                                    <th>Register No.</th> 
                                    <th>Course</th> 
                                    <th>Total</th>  
                                    <th>Percentage</th>  
                                    <th>Grade</th>
                                    <th style="width: 75px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marklist_main as $list)
                                    <tr> 
                                    <td class="table-user">
                                        @if (!empty($list['image']))
                                            <img src="{{ env('STORAGE_URL') . '/' . $list['image']  }}" class="me-2 rounded-circle" width="50" height="50" alt="Student Image">
                                        @else
                                            <span class="small text-danger">No Image</span>
                                        @endif
                                    </td>
                                        <td>{{ $list['register_no'] }}</td>
                                        <td>{{ Str::limit($list['course'], 30, '...') }}</td>
                                        <td><span class="fw-semibold">{{ $list['total'] }}</span></td>
                                        <td>{{ $list['percentage'] }}</td>
                                        <td>{{ $list['grade'] }}</td>
                                        <td>                                       
                                            <a href="{{ route('marklist.view/{id}', $list['student_id']) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-editMarkList-modal{{ $list['student_id'] }}">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#delete-alert-modal{{ $list['student_id'] }}">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal-->
                                    <div class="modal fade" id="bs-editMarkList-modal{{ $list['student_id'] }}" tabindex="-1" role="dialog" aria-labelledby="editMarkListLabel{{ $list['student_id'] }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editMarkListLabel{{ $list['student_id'] }}">Edit MarkList</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('marklist.update/{id}', $list['student_id']) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf                                        
                                                        <div class="row">
                                                            <div class="col-lg-6">
                        
                                                                <div class="mb-2">
                                                                    <label for="name" class="form-label">Student Name</label>
                                                                    <input type="text" name="name"  value="{{$list['name'] }}" class="form-control"  id="name"  placeholder="Enter student name" >
                                                                </div>
                                                                
                                                                <div class="mb-2">
                                                                    <label for="email" class="form-label"> Student Email</label>
                                                                    <input type="text" name="email"  value="{{ $list['email'] }}" class="form-control"  id="email"  placeholder="Enter Student email" >
                                                                </div>
                        
                                                                <div class="mb-2">
                                                                    <label for="phone" class="form-label"> Student Phone Number</label>
                                                                    <input type="text" name="phone"  value="{{ $list['phone'] }}" class="form-control"  id="phone"  placeholder="Enter phone number" >
                                                                </div>
                        
                                                                <div class="mb-2">
                                                                    <label for="dob" class="form-label">Date of Birth</label>
                                                                    <input type="date" name="dob"  value="{{ $list['dob'] }}" class="form-control"  id="dob"  placeholder="Enter Student dob" >
                                                                </div>
                                                                
                                                                <div class="mb-3 ">
                                                                    <label for="image" class="form-label">Upload Image</label>
                                                                    <input type="file" class="form-control" id="image" name="image">
                                                                </div> 
                                                                <!-- Current Image -->
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Current Image</label><br>
                                                                    @if ($list['image'])
                                                                        <img src="{{env('STORAGE_URL') . '/' . $list['image'] }}" class="me-2 img-fluid avatar-xl" width="50" height="50" alt="Student Image">
                                                                    @else
                                                                        <span class="small text-danger">No Image</span>
                                                                    @endif
                                                                </div>
                                                                                                                                
                                                            </div>     
                        
                                                            <div class="col-lg-6">
                                                                <div class="mb-2">
                                                                    <label for="register_no" class="form-label"> Register Number</label>
                                                                    <input type="text" name="register_no"  value="{{ $list['register_no'] }}" class="form-control"  id="register_no"  placeholder="Enter Student register no"  >
                                                                </div>
                        
                                                                <div class="mb-2">
                                                                    <label for="student_id_no" class="form-label"> Student ID</label>
                                                                    <input type="text" name="student_id_no"  value="{{ $list['student_id_no'] }}" class="form-control"  id="student_id_no"  placeholder="Enter Student ID"  >
                                                                </div>
                        
                                                                <div class="mb-2">
                                                                    <label for="joined_date" class="form-label">Joined Date</label>
                                                                    <input type="date" name="joined_date"  value="{{ $list['joined_date'] }}" class="form-control"  id="joined_date"  placeholder="Ente joined date">
                                                                </div>
                        
                                                                <div class="mb-2">
                                                                    <label for="issued_date" class="form-label">Issued Date</label>
                                                                    <input type="date" name="issued_date"  value="{{$list['issued_date']}}" class="form-control"  id="issued_date"  placeholder="Enter issued date">
                                                                </div>
                        
                                                                
                                                                <div class="mb-2">
                                                                    <label for="institute" class="form-label"> Institute</label>
                                                                    <input type="text" name="institute"  value="{{ $list['institute'] }}" class="form-control"  id="institute"  placeholder="Enter Institute name">
                                                                </div>
                        
                                                                <div class="mb-1"> 
                                                                    <label for="example-select" class="form-label">Course</label>                                                       
                                                                    <select class="form-select mb-3" name="course_id" >
                                                                        <option value="" disabled>Select Course</option>
                                                                        @foreach ($courses as $item)
                                                                            <option value="{{ $item->course_id }}" {{ $item->name == $list['course'] ? 'selected' : '' }}> 
                                                                                {{ $item->name }} 
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="row">
                                                           
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="practcal_mark" class="form-label"> Practcal Mark</label>
                                                                    <input type="text" name="practcal_mark" value="{{ $list['practcal_mark']}}" class="form-control"  id="practcal_mark"  placeholder="Enter course Practcal Mark" >
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="percentage" class="form-label"> Percentage</label>
                                                                    <input type="text" name="percentage" value="{{ $list['percentage']}}" class="form-control"  id="percentage"  placeholder="Enter percentage" >
                                                                </div> 
                                                                
                                                            </div>
                        
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="theory_mark" class="form-label"> Theory Mark</label>
                                                                    <input type="text" name="theory_mark" value="{{ $list['theory_mark'] }}" class="form-control" id="theory_mark" placeholder="Enter Theory Mark" >
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="grade" class="form-label"> Grade</label>
                                                                    <input type="text" name="grade" value="{{ $list['grade'] }}" class="form-control"  id="grade"  placeholder="Enter course Grade" >
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="max_mark" class="form-label"> maximum Mark</label>
                                                                    <input type="text" name="max_mark" value="{{ $list['max_mark']}}" class="form-control" id="max_mark"  placeholder="Enter course maximum Mark" disabled>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="total" class="form-label"> Total Mark</label>
                                                                    <input type="text" name="total" value="{{ $list['total']}}" class="form-control" id="total" disabled>
                                                                </div>
                                                                     
                                                            </div>

                                                        </div>
                                                        <!-- Submit Button -->                                                 
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                    <!-- Delete Alert Modal  -->
                                    <div id="delete-alert-modal{{ $list['student_id'] }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body p-4">
                                                    <div class="text-center">
                                                        <i class="ri-information-line h1 text-info"></i>
                                                        <h4 class="mt-2">Heads up!</h4>
                                                        <p class="mt-3">Do you want to delete this Marklist?</p>
                                                        <form action="{{ route('marklist.delete/{id}', $list['student_id']) }}" method="POST">
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
                    
                    
                    <!-- Import Modal-->
                    <div class="modal fade" id="bs-importMarkList-modal" tabindex="-1" role="dialog" aria-labelledby="importMarkListLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="importMarkListLabel">Import MarkList</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                </div>
                                <div class="modal-body">
                                    @if (session('status'))
                                        <script>
                                            alert("Success: {{ session('status') }}");
                                        </script>
                                    @endif                                  

                                    @if ($errors->any())
                                        <script>
                                            alert("Error: {{ $errors->first() }}");
                                        </script>
                                    @endif
                                     <!-- Sample File Download -->
                                    <div class="mb-3">
                                        <p>Download the <a href="{{ asset('marklist.xlsx') }}" download>Sample Excel File</a> for Marklist</p>
                                    </div>
                                    <div class="mb-3">
                                        <p>The course name should be same as on database</p>
                                    </div>

                                   <form action="{{ route('marklist.import') }}" method="POST" enctype="multipart/form-data">
                                       @csrf
                                       <div class="row">
                                           <div class="mb-3">
                                               <label for="file" class="form-label">Upload Excel/CSV File</label>
                                               <input type="file" class="form-control" id="file" name="file" >
                                           </div>
                                       </div>
                                       <!-- Submit Button -->
                                       <button type="submit" class="btn btn-primary">Import Data</button>
                                   </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    


                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

 
@endsection