<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    @include('layouts.partial.__styles')
    @yield('style')
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm {{ auth()->user()->theme_mode == 1 ? ' ' : 'dark-mode' }}">
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.partial.__navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
   @include('layouts.partial.__main_sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="position: relative;">
        <div id="preloader">
            <div id="loader"></div>
        </div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
             @yield('content')
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
   @include('layouts.partial.__footer')
</div>
<!-- ./wrapper -->
@include('layouts.partial.__media_files')
<!-- REQUIRED SCRIPTS -->
@include('layouts.partial.__scripts')
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var message = '{{ session('message') }}';
        var success = '{{ session('success') }}';
        var error = '{{ session('error') }}';
        var validateError = '{{ $errors->any() }}';

        if (!window.performance || window.performance.navigation.type != window.performance.navigation.TYPE_BACK_FORWARD) {
            if (message != '' || success != ''){
                if (message != ''){
                    $(document).Toasts('create', {
                        icon: 'fas fa-envelope fa-lg',
                        class: 'bg-success',
                        title: 'Success',
                        autohide: true,
                        delay: 2000,
                        body: message
                    })
                }
                if (success != ''){
                    $(document).Toasts('create', {
                        icon: 'fas fa-envelope fa-lg',
                        class: 'bg-success',
                        title: 'Success',
                        autohide: true,
                        delay: 2000,
                        body: success
                    })
                }
                // Play the notification sound
                let notificationSound = document.getElementById('notification-success-audio');
                if (notificationSound) {
                    notificationSound.play();
                }
            }


            if (error != ''){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                })
                $(document).Toasts('create', {
                    icon: 'fas fa-envelope fa-lg',
                    class: 'bg-danger',
                    title: 'Error',
                    autohide: true,
                    delay: 2000,
                    body: error
                })
                // Play the notification sound
                let notificationSound = document.getElementById('notification-error-audio');
                if (notificationSound) {
                    notificationSound.play();
                }
            }
            if (validateError != ''){

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
            }

        }

        //Date picker
        $(".date-picker").datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
        });
        //Date picker

        $('.month-picker').MonthPicker({
            Button: false,
        });
        $('.date-picker-fiscal-year').attr('readonly', true);
        $("#financial_year").change(function () {
            let FYear = $(this).val();
            if (FYear !== '') {
                fiscalYearDateRange(FYear)
            } else {
                $('.date-picker-fiscal-year').val(' ')
            }
        })
        $("#financial_year").trigger('change');
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })
        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
    function fiscalYearDateRange(year) {

        $(".date-picker-fiscal-year").datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            minDate: '01-07-' + year,
            maxDate: '30-06-' + (parseFloat(year) + 1)
        });
    }
    function jsNumberFormat(yourNumber) {
        //Seperates the components of the number
        var n = yourNumber.toString().split(".");
        //Comma-fies the first part
        n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        //Combines the two sections
        return n.join(".");
    }
    function formSubmitConfirm(btnIdName) {
        $('body').on('click', '#' + btnIdName, function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure to save?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Save It!'

            }).then((result) => {
                if (result.isConfirmed) {
                    $('form').submit();
                }
            })

        });
    }
    // Global AJAX success handler
    $(document).ajaxComplete(function(event, xhr, settings) {
        // Check if the request was successful (status code 200)
        if (xhr.status === 200) {
            let responseData = JSON.parse(xhr.responseText);
            let success = responseData.success;
            if(success == false){
                let notificationSound = document.getElementById('notification-error-audio');
                if (notificationSound) {
                    notificationSound.play();
                }
            }else if(success == true){
                let notificationSound = document.getElementById('notification-success-audio');
                if (notificationSound) {
                    notificationSound.play();
                }
            }
        }
    });
    // Error handler for AJAX requests
    $(document).ajaxError(function (event, xhr, settings, error) {
        preloaderToggle(false);
    });
    function preloaderToggle(condition){
        if(condition){
            $("#preloader").fadeIn();
            $('body').css('overflow','hidden');
        }else{
            $("#preloader").fadeOut();
            $('body').css('overflow','initial');
        }
    }
    function ajaxSuccessMessage(message){
        $(document).Toasts('create', {
            icon: 'fas fa-envelope fa-lg',
            class: 'bg-success',
            title: 'Success',
            autohide: true,
            delay: 2000,
            body: message
        })
        // Play the notification sound
        let notificationSound = document.getElementById('notification-success-audio');
        if (notificationSound) {
            notificationSound.play();
        }
    }
</script>
<script>
    $(document).ready(function () {
        let nextPageUrl = "{{ route('notifications.fetch') }}"; // Replace with your server's route to fetch notifications
        let loading = false; // To prevent multiple simultaneous AJAX calls

        // Load the first set of notifications when the page loads
        loadNotifications(nextPageUrl);

        // Scroll detection for the #notification-container
        $('#notification-container').on('scroll', function () {
            let container = $(this);
            let scrollTop = container.scrollTop();
            let containerHeight = container.innerHeight();
            let scrollHeight = container[0].scrollHeight;

            // Check if the user scrolled to the bottom of the container
            if (scrollTop + containerHeight >= scrollHeight - 10 && nextPageUrl && !loading) {
                loadNotifications(nextPageUrl);
            }
        });

        // Function to load notifications via AJAX
        function loadNotifications(url) {
            if (!url) return;
            loading = true;

            $.ajax({
                url: url,
                method: "GET",
                success: function (response) {
                    if (response.notifications && response.notifications.length > 0) {
                        response.notifications.forEach(notification => {
                            let notificationHtml = `<a href="${notification.notification_url}" class="dropdown-item">
                                <i class="fas fa-envelope mr-2 ${notification.is_unread ? 'text-black' : 'text-blue'}"></i>
                                    ${notification.title}
                            <span class="float-right text-muted ${notification.is_unread ? 'text-green' : 'text-gray'}"
                            style="font-size: 11px !important;">${notification.created_at}</span>
                        </a><div class="dropdown-divider"></div>`;

                            $('#notification-container').append(notificationHtml);
                        });
                        nextPageUrl = response.next_page_url;
                    } else {
                        nextPageUrl = null;
                    }
                    loading = false;
                },
                error: function (error) {
                    console.error('Error fetching notifications:', error);
                    loading = false;
                }
            });
        }
    });
</script>
@yield('script')
<!-- AdminLTE App -->
<script src="{{ asset('themes/backend/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
