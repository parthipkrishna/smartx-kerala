@extends('layouts.dashboard')
@section('certifiates')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Certificates</li>
                    </ol>
                </div>
                <h4 class="page-title">Certificates</h4>
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
                            <a href="{{ route('certificate.add') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add </a>
                        </div>
                        <div class="col-sm-7">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-light mb-2 me-1">
                                    <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-importCertificate-modal">
                                        <i class="mdi mdi-square-edit-outline"></i>
                                        Import
                                    </a>
                                </button>
                                <button type="button" id="print-selected" class="btn btn-light mb-2 me-1">
                                    <i class="fa-solid fa-print"></i> Print 
                                </button>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                    {{-- <th class="all" >
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck1">
                                            <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th> --}}
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Register No.</th> 
                                    <th>Course Name</th>
                                    <th>Performence</th>   
                                    <th>Issued Date</th>
                                    <th>Print Status</th>  
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($certificates as $list)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input row-checkbox" data-id="{{ $list->certificate_id }}">
                                            </div>
                                        </td>
                                        
                                        <td>{{ Str::limit($list->student_name, 10, '...') }}</td>
                                        <td>{{ $list->register_no}}</td>
                                        <td>{{ Str::limit($list->course_name, 19, '...')}}</td>
                                        <td><span class="fw-semibold">{{ $list->performance}}</span></td>
                                        <td>{{ $list->issued_date }}</td>
                                        <td>
                                            @if($list->printed_status ==1)
                                                <button type="button" class="btn btn-soft-success rounded-pill">Printed</button>
                                            @else
                                                <button type="button" class="btn btn-soft-danger rounded-pill">Not Printed</button>
                                            @endif
                                        </td>

                                        <td>                                       
                                            <a href="{{ route('certificate.view/{id}', $list->certificate_id ) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-editCertificate-modal{{ $list->certificate_id  }}">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#delete-alert-modal{{ $list->certificate_id  }}">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal-->
                                    <div class="modal fade" id="bs-editCertificate-modal{{ $list->certificate_id  }}" tabindex="-1" role="dialog" aria-labelledby="editCertificateLabel{{ $list->certificate_id  }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editCertificateLabel{{ $list->certificate_id  }}">Edit Certificate</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('certificate.update/{id}', $list->certificate_id ) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf                                        
                                                        <div class="row">
                                                            <div class="col-lg-6">
                        
                                                                <div class="mb-2">
                                                                    <label for="student_name" class="form-label">Student Name</label>
                                                                    <input type="text" name="student_name"  value="{{ $list->student_name }}" class="form-control"  id="student_name"  placeholder="Enter student name" disabled>
                                                                </div>
                                                                
                                                                <div class="mb-2">
                                                                    <label for="performance" class="form-label"> Student Performance</label>
                                                                    <input type="text" name="performance"  value="{{ $list->performance}}" class="form-control"  id="performance"  placeholder="Enter Student performance" >
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="issued_date" class="form-label">Issued Date</label>
                                                                    <input type="date" name="issued_date"  value="{{ $list->issued_date }}" class="form-control"  id="issued_date"  placeholder="Enter issued date" >
                                                                </div>
                        
                                                            </div>     
                        
                                                            <div class="col-lg-6">
                                                                <div class="mb-2">
                                                                    <label for="register_no" class="form-label"> Register Number</label>
                                                                    <input type="text" name="register_no"  value="{{ $list->register_no }}" class="form-control"  id="register_no"  placeholder="Enter Student register no"  disabled>
                                                                </div>
                        
                                                                <div class="mb-2">
                                                                    <label for="location" class="form-label"> Location</label>
                                                                    <input type="text" name="location"  value="{{ $list->location }}" class="form-control"  id="location"  placeholder="Enter Location"  >
                                                                </div>

                                                                <div class="mb-2">
                                                                    <label for="printed_status{{ $list->certificate_id }}" class="form-label">Printed Status:</label><br/>  {{-- Unique ID --}}
                                                                    <input type="hidden" name="printed_status" value="0">
                                                                    <input type="checkbox" name="printed_status" id="printed_status{{ $list->certificate_id }}" value="1" {{ $list->printed_status == 1 ? 'checked' : '' }} data-switch="success" />
                                                                    <label for="printed_status{{ $list->certificate_id }}" data-on-label="" data-off-label=""></label>
                                                                </div>

                                                            </div>
                                                        </div>                                                                                 
                                                        <!-- Submit Button -->                                                 
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                    <!-- Delete Alert Modal  -->
                                    <div id="delete-alert-modal{{ $list->certificate_id  }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body p-4">
                                                    <div class="text-center">
                                                        <i class="ri-information-line h1 text-info"></i>
                                                        <h4 class="mt-2">Heads up!</h4>
                                                        <p class="mt-3">Do you want to delete this Marklist?</p>
                                                        <form action="{{ route('certificate.delete/{id}', $list->certificate_id ) }}" method="POST">
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
                    
<!-- Import Modal -->
<div class="modal fade" id="bs-importCertificate-modal" tabindex="-1" role="dialog" aria-labelledby="importMarkListLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="importMarkListLabel">Import Certificate</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif                                

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div class="mb-3">
                    <p>Download the <a href="{{ asset('certificate_example.xlsx') }}" download>Sample Excel File</a> for Certificate</p>
                </div>

                <form action="{{ route('certificate.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="file" class="form-label">Upload Excel/CSV File</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Import Data</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                    

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

 
@endsection