@extends('layouts.app')
@section('title','User Create')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">User Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" action="{{ route('user.store') }}" class="form-horizontal" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" placeholder="Enter Name">
                                @error('name')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('username') ? 'has-error' :'' }}">
                            <label for="username" class="col-sm-2 col-form-label">Username <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('username') }}" name="username" class="form-control" id="username" placeholder="Enter Username">
                                @error('username')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('email') ? 'has-error' :'' }}">
                            <label for="email" class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="email" placeholder="Enter Email">
                                @error('email')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('mobile_no') ? 'has-error' :'' }}">
                            <label for="mobile_no" class="col-sm-2 col-form-label">Mobile No.</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('mobile_no') }}" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter Mobile No.">
                                @error('mobile_no')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('password') ? 'has-error' :'' }}">
                            <label for="password" class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="password"  name="password" class="form-control" id="password" placeholder="Enter Password">
                                @error('password')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('password_confirmation') ? 'has-error' :'' }}">
                            <label for="password_confirmation" class="col-sm-2 col-form-label">Password Confirmation <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="password"  name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter Password Confirmation">
                                @error('password_confirmation')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('status') ? 'has-error' :'' }}">
                            <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <div class="icheck-success d-inline">
                                    <input checked type="radio" id="active" name="status" value="1" {{ old('status') == '1' ? 'checked' : '' }}>
                                    <label for="active">
                                        Active
                                    </label>
                                </div>

                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="inactive" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}>
                                    <label for="inactive">
                                        Inactive
                                    </label>
                                </div>

                                @error('status')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary bg-gradient-primary">Save</button>
                        <a href="{{ route('user.index') }}" class="btn btn-danger bg-gradient-danger float-right btn-sm">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection

