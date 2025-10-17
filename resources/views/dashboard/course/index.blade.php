@extends('layouts.dashboard')
@section('courses')
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Courses</li>
                    </ol>
                </div>
                <h4 class="page-title">Courses</h4>
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
                            <a href="{{ route('course.add') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add</a>
                        </div>
                        <div class="col-sm-7">
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                  
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Category</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Featured</th>
                                    <th style="width: 75px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course_main as $course)
                                    <tr>
                                       
                                        <td>
                                            {{ $course['code'] }}
                                        </td>
                                        <td>
                                            {{ Str::limit($course['name'], 20, '...') }}
                                        </td>
                                        <td>
                                            <span class="fw-semibold">{{ $course['category'] }}</span>
                                        </td>
                                        <td>
                                            {{ $course['duration'] }}
                                        </td>
                                        <td>
                                            @if($course['status'] ==1)
                                                <button type="button" class="btn btn-soft-success rounded-pill">Active</button>
                                            @else
                                                <button type="button" class="btn btn-soft-danger rounded-pill">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($course['featured'] ==1)
                                                <button type="button" class="btn btn-soft-success rounded-pill">Active</button>
                                            @else
                                                <button type="button" class="btn btn-soft-danger rounded-pill">Deactive</button>
                                            @endif
                                        </td>

                                        <td>
                                            {{-- <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-viewCourse-modal{{ $course['course_id'] }}">
                                                <i class="mdi mdi-eye"></i>
                                            </a> --}}

                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-editCourse-modal{{ $course['course_id'] }}">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#delete-alert-modal{{ $course['course_id'] }}">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal-->
                                    <div class="modal fade" id="bs-editCourse-modal{{ $course['course_id'] }}" tabindex="-1" role="dialog" aria-labelledby="editCourseLabel{{ $course['course_id'] }}" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editCourseLabel{{ $course['course_id'] }}">Edit Course</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('course.update/{id}', $course['course_id']) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf                                        
                                                        <div class="row">
                                                            <div class="col-lg-6">
                        
                                                                <div class="mb-2">
                                                                    <label for="code" class="form-label">Course Code<span style="color:red">*</span></label>
                                                                    <input type="text" name="code"  value="{{ $course['code'] }}" class="form-control"  id="code"  placeholder="Enter course code"  >
                                                                </div>
                        
                                                                <div class="mb-2">
                                                                    <label for="name" class="form-label">Course Name</label>
                                                                    <input type="text" name="name" value="{{ $course['name'] }}" class="form-control"  id="name"  placeholder="Enter course name" >
                                                                </div>
                        
                                                                <div class="mb-3">
                                                                    <label for="duration" class="form-label">Course Duration</label>
                                                                    <input type="text" name="duration"  value="{{ $course['duration'] }}" class="form-control"  id="duration"  placeholder="Enter course duration" >
                                                                </div>
                                                                
                                                            </div>                             
                                                            <!-- File Upload -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-1">
                                                                    <label for="example-select" class="form-label">Category<span style="color:red">*</span></label>                                                       
                                                                    <select class="form-select" id="example-select" name="category_id" >
                                                                        <option value="">{{ $course['category'] }}</option>
                                                                        <option value="">Select option</option>
                                                                        @foreach ($categories as $type)
                                                                            <option value="{{ $type->category_id }}">{{ $type->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="example-select" class="form-label">Batch</label>                                                 
                                                                    <select class="select2 form-control select2-multiple" name="batch[]" multiple data-placeholder="Choose ...">
                                                                        <optgroup label="Select Batches for the courses">
                                                                            @foreach ($batches as $batch_course)
                                                                                <option value="{{ $batch_course->batch_id }}" 
                                                                                    @if (!empty($course['batch_id']) && in_array($batch_course->batch_id, $course['batch_id'])) selected @endif>
                                                                                    {{ $batch_course->batch_type }}
                                                                                </option>
                                                                            @endforeach 
                                                                        </optgroup>
                                                                </select>                                           
                                                                </div>
                                                                                                                                
                                                                <div class="mb-3">
                                                                    <label for="example-select" class="form-label">Holiday Batch</label>
                                                                    <select class="select2 form-control select2-multiple" name="holiday_batch[]" multiple data-placeholder="Choose ...">
                                                                        <optgroup label="Select Holiday Batches for the courses">
                                                                            @foreach ($batches as $batch_course)
                                                                                <option value="{{ $batch_course->batch_id }}"
                                                                                    @if (in_array($batch_course->batch_id, $course['holiday_batch_id'])) selected @endif >
                                                                                    {{ $batch_course->batch_type }}
                                                                                </option>
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
                                                                    <textarea class="form-control" name="syllabus" id="example-textarea" rows="3" >{{ $course['syllabus'] }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Short Description</label>
                                                                    <textarea class="form-control" name="shortdescription" id="example-textarea" rows="3">{{ $course['shortdescription'] }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="phone_number" class="form-label">Description</label>
                                                                    <textarea class="form-control" name="description" id="example-textarea" rows="3">{{ $course['description'] }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="registration_fee" class="form-label">Course Registration Fee</label>
                                                                    <input type="text" name="registration_fee" value="{{ $course['registration_fee'] }}" class="form-control"  id="registration_fee"  placeholder="Enter course registration fee" >
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="service_fee" class="form-label">Course Service Fee (if any)</label>
                                                                    <input type="text" name="service_fee" value="{{ $course['service_fee'] }}" class="form-control"  id="service_fee"  placeholder="Enter course service fee" >
                                                                </div> 
                        
                                                            </div>
                        
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="written_exam_fee" class="form-label">Course written Exam Fee</label>
                                                                    <input type="text" name="written_exam_fee" value="{{ $course['written_exam_fee'] }}" class="form-control"  id="written_exam_fee"  placeholder="Enter course written exam fee" >
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="bank_fee" class="form-label">Course Bank Fee (if any)</label>
                                                                    <input type="text" name="bank_fee" value="{{ $course['bank_fee'] }}" class="form-control"  id="bank_fee"  placeholder="Enter course bank fee " >
                                                                </div>
                                                            </div>
                        
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="practical_exam_fee" class="form-label">Course practical Exam Fee</label>
                                                                    <input type="text" name="practical_exam_fee" value="{{ $course['practical_exam_fee'] }}" class="form-control"  id="practical_exam_fee"  placeholder="Enter course practical exam fee" >
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="total_fee" class="form-label">Course Total Fee</label>
                                                                    <input type="text" name="total_fee" value="{{ $course['total_fee'] }}" class="form-control"  id="total_fee"  placeholder="Enter course Total fee" disabled>
                                                                </div>

                                                            </div>
                        
                                                        </div>
                        
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <!-- Current Image -->
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Current Image</label><br>
                                                                    @if ($course['image'])
                                                                        <img src="{{ env('STORAGE_URL') . '/' . $course['image'] }} " class="me-2 img-fluid avatar-xl">
                                                                    @else
                                                                        <span class="small text-danger">No Image</span>
                                                                    @endif
                                                                </div>
                                                                <!-- Upload New Image --> 
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Upload New Image</label>
                                                                    <input type="file" name="image" class="form-control">
                                                                </div>                                      
        
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="status{{ $course['course_id'] }}" class="form-label">Status:</label><br/>  {{-- Unique ID --}}
                                                                    <input type="hidden" name="status" value="0">
                                                                    <input type="checkbox" name="status" id="status{{ $course['course_id'] }}" value="1" {{ $course['status'] == 1 ? 'checked' : '' }} data-switch="success" />
                                                                    <label for="status{{ $course['course_id'] }}" data-on-label="" data-off-label=""></label>
                                                                </div>
                                                            </div>
                                                        
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="featured{{ $course['course_id'] }}" class="form-label">Featured:</label><br/>  {{-- Unique ID --}}
                                                                    <input type="hidden" name="featured" value="0">
                                                                    <input type="checkbox" name="featured" id="featured{{ $course['course_id'] }}" value="1" {{ $course['featured'] == 1 ? 'checked' : '' }} data-switch="success" />
                                                                    <label for="featured{{ $course['course_id'] }}" data-on-label="" data-off-label=""></label>
                                                                </div>
                                                            </div>
                                                        </div>                        

                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                    <div id="delete-alert-modal{{ $course['course_id'] }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body p-4">
                                                    <div class="text-center">
                                                        <i class="ri-information-line h1 text-info"></i>
                                                        <h4 class="mt-2">Heads up!</h4>
                                                        <p class="mt-3">Do you want to delete this Course?</p>
                                                        <form action="{{ route('course.delete', $course['course_id']) }}" method="POST">  {{-- The crucial change is here --}}
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger my-2">Delete</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    
    
@endsection