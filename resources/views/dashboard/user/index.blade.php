@extends('layouts.dashboard')
@section('list-user')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartXKerala</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
                <h4 class="page-title">Users</h4>
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
                            <a href="{{ route('users.add') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add </a>
                        </div>
                        <div class="col-sm-7">
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                    <th >Users</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No.</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_main as $user)
                                    <tr>
                                        <td class="table-user">
                                            @if ($user['profile_image'])
                                                <img src="{{ env('STORAGE_URL') . '/' . $user['profile_image'] }}" class="me-2 rounded-circle">
                                            @else
                                                <span class="small text-danger">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        <td><span class="fw-semibold">{{ $user['phone_number'] }}</span></td>
                                        <td>{{ $user['user_role'] }}</td>
                                        <td>
                                            @if($user['status'] == 1)
                                                <button type="button" class="btn btn-soft-success rounded-pill">Active</button>
                                            @else
                                                <button type="button" class="btn btn-soft-danger rounded-pill">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#bs-editUser-modal{{ $user['user_id'] }}">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#delete-alert-modal{{ $user['user_id'] }}">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal-->
                                    <div class="modal fade" id="bs-editUser-modal{{ $user['user_id'] }}" tabindex="-1" role="dialog" aria-labelledby="editUserLabel{{ $user['user_id'] }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editUserLabel{{ $user['user_id'] }}">Edit User</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('user.update/{id}', $user['user_id']) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf                                        
                                                        <div class="row">
                                                            <!-- Center Name -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="center_name" class="form-label">Name</label>
                                                                    <input type="text" class="form-control" id="center_name" name="name" value="{{ $user['name'] }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="district" class="form-label">User Role</label>
                                                                    <select class="form-select" id="example-select" name="user_role" >
                                                                        <option value="">{{ $user['user_role'] }}</option>
                                                                        <option value="">Select option</option>
                                                                        @foreach ($roles as $item)
                                                                            <option value="{{ $item->role_id }}">{{ $item->role_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Current Image</label><br>
                                                                    @if ($user['profile_image'])
                                                                        <img src="{{ env('STORAGE_URL') . '/' . $user['profile_image'] }}" class="me-2 img-fluid avatar-xl">
                                                                    @else
                                                                        <span class="small text-danger">No Image</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                     
                                                            <!-- Address -->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="phone_number" class="form-label">Phone Number</label>
                                                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user['phone_number'] }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label">Status: </label></br/>
                                                                    <input type="hidden" name="status" value="0"> 
                                                                    <input type="checkbox" name="status" id="switch{{ $user['user_id'] }}" value="1"  {{ $user['status'] == 1 ? 'checked' : '' }}  data-switch="success" />  
                                                                    <label for="switch{{ $user['user_id'] }}" data-on-label="" data-off-label=""></label>
                                                                </div>                                                                                                                            
                                                                
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Upload New Image</label>
                                                                    <input type="file" name="profile_image" class="form-control">
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
                                    <div id="delete-alert-modal{{ $user['user_id'] }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body p-4">
                                                    <div class="text-center">
                                                        <i class="ri-information-line h1 text-info"></i>
                                                        <h4 class="mt-2">Heads up!</h4>
                                                        <p class="mt-3">Do you want to delete this User?</p>
                                                        <form action="{{ route('user.delete/{id}', $user['user_id']) }}" method="POST">
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