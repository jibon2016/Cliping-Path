@extends('layouts.app')
@section('title','Management Message')
@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Management Message Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="company-information-form" enctype="multipart/form-data" action="{{ route('company-information.update',['company_information'=>$company_information->id]) }}" class="form-horizontal" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="chairman_message" class="col-sm-12">Chairman Message <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <textarea name="chairman_message" class="form-control" id="chairman_message">{{ old('chairman_message',$company_information->chairman_message) }}</textarea>
                                <span id="chairman_message-error" class="text-danger error-message"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="managing_director_message" class="col-sm-12">Managing Director Message <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <textarea name="managing_director_message" class="form-control" id="managing_director_message">{{ old('managing_director_message',$company_information->managing_director_message) }}</textarea>
                                <span id="managing_director_message-error" class="text-danger error-message"></span>
                            </div>
                        </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" id="company-information-form-btn" class="btn btn-primary bg-gradient-primary btn-sm">Save</button>
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
    <!-- Summernote -->
    <script src="{{ asset('themes/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        // Summernote
        $('#managing_director_message').summernote({
            height: 150 // Set height in pixels
        });
        $('#chairman_message').summernote({
            height: 150 // Set height in pixels
        });

        $('#company-information-form-btn').click(function () {
            preloaderToggle(true);
            // Create a FormData object
            var formData = new FormData(document.getElementById('company-information-form'));
            $.ajax({
                type: 'POST',
                url: $('#company-information-form').attr('action'),
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

    </script>
@endsection
