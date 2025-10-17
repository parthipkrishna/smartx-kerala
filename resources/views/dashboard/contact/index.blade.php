@extends('layouts.dashboard')
@section('contact-us')

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact Info</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Contact Info</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
    
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">    
                        <div class="table-responsive">
                            <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                                <thead class="table-light">
                                    <tr>
                                       
                                        <th>name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>                                        
                                        {{-- <th style="width: 75px;">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contact as $item)
                                        <tr>
                                            
                                            <td>
                                                {{ $item->name }}
                                            </td>
                                            <td>
                                                {{ $item->email }}
                                            </td>
                                            <td>
                                                <span class="fw-semibold">{{ $item->subject }}</span>
                                            </td>
                                            <td>
                                                {{ $item->message }}
                                            </td>
    
                                            {{-- <td>
                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#delete-alert-modal"> <i class="mdi mdi-delete"></i></a>
                                            </td> --}}
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        <div class="tab-content">
            <div class="tab-pane show active" id="modal-pages-preview">
                <!-- Delete Alert Modal -->
                <div id="delete-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                       <div class="modal-content">
                           <div class="modal-body p-4">
                               <div class="text-center">
                                   <i class="ri-information-line h1 text-info"></i>
                                   <h4 class="mt-2">Heads up!</h4>
                                   <p class="mt-3">Do you wants to delete this Training Center ?!</p>
                                   <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Continue</button>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div> <!-- end preview-->
        </div> <!-- end tab-content-->
    
    

@endsection