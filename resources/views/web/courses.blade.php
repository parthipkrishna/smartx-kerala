@extends('web.layouts.layout')
@section('courses')
    
                <section class="header-title">
                    <div class="container">
                        <h2 class="title">Courses</h2>
                        <span class="sub-title">Home / Academics / Courses</span>
                    </div>
                </section> <!-- header-title -->    

                <section class="subject-section section-padding">
                    <div class="container">
                <div class="section-title">
                <h2>Courses</h2>
                @if ($category)
                    <span class="small-text">{{ $category->name }}</span>
                @else
                    <span class="small-text">Category Not Found</span>
                @endif
            </div>

        <div class="container mt-4">
            <div class="row">
                @foreach ($course_main as $course)
                    <div class="col-md-3 mb-4">
                        <div class="card custom-card">
                            <!-- Image with Hover Button -->
                            <div class="image-container">
                                <img src="{{ asset('storage/' . $course['image']) }}" alt="{{ $course['name'] }}">
                                <a href="{{ $course['category'] }}" class="hover-btn">View Course</a>
                            </div>

                            <div class="card-body">
                                <!-- Course Title (h3) -->
                                <h3 class="card-title fw-bold ">{{ $course['name'] }}</h3>

                                <!-- Duration -->
                                <p>
                                    <i class="fas fa-clock text-primary"></i> Duration: {{ $course['duration'] }}
                                </p>

                                <!-- Batches Info -->
                                @if (count($course['batches']) > 0)
                                    <p>
                                        <i class="fas fa-users text-success"></i> Batches: {{ implode(", ", $course['batches']) }}
                                    </p>
                                @endif

                                <!-- Holiday Batches -->
                                @if (count($course['holiday_batches']) > 0)
                                    <p>
                                        <i class="fas fa-calendar-alt text-danger"></i> Holiday Batches: {{ implode(", ", $course['holiday_batches']) }}
                                    </p>
                                @endif

                                @if (count($course['batches']) == 0 && count($course['holiday_batches']) == 0)
                                    <p class="text-muted">
                                        <i class="fas fa-exclamation-circle"></i> No batches scheduled.
                                    </p>
                                @endif

                                <!-- Fee Information -->
                                <p class="fw-bold">
                                    <i class="fas fa-indian-rupee-sign text-warning"></i> {{ $course['total_fee'] }}/-
                                    @if ($course['bank_fee'] !== 'NULL')
                                        <span class="small text-muted">(+{{ $course['bank_fee'] }} Bank Charge)</span>
                                    @elseif ($course['service_fee'] !== 'NULL')
                                        <span class="small text-muted">(+{{ $course['service_fee'] }} Service Charge)</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section> 
    <style>
             .custom-card {
        border-radius: 10px;
        overflow: hidden;
        transition: 0.3s ease-in-out;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
        position: relative;
        margin-bottom: 50px;
    }
    .card-body {
    padding: 20px; /* Adjust the padding as needed */
}

    .custom-card:hover {
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Stronger shadow on hover */
        transform: translateY(-5px);
    }

    /* Ensures image fits properly */
    .image-container {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures image fits without distortion */
    }

    /* Button is hidden by default */
    .hover-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
        color: white;
        border-radius: 5px;
        padding: 10px 20px;
        text-decoration: none;
    }

    /* When hovering anywhere on the card, show the button */
    .custom-card:hover .hover-btn {
        opacity: 1;
    }
    .subject-section {
        padding: 40px 0; /* Adjust as needed */
    }
    
    .container {
        max-width: 1200px; /* Or your preferred container width */
        margin: 0 auto;
        padding: 0 20px; /* Add some side padding */
    }
    
    .section-title {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .section-title h2 {
        color: #333;
        margin-bottom: 10px;
    }
    
    .small-text {
        display: inline-block;
        margin: 0 5px;
        padding: 5px 10px;
        background-color: #f0f0f0;
        border-radius: 5px;
        color: #666;
    }
    
    .subject-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 equal-width columns */
    gap: 20px; /* Adjust spacing between items */
}

/* Responsive adjustments (optional) */
@media (max-width: 992px) { /* Example breakpoint */
    .subject-grid {
        grid-template-columns: repeat(2, 1fr); /* 2 columns on medium screens */
    }
}

@media (max-width: 768px) { /* Example breakpoint */
    .subject-grid {
        grid-template-columns: 1fr; /* 1 column on small screens */
    }
}    
    .item {
        /* You can add specific styling for each item here if needed */
    }
    
    .subject-wrapper {
    position: relative;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.subject-wrapper:hover {
    transform: translateY(-5px);
    box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
}
    
    .caption {
        position: relative;
        overflow: hidden; /* Ensure image stays within container */
    }
    
    .caption img {
        width: 100%;
        height: auto; /* Maintain aspect ratio */
        display: block; /* Prevent space below image */
    }
    
    .hover-show {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.subject-wrapper:hover .hover-show {
    opacity: 1; /* Show the overlay on hover over the whole card */
}
    .caption:hover .hover-show {
        opacity: 1; /* Show on hover */
    }
    
    .hover {
        margin-bottom: 10px;
    }
    
    .hover a {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border: 1px solid white;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.2);
    transition: background 0.3s ease, transform 0.3s ease;
}
.hover a:hover {
    background: white;
    color: black;
    transform: scale(1.1);
}
    
    .border-one,
    .border-two {
        width: 50px;
        height: 2px;
        background-color: white;
        margin: 5px 0;
    }
    
    .wrapper-content {
        padding: 20px;
    }
    
    .wrapper-content h3 {
        color: #333;
        margin-bottom: 10px;
    }
    
    .wrapper-content p {
        margin-bottom: 8px;
        color: #555;
    }
    
    .batch-info {
        margin-bottom: 10px;
    }
    
    .batch-info p {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
    }
    
    .info-icon {
        width: 20px;
        height: 16px;
        margin-right: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .info-icon > * {
        display: inline-block;
    }
    
    .batch-icon,
    .holiday-batch-icon,
    .fee-icon {
        width: 16px;
        height: 16px;
        margin-right: 8px;
        border-radius: 3px;
        display: inline-block;
        background-size: contain;
        background-position: center;
        background-color: transparent;
    }
    
    .batch-icon {
        background-image: url('{{ asset('Frontend-assets/images/square.jpeg') }}'); /* Replace with your icon path */
    }
    
    .holiday-batch-icon {
        background-image: url('{{ asset('Frontend-assets/images/square.jpeg') }}'); /* Replace with your icon path */
    }
    .fee-icon {
    background-image: url('{{ asset('Frontend-assets/images/star.jpeg') }}'); 
}
    
    .small {
        display: flex;
        align-items: center;
    }
    
    .fee {
        font-weight: bold;
        margin-right: 5px;
    }
    
    .charge {
        color: #777;
    }
    </style>

@endsection