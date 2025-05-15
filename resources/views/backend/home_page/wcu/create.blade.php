@extends('layouts.app')
@section('title','WCU Create')
@section('style')

    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/summernote/summernote-bs4.min.css') }}">
    <style>
        .image-upload {
            position: relative;
            margin-bottom: 20px;
        }

        .file-label {
            display: inline-block;
            padding: 10px 20px;
            cursor: pointer;
            background-color: #3498db;
            color: #fff;
            border-radius: 5px;
        }

        #upload {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .image-preview {
            width: 200px;
            height: 200px;
            border: 1px solid #ccc;
            background-size: cover;
            background-position: center;
            display: none;
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">WCU Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" id="category-form" action="{{ route('home-backend.wcu.store') }}" class="form-horizontal" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="title" placeholder="Enter Title">
                                <span id="title-error" class="help-block error-message"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                                <span id="description-error" class="text-danger error-message"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <div class="icheck-success d-inline pull-right">
                                    <input checked type="radio" id="active" name="status" value="1" {{ old('status') == '1' ? 'checked' : '' }}>
                                    <label for="active">
                                        Active
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline pull-right">
                                    <input type="radio" id="inactive" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}>
                                    <label for="inactive">
                                        Inactive
                                    </label>
                                </div>
                                <span id="status-error" class="help-block error-message"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" id="category-form-btn" class="btn btn-primary bg-gradient-primary btn-sm">Save</button>
                        <a href="{{ route('home-backend.wcu') }}" class="btn btn-danger bg-gradient-danger btn-sm float-right">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection

@section('script')
    <script src="{{ asset('themes/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        // Summernote
        $('#description').summernote({
            height: 150 // Set height in pixels
        });

        $('#category-form-btn').click(function() {
            preloaderToggle(true);
            // Create a FormData object
            var formData = new FormData(document.getElementById('category-form'));
            $.ajax({
                type: 'POST',
                url: $('#category-form').attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    preloaderToggle(false);
                    if (response.status){
                        ajaxSuccessMessage(response.message)
                        window.location.href = response.redirect_url;
                    }else{
                        $(document).Toasts('create', {
                            icon: 'fas fa-envelope fa-lg',
                            class: 'bg-warning',
                            title: 'Error',
                            autohide: true,
                            delay: 2000,
                            body: response.message
                        })
                        // Play the notification sound
                        let notificationSound = document.getElementById('notification-error-audio');
                        if (notificationSound) {
                            notificationSound.play();
                        }
                    }
                },
                error: function(xhr) {
                    preloaderToggle(false);
                    // If the form submission encounters an error
                    // Display validation errors
                    if (xhr.status === 422) {
                        $(document).Toasts('create', {
                            icon: 'fas fa-envelope fa-lg',
                            class: 'bg-warning',
                            title: 'Error',
                            autohide: true,
                            delay: 2000,
                            body: 'Please fill up validate required fields.'
                        })
                        // Play the notification sound
                        let notificationSound = document.getElementById('notification-error-audio');
                        if (notificationSound) {
                            notificationSound.play();
                        }
                        let errors = xhr.responseJSON.errors;
                        // Clear previous error messages
                        $('.error-message').text('');
                        $('.form-group.row').removeClass('has-error');

                        // Update error messages for each field
                        $.each(errors, function(field, errorMessage) {
                            $('#'+field+'-error').text(errorMessage[0]);
                            $('#'+field+'-error').closest('.row').addClass('has-error')
                        });
                    }
                }
            });
        });
        $(document).ready(function() {
            $('#upload').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview').css('background-image', 'url(' + e.target.result + ')');
                        $('#preview').fadeIn();
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
