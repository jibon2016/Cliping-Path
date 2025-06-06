@extends('layouts.app')
@section('title','Slider Edit')
@section('style')
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
            width: 100%;
            height: 300px;
            border: 1px solid #ccc;
            background-size: cover;
            background-position: center;
            display: block;
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
                    <h3 class="card-title">Slider Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="slider-form" enctype="multipart/form-data" action="{{ route('slider.update',['slider'=>$slider->id]) }}" class="form-horizontal" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('title',$slider->title) }}" name="title" class="form-control" id="title" placeholder="Enter Title">
                                <span id="title-error" class="help-block error-message"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sub_title" class="col-sm-2 col-form-label">Sub Title</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('sub_title',$slider->sub_title) }}" name="sub_title" class="form-control" id="sub_title" placeholder="Enter Sub Title">
                                <span id="sub_title-error" class="help-block error-message"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="link" class="col-sm-2 col-form-label">Link</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('link',$slider->link) }}" name="link" class="form-control" id="link" placeholder="Enter Link">
                                <span id="link-error" class="help-block error-message"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">Sort <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" value="{{ old('sort',$slider->sort) }}" name="sort" class="form-control" id="sort" placeholder="Enter Sort">
                                <span id="sort-error" class="help-block error-message"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <div class="icheck-success d-inline pull-right">
                                    <input  type="radio" id="active" name="status" value="1" {{ old('status',$slider->status) == '1' ? 'checked' : '' }}>
                                    <label for="active">
                                        Active
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline pull-right">
                                    <input type="radio" id="inactive" name="status" value="0" {{ old('status',$slider->status) == '0' ? 'checked' : '' }}>
                                    <label for="inactive">
                                        Inactive
                                    </label>
                                </div>
                                <span id="status-error" class="help-block error-message"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image Attachment</label>
                            <div class="col-sm-10">
                                <div class="image-upload">
                                    <label for="upload" class="file-label">Choose Image</label>
                                    <input type="file" name="attachments" id="upload" accept="image/*">
                                    <div id="preview" style="background-image:url({{ asset($slider->attachments->first()->file ?? '') }})" class="image-preview"></div>
                                    <p class="text-danger">Image Size: (width:1200px x Height:300px)</p>
                                </div>
                                <span id="attachments-error" class="help-block error-message"></span>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" id="slider-form-btn" class="btn btn-primary bg-gradient-primary btn-sm">Save</button>
                        <a href="{{ route('slider.index') }}" class="btn btn-danger bg-gradient-danger btn-sm float-right">Cancel</a>
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
    <script>
        $('#slider-form-btn').click(function () {
            preloaderToggle(true);
            // Create a FormData object
            var formData = new FormData(document.getElementById('slider-form'));
            $.ajax({
                type: 'POST',
                url: $('#slider-form').attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    preloaderToggle(false);
                    if (response.status) {
                        ajaxSuccessMessage(response.message)
                        window.location.href = response.redirect_url;
                    } else {
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
                error: function (xhr) {
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
                        $.each(errors, function (field, errorMessage) {
                            $('#' + field + '-error').text(errorMessage[0]);
                            $('#' + field + '-error').closest('.row').addClass('has-error')
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
