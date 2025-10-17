@extends('layouts.dashboard')
@section('add-marklist')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add MarkList</li>
                    </ol>
                </div>
                <h4 class="page-title">Add MarkList</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->  

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Add MarkList</h4>    
                    <div class="row justify-content-center">
                        {{-- Display general messages --}}
                        @if ($message = session()->get('message'))
                            <div class="alert alert-success text-center w-75">
                                <h6 class="text-center fw-bold">{{ $message }}...</h6>
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
                                            
                    <div class="tab-content">
                        <div class="tab-pane show active" id="custom-styles-preview">
                            <form class="needs-validation" method="POST" action="{{ route('marklist.store') }}" enctype="multipart/form-data"  novalidate>
                                @csrf
                               <div class="row">
                                   <div class="col-12">
                                       <div class="card">
                                           <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
            
                                                        <div class="mb-2">
                                                            <label for="name" class="form-label">Student Name</label>
                                                            <input type="text" name="name"  value="{{ old('name') }}" class="form-control"  id="name"  placeholder="Enter student name" >
                                                            @error('name')
                                                                <p class="small text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="mb-2">
                                                            <label for="email" class="form-label"> Student Email</label>
                                                            <input type="text" name="email"  value="{{ old('email') }}" class="form-control"  id="email"  placeholder="Enter Student email" >
                                                            @error('email')
                                                                <p class="small text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="phone" class="form-label"> Student Phone Number</label>
                                                            <input type="text" name="phone"  value="{{ old('phone') }}" class="form-control"  id="phone"  placeholder="Enter phone number" >
                                                            @error('phone')
                                                                <p class="small text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="dob" class="form-label">Date of Birth</label>
                                                            <input type="date" name="dob"  value="{{ old('dob') }}" class="form-control"  id="dob"  placeholder="Enter Student dob" >
                                                            @error('dob')
                                                                <p class="small text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3 ">
                                                            <label for="image" class="form-label">Upload Image</label>
                                                            <input type="file" class="form-control" id="image" name="image">
                                                        </div> 
                                                                        
                                                        <div class="mb-1"> 
                                                            <label for="example-select" class="form-label">Course<span style="color:red">*</span></label>                                                       
                                                            <select class="form-select mb-3" name="course_id" required>
                                                                <option selected>Select Course</option>
                                                                @foreach ($courses as $item)
                                                                    <option value="{{ $item->course_id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>     
                                                        </div>
                                                                
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label for="register_no" class="form-label"> Register Number<span style="color:red">*</span></label>
                                                            <input type="text" name="register_no"  value="{{ old('register_no') }}" class="form-control"  id="register_no"  placeholder="Enter Student register no"  required>
                                                            @error('register_no')
                                                                <p class="small text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>
                
                                                        <div class="mb-2">
                                                            <label for="student_id_no" class="form-label"> Student ID<span style="color:red">*</span></label>
                                                            <input type="text" name="student_id_no"  value="{{ old('student_id_no') }}" class="form-control"  id="student_id_no"  placeholder="Enter Student ID"  required>
                                                            @error('student_id_no')
                                                                <p class="small text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>
                
                                                        <div class="mb-2">
                                                            <label for="joined_date" class="form-label">Joined Date</label>
                                                            <input type="date" name="joined_date"  value="{{ old('joined_date') }}" class="form-control"  id="joined_date"  placeholder="Ente joined date">
                                                            @error('joined_date')
                                                                <p class="small text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>
                
                                                        <div class="mb-2">
                                                            <label for="issued_date" class="form-label">Issued Date</label>
                                                            <input type="date" name="issued_date"  value="{{ old('issued_date') }}" class="form-control"  id="issued_date"  placeholder="Enter issued date">
                                                            @error('issued_date')
                                                                <p class="small text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>
                
                                                        
                                                        <div class="mb-2">
                                                            <label for="institute" class="form-label"> Institute</label>
                                                            <input type="text" name="institute"  value="{{ old('institute') }}" class="form-control"  id="institute"  placeholder="Enter Institute name">
                                                            @error('institute')
                                                                <p class="small text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>
                  
                                                    </div>
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                 <div class="row">     
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="practcal_mark" class="form-label"> Practical Mark</label>
                                                            <input type="text" name="practical_mark" value="{{ old('practical_mark') }}" class="form-control"  id="practcal_mark"  placeholder="Enter course Practcal Mark" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="theory_mark" class="form-label"> Theory Mark</label>
                                                            <input type="text" name="theory_mark" value="{{ old('theory_mark') }}" class="form-control" id="theory_mark" placeholder="Enter Theory Mark" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="percentage" class="form-label"> Percentage</label>
                                                            <input type="text" name="percentage" value="{{ old('percentage') }}" class="form-control"  id="percentage"  placeholder="Enter percentage" required>
                                                        </div> 
                                                        <div class="mb-3">
                                                            <label for="grade" class="form-label"> Grade</label>
                                                            <input type="text" name="grade" value="{{ old('grade') }}" class="form-control"  id="grade"  placeholder="Enter course Grade" required>
                                                        </div>
                                                    </div>
                                                </div>   
                                             </div>
                                         </div>
                                     </div>
                                 </div> 
 
                                <!-- Submit Button -->
                                <div class="text-start">
                                    <button type="submit" class="btn btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
    

@endsection