@extends('layouts.dashboard')
@section('add-training-center')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Training Centers</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Training Centers</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->  

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Add Training Centers</h4>    
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
                            <form class="needs-validation" method="POST" action="{{ route('training-center.store') }}" enctype="multipart/form-data"  novalidate>
                                @csrf
                                <!-- Hidden Field for Category ID -->
                                <div class="row">
                                    <!-- Name Field -->
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="center name" class="form-label">Center Name<span style="color:red">*</span></label>
                                            <input type="text" name="center_name" value="{{old('center_name')}}" class="form-control"  id="product-name"  placeholder="Enter center name"  required>
                                            @error('center_name')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="contact name" class="form-label">Contact Name</label>
                                            <input type="text" name="contact_person" value="{{old('contact_person')}}" class="form-control" id="product-loyalty_point"   placeholder="Enter contact name" >
                                            @error('contact_person')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone number" class="form-label">Phone Number</label>
                                            <input type="text" name="phone_number" value="{{old('phone_number')}}" class="form-control"  id="product-loyalty_point"  placeholder="Enter phone number">
                                            @error('phone_number')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="gst number" class="form-label">gst Number</label>
                                            <input type="text" name="gst_number" value="{{old('gst_number')}}" class="form-control" id="product-loyalty_point"   placeholder="Enter gst number" >
                                            @error('gst_number')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="district" class="form-label">District</label>
                                            <input type="text" name="district" value="{{old('district')}}" class="form-control"  id="product-loyalty_point"  placeholder="Enter district">
                                            @error('district')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                        </div>
                                        <div class="mb-1">
                                            <label for="example-select" class="form-label">Category <span style="color:red">*</span></label>                                                       
                                            <select class="form-select mb-3" name="category" required>
                                                <option value="" selected>Select Category</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>     
                                        </div>

                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status: <span style="color:red">*</span></label></br/>
                                            <input  type="checkbox" name="status"  id="switch3"  value="1"  checked  data-switch="success" onchange="this.value = this.checked ? 1 : 0;" />
                                            <label for="switch3" data-on-label="" data-off-label=""></label>
                                        </div>
                                        
                                        {{-- <div class="mb-3"> --}}
                                            {{-- <label for="status" class="form-label">Status: <span style="color:red">*</span></label></br/> --}}
                                            {{-- <input type="checkbox" name="status" id="switch3" checked data-switch="success"/> --}}
                                            {{-- <label for="switch3" name="status" data-on-label="" data-off-label=""></label> --}}
                                        {{-- </div> --}}
                                    </div>                             
                                    <!-- File Upload -->
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Center Image</label>
                                            <div class="dropzone" id="ImageDropzone" data-plugin="dropzone">
                                                <div class="fallback">
                                                    <input name="image" type="file" />
                                                </div>                             

                                                <div class="dz-message needsclick">
                                                    <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                                                    <h4>Drop files here or click to upload.</h4>
                                                </div>
                                            </div>                             
                                            <!-- Preview -->
                                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Address</label>
                                            <textarea class="form-control" value="{{old('address')}}" name="address" id="example-textarea" rows="3"></textarea>
                                            @error('address')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="pin code" class="form-label">Pin Code</label>
                                            <input type="text" name="pin_code" value="{{old('pin_code')}}" class="form-control" id="product-loyalty_point"   placeholder="Enter pin code">
                                            @error('pin_code')
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