<!-- jQuery -->
<script src="<?php echo e(asset('themes/backend/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('themes/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- Select2 -->
<script src="<?php echo e(asset('themes/backend/plugins/select2/js/select2.full.min.js')); ?>"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo e(asset('themes/backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')); ?>"></script>
<!-- InputMask -->
<script src="<?php echo e(asset('themes/backend/plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/plugins/inputmask/jquery.inputmask.min.js')); ?>"></script>
<!-- date-range-picker -->
<script src="<?php echo e(asset('themes/backend/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo e(asset('themes/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')); ?>"></script>
<!-- Tempus dominus Bootstrap 4 -->
<script
    src="<?php echo e(asset('themes/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo e(asset('themes/backend/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
<!-- Toastr -->
<script src="<?php echo e(asset('themes/backend/plugins/toastr/toastr.min.js')); ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('themes/backend/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/plugins/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/plugins/datatables-colreorder/js/dataTables.colReorder.min.js')); ?>"></script>


<!-- bootstrap datepicker -->
<script src="<?php echo e(asset('themes/backend/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/dist/js/sweetalert2@9.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/jquery-ui-1.13.2.custom/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/month-picker/MonthPicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/backend/ui-date-picker/cdn.jsdelivr.net_gh_digitalBush_jquery.maskedinput@1.4.1_dist_jquery.maskedinput.min.js')); ?>"></script>
<script>
    function datatableButtons(){
        return [
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
        ];
    }
</script>
<?php /**PATH D:\laragon\www\photopixelqa\resources\views/layouts/partial/__scripts.blade.php ENDPATH**/ ?>