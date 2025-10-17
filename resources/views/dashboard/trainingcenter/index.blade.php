@extends('layouts.dashboard')
@section('training-center')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Training Centers</li>
                    </ol>
                </div>
                <h4 class="page-title">Training Centers</h4>
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
                            <a href="{{ route('training-center.add') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add </a>
                        </div>
                        <div class="col-sm-7">
                        </div><!-- end col-->
                    </div>
    
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                   
                                    <th>Center</th>
                                    <th>Center Name</th>
                                    <th>Contact Person</th>                                        
                                    <th>Phone Number</th>
                                    <th>District</th>
                                    <th>Status</th>
                                    <th style="width: 75px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($training_centers as $item)
                                    <tr>
                                       
                                        <td class="table-user">
                                            @if ($item->image)
                                                <img src="{{ env('STORAGE_URL') . '/' . $item->image }}" class="me-2 rounded-circle">
                                            @else
                                                <span class="small text-danger">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->center_name }}
                                        </td>
                                        <td>
                                            @if ($item->contact_person)
                                                {{ Str::limit($item->contact_person, 25, '...')  }}
                                            @else
                                                <span class="small text-danger">No Contact Person</span>
                                            @endif 
                                        </td>
                                        <td>
                                            @if ($item->phone_number)
                                                {{ Str::limit($item->phone_number, 25, '...')  }}
                                            @else
                                                <span class="small text-danger">No Phone Number</span>
                                            @endif 
                                        </td>
                                    
                                        <td>
                                            {{ $item->district }}
                                        </td>
                                        <td>
                                            @if($item->status ==1)
                                                <button type="button" class="btn btn-soft-success rounded-pill">Active</button>
                                            @else
                                                <button type="button" class="btn btn-soft-danger rounded-pill">Deactive</button>
                                            @endif
                                        </td>
    
                                        <td>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-editTrainincenter-modal{{ $item->id }}">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#delete-alert-modal{{ $item->id }}">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal-->
                                    <div class="modal fade" id="bs-editTrainincenter-modal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editTrainincenterLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editTrainincenterLabel{{ $item->id }}">Edit Training Center</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="{{ route('training-center.update/{id}', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf                                        
                                                        <div class="row">
                                                            <!-- Center Name -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="center_name" class="form-label">Center Name</label>
                                                                    <input type="text" class="form-control" id="center_name" name="center_name" value="{{ $item->center_name }}">
                                                                </div>
                                                            </div>
                                    
                                                            <!-- Address -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="address" class="form-label">Address</label>
                                                                    <textarea class="form-control" id="address" name="address">{{ $item->address }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                    
                                                        <div class="row">
                                                            <!-- Pin Code -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="pin_code" class="form-label">Pin Code</label>
                                                                    <input type="text" class="form-control" id="pin_code" name="pin_code" value="{{ $item->pin_code }}">
                                                                </div>
                                                            </div>
                                    
                                                            <!-- Phone Number -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="phone_number" class="form-label">Phone Number</label>
                                                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $item->phone_number }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                    
                                                        <div class="row">
                                                            <!-- GST Number -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="gst_number" class="form-label">GST Number</label>
                                                                    <input type="text" class="form-control" id="gst_number" name="gst_number" value="{{ $item->gst_number }}">
                                                                </div>
                                                            </div>
                                    
                                                            <!-- Contact Person -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="contact_person" class="form-label">Contact Person</label>
                                                                    <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $item->contact_person }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                    
                                                        <div class="row">
                                                            <!-- District -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="district" class="form-label">District</label>
                                                                    <input type="text" class="form-control" id="district" name="district" value="{{ $item->district }}">
                                                                </div>
                                                            </div>                                   
                                                            <!-- Status -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label">Status: </label></br/>
                                                                    <input type="hidden" name="status" value="0"> 
                                                                    <input type="checkbox" name="status" id="switch{{ $item->id }}" value="1"  {{ $item->status == 1 ? 'checked' : '' }}  data-switch="success" />  
                                                                    <label for="switch{{ $item->id }}" data-on-label="" data-off-label=""></label>
                                                                </div>                                                                                                                            
                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label for="example-select" class="form-label">Category </label>                                                       
                                                            <select class="form-select mb-3" name="category" >
                                                                <option value="" selected>Select Category</option>
                                                                @foreach ($categories as $cat)
                                                                    <option value="{{ $cat->name }}" {{ $cat->name == $item->course ? 'selected' : '' }}>
                                                                        {{ $cat->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>     
                                                        </div>
                                                        <div class="row">
                                                            <!-- Current Image -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Current Image</label><br>
                                                                    @if ($item->image)
                                                                        <img src="{{  env('STORAGE_URL') . '/' . $item->image }}" class="me-2 img-fluid avatar-xl">
                                                                    @else
                                                                        <span class="small text-danger">No Image</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <!-- Upload New Image -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Upload New Image</label>
                                                                    <input type="file" name="image" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                    
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                    <!-- Delete Alert Modal  -->
                                    <div id="delete-alert-modal{{ $item->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body p-4">
                                                    <div class="text-center">
                                                        <i class="ri-information-line h1 text-info"></i>
                                                        <h4 class="mt-2">Heads up!</h4>
                                                        <p class="mt-3">Do you want to delete this Training Center?</p>
                                                        <form action="{{ route('training-center.delete/{id}', $item->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger my-2">Delete</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                    <!-- Delete Alert Modal  -->
                                    <div id="delete-alert-modal{{ $item->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body p-4">
                                                    <div class="text-center">
                                                        <i class="ri-information-line h1 text-info"></i>
                                                        <h4 class="mt-2">Heads up!</h4>
                                                        <p class="mt-3">Do you want to delete this Training Center?</p>
                                                        <form action="{{ route('training-center.delete/{id}', $item->id) }}" method="POST">
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