@extends('layouts.dashboard')
@section('add-certificate')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Certificate</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Certificate</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->  

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Add Certificate</h4>    
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
                            <form class="needs-validation" method="POST" action="{{ route('certificate.store') }}" enctype="multipart/form-data"  novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="mb-2">
                                            <label for="student_name" class="form-label">Student Name<span style="color:red">*</span></label>
                                            <input type="text" name="student_name"  value="{{ old('student_name') }}" class="form-control"  id="student_name"  placeholder="Enter student name" required>
                                            @error('student_name')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label for="performance" class="form-label"> Student Performance<span style="color:red">*</span></label>
                                            <input type="text" name="performance"  value="{{ old('performance') }}" class="form-control"  id="performance"  placeholder="Enter Student performance" required>
                                            @error('performance')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label for="issued_date" class="form-label">Issued Date<span style="color:red">*</span></label>
                                            <input type="date" name="issued_date"  value="{{ old('issued_date') }}" class="form-control"  id="issued_date"  placeholder="Enter issued date" required>
                                            @error('issued_date')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
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
                                            <label for="location" class="form-label"> Location<span style="color:red">*</span></label>
                                            <input type="text" name="location"  value="{{ old('location') }}" class="form-control"  id="location"  placeholder="Enter Location"  required>
                                            @error('location')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
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