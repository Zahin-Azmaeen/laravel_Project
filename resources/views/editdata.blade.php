@extends('main')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-info">
    {{ $message }}
</div>

@endif
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Update Profile</div>
            <div class="card-body">
                <form action="{{ url('/store-edit-data/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" name="FirstName" class="form-control" value="{{$data->FirstName}}" placeholder="FirstName" />
                        @if($errors->has('FirstName'))
                        <span class="text-danger">{{ $errors->first('FirstName') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="LastName" class="form-control" value="{{$data->LastName}}" placeholder="LastName" />
                        @if($errors->has('LastName'))
                        <span class="text-danger">{{ $errors->first('LastName') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="UserName" class="form-control" value="{{$data->UserName}}" placeholder="UserName" />
                        @if($errors->has('UserName'))
                        <span class="text-danger">{{ $errors->first('UserName') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="Email" class="form-control" value="{{$data->email}}" readonly />
                        @if($errors->has('Email'))
                        <span class="text-danger">{{ $errors->first('Email') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="Password" class="form-control" placeholder="Password" />
                        @if($errors->has('Password'))
                        <span class="text-danger">{{ $errors->first('Password') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="Phone" class="form-control" value="{{$data->Phone}}" placeholder="Phone" />
                        @if($errors->has('Phone'))
                        <span class="text-danger">{{ $errors->first('Phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <strong>Gender:</strong>
                        <label class="radio-inline"> <input type="radio" name="Gender" value="Female" checked>Female</label>
                        <label class="radio-inline"><input type="radio" name="Gender" value="Male" @if(isset($data) && $data->Gender == 'Male') checked @endif>Male</label>
                        @if($errors->has('Gender'))
                        <span class="text-danger">{{ $errors->first('Gender') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <strong>Skills:</strong>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="Skills[]" value="PHP" @if(strpos($data->Skills, 'PHP') !== false) checked @endif>PHP
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="Skills[]" value="Laravel" @if(strpos($data->Skills, 'Laravel') !== false) checked @endif>Laravel
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="Skills[]" value="  C++" @if(strpos($data->Skills, 'C++') !== false) checked @endif>C++
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="Skills[]" value="JAVA" @if(strpos($data->Skills, 'JAVA') !== false) checked @endif>JAVA
                        </label>
                        @if($errors->has('Skills'))
                        <span class="text-danger">{{ $errors->first('Skills') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <strong>Image Upload:</strong>
                        <div class="form-group">

                            <img src="{{ Storage::url($data->image) }}" height="200" width="200" alt="" />


                        </div>
                        <input type="file" name="image" class="form-control" placeholder="image-jpg,png,jpeg,gif,svg">
                        @if($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="d-grid mx-auto">
                        <button type="submit" class="btn btn-dark btn-block">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @endsection('content')