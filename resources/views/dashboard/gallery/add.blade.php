@extends('layouts.dashboard')
@section('add-gallery')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Gallery</li>
                </ol>
            </div>
            <h4 class="page-title">Add Gallery</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Add Gallery</h4>    
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
                        <form class="needs-validation dropzone"  id="videoUploadForm" method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="Enter title">
                                         @error('title')
     <p class="small text-danger">{{$message}}</p>
 @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="subtitle" class="form-label">Sub Title</label>
                                        <input type="text" name="subtitle" value="{{old('subtitle')}}" class="form-control" id="subtitle" placeholder="Enter sub title">
                                         @error('subtitle')
     <p class="small text-danger">{{$message}}</p>
 @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status: </label><br/>
                                        <input type="checkbox" name="status" id="switch3" value="1" checked data-switch="success" onchange="this.value = this.checked ? 1 : 0;">
                                        <label for="switch3" data-on-label="" data-off-label=""></label>
                                    </div>
                                </div>                             

                                <div class="col-lg-6 mb-3">
                                    <div class="mb-3">
                                        <label for="media_type" class="form-label">Media Type <span style="color:red">*</span></label>                                                       
                                        <select class="form-select mb-3" name="media_type" id="media_type" valute="{{old('media_type')}}" required>
                                            <option selected>Select Media Type</option>
                                            <option value="IMAGE">IMAGE</option>
                                            <option value="VIDEO">VIDEO</option>
                                            <option value="YOUTUBE">YOUTUBE</option>
                                        </select>
                                         @error('media_type')
                                            <p class="small text-danger">{{$message}}</p>
                                         @enderror
                                    </div>

                                    <!-- Image Upload Section -->
                                    <div class="mb-3" id="image-upload-section" style="display:none;">
                                        <label for="image" class="form-label">Image</label>
                                        <div class="dropzone" id="ImageDropzone" data-plugin="dropzone">
                                            <div class="fallback">
                                                <input name="image" type="file" accept="image/*" />
                                            </div>                             
                                            <div class="dz-message needsclick">
                                                <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                                                <h4>Drop files here or click to upload.</h4>
                                            </div>
                                        </div>                             
                                        <!-- Preview -->
                                        <div class="dropzone-previews mt-3" id="file-previews"></div>
                                    </div>

                                    <!-- Video Upload Section -->
                                    <div class="mb-3" id="video-upload-section" style="display:none;">
                                        <label for="video" class="form-label">Video</label>
                                        <input type="file" name="video" id="file1" onchange="uploadFile()" accept="video/*"><br>
                                        
                                        <!-- Progress Bar -->
                                        <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                                        <h3 id="status"></h3>
                                        <p id="loaded_n_total"></p>
                                    </div>

                                     <!-- Youtube Upload Section -->
                                     <div class="mb-3" id="youtube-upload-section" style="display:none;">
                                        <div class="mb-3">
                                            <label for="youtube" class="form-label">Youtube</label>
                                            <input type="text" name="youtube" value="" class="form-control" id="link" placeholder="Enter link">
                                        </div>
    
                                    </div>

                                </div>
                            </div> 

                            <!-- Submit Button -->
                            <div class="text-start">
                                <button type="reset" class="btn btn-danger">Reset</button>
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
