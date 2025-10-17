@extends('web.layouts.layout')
@section('gallery')
<style>
    @media only screen and (max-width: 767px) {
        .gallery-section .portfolio .gallery-wrapper {
            margin-bottom: 15px;
        }
        .gallery-wrapper ul {
            margin-left: 0px;
        }
        .item-list{
            width: 100% !important;
        }
    }
</style>

<section class="header-title">
    <div class="container">
        <h2 class="title">Gallery</h2>
        <span class="sub-title">Home / Gallery</span>
    </div>
</section> <!-- header-title -->    

<section class="gallery-section section-padding">
    <div class="container text-center">
        <div class="section-title">
            <h2>Gallery</h2>
            <p>Discover our fashion design programs, creative workshops, and inspiring moments through images and videos.
                <br>Stay connected and explore the creativity.</p>
        </div> <!-- section-title -->   
        
        <div class="portfolio gallery-grid">
            <div class="row">
                <ul class="portfolio-sorting gallery-button list-inline text-center">
                    <li><a href="#" data-group="all" class="filter-btn active">All</a></li>
                    <li><a class="filter-btn" href="#" data-group="image">Image</a></li>
                    <li><a class="filter-btn" href="#" data-group="video">Video</a></li>
                    <li><a class="filter-btn" href="#" data-group="youtube">Youtube</a></li>

                </ul> <!-- end portfolio sorting --> 

                <div id="lightBox" class="gallery-wrapper">
                    <ul class="portfolio-items courses list-unstyled" id="grid">
                        @foreach($gallery as $item)
                            @if($item->media_type == 'IMAGE')
                                <li class="col-sm-4 item-list" data-groups='["image"]'>
                                    <figure class="portfolio-item gallery-caption" style="height: 23rem;">
                                        <img src="{{ env('STORAGE_URL') . '/' . $item->image }}" alt="" style="height: 100%; width: 100%; object-fit: cover;">  
                                        <div class="hover-view" style="height: 100% !important;">
                                            <a href="{{ env('STORAGE_URL') . '/' . $item->image }}">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                        </div>
                                    </figure>
                                </li>
                            @elseif($item->media_type == 'VIDEO')   
                                <li class="col-sm-4 item-list" data-groups='["video"]'>
                                    <figure class="portfolio-item gallery-caption" style="height: 23rem;">
                                        <video controls style="height: 100%; width: 100%; object-fit: cover;">
                                            <source src="{{ env('STORAGE_URL') . '/' . $item->video }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </figure>
                                </li>    

                            @elseif($item->media_type == 'YOUTUBE')
                                <li class="col-sm-4 item-list" data-groups='["youtube"]'>
                                    <figure class="portfolio-item gallery-caption" style="height: 23rem;">
                                        @php
                                            // Extract the video ID from the YouTube URL
                                            preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $item->youtube, $matches);
                                            $videoId = $matches[1] ?? null;
                                            $thumbnailUrl = $videoId ? "https://img.youtube.com/vi/$videoId/0.jpg" : null;
                                        @endphp
                            
                                        @if($thumbnailUrl)
                                            <img src="{{ $thumbnailUrl }}" alt="YouTube Thumbnail" style="height: 100%; width: 100%; object-fit: cover;">  
                                        @else
                                            <img src="{{ asset('uploads/images/Gallery/youtube.jpg') }}" alt="Default Thumbnail" style="height: 100%; width: 100%; object-fit: cover;">
                                        @endif
                            
                                        <div class="hover-view" style="height: 100% !important;">
                                            <a href="{{ $item->youtube }}" target="_blank">
                                                <i class="fa fa-youtube-play"></i>
                                            </a>
                                        </div>
                                    </figure>
                                </li>
                            @endif
                                                        
                        @endforeach
                    </ul> <!-- end portfolio grid -->
                </div> <!-- gallery-wrapper -->
            </div> <!-- end row -->
        </div>
        <div class="pagination-container text-center">
    {{ $gallery->links('pagination::bootstrap-4') }}
</div>
    </div> <!-- container -->
</section> <!-- gallery-section -->

@endsection
