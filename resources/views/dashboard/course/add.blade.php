@extends('layouts.dashboard')
@section('add-courses')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Course</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Course</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->  

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Add Course</h4>    
                    <div class="row justify-content-center">
                        @if ($message = session()->get('message'))
                            <div class="alert alert-success text-center w-75">
                                <h6 class="text-center fw-bold">{{ $message }}...</h6>
                            </div>
                        @endif  
                    </div>
                                            
                    <div class="tab-content">
                        <div class="tab-pane show active" id="custom-styles-preview">
                            <form class="needs-validation" method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data"  novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="mb-2">
                                            <label for="code" class="form-label">Course Code<span style="color:red">*</span></label>
                                            <input type="text" name="code"  value="{{ old('code') }}" class="form-control"  id="code"  placeholder="Enter course code"  required>
                                            @error('code')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-2">
                                            <label for="name" class="form-label">Course Name</label>
                                            <input type="text" name="name"  value="{{ old('name') }}" class="form-control"  id="name"  placeholder="Enter course name" >
                                            @error('name')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="duration" class="form-label">Course Duration</label>
                                            <input type="text" name="duration"  value="{{ old('duration') }}" class="form-control"  id="duration"  placeholder="Enter course duration" required>
                                            @error('duration')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        
                                    </div>                             
                                    <!-- File Upload -->
                                    <div class="col-lg-6">
                                        <div class="mb-1">
                                            <label for="example-select" class="form-label">Category<span style="color:red">*</span></label>                                                       
                                            <select class="form-select mb-3" name="category_id" required>
                                                <option selected>Select Category</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->category_id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>     
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Batch</label>                                                 
                                            <select class="select2 form-control select2-multiple" name="batch[]" multiple data-placeholder="Choose ...">
                                                <optgroup label="Select Batches for the courses">
                                                    @foreach ($batches as $item)
                                                        <option value="{{ $item->batch_id }}">{{ $item->batch_type }}</option>
                                                    @endforeach                                               
                                                </optgroup>
                                            </select>                                           
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Holiday Batch</label>                                                 
                                            <select class="select2 form-control select2-multiple" name="holiday_batch[]" multiple data-placeholder="Choose ...">
                                                <optgroup label="Select Batches for the courses">
                                                    @foreach ($batches as $item)
                                                        <option value="{{ $item->batch_id }}">{{ $item->batch_type }}</option>
                                                    @endforeach                                               
                                                </optgroup>
                                            </select>                                           
                                        </div>

                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Syllabus</label>
                                            <textarea class="form-control" name="syllabus" value="{{ old('syllabus') }}" id="example-textarea" required></textarea>
                                            @error('syllabus')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Short Description</label>
                                            <textarea class="form-control" name="shortdescription" value="{{ old('shortdescription') }}" id="example-textarea" ></textarea>
                                            @error('shortdescription')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" value="{{ old('description') }}" id="example-textarea" ></textarea>
                                            @error('description')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="registration_fee" class="form-label">Course Registration Fee</label>
                                            <input type="text" name="registration_fee" value="{{ old('registration_fee') }}" class="form-control"  id="registration_fee"  placeholder="Enter course registration fee" required>
                                            @error('registration_fee')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="service_fee" class="form-label">Course Service Fee (if any)</label>
                                            <input type="text" name="service_fee" value="{{ old('service_fee') }}" class="form-control"  id="service_fee"  placeholder="Enter course service fee" >
                                            @error('service_fee')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div> 

                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="written_exam_fee" class="form-label">Course written Exam Fee</label>
                                            <input type="text" name="written_exam_fee" value="{{ old('written_exam_fee') }}" class="form-control"  id="written_exam_fee"  placeholder="Enter course written exam fee" required>
                                            @error('written_exam_fee')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="bank_fee" class="form-label">Course Bank Fee (if any)</label>
                                            <input type="text" name="bank_fee" value="{{ old('bank_fee') }}" class="form-control"  id="bank_fee"  placeholder="Enter course bank fee " >
                                            @error('bank_fee')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="practical_exam_fee" class="form-label">Course practical Exam Fee</label>
                                            <input type="text" name="practical_exam_fee" value="{{ old('practical_exam_fee') }}" class="form-control"  id="practical_exam_fee"  placeholder="Enter course practical exam fee" required>
                                            @error('practical_exam_fee')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 ">
                                            <label for="image" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>                                                                 
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status: <span style="color:red">*</span></label></br/>
                                            <input  type="checkbox" name="status"  id="switch3"  value="1"  checked  data-switch="success" onchange="this.value = this.checked ? 1 : 0;" />
                                            <label for="switch3" data-on-label="" data-off-label=""></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="featured" class="form-label">Featured: <span style="color:red">*</span></label></br/>
                                            <input  type="checkbox" name="featured"  id="switch3"  value="1"  checked  data-switch="success" onchange="this.value = this.checked ? 1 : 0;" />
                                            <label for="switch3" data-on-label="" data-off-label=""></label>
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