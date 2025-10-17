@extends('student-dashboard.layouts.dashboard')

@section('preview-marklist')

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
                    <div class="row mb-2">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-7">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-light mb-2 me-1"  id="downloadMarklist">
                                    <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-importMarkList-modal">
                                        <i class="fa-solid fa-download"></i>
                                        Download
                                    </a>
                                </button>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div id="marklistSection">
                        <div class="marklist-header">
                            <!-- Replace with header image -->
                        </div>  
                        
                        
                        <div class="details">
                        <table class="table table-bordered">
                            <tr>
                                <th>Student ID</th>
                                <td>{{ $marklist_main['student_id'] }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $marklist_main['name'] }}</td>
                            </tr>
                            <tr>
                                <th>Register No</th>
                                <td>{{ $marklist_main['register_no'] }}</td>
                            </tr>
                            <tr>
                                <th>Course</th>
                                <td>{{ $marklist_main['course'] }}</td>
                            </tr>
                            <tr>
                                <th>Duration</th>
                                <td>{{ $marklist_main['duration'] }}</td>
                            </tr>
                            <tr>
                                <th>Issued Date</th>
                                <td>{{ $marklist_main['issued_date'] }}</td>
                            </tr>
                            <tr>
                                <th>Institute</th>
                                <td>{{ $marklist_main['institute'] }}</td>
                            </tr>
                        </table>
                        </div>  
                
                        <div class="table-section">
                            <table>
                                <tr>
                                    <th style="width: 10%;">Sl. No.</th>
                                    <th style="width: 90%;">SYLLABUS</th>
                                </tr>
                                <tr>
                                    <td style="height: 400px; vertical-align: top;">1</td>
                                    <td class="syllabus">{{ $marklist_main['syllabus'] }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 10%;">Sl. No.</th>
                                    <th style="width: 45%;">Title</th>
                                    <th style="width: 45%;">Marks</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Maximum Mark</td>
                                    <td>200</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Theory Mark</td>
                                    <td>{{ $marklist_main['theory_mark'] }}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Practical Mark</td>
                                    <td>{{ $marklist_main['practcal_mark'] }}</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Total Mark</td>
                                    <td>{{ $marklist_main['total'] }}</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Percentage</td>
                                    <td>{{ $marklist_main['percentage'] }}</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Grade</td>
                                    <td>{{ $marklist_main['grade'] }}</td>
                                </tr>
                            </table>
                        </div>  
                        <div class="marklist-footer">
                            <!-- Replace with footer image -->
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .marklist-header {
            height: 200px;
            background-color: black;
            color: white;
            text-align: center;
            position: relative;
        }
        .marklist-header img {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        .details {
            padding: 20px 0px 25px 0px;
        }
        .details table {
            width: 100%;
            border-collapse: collapse;
        }
        .details td {
            padding: 5px 10px;
            vertical-align: middle;
            border: none; 
        }
        .colon {
            text-align: left;
            padding-right: 10px; 
            font-size: 18px;
          } 

        .details td:first-child {
            width: 30%;
            font-weight: bold;
            white-space: nowrap;
        }   

        .details td:last-child {
            width: 70%;
        }
        .table-section {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            text-align: left;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
        .syllabus {
            height: 400px;
            background-color: #eaeaea;
            background-image: url('background.png'); /* Replace with your image */
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .marklist-footer {
            height: 100px;
            background-color: black;
            color: white;
            text-align: center;
            position: relative;
        }
        .marklist-footer img {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
    </style>


@endsection
