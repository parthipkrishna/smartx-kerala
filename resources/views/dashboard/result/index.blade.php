@extends('layouts.dashboard')
@section('result')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Result</li>
                    </ol>
                </div>
                <h4 class="page-title">Result</h4>
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
                            <a href="{{ route('result.add') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add </a>
                        </div>
                        <div class="col-sm-7">
                        </div><!-- end col-->
                    </div>
    
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                   
                                    <th>Code</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>                                        
                                    <th>Link</th>
                                    <th>Posted Date</th>
                                    <th>Status</th>
                                    <th style="width: 75px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $item)
                                    <tr>
            
                                        <td>
                                            {{ $item->code }}
                                        </td>
                                        <td>
                                            {{ Str::limit($item->title, 20, '...') }}
                                        </td>
                                        <td>
                                            {{ Str::limit($item->subtitle, 20, '...')}}
                                        </td>
                                        <td>
                                            {{ Str::limit($item->link, 20, '...') }}
                                        </td>
                                        <td>
                                            {{ $item->posted_date }}
                                        </td>
                                        <td>
                                            @if($item->status ==1)
                                                <button type="button" class="btn btn-soft-success rounded-pill">Active</button>
                                            @else
                                                <button type="button" class="btn btn-soft-danger rounded-pill">Deactive</button>
                                            @endif
                                        </td>
    
                                        <td>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-editResult-modal{{ $item->result_id}}">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#delete-alert-modal{{ $item->result_id}}">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="bs-editResult-modal{{ $item->result_id }}" tabindex="-1" role="dialog" aria-labelledby="editResultLabel{{$item->result_id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editResultLabel{{ $item->result_id }}">Edit Result</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('result.update/{id}', $item->result_id) }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <!-- Course ID -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="course_id" class="form-label">Course</label>
                                                                    <select class="form-select mb-3" name="course_id">
                                                                        <option value="">Select Course</option>
                                                                        @foreach ($courses as $course)
                                                                            <option value="{{ $course->course_id }}" 
                                                                                {{ $course->course_id == $item->course_id ? 'selected' : '' }}>
                                                                                {{ $course->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>     
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Code -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="code" class="form-label">Code</label>
                                                                    <input type="text" class="form-control" id="code" name="code" value="{{ $item->code }}">
                                                                </div>
                                                            </div>
                                                        </div>                                  

                                                        <div class="row">
                                                            <!-- Title -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="title" class="form-label">Title</label>
                                                                    <input type="text" class="form-control" id="title" name="title" value="{{ $item->title }}">
                                                                </div>
                                                            </div>                                  

                                                            <!-- Subtitle -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="subtitle" class="form-label">Subtitle</label>
                                                                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $item->subtitle }}">
                                                                </div>
                                                            </div>
                                                        </div>                                  

                                                        <div class="row">
                                                            <!-- Description -->
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="description" class="form-label">Description</label>
                                                                    <textarea class="form-control" id="description" name="description" rows="3">{{ $item->description }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>                                  

                                                        <div class="row">
                                                            <!-- Posted Date -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="posted_date" class="form-label">Posted Date</label>
                                                                    <input type="date" class="form-control" id="posted_date" name="posted_date" value="{{ $item->posted_date }}">
                                                                </div>
                                                            </div>
                                                             <!-- Status -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label">Status: </label></br/>
                                                                    <input type="hidden" name="status" value="0"> 
                                                                    <input type="checkbox" name="status" id="switch{{ $item->result_id }}" value="1"  {{ $item->status == 1 ? 'checked' : '' }}  data-switch="success" />  
                                                                    <label for="switch{{ $item->result_id }}" data-on-label="" data-off-label=""></label>
                                                                </div>                                                                                                                            
                                                            </div>
                                  

                                                            <!-- Link -->
                                                            {{-- <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="link" class="form-label">Result Link</label>
                                                                    <input type="text" class="form-control" id="link" name="link" value="{{ $item->link }}">
                                                                </div>
                                                            </div> --}}
                                                        </div>                                  

                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                      
                                    <!-- Delete Alert Modal  -->
                                    <div id="delete-alert-modal{{ $item->result_id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body p-4">
                                                    <div class="text-center">
                                                        <i class="ri-information-line h1 text-info"></i>
                                                        <h4 class="mt-2">Heads up!</h4>
                                                        <p class="mt-3">Do you want to delete this Result?</p>
                                                        <form action="{{ route('result.delete/{id}', $item->result_id) }}" method="POST">
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
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
    

@endsection