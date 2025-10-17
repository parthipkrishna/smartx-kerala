@extends('layouts.dashboard')
@section('preview-certificate')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->  

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="certificate" style="position: relative; width: 100%; padding: 40px; border: 10px solid #ccc; box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2); background: #fff; text-align: center; font-family: Arial, sans-serif;">
                        <div style="position: absolute; top: 20px; left: 20px;">
                            {{-- <img src="your-header-image-url.png" alt="Header Image" style="width: 100%; max-height: 120px;"> --}}
                        </div>
    
                        <!-- Register Number Section -->
                        <div style="position: absolute; top: 20px; right: 20px; font-size: 16px; font-weight: bold;">
                            Register No: <span style="border-bottom: 1px dashed #000; width: 100px; font-weight: bold;">{{ $certificate->register_no }}</span>
                        </div>
    
                        <h2 style="color: #d4af37; font-size: 26px; font-family: 'Times New Roman', serif; font-style: italic;">Certificate of Merit</h2>
                        <div style="text-align: left; padding: 20px; font-size: 16px; line-height: 1.8; font-family: 'Times New Roman', serif;">
                            The Academic Council of Smart - X, "Vocational Training Organization" having duly examined <br><br>
    
                            <span style="display: inline-block; width: 45%; font-weight: bold;">{{ $certificate->student_name }}</span> during and after
                            <span style="display: inline-block; width: 15%; font-weight: bold;">{{ $certificate->duration }}</span> months <br>
    
                            of study on the specified curriculum and having found the candidate's performance to be <br>
    
                            <span style="display: inline-block; width: 45%; font-weight: bold;">{{ $certificate->performance }}</span> have pleasure in recognizing this attainment with the award of this <br>
                            advanced certificate in <span style="display: inline-block; width: 50%; font-weight: bold;">{{ $certificate->course_name }}</span><br>
    
                            <span style="display: inline-block; width: 50%; font-weight: bold;">{{ $certificate->institute }}</span>, given under our <br>
                            hard and seal on this, the <span style="display: inline-block; width: 15%; font-weight: bold;">{{ \Carbon\Carbon::parse($certificate->issued_date)->day }}</span> day of 
                            <span style="display: inline-block; width: 20%; font-weight: bold;">{{ \Carbon\Carbon::parse($certificate->issued_date)->format('F') }}</span> <br>
                            at <span style="display: inline-block; width: 40%; font-weight: bold;">{{ $certificate->location }}</span>
                        </div>
    
                        <div style="position: absolute; bottom: 20px; right: 20px; font-size: 16px; font-weight: bold;">DIRECTOR</div>
    
                        <div style="position: absolute; bottom: 0; left: 0; width: 100%;">
                            {{-- <img src="your-footer-image-url.png" alt="Footer Image" style="width: 100%; max-height: 100px;"> --}}
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
        
@endsection
