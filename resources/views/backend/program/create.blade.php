@extends('layouts.app')
@section('title',$category->name.' new Create')
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
                    <h3 class="card-title">{{ $category->name }} Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" id="news-form" action="{{ route('programs.store',['program_category'=>$category->id]) }}" class="form-horizontal" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class="col-sm-12">Title <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="title" placeholder="Enter Title">
                                        <span id="title-error" class="text-danger error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sort" class="col-sm-12">Sort <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="number" value="{{ old('sort',$sortMax) }}" name="sort" class="form-control" id="sort" placeholder="Enter Sort">
                                        <span id="sort-error" class="text-danger error-message"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-12">Description <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <textarea name="description" id="description">{{ old('description') }}</textarea>
                                <span id="description-error" class="text-danger error-message"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
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
                                <span id="status-error" class="text-danger error-message"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" id="news-form-btn" class="btn btn-primary bg-gradient-primary btn-sm">Save</button>
                        <a href="{{ route('programs.index',['program_category'=>$category->id]) }}" class="btn btn-danger bg-gradient-danger btn-sm float-right">Cancel</a>
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
        $('#description').summernote();

        $('#news-form-btn').click(function() {
            preloaderToggle(true);
            // Create a FormData object
            var formData = new FormData(document.getElementById('news-form'));
            $.ajax({
                type: 'POST',
                url: $('#news-form').attr('action'),
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

    </script>
@endsection
