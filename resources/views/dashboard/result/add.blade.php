@extends('layouts.dashboard')
@section('add-result')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Result</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Result</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->  

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Add Result</h4>    
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
                            <form class="needs-validation" method="POST" action="{{ route('result.store') }}" enctype="multipart/form-data"  novalidate>
                                @csrf
                                <!-- Hidden Field for Category ID -->
                                <div class="row">
                                    <!-- Name Field -->
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title<span style="color:red">*</span></label>
                                            <input type="text" name="title" value="{{old('title')}}" class="form-control"  id="title"  placeholder="Enter title"  required>
                                             @error('title')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="code" class="form-label">Code</label>
                                            <input type="text" name="code" value="{{old('code')}}" class="form-control"  id="code"  placeholder="Enter code" >
                                             @error('code')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="sub title" class="form-label">Sub Title</label>
                                            <input type="text" name="subtitle" value="{{old('subtitle')}}" class="form-control" id="subtitle"   placeholder="Enter sub title"required>
                                             @error('subtitle')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                        </div>

                                        {{-- <div class="mb-3">
                                            <label for="link" class="form-label">Link</label>
                                            <input type="text" name="link" value="{{old('link')}}" class="form-control"  id="link"  placeholder="Enter link"  required>
                                             @error('link')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                        </div> --}}

                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status: <span style="color:red">*</span></label></br/>
                                            <input  type="checkbox" name="status"  id="switch3"  value="1"  checked  data-switch="success" onchange="this.value = this.checked ? 1 : 0;" />
                                            <label for="switch3" data-on-label="" data-off-label=""></label>
                                        </div>
                                        
                                    </div>                             
                                    <!-- File Upload -->
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Courses<span style="color:red">*</span></label>                                                       
                                            <select class="form-select mb-3" name="course" required>
                                                <option selected>Select Course</option>
                                                @foreach ($courses as $item)
                                                    <option value="{{ $item->course_id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>     
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Description</label>
                                            <textarea class="form-control" value="{{old('description')}}" name="description" id="example-textarea" rows="3" required></textarea>
                                             @error('description')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="posted_date" class="form-label">Posted Date</label>
                                            <input type="date" name="posted_date" value="{{old('posted_date')}}" class="form-control" id=""   placeholder="Enter posted date"  required>
                                             @error('posted_date')
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