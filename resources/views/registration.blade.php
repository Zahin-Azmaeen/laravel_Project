@extends('main')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Registration</div>
            <div class="card-body">
                <form action="{{ route('sample.validate_registration') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" name="FirstName" value="{{old('FirstName')}}" class="form-control" placeholder="FirstName" />
                        @if($errors->has('FirstName'))
                        <span class="text-danger">{{ $errors->first('FirstName') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="LastName" value="{{old('LastName')}}" class="form-control" placeholder="LastName" />
                        @if($errors->has('LastName'))
                        <span class="text-danger">{{ $errors->first('LastName') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="UserName" value="{{old('UserName')}}" class="form-control" placeholder="UserName" />
                        @if($errors->has('UserName'))
                        <span class="text-danger">{{ $errors->first('UserName') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="Email" value="{{old('Email')}}" class="form-control" placeholder="Email Address" />
                        @if($errors->has('Email'))
                        <span class="text-danger">{{ $errors->first('Email') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="Password" value="{{old('Password')}}" class="form-control" placeholder="Password" />
                        @if($errors->has('Password'))
                        <span class="text-danger">{{ $errors->first('Password') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="Phone" value="{{old('Phone')}}" class="form-control" placeholder="Phone" />
                        @if($errors->has('Phone'))
                        <span class="text-danger">{{ $errors->first('Phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <strong>Gender:</strong>
                        <label class="radio-inline"> <input type="radio" name="Gender" value="Female" checked>Female</label>
                        <label class="radio-inline"><input type="radio" name="Gender" value="Male">Male</label>
                        @if($errors->has('Gender'))
                        <span class="text-danger">{{ $errors->first('Gender') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <strong>Skills:</strong>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="Skills[]" value="PHP">PHP
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="Skills[]" value="Laravel">Laravel
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="Skills[]" value="C++">C++
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="Skills[]" value="JAVA">JAVA
                        </label>
                        @if($errors->has('Skills'))
                        <span class="text-danger">{{ $errors->first('Skills') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <strong>Image Upload:</strong>
                        <input type="file" multiple accept="image/*" name="image" value="{{old('image')}}" class="form-control" placeholder="image-jpg,png,jpeg,gif,svg">
                        @if($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="d-grid mx-auto">
                        <button type="submit" class="btn btn-dark btn-block">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection('content')