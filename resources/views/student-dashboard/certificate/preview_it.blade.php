@extends('student-dashboard.layouts.dashboard')

@section('preview-certificate')
    <section class="main-section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                                <div class="text-sm-end">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button id="downloadPDFcertificate" class="btn btn-secondary m-3">
                                            Download PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="divMain">
                                <img class="img-fluid image-1" src="{{asset('assets/images/05.PNG')}}" alt="">
                                <div class="" style="display: flex;gap: 20px;align-items: end; border-bottom: 2px solid #3fbbf2;padding: 0px 0px 4px 30px;width: 100% !important;margin-left: -40px;">
                                    <div class="">
                                        <img class="img-fluid image-2" src="{{ asset('assets/images/08.PNG') }}" alt="">
                                            <h2>VOCATIONAL TRAINING ORGANIZATION</h2>
                                        </div>
                                        <div class="line"></div>
                                        <div class="">
                                            <h5>Govt. Of Kerala Regd. CA 143/10</h5>
                                            <h6>An ISO 9001-2015 Certified Organization</h6>
                                            <p class="m-0 p-0">Mannarkkad, Palakkad, Kerala, India - 678 582
                                                <br>www.smartxkerala.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex gap-4">
                                    <div class="">
                                        <img class="img-fluid image-3" src="{{ asset('assets/images/04.PNG') }}" alt="">
                                        <div class="costem-table">
                                            <h6>PERCENTAGE OF MARKS</h6>
                                            <div class="d-flex mt-1">
                                                <p style="width: 90%;">80 & Above</p>
                                                <p>A+</p>
                                            </div>
                                            <div class="d-flex">
                                                <p style="width: 90%;">60 & Below 80</p>
                                                <p>A</p>
                                            </div>
                                            <div class="d-flex">
                                                <p style="width: 90%;">50 % Below 60</p>
                                                <p>B+</p>
                                            </div>
                                            <div class="d-flex">
                                                <p style="width: 90%;">Below 50</p>
                                                <p>B</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" style="display: flex; align-items: end; gap: 104px; width: 100% !important;margin-top: 35px; margin-left: 15%;">
                                            <img class="img-fluid image-4" src="{{ asset('assets/images/Certificate-head.png') }}" alt="">
                                            <h3>Reg. No. SX -{{ $certificate->register_no  }}</h3>
                                        </div>
                                        <div class="certificate-text " style="margin: 2rem 6rem 2rem 0rem;">   
                                            The Academic Council of Smart - X, “Vocational Training Organization” having duly examined 
                                            <strong><span style="color:#0a68ca">{{ $certificate->student_name}}</span></strong> during and after <strong>{{ $certificate->duration }}</strong> months
                                            of study on the specified curriculum and having found the candidate’s performance to be
                                            <strong>{{ $certificate->performance }}</strong> have pleasure in recognizing this attainment with the award of this
                                            advanced certificate in <strong><span style="color:#0a68ca">{{ $certificate->course_name }}</span></strong>
                                            <strong>{{ $certificate->institute }}</strong> given under our
                                            hand and seal on this, the <strong>{{ date('d', strtotime($certificate->issued_date)) }}</strong> day of 
                                            <strong>{{ date('F, Y', strtotime($certificate->issued_date)) }}</strong> 
                                            at <strong>{{ $certificate->location }}</strong> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <img class="img-fluid image-5 mt-2" src="{{ asset('assets/images/01.png') }}" alt="">
                                <img class="img-fluid image-6 mt-2" src="{{ asset('assets/images/03.PNG') }}" alt="">
                                <div class="">
                                    <img class="img-fluid image-7 mt-2" src="{{ asset('assets/images/02.PNG') }}" alt="">
                                    <h4 style="font-weight: bold;font-size: 18px;text-align: right;margin-top: 10px;">DIRECTOR</h4>
                                </div>
                            </div>
                        </div>
                        <div class="main-box">
                            <div class="main-line"></div>
                            <div class="box-bottom mt-1">
                                <div class="box"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <style>@import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Metrophobic&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Times+New+Roman:wght@400&display=swap');

body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Metrophobic", sans-serif;
}

.divMain {
    display: flex;
    align-items: end;
    gap: 20px;
    margin: 0px 0px 0px 40px;
}

.image-1 {
    height: 120px;
}

h2 {
    font-weight: 800;
    font-size: 13px;
    margin: 0px !important;
    padding: 0px !important;
}

h5 {
    font-weight: 700;
    font-size: 17px;
    margin: 0px !important;
    padding: 0px !important;
}

p {
    font-weight: 600;
    font-size: 14px; 
    margin: 0px !important;
    padding: 0px !important;
}

h6 {
    font-weight: 700;
    font-size: 16px;
    margin: 0px !important;
    padding: 0px !important;
}

.line {
    height: 80px;
    width: 2px;
    background-color: #3fbbf2;
    position: relative;
    z-index: 100;
}

.image-2 {
    height: auto;
    width: 250px;
}

.Kifd-img {
    height: auto;
    width: 160px;
    margin-bottom: 5px;
}

.image-3 {
    width: 140px;
    margin-left: 40px;
}

h3 {
    font-weight: 700;
    font-size: 16px;
}

.image-4 {
    width: 350px;
}

.certificate-text {
    font-family: 'Times New Roman', serif; /* Classic certificate font */
    font-size: 18px; /* Adjust as needed */
    font-weight: normal;
    color: #4D4D4D; /* Dark gray, matching the image */
    line-height: 35px;
    text-align: justify;
    font-weight: 500;
}

.costem-table {
    border-radius: 5px;
    border: 1px solid black;
    padding: 10px;
    width: 190px;position: relative;
    z-index: 100;
}

.costem-table h6 {
    text-decoration: underline;
    font-size: 12px !important;
    font-weight: 600 !important;
    text-align: center;
}

.costem-table p {
    font-size: 12px !important;
    font-weight: 500 !important;
}

.image-5 {
    height: 60px;
}

.image-6 {
    height: 120px;
    margin-left: 100px;
    margin-top: -60px !important;
}

.image-7 {
    height: 100px;
    margin-top: -60px !important;
}

.main-box {
    margin-top: 60px;
}

.main-line {
    height: 1px;
    width: 100% !important;
    background-color: #3fbbf2;
}

.box-bottom {
    background-color: #3fbbf2;
    width: 100% !important;
    height: 30px;
}

.box {
    background-color: #0071bb;
    width: 70% !important;
    height: 30px;
    border-radius: 0px 50px 0px 0px;
}

.main-line2 {
    height: 1px;
    width: 100% !important;
    background-color: #f298b0;
}

.box-bottom2 {
    background-color: #f298b0;
    width: 100% !important;
    height: 30px;
}

.box2 {
    background-color: #ee5b72;
    width: 70% !important;
    height: 30px;
    border-radius: 0px 50px 0px 0px;
}</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    
    <!-- bootstrap link -->
 @endsection