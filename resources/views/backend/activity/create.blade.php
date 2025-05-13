@extends('layouts.app')
@section('title','Activity Create')
@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/summernote/summernote-bs4.min.css') }}">
    <style>
        .upload-container {
            text-align: center;
            padding: 20px;
            border: 2px dashed #3498db;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .file-upload {
            display: none;
        }


        .preview-image {
            width: 100%;
            max-height: 100px;
            margin-bottom: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            object-fit: contain;
        }

        .preview-pdf {
            width: 100%;
            height: 100px;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .file-title-input {
            font-size: 14px;
            margin-top: 10px;
            width: 100%;
            padding: 4px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 14px;
        }

        .remove-button {
            color: #e74c3c;
            cursor: pointer;
            margin-top: 10px;
        }
        .wrapper-list-item {
            display: inline-block;
            width: 18%;
            margin: 1%;
            text-align: center;
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
                    <h3 class="card-title">Activity Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" id="news-form" action="{{ route('activity.store') }}" class="form-horizontal" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category" class="col-sm-12">Category <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <select name="category" id="category" class="form-control select2">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <span id="category-error" class="text-danger error-message"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" class="col-sm-12">Title <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="title" placeholder="Enter Title">
                                        <span id="title-error" class="text-danger error-message"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="short_description" class="col-sm-12">Short Description <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <textarea name="short_description" class="form-control" id="short_description">{{ old('short_description') }}</textarea>
                                <span id="short_description-error" class="text-danger error-message"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-12">Description</label>
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
                        <div class="form-group row">
                            <label class="col-sm-12">Image Attachments</label>
                            <div class="col-sm-12">
                                <div class="upload-container">
                                    <span class="flow-text" onclick="triggerFileInput()">Click or drag and drop attachments files here</span>
                                    <input accept=".jpg, .jpeg, .png" type="file" class="file-upload" name="attachments[]" onchange="displayFilePreviews(this)" multiple>
                                </div>

                                <div id="file-previews" class="file-preview row"></div>
                                <span id="attachments-error" class="text-danger error-message"></span>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" id="news-form-btn" class="btn btn-primary bg-gradient-primary btn-sm">Save</button>
                        <a href="{{ route('activity.index') }}" class="btn btn-danger bg-gradient-danger btn-sm float-right">Cancel</a>
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
        function triggerFileInput() {
            const fileInput = document.querySelector('.file-upload');
            fileInput.click();
        }

        function addFileInput() {
            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.classList.add('file-upload');
            newInput.multiple = true;
            newInput.onchange = function () {
                displayFilePreviews(newInput);
            };

            const filePreviews = document.getElementById('file-previews');
            filePreviews.appendChild(newInput);
        }

        function displayFilePreviews(input) {
            const fileInput = input;
            const filePreviews = document.getElementById('file-previews');
            const previewItem = document.createElement('div');
            previewItem.classList.add('file-preview');

            Array.from(fileInput.files).forEach(file => {
                // Add input field for file title
                const wrapperListItem = document.createElement('div');
                wrapperListItem.classList.add('wrapper-list-item');
                previewItem.appendChild(wrapperListItem);
                const sortInput = document.createElement('input');
                sortInput.type = 'number';
                sortInput.name = 'attachment_sort[]';
                sortInput.placeholder = 'Sort';
                sortInput.classList.add('file-title-input');

                wrapperListItem.appendChild(sortInput);

                if (file.type.startsWith('image/')) {
                    // Image preview
                    const previewImage = document.createElement('img');
                    previewImage.classList.add('preview-image');
                    previewImage.src = URL.createObjectURL(file);
                    wrapperListItem.appendChild(previewImage);
                } else if (file.type === 'application/pdf') {
                    // PDF preview
                    const previewPdf = document.createElement('div');
                    previewPdf.classList.add('preview-pdf');
                    previewPdf.textContent = 'PDF';
                    wrapperListItem.appendChild(previewPdf);
                } else {
                    // Other file types (e.g., documents)
                    const previewPdf = document.createElement('div');
                    previewPdf.classList.add('preview-pdf');
                    previewPdf.textContent = file.name;
                    wrapperListItem.appendChild(previewPdf);
                }

                // Add a remove button for each preview
                const removeButton = document.createElement('div');
                removeButton.classList.add('remove-button');
                removeButton.textContent = 'Remove';
                removeButton.onclick = function () {
                    fileInput.value = ''; // Clear the input
                    wrapperListItem.remove();
                };

                wrapperListItem.appendChild(removeButton);

                filePreviews.appendChild(wrapperListItem);
            });
        }
    </script>
@endsection
