@extends('layouts.dashboard')
@section('placement-cell')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Placement Cells</li>
                    </ol>
                </div>
                <h4 class="page-title">Placement Cells</h4>
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
                            <a href="{{ route('placement-cell.add') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add </a>
                        </div>
                        <div class="col-sm-7">
                        </div><!-- end col-->
                    </div>
    
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>Center</th>
                                    <th>Company Name</th>
                                    <th>Location</th>
                                    <th>District</th>                                        
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th style="width: 75px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($placement_cells as $item)
                                    <tr>
                                      
                                        <td class="table-user">
                                            @if ($item->image)
                                                <img src="{{ env('STORAGE_URL') . '/' . $item->image  }}" class="me-2 rounded-circle">

                                            @else
                                                <span class="small text-danger">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->company_name }}
                                        </td>
                                        <td>
                                            {{ $item->location }}
                                        </td>
                                        <td>
                                            <span class="fw-semibold">{{ $item->district }}</span>
                                        </td>
                                        <td>
                                            @if ($item->link)
                                                {{ Str::limit($item->link, 25, '...')  }}
                                            @else
                                                <span class="small text-danger">No Link</span>
                                            @endif 
                                        </td>
                                        
                                        <td>
                                            @if($item->status ==1)
                                                <button type="button" class="btn btn-soft-success rounded-pill">Active</button>
                                            @else
                                                <button type="button" class="btn btn-soft-danger rounded-pill">Deactive</button>
                                            @endif
                                        </td>
    
                                        <td>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-editPlacement-modal{{ $item->placement_id}}">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#delete-alert-modal{{ $item->placement_id}}">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="bs-editPlacement-modal{{ $item->placement_id }}" tabindex="-1" role="dialog" aria-labelledby="editPlacementLabel{{ $item->placement_id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editPlacementLabel{{ $item->placement_id }}">Edit Placement</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('placement-cell.update/{id}', $item->placement_id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <!-- Company Name -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="company_name" class="form-label">Company Name</label>
                                                                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $item->company_name }}">
                                                                </div>
                                                            </div>                                      

                                                            <!-- Location -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="location" class="form-label">Location</label>
                                                                    <input type="text" class="form-control" id="location" name="location" value="{{ $item->location }}">
                                                                </div>
                                                            </div>
                                                        </div>                                      

                                                        <div class="row">
                                                            <!-- Address -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="address" class="form-label">Address</label>
                                                                    <textarea class="form-control" id="address" name="address" rows="3">{{ $item->address }}</textarea>
                                                                </div>
                                                            </div>                                      

                                                            <!-- District -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="district" class="form-label">District</label>
                                                                    <input type="text" class="form-control" id="district" name="district" value="{{ $item->district }}">
                                                                </div>
                                                            </div>
                                                        </div>                                      

                                                        <div class="row">
                                                            <!-- Description -->
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="description" class="form-label">Description</label>
                                                                    <textarea class="form-control" id="description" name="description">{{ $item->description }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>                                      

                                                        <div class="row">
                                                            <!-- Link -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="link" class="form-label">Company Website / Link</label>
                                                                    <input type="text" class="form-control" id="link" name="link" value="{{ $item->link }}">
                                                                </div>
                                                            </div>                                      

                                                            <!-- Status -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label">Status: </label></br/>
                                                                    <input type="hidden" name="status" value="0"> 
                                                                    <input type="checkbox" name="status" id="switch{{ $item->placement_id }}" value="1"  {{ $item->status == 1 ? 'checked' : '' }}  data-switch="success" />  
                                                                    <label for="switch{{ $item->placement_id }}" data-on-label="" data-off-label=""></label>
                                                                </div>                                                                                                                            
                                                            </div>
                                                        </div>                                      

                                                        <div class="row">
                                                            <!-- Current Image -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Current Image</label><br>
                                                                    @if ($item->image)
                                                                        <img src="{{ env('STORAGE_URL') . '/' . $item->image }}" class="me-2 img-fluid avatar-xl">

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
                                    <div id="delete-alert-modal{{ $item->placement_id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body p-4">
                                                    <div class="text-center">
                                                        <i class="ri-information-line h1 text-info"></i>
                                                        <h4 class="mt-2">Heads up!</h4>
                                                        <p class="mt-3">Do you want to delete this Placement Cell?</p>
                                                        <form action="{{ route('placement-cell.delete/{id}', $item->placement_id) }}" method="POST">
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