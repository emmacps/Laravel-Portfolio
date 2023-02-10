@extends('admin.admin_master')
@section('admin.index')



    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-4 col-xl-4">

                    <!-- Simple card -->
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ (!empty($adminData->profile_image)) ? url('upload/admin_images/'.$adminData->profile_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Name: {{$adminData->name}}</h4>
                            <hr>
                            <h4 class="card-title">User Email: {{$adminData->email}}</h4>
                            <hr>
                            <h4 class="card-title">Username: {{$adminData->username}}</h4>
                            <hr>
                            <a href="{{route('edit.profile')}}" class="btn btn-warning waves-effect waves-light">Edit</a>
                        </div>
                    </div>

                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    


    
@endsection