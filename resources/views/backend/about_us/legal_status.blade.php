@extends('layouts.app')
@section('title','Legal Status')
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
                    <h3 class="card-title">Legal Status Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="company-information-form" enctype="multipart/form-data" action="{{ route('company-information.update',['company_information'=>$company_information->id]) }}" class="form-horizontal" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="legal_status" class="col-sm-12">Legal Status <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <textarea name="legal_status" class="form-control" id="legal_status">{{ old('legal_status',$company_information->legal_status) }}</textarea>
                                <span id="legal_status-error" class="text-danger error-message"></span>
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
        $('#legal_status').summernote({
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
