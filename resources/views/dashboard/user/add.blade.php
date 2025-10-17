@extends('layouts.dashboard')
@section('add-user')
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                        <li class="breadcrumb-item active">Add Users</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Users</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Add User</h4>   
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
                            <form class="needs-validation" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data"  validate>
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Name</label>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="validationCustom01" placeholder="Name" >
                                            @error('name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustomUsername">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="validationCustomUsername" placeholder="Email" aria-describedby="inputGroupPrepend" required>
                                                @error('email')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror                                            
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">User Role</label>
                                            <select class="form-select" id="example-select" name="user_role" required>
                                                <option value="">Select option</option>
                                                @foreach ($roles as $item)
                                                    <option value="{{ $item->role_id }}">{{ $item->role_name }}</option>
                                                @endforeach
                                            </select>
                                        </div> 

                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status: <span style="color:red">*</span></label></br/>
                                            <input  type="checkbox" name="status"  id="switch3"  value="1"  checked  data-switch="success" onchange="this.value = this.checked ? 1 : 0;" />
                                            <label for="switch3" data-on-label="" data-off-label=""></label>
                                        </div>
    
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Phone Number</label>
                                            <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control" id="validationCustom02" placeholder="Phone Number" required>
                                            @error('phone_number')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror                                        
                                        </div> 
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom04">Password</label>
                                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="validationCustom04" placeholder="Password" required>
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div> 

                                        <div class="mb-3">
                                            <label for="image" class="form-label">User Image</label>
                                            <div class="dropzone" id="ImageDropzone" data-plugin="dropzone">
                                                <div class="fallback">
                                                    <input name="profile_image" type="file" />
                                                </div>                             

                                                <div class="dz-message needsclick">
                                                    <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                                                    <h4>Drop files here or click to upload.</h4>
                                                </div>
                                            </div>                             
                                            <!-- Preview -->
                                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                                        </div>
       
                                    </div>
                    
                                </div> 
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