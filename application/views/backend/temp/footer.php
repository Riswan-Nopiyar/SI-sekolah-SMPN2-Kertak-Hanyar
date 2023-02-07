<?php
foreach ($setting as $dataSetting) {
    $system_name    = $dataSetting->system_name;
}
?>

<script>
    $(document).ready(function() {
        var calendar = $('#notice_calendar');
        $('#notice_calendar').fullCalendar({
            header: {
                left: 'title',
                right: 'today prev,next'
            },

            editable: false,
            firstDay: 1,
            height: 530,
            droppable: false,
            events: [
                <?php
                $notices    =    $this->db->get('pengumuman')->result_array();
                foreach ($notices as $row) :
                ?> {
                        title: "<?php echo $row['notice_title']; ?>",
                        start: new Date(<?php echo date('Y', $row['create_timestamp']); ?>, <?php echo date('m', $row['create_timestamp']) - 1; ?>, <?php echo date('d', $row['create_timestamp']); ?>),
                        end: new Date(<?php echo date('Y', $row['create_timestamp']); ?>, <?php echo date('m', $row['create_timestamp']) - 1; ?>, <?php echo date('d', $row['create_timestamp']); ?>)
                    },
                <?php
                endforeach
                ?>
            ]
        });
    });
</script>
<!-- END 0F CONTENT -->
<!-- FOOTER -->
<footer class="main">
    &copy; <?php echo date('Y') ?> | Sistem Informasi Manajemen Sekolah |
    <strong>Nopiyar GitHub</strong>
</footer>
<!-- END OF FOOTER -->
</div>
</div>
<!-- MODAL -->
<script type="text/javascript">
    function showAjaxModal(url) {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?= base_url('assets/images/preloader.gif') ?>" /></div>');

        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {
            backdrop: 'true'
        });

        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response) {
                jQuery('#modal_ajax .modal-body').html(response);
                console.log(response);
            }
        });
    }
</script>

<!-- (Ajax Modal)-->
<div class="modal modal-lg fade" id="modal_ajax">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo $system_name; ?></h4>
            </div>
            <div class="modal-body" style="height:500px; overflow:auto;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function confirm_modal(delete_url) {
        jQuery('#modal-4').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    }
</script>

<!-- (Normal Modal)-->
<div class="modal fade" id="modal-4">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Anda Yakin Akan Menghapus Data ?</h4>
            </div>
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
                <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- END OF MODAL -->
<!-- BOTTOM -->
<link rel="stylesheet" href="<?= base_url('assets/vendors/datatables/responsive/css/datatables.responsive.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/vendors/select2/select2-bootstrap.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/vendors/select2/select2.css') ?>">
<!-- Bottom Scripts -->
<script src="<?= base_url('assets/vendors/gsap/main-gsap.js') ?>"></script>
<script src="<?= base_url('assets/vendors/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/js/joinable.js') ?>"></script>
<script src="<?= base_url('assets/js/resizeable.js') ?>"></script>
<script src="<?= base_url('assets/js/neon-api.js') ?>"></script>
<script src="<?= base_url('assets/js/toastr.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/fullcalendar/fullcalendar.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-datepicker.js') ?>"></script>
<script src="<?= base_url('assets/js/fileinput.js') ?>"></script>

<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables/TableTools.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dataTables.bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables/jquery.dataTables.columnFilter.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables/lodash.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables/responsive/js/datatables.responsive.js') ?>"></script>
<script src="<?= base_url('assets/vendors/select2/select2.min.js') ?>"></script>

<script src="<?= base_url('assets/js/neon-calendar.js') ?>"></script>
<script src="<?= base_url('assets/js/neon-chat.js') ?>"></script>
<script src="<?= base_url('assets/js/neon-custom.js') ?>"></script>
<script src="<?= base_url('assets/js/neon-demo.js') ?>"></script>


<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != "") : ?>

    <script type="text/javascript">
        toastr.success('<?php echo $this->session->flashdata("flash_message"); ?>');
    </script>

<?php endif; ?>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ----->
<script type="text/javascript">
    jQuery(document).ready(function($) {


        var datatable = $("#table_export").dataTable();

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
</script>
<!-- END OF BOTTOM -->
</body>

</html>