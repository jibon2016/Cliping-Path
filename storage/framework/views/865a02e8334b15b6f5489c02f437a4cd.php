<?php $__env->startSection('title','Notifications'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-default">
            <div class="card-header">
                <a href="<?php echo e(route('notification_mark_read')); ?>" class="btn btn-primary bg-gradient-primary">Mark All Read</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Created At</th>
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
            $(function () {
                $("#table").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '<?php echo e(route('notification.datatable')); ?>',
                    "pagingType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, "All"]
                    ],
                    columns: [
                        { data: 'title', name: 'title' },
                        { data: 'content', name: 'content' },
                        { data: 'created_at', name: 'created_at' }
                    ],
                    "dom": 'lBfrtip',
                    "buttons": datatableButtons(),
                    "responsive": true, "autoWidth": false,"colReorder": true,

                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/notification/all.blade.php ENDPATH**/ ?>