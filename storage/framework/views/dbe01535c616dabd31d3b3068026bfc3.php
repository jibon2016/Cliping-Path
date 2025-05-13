<?php $__env->startSection('title','Categories'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <a href="<?php echo e(route('activity-category.create')); ?>" class="btn btn-primary bg-gradient-primary btn-sm">Create Category <i class="fa fa-plus"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">S/L</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(function () {

            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '<?php echo e(route('activity-category.datatable')); ?>',
                "pagingType": "full_numbers",
                "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, "All"]
                ],
                columns: [
                    {data: 'sort', name: 'sort',className:'text-center'},
                    {data: 'name', name: 'name'},
                    {
                        data: 'status',
                        name: 'status',
                        render: function (data, type, row) {
                            if (data === 1) {
                                return '<span class="badge badge-success">Active</span>';
                            } else if (data === 0) {
                                return '<span class="badge badge-danger">Inactive</span>';
                            }
                            return data;
                        },className:'text-center'
                    },
                    {data: 'image', name: 'image'},
                    {data: 'action', name: 'action', orderable: false},
                ],
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
                            url: "<?php echo e(route('activity-category.destroy', ['activity_category' => 'REPLACE_WITH_ID_HERE'])); ?>".replace('REPLACE_WITH_ID_HERE', id),
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\clipping\resources\views/backend/activity/category/index.blade.php ENDPATH**/ ?>