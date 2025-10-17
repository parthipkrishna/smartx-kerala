@extends('student-dashboard.layouts.dashboard')

@section('preview-marklist')
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
                                <button id="downloadPDF" class="btn btn-secondary m-3">
                                    Download PDF
                                </button>
                            </div>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <section class="main-section">
                        <div class="container">
                            <div class="row">
                            <img class="img-fluid" src="{{ asset('assets/images/Banner.png') }}" alt="">

                                <div class="BioData mt-4">
                                    <h6 class="details">Register No</h6>
                                    <h6>:</h6>
                                    <h6>{{ $marklist_main['register_no'] }}</h6>
                                </div>
                                <div class="BioData mt-2">
                                    <h6 class="details">Name</h6>
                                    <h6>:</h6>
                                    <h6>{{ $marklist_main['name'] }}</h6>
                                </div>
                                <div class="BioData mt-2">
                                    <h6 class="details">Course Name</h6>
                                    <h6>:</h6>
                                    <h6>{{ $marklist_main['course'] }}</h6>
                                </div>
                                <div class="BioData mt-2">
                                    <h6 class="details">Duration</h6>
                                    <h6>:</h6>
                                    <h6>{{ $marklist_main['duration'] }}</h6>
                                </div>
                                <div class="BioData mt-2">
                                    <h6 class="details">Date of Issue</h6>
                                    <h6>:</h6>
                                    <h6>{{ $marklist_main['issued_date'] }}</h6>
                                </div>
                                <div class="BioData mt-2">
                                    <h6 class="details">Name of Institution</h6>
                                    <h6>:</h6>
                                    <h6>{{ $marklist_main['institute'] }}</h6>
                                </div>
                                <div class="mt-3">
                                    <div class="heading">
                                        <div class="siNo">
                                            <h6>SI.NO.</h6>
                                        </div>
                                        <div class="syllabus">
                                            <h6>SYLLABUS</h6>
                                        </div>
                                    </div>
                                    <div class="logo-img">
                                        <div class="line"></div>
                                        <div class="imgDiv">
                                            <img class="img-fluid" src="{{ asset('assets/images/logo-img2.png') }}" alt="">
                                            <div id="syllabus-container" class="overlay-text">
                                                {!! nl2br(e($marklist_main['syllabus'])) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rows">
                                        <div class="line1">I</div>
                                        <div class="line2">Maximum Mark</div>
                                        <div class="line3">200</div>
                                    </div>
                                    <div class="rows">
                                        <div class="line4">II</div>
                                        <div class="line5">Theory Mark</div>
                                        <div class="line6">{{ $marklist_main['theory_mark'] }}</div>
                                    </div>
                                    <div class="rows">
                                        <div class="line4">III</div>
                                        <div class="line5">Practical Mark</div>
                                        <div class="line6">{{ $marklist_main['practcal_mark'] }}</div>
                                    </div>
                                    <div class="rows">
                                        <div class="line4">IV</div>
                                        <div class="line5">Total Mark</div>
                                        <div class="line6">{{ $marklist_main['total'] }}</div>
                                    </div>
                                    <div class="rows">
                                        <div class="line7">Percentage</div>
                                        <div class="line8">{{ $marklist_main['percentage'] }}%</div>
                                        <div class="line7">Grade</div>
                                        <div class="line8">{{ $marklist_main['grade'] }}</div>
                                    </div>
                                </div>
                                <footer>
                                    <div class="isoDev">
                                        <p>Prepared By</p>
                                        <img class="img-fluid" src="{{ asset('assets/images/iso-img.webp') }}" alt="">

                                        <p>Registrar</p>
                                    </div>
                                    <h6>EXPLANATION OF GRADE : 80% & ABOVE A+, 60% & BELOW 80% A, 50% & BELOW 60% B+, BELOW 50% B</h6>
                                    <div class="address">
                                        REGD. OFFICE : SMART X, JAS TOWER, IIIRD FLOOR, MANNARKKAD, PALAKKAD, KERALA, INDIA - 678 582, www.smartxkerala.com
                                    </div>
                                    <div class="branches">
                                    <img src="{{ asset('assets/images/branch1.png') }}" alt="">
                                        <div class="">
                                            <h6 style="font-size: 12px;color: #FF0000;">EDUCATIONAL BOARD OF VOCATIONAL TRAINING & RESEARCH</h6>
                                            <h6 style="color: #0000FF;font-size: 17px;">शैक्षणिक बोर्ड की व्यावसायिक प्रशिक्षण और अनुसंधान</h6>
                                            <h6 style="color: #008000;font-size: 8px;">An Autonomous Board of Vocational Education, Reg. With Govt. MH/Mum 2016 with Govt. Of India (Reg)</h6>
                                        </div>
                                        <img src="{{ asset('assets/images/branch2.png') }}" alt="">

                                    </div>
                                </footer>
                            </div>
                        </div>
                    </section>
                </div>
                </div>
        </div>
</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Metrophobic&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap');

    body {
        margin-top:0px;
        padding: 0;
        box-sizing: border-box;
        font-family: "Metrophobic", sans-serif;
    }

    .main-section {
        padding: 0px;
    }

    .BioData {
        display: flex;
    }

    .BioData h6 {
        font-weight: 600;
        font-size: 12px;
        margin-left: 10px;
    }

    .BioData .details {
        width: 120px;
        margin-left: 0px !important;
    }

    .isoDev {
        display: flex;
        align-items: end;
        justify-content: space-evenly;
        padding: 10px 30px 10px 30px;
    }

    .isoDev img {
        height: 70px;
        width: auto;
    }

    .isoDev p {
        font-weight: 900;
        font-size: 12px;
    }

    footer h6 {
        font-weight: 900;
        font-size: 12px;
        text-align: center;
    }

    footer .address {
        background: #000 !important;
        padding: 5px 0px;
        color: #fff;
        font-size: 10px;
        text-align: center;
    }

    .branches {
        display: flex;
        justify-content: center;
        align-items: end;
        padding: 10px 0px 0px 0px;
    }

    .branches img {
        height: 80px;
    }

    .heading {
        display: flex;
        background-color: #ced2d4;
        align-items: center;
        border-radius: 0px !important;
        border: 1px solid #646464;
    }

    .siNo {
        width: 10%;
        border-right: 1px solid black;
        height: 32px;
        padding: 10px 0px 5px 10px;
    }

    .siNo h6 {
        font-weight: 700;
        font-size: 12px;
    }

    .syllabus {
        width: 90%;
        height: 32px;
        padding: 10px 0px 5px 10px;
        text-align: center;
    }

    .syllabus h6 {
        font-weight: 700;
        font-size: 12px;
    }

    .logo-img {
        display: flex;
    }

    .logo-img .line {
        width: 10.1%;
        border-left: 1px solid #646464;
        border-right: 1px solid #646464;
    }

    .imgDiv {
        position: relative;
        display: inline-block;
        width: 90%;
        border-right: 1px solid #646464;
        margin: 0 auto;
    }

    .imgDiv img {
        height: 25rem;
        width: auto;
        display: block;
        margin-left: auto;
        margin-right: auto;
        padding: 10px 0px 10px 0px;
    }

    .overlay-text {
        position: absolute;
        top: 4%;
        left: 2%;
        color: rgb(127, 122, 122);
        font-size: 13px;
        font-weight: bold;
        text-align: left;
        padding: 0px;
        max-width: 90%;
        word-break: break-word;
        column-gap: 30px;
        column-fill: balance; 
        transition: column-count 0.3s ease-in-out;
    }

    .overlay-text p, 
    .overlay-text li {
        break-inside: avoid;
    }

    @media (min-width: 768px) {
        .overlay-text.two-columns {
            column-count: 2;
        }
    }

    .rows {
        display: flex;
    }

    .line1 {
        border: 1px solid #646464;
        width: 10.1%;
        padding: 5px 10px 5px 15px;
        font-weight: bold;
        font-size: 12px;
    }

    .line2{
        width: 70%;
        border-top: 1px solid #646464;
        border-bottom: 1px solid #646464;
        padding: 5px 10px 5px 15px;
        font-weight: bold;
        font-size: 12px;
    }

    .line3 {
        border: 1px solid #646464;
        width: 19.9%;
        padding: 5px 10px 5px 15px;
        font-weight: bold;
        font-size: 12px;
    }

    .line4 {
        border: 1px solid #646464;
        border-top: 0px !important;
        width: 10.1%;
        padding: 5px 10px 5px 15px;
        font-weight: bold;
        font-size: 12px;
    }

    .line5 {
        width: 70%;
        border-top: 1px solid #646464;
        border-bottom: 1px solid #646464;
        padding: 5px 10px 5px 15px;
        font-weight: bold;
        font-size: 12px;
        border-top: 0px !important;
    }

    .line6 {
        border: 1px solid #646464;
        width: 19.9%;
        padding: 5px 10px 5px 15px;
        font-weight: bold;
        font-size: 12px;
        border-top: 0px !important;
    }

    .line7 {
        border: 1px solid #646464;
        width: 30.3%;
        padding: 5px 10px 5px 15px;
        font-weight: bold;
        font-size: 12px;
        border-top: 0px !important;
        text-align: right;
    }

    .line8 {
        border: 1px solid #646464;
        width: 19.7%;
        padding: 5px 10px 5px 15px;
        font-weight: bold;
        font-size: 12px;
        border-top: 0px !important;
        border-left: 0px !important;
    }
    @media print {
        #downloadPDF {
            display: none;
        }
    }
</style>
<!-- Bootstrap Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
 <!-- jsPDF and html2canvas -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
@endsection