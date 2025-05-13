@extends('layouts.app')
@section('title','Signup Users')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                   <div class="card-title">Signup Users</div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>S/L</th>
                                <th>id</th>
                                <th>Subscribed At</th>
                                <th>Email</th>
                                <th>IP Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {

            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('signup-user.datatable') }}',
                "pagingType": "full_numbers",
                "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, "All"]
                ],
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'id', name: 'id',visible:false},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'email', name: 'email'},
                    {data: 'ip_address', name: 'ip_address'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                order: [[1, 'desc']],
                "dom": 'lBfrtip',
                "buttons": [
                    {
                        "extend": "copy",
                        "text": "<i class='fas fa-copy'></i> Copy",
                        "className": "btn btn-primary bg-gradient-primary btn-sm"
                    },{
                        "extend": "csv",
                        "text": "<i class='fas fa-file-csv'></i> Export to CSV",
                        "className": "btn btn-primary bg-gradient-primary btn-sm"
                    },
                    {
                        "extend": "excel",
                        "text": "<i class='fas fa-file-excel'></i> Export to Excel",
                        "className": "btn btn-primary bg-gradient-primary btn-sm"
                    },

                    {
                        "extend": "print",
                        "text": "<i class='fas fa-print'></i> Print",
                        "className": "btn btn-primary bg-gradient-primary btn-sm"
                    },
                    {
                        "extend": "colvis",
                        "text": "<i class='fas fa-eye'></i> Column visibility",
                        "className": "btn btn-primary bg-gradient-primary btn-sm"
                    }
                ],
                "responsive": true, "autoWidth": false,"colReorder": true,
            });
            $('body').on('click', '.btn-delete', function () {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        preloaderToggle(true);
                        $.ajax({
                            method: "DELETE",
                            url: "{{ route('signup-user.destroy', ['signup_user' => 'REPLACE_WITH_ID_HERE']) }}".replace('REPLACE_WITH_ID_HERE', id),
                            data: { id: id }
                        }).done(function( response ) {
                            preloaderToggle(false);
                            if (response.success) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                ).then((result) => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message,
                                });
                            }
                        });

                    }
                })

            });
        });
    </script>
@endsection
