<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?= $page_title; ?>
</h3>

<hr />
<div class="label label-primary pull-right" style="font-size: 14px;">
    <i class="entypo-user"></i>
    <?= $this->db->get_where('siswa', array('student_id' => $this->session->userdata('student_id')))->row()->name; ?>
</div>

<br>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#home" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-users"></i></span>
                    <span class="hidden-xs"><i class="entypo-menu"></i> SPP dan Invoice</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <table class="table table-bordered table-hover table-striped datatable" id="table_export">
                    <thead>
                        <tr>
                            <th>Nama Siswa </th>
                            <th>Keperluan Pembayaran</th>
                            <th>Total Tagihan</th>
                            <th>Total Pembayaran</th>
                            <th>Status</th>
                            <th>Tanggal Tagihan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($invoices as $row) : ?>
                            <tr>
                                <td><?= $this->myModel->get_nama('siswa', array('student_id' => $row['student_id'])); ?></td>
                                <td><?= $row['title']; ?></td>
                                <td class="text-right"><?= number_format($row['amount'], 0, ",", "."); ?></td>
                                <td class="text-right"><?= number_format($row['amount_paid'], 0, ",", "."); ?></td>
                                <td class="text-center">
                                    <span class="label label-<?= $row['amount'] - $row['amount_paid'] == 0 ? 'success' : 'danger'; ?>"><?= $row['amount'] - $row['amount_paid'] == 0 ? 'Lunas' : 'Kurang Bayar'; ?></span>
                                </td>
                                <td><?= date('d F Y', $row['creation_timestamp']); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                            <li>
                                                <a href="#" onclick="showAjaxModal('<?= base_url('modal/popup/spp_view/' . $row['invoice_id']); ?>');">
                                                    <i class="entypo-credit-card"></i>
                                                    Lihat Tagihan
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [{
                    "sExtends": "print",
                    "fnSetText": "Press 'esc' to return",
                    "fnClick": function(nButton, oConfig) {
                        datatable.fnSetColumnVis(1, false);
                        datatable.fnSetColumnVis(5, false);
                        this.fnPrint(true, oConfig);
                        window.print();
                        $(window).keyup(function(e) {
                            if (e.which == 27) {
                                datatable.fnSetColumnVis(1, true);
                                datatable.fnSetColumnVis(5, true);
                            }
                        });
                    },

                }, ]
            },

        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
</script>