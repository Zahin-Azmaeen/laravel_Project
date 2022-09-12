@extends('main')

@section('content')

<div class="card">
    <div class="card-header">Dashboard</div>
    <div class="card-body">

        You are Login in your Profile.
    </div>
</div>




<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{Storage::url($data->image)}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">

                    </div>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">First Name :</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$data->FirstName}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Last Name :</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$data->LastName}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">User Name :</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$data->UserName}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$data->email}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$data->Phone}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Gender</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$data->Gender}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Skills</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$data->Skills}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-sm btn-primary " href="{{ url('edit-data/'.$data->id) }} ">Edit</a>



            </div>

        </div>
    </div>
</section>
@endsection('content')