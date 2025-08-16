@extends('layouts.app')
@section('title','WCU Edit')
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
        /* Media query for screens with a maximum width of 767 pixels (typical for mobile devices) */
        @media only screen and (max-width: 767px) {
            .wrapper-list-item {
                width: 45%;
            }
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
                <form id="news-form" enctype="multipart/form-data" action="{{ route('home-backend.wcu.update',['wcu'=>$wcu->id]) }}" class="form-horizontal" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('title', $wcu->title) }}" name="title" class="form-control" id="title" placeholder="Enter Title">
                                <span id="title-error" class="help-block error-message"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="description">{{ old('description', $wcu->description) }}</textarea>
                                <span id="description-error" class="text-danger error-message"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Attachments</label>
                            <div class="col-sm-10">
                                <div class="upload-container">
                                    <span class="flow-text" onclick="triggerFileInput()">Click or drag and drop attachments files here</span>
                                    <input type="file" accept=".jpg, .jpeg, .png" class="file-upload" name="attachments[]"
                                           onchange="displayFilePreviews(this)" multiple>
                                </div>

                                <div id="file-previews" class="file-preview row">
                                    @if($attachment = $wcu->attachments)
                                        @php
                                            $pathExtension = pathinfo($attachment->file,PATHINFO_EXTENSION);
                                            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff', 'webp'];
                                        @endphp
                                        <div class="wrapper-list-item">
                                            <input type="number" value="{{ $attachment->sort }}" placeholder="Sort" class="file-title-input old-file-sort-update">
                                            @if(in_array($pathExtension,$imageExtensions))
                                                <a download href="{{ asset($attachment->file) }}"><img class="preview-image" src="{{ asset($attachment->file) }}"></a>
                                            @endif
                                            <input type="hidden" value="{{ $attachment->id }}" class="attachment_id">
                                            <div data-id="{{ $attachment->id }}" class="remove-button old-file-remove">Remove</div>
                                        </div>
                                    @endif
                                </div>
                                <span id="attachments-error" class="text-danger error-message"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <div class="icheck-success d-inline pull-right">
                                    <input  type="radio" id="active" name="status" value="1" {{ old('status',$wcu->status) == '1' ? 'checked' : '' }}>
                                    <label for="active">
                                        Active
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline pull-right">
                                    <input type="radio" id="inactive" name="status" value="0" {{ old('status',$wcu->status) == '0' ? 'checked' : '' }}>
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
    <!-- Summernote -->
    <script src="{{ asset('themes/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        // Summernote
        $('#description').summernote();

        $('#news-form-btn').click(function () {
            preloaderToggle(true);
            // Create a FormData object
            var formData = new FormData(document.getElementById('news-form'));
            $.ajax({
                type: 'POST',
                url: $('#news-form').attr('action'),
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

        $('body').on('click', '.old-file-remove', function() {
            let oldFileRemove = $(this);
            let attachmentId = $(this).data('id');
            if (confirm('are you sure delete?')){
                preloaderToggle(true);

                $.ajax({
                    method: "post",
                    url: "{{ route('attachment-delete') }}",
                    data: { id: attachmentId }
                }).done(function( response ) {
                    oldFileRemove.closest('.wrapper-list-item').remove();
                    preloaderToggle(false);
                });
            }
        });
        $('body').on('focusout', '.old-file-sort-update', function() {
            let oldFileSortItem = $(this);
            let oldFileSort = $(this).val();

            let attachmentId = oldFileSortItem.closest('div').find('.attachment_id').val();
            $.ajax({
                method: "post",
                url: "{{ route('attachment-sort-update') }}",
                data: { id: attachmentId,sort:oldFileSort }
            }).done(function( response ) {
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
