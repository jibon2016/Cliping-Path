@extends('layouts.app')
@section('title','Contact Information')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Contact Information Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="contact-information-form" enctype="multipart/form-data" action="{{ route('contact-information.update',['contact_information'=>$contact_information->id]) }}" class="form-horizontal" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="mobile_no" class="col-sm-12">Mobile No.</label>
                                    <div class="col-sm-12">
                                        <textarea name="mobile_no" placeholder="Enter Mobile No." class="form-control" id="mobile_no">{{ old('mobile_no',$contact_information->mobile_no) }}</textarea>
                                        <span id="mobile_no-error" class="text-danger error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="telephone_no" class="col-sm-12">Telephone No.</label>
                                    <div class="col-sm-12">
                                        <textarea name="telephone_no" placeholder="Enter Telephone No." class="form-control" id="telephone_no">{{ old('telephone_no',$contact_information->telephone_no) }}</textarea>
                                        <span id="telephone_no-error" class="text-danger error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="fax_no" class="col-sm-12">Fax No.</label>
                                    <div class="col-sm-12">
                                        <textarea name="fax_no" placeholder="Enter Fax No." class="form-control" id="fax_no">{{ old('fax_no',$contact_information->fax_no) }}</textarea>
                                        <span id="fax_no-error" class="text-danger error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-12">Email</label>
                                    <div class="col-sm-12">
                                        <textarea name="email" placeholder="Enter Email" class="form-control" id="email">{{ old('email',$contact_information->email) }}</textarea>
                                        <span id="email-error" class="text-danger error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="address" class="col-sm-12">Address</label>
                                    <div class="col-sm-12">
                                        <textarea name="address" placeholder="Enter Address" class="form-control" id="address">{{ old('address',$contact_information->address) }}</textarea>
                                        <span id="address-error" class="text-danger error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="facebook_url" class="col-sm-12">Facebook Page Url</label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Enter Facebook Page Url" value="{{ old('facebook_url',$contact_information->facebook_url) }}" name="facebook_url" class="form-control" id="facebook_url">
                                        <span id="facebook_url-error" class="text-danger error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="linkedin_url" class="col-sm-12">Linkedin Page Url</label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Enter Linkedin Page Url" value="{{ old('linkedin_url',$contact_information->linkedin_url) }}" name="linkedin_url" class="form-control" id="linkedin_url">
                                        <span id="linkedin_url-error" class="text-danger error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="x_url" class="col-sm-12">X Page Url</label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Enter X Page Url" value="{{ old('x_url',$contact_information->x_url) }}" name="x_url" class="form-control" id="x_url">
                                        <span id="x_url-error" class="text-danger error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="whatsapp_no" class="col-sm-12">Whatsapp No.</label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Enter Whatsapp No." value="{{ old('whatsapp_no',$contact_information->whatsapp_no) }}" name="whatsapp_no" class="form-control" id="whatsapp_no">
                                        <span id="whatsapp_no-error" class="text-danger error-message"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" id="contact-information-form-btn" class="btn btn-primary bg-gradient-primary btn-sm">Save</button>
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


        $('#contact-information-form-btn').click(function () {
            preloaderToggle(true);
            // Create a FormData object
            var formData = new FormData(document.getElementById('contact-information-form'));
            $.ajax({
                type: 'POST',
                url: $('#contact-information-form').attr('action'),
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
