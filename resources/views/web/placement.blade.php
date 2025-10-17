@extends('web.layouts.layout')
@section('placements')

    <section class="header-title">
        <div class="container">
            <h2 class="title">Training Centers</h2>
            <span class="sub-title">Home / Training Centers</span>
        </div>
    </section> <!-- header-title -->

    <div class="kingster-page-wrapper" id="kingster-page-wrapper">    
        <div class="kingster-content-container kingster-container">
            <div class="kingster-sidebar-wrap clearfix kingster-line-height-0 kingster-sidebar-style-right">
                <div class="kingster-sidebar-center kingster-column-60 kingster-line-height">
                    <div class="gdlr-core-page-builder-body">
                        <div class="row ">
                            <div class="col-md-4 offset-md-0" style="PADDING-LEFT: 4rem;margin-top: 35px;">
                                <form action="{{ route('placements') }}" method="GET">
                                    <div class="form-group">
                                        <label for="district">Filter by District:</label>
                                        <select name="district" id="district" class="form-control" onchange="this.form.submit()">
                                            <option value="">All Districts</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->district }}" 
                                                    {{ (request('district') ?? $selectedDistrict) == $district->district ? 'selected' : '' }}>
                                                    {{ $district->district }}
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
                                    @foreach ($cells as $item)
                                        <div class="training-card">
                                            <h3 class="training-title">
                                                <i class="fa-solid fa-building"></i>&nbsp;{{ $item->company_name }}
                                            </h3>
                                            <div class="training-info">
                                                <i class="fa-solid fa-location-dot"></i>&nbsp;Location: {{ $item->location }}
                                            </div>
                                            @if (!empty($item->address))
                                                <div class="training-info">
                                                    <i class="fa-solid fa-map"></i>&nbsp;Address: {{ $item->address }}
                                                </div>
                                            @endif
                                            
                                            <div class="training-info">
                                                <i class="fa-solid fa-map-pin"></i>&nbsp;District: {{ $item->district }}
                                            </div>
                                            @if (!empty($item->link))
                                                <div class="training-info">
                                                    <i class="fa-solid fa-link"></i>&nbsp;Link: 
                                                    <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">{{ $item->link }}</a>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                <div class="gdlr-core-pagination gdlr-core-style-round gdlr-core-left-align">
                                        {{-- Previous Page Link --}}
                                        @if ($cells->onFirstPage())
                                            <span class="page-numbers disabled">«</span>
                                        @else
                                            <a class="page-numbers" href="{{ $cells->appends(request()->query())->previousPageUrl() }}">«</a>
                                        @endif

                                        {{-- Page Numbers --}}
                                        @for ($page = 1; $page <= $cells->lastPage(); $page++)
                                            <a class="page-numbers {{ $page == $cells->currentPage() ? 'current' : '' }}" 
                                            href="{{ $cells->appends(request()->query())->url($page) }}">
                                                {{ $page }}
                                            </a>
                                        @endfor

                                        {{-- Next Page Link --}}
                                        @if ($cells->hasMorePages())
                                            <a class="next page-numbers" href="{{ $cells->appends(request()->query())->nextPageUrl() }}">»</a>
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

    <style>
        .gdlr-core-pagination a.next::before {
            display: none;
        }
    </style>

@endsection