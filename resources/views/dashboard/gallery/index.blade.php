@extends('layouts.dashboard')
@section('gallery')
@php
use Illuminate\Support\Str;
@endphp
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ol>
                </div>
                <h4 class="page-title">Gallery</h4>
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
                            <a href="{{ route('gallery.add') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add </a>
                        </div>
                        <div class="col-sm-7">
                            {{-- <div class="text-sm-end"> --}}
                                {{-- {{-- <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button> --}} 
                                {{-- <button type="button" class="btn btn-light mb-2 me-1">Import</button> --}}
                                {{-- <button type="button" class="btn btn-light mb-2">Export</button> --}}
                            {{-- </div> --}}
                        </div><!-- end col-->
                    </div>
    
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                    
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>                          
                                    <th>Media Type</th>
                                    <th>Status</th>
                                    <th style="width: 75px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gallery as $item)
                                    <tr>
                                       
                                        <td class="table-user">
                                            @if ($item->media_type == 'VIDEO')
                                                <img src="{{ asset('uploads/images/Gallery/video.JPG') }}" class="me-2 rounded-circle" style="width: 40px; height: 40px; object-fit: cover;" alt="Video Placeholder">

                                            @elseif ($item->media_type == 'IMAGE' )
                                                <img src="{{ env('STORAGE_URL') . '/' . $item->image }}" class="me-2 rounded-circle" style="width: 40px; height: 40px; object-fit: cover;" alt="Image">
                                                
                                            @elseif ($item->media_type == 'YOUTUBE' )
                                                <img src="{{ asset('uploads/images/Gallery/youtube.jpeg') }}" class="me-2 rounded-circle"  style="width: 40px; height: 40px; object-fit: cover;" alt="Video Placeholder">
                                            @else
                                                <span class="small text-danger">No image available</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->title)
                                                {{ Str::limit($item->title, 25, '...')  }}
                                            @else
                                                <span class="small text-danger">No Title</span>
                                            @endif 
                                        </td>
                                        <td>
                                            @if ($item->subtitle)
                                                {{ Str::limit($item->subtitle, 25, '...')  }}
                                            @else
                                                <span class="small text-danger">No Subtitle</span>
                                            @endif 
                                        </td>
                                        
                                        <td>
                                            <span class="fw-semibold">{{ $item->media_type }}</span>
                                        </td>
                                        <td>
                                            @if($item->status ==1)
                                                <button type="button" class="btn btn-soft-success rounded-pill">Active</button>
                                            @else
                                                <button type="button" class="btn btn-soft-danger rounded-pill">Deactive</button>
                                            @endif
                                        </td>
    
    
                                        <td>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-editGallery-modal{{ $item->gallery_id}}">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#delete-alert-modal{{ $item->gallery_id}}">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="bs-editGallery-modal{{ $item->gallery_id }}" tabindex="-1" role="dialog" aria-labelledby="editGalleryLabel{{$item->gallery_id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editGalleryLabel{{ $item->gallery_id }}">Edit Gallery</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('gallery.update/{id}', $item->gallery_id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf                                    
                                                        <div class="row">
                                                           
                                                            <div class="col-lg-6">
                                                                 <!-- Title -->
                                                                <div class="mb-3">
                                                                    <label for="title" class="form-label">Title</label>
                                                                    <input type="text" class="form-control" id="title" name="title" value="{{ $item->title }}">
                                                                </div>
                                                                <!-- Media Type -->
                                                                <div class="mb-3">
                                                                    <label for="media_type" class="form-label">Media Type</label>
                                                                    <select class="form-control" name="media_type" id="media_type{{ $item->gallery_id }}" onchange="toggleMediaFields({{ $item->gallery_id }})" disabled>
                                                                        <option value="IMAGE" {{ $item->media_type == 'IMAGE' ? 'selected' : '' }}>Image</option>
                                                                        <option value="VIDEO" {{ $item->media_type == 'VIDEO' ? 'selected' : '' }}>Video</option>
                                                                        <option value="YOUTUBE" {{ $item->media_type == 'YOUTUBE' ? 'selected' : '' }}>YouTube</option>
                                                                    </select>
                                                                </div>

                                                                <!-- YouTube Link (Only if media type is YouTube) -->
                                                                <div class=" media-youtube{{ $item->gallery_id }}" style="display: {{ $item->media_type == 'YOUTUBE' ? 'block' : 'none' }};">
                                                                    <figure class="portfolio-item gallery-caption" style="">
                                                                        @php
                                                                            // Extract the video ID from the YouTube URL
                                                                            preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $item->youtube, $matches);
                                                                            $videoId = $matches[1] ?? null;
                                                                            $thumbnailUrl = $videoId ? "https://img.youtube.com/vi/$videoId/0.jpg" : null;
                                                                        @endphp
                                                            
                                                                        {{-- @if($thumbnailUrl)
                                                                            <img src="{{ $thumbnailUrl }}" alt="YouTube Thumbnail" style="height: 50%; width: 100%; object-fit: cover;">  
                                                                        @else
                                                                            <img src="{{ asset('uploads/images/Gallery/youtube.jpg') }}" alt="Default Thumbnail" style="height: 100%; width: 100%; object-fit: cover;">
                                                                        @endif --}}
                                                            

                                                                        @if($videoId)
                                                                        <a href="https://www.youtube.com/watch?v={{ $videoId }}" target="_blank">
                                                                            <img src="https://img.youtube.com/vi/{{ $videoId }}/0.jpg" alt="YouTube Thumbnail" 
                                                                                 style="width: 100%; height: auto; cursor: pointer;">
                                                                        </a>
                                                                        @endif
                                                                        {{-- <div class="hover-view" style="height: 100% !important;"> --}}
                                                                            {{-- <a href="{{ $item->youtube }}" target="_blank"> --}}
                                                                                {{-- <i class="fa fa-youtube-play"></i> --}}
                                                                            {{-- </a> --}}
                                                                        {{-- </div> --}}
                                                                    </figure>
                                
                                                                    <div class="mb-3">
                                                                        <label for="youtube" class="form-label">YouTube Link</label>
                                                                        <input type="text" class="form-control" id="youtube" name="youtube" value="">
                                                                    </div>
                                                                </div>
                                    
                                                                <!-- Video Upload (Only if media type is Video) -->
                                                                <div class="media-video{{ $item->gallery_id }}" style="display: {{ $item->media_type == 'VIDEO' ? 'block' : 'none' }};">
                                                                    @if($item->video)
                                                                        <figure class="portfolio-item gallery-caption" style="">
                                                                            <video controls style="height: 50%; width: 100%; object-fit: cover;">
                                                                                <source src="{{ asset('storage/' . $item->video) }}" type="video/mp4">
                                                                                Your browser does not support the video tag.
                                                                            </video>
                                                                        </figure>
                                                                    @else
                                                                        <span class="small text-danger">No Video</span>
                                                                    @endif
                                                                    <div class="mb-3">
                                                                        <label for="video" class="form-label">Upload Video</label>
                                                                        <input type="file" class="form-control" id="video" name="video">
                                                                    </div>
                                                                </div>
                                    
                                                                <!-- Image Upload (Only if media type is Image) -->
                                                                <div class="media-image{{ $item->gallery_id }}" style="display: {{ $item->media_type == 'IMAGE' ? 'block' : 'none' }};">
                                                                    <div class="mb-3">
                                                                        <label for="image" class="form-label">Current Image</label><br>
                                                                        @if ($item->image)
                                                                            <img src="{{ env('STORAGE_URL') . '/' . $item->image }}" class="me-2 img-fluid avatar-xl">
                                                                        @else
                                                                            <span class="small text-danger">No Image</span>
                                                                        @endif
                                                                        <div class="mb-3 mt-3 ">
                                                                            <label for="image" class="form-label">Upload Image</label>
                                                                            <input type="file" class="form-control" id="image" name="image">
                                                                        </div>                                                                 
                                                                    </div>
                                                                </div>
                                                            </div>                                  
                                    
                                                            <div class="col-lg-6">
                                                                 <!-- Subtitle -->
                                                                <div class="mb-3">
                                                                    <label for="subtitle" class="form-label">Subtitle</label>
                                                                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $item->subtitle }}">
                                                                </div>
                                                                <!-- Status -->
                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label">Status: </label></br/>
                                                                    <input type="hidden" name="status" value="0"> 
                                                                    <input type="checkbox" name="status" id="switch{{ $item->gallery_id }}" value="1"  {{ $item->status == 1 ? 'checked' : '' }}  data-switch="success" />  
                                                                    <label for="switch{{ $item->gallery_id }}" data-on-label="" data-off-label=""></label>
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
                                    <div id="delete-alert-modal{{ $item->gallery_id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body p-4">
                                                    <div class="text-center">
                                                        <i class="ri-information-line h1 text-info"></i>
                                                        <h4 class="mt-2">Heads up!</h4>
                                                        <p class="mt-3">Do you want to delete this Gallery Item?</p>
                                                        <form action="{{ route('gallery.delete/{id}', $item->gallery_id) }}" method="POST">
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
    </div> <!-- end row -->    
    
@endsection