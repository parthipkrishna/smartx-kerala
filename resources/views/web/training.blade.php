@extends('web.layouts.layout')
@section('training')

<section class="header-title">
    <div class="container">
        <h2 class="title">Training Centers</h2>
        <span class="sub-title">Home / Training Centers</span>
    </div>
</section> <!-- header-title -->
<div class="container mt-4 filter-section">
</div>
<div class="kingster-page-wrapper" id="kingster-page-wrapper">
    <div class="kingster-content-container kingster-container">
        <div class="kingster-sidebar-wrap clearfix kingster-line-height-0 kingster-sidebar-style-right">
            <div class="kingster-sidebar-center kingster-column-60 kingster-line-height">
                <div class="gdlr-core-page-builder-body">

                    <div class="row" style="PADDING-LEFT: 4rem;">
                        <!-- District Filter -->
                        <div class="col-md-3" >
                            <form action="{{ route('training-centers') }}" method="GET">
                                <div class="form-group">
                                    <label for="district">Filter by District:</label>
                                    <select name="district" id="district" class="form-control" onchange="this.form.submit()" >
                                        @foreach ($districts as $key => $district)
                                            <option value="{{ $district->district }}" 
                                                {{ request('district', $selectedDistrict) == $district->district ? 'selected' : '' }}>
                                                {{ $district->district }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <!-- Category Filter (Without Label) -->
                        <div class="col-md-4" >
                            <form action="{{ route('training-centers') }}" method="GET">
                                <div class="form-group">
                                <label for="district"></label>
                                    <select name="course" id="course" class="form-control" onchange="this.form.submit()" style="width: 79%;">
                                        @foreach ($courses as $key => $category)
                                            <option value="{{ $category->course }}" 
                                                {{ request('course', $courses[0]->course) == $category->course ? 'selected' : '' }}>
                                                {{ $category->course }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>                

                    <div class="gdlr-core-pbf-wrapper">
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                            <div class="training-container">
                                @foreach ($training_centers as $item)
                                    <div class="training-card mb-5">
                                        <h3 class="training-title">{{ $item->center_name }}</h3>
                                        <div class="training-info">
                                            <i class="fa-solid fa-location-dot"></i>&nbsp;Address: {{ $item->address }}
                                        </div>
                                        <div class="training-info">
                                            <i class="fa-solid fa-map"></i>&nbsp;District: {{ $item->district }}
                                        </div>
                                        <div class="training-info">
                                            <i class="fa-solid fa-map"></i>&nbsp;Course: {{ $item->course }}
                                        </div>
                                        @if (!empty($item->pin_code))
                                            <div class="training-info">
                                                <i class="fa-solid fa-map-pin"></i>&nbsp;Pin: {{ $item->pin_code }}
                                            </div>
                                        @endif
                                        @if (!empty($item->contact_person))
                                            <div class="training-info">
                                                <i class="fa-solid fa-user"></i>&nbsp;Contact Person: {{ $item->contact_person }}
                                            </div>
                                        @endif
                                        @if (!empty($item->phone_number))
                                            <div class="training-info">
                                                <i class="fa-solid fa-phone"></i>&nbsp;Phone: {{ $item->phone_number }}
                                            </div>
                                        @endif
                                        @if (!empty($item->gst_number))
                                            <div class="training-info">
                                                <i class="fa-solid fa-file-invoice-dollar"></i>&nbsp;GST Number: {{ $item->gst_number }}
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <div class="gdlr-core-pagination gdlr-core-style-round gdlr-core-left-align mt-5">
                                {{-- Previous Page Link --}}
                                @if ($training_centers->onFirstPage())
                                    <span class="page-numbers disabled">«</span>
                                @else
                                    <a class="page-numbers" href="{{ $training_centers->appends(request()->query())->previousPageUrl() }}">«</a>
                                @endif

                                {{-- Page Numbers --}}
                                @for ($page = 1; $page <= $training_centers->lastPage(); $page++)
                                    <a class="page-numbers {{ $page == $training_centers->currentPage() ? 'current' : '' }}" 
                                    href="{{ $training_centers->appends(request()->query())->url($page) }}">
                                        {{ $page }}
                                    </a>
                                @endfor

                                {{-- Next Page Link --}}
                                @if ($training_centers->hasMorePages())
                                    <a class="next page-numbers" href="{{ $training_centers->appends(request()->query())->nextPageUrl() }}">»</a>
                                @else
                                    <span class="page-numbers disabled">»</span>
                                @endif
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
