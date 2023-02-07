<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?= $page_title; ?>
</h3>

<a href="javascript:;" onclick="showAjaxModal('<?= base_url('modal/popup/beban_tambah'); ?>')" class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    Tambah Pengeluaran
</a>
<br><br>
<table class="table table-bordered table-hover table-striped datatable" id="table_export">
    <thead>
        <tr>
            <th width="5%" class="text-center">#</th>
            <th class="text-center">Kategori</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Metode Pembayaran</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Tanggal</th>
            <th width="7%" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $this->db->where('payment_type', 'expense');
        $this->db->order_by('timestamp', 'desc');
        $expenses = $this->db->get('spp_metode_pembayaran')->result_array();
        foreach ($expenses as $row) :
        ?>
            <tr>
                <td><?= $count++; ?></td>
                <td>
                    <?php
                    if ($row['expense_category_id'] != 0 || $row['expense_category_id'] != '')
                        echo $this->db->get_where('kategori_beban', array('expense_category_id' => $row['expense_category_id']))->row()->name;
                    ?>
                </td>
                <td><?= $row['description']; ?></td>
                <td>
                    <?php
                    if ($row['method'] == 1)
                        echo ('Tunai');
                    if ($row['method'] == 2)
                        echo ('Cek Giro');
                    if ($row['method'] == 3)
                        echo ('Kartu Kredit/Debet');
                    ?>
                </td>
                <td class="text-right"><?= number_format($row['amount'], 0, ',', '.'); ?></td>
                <td><?= date('d F Y', $row['timestamp']); ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <li>
                                <a href="#" onclick="showAjaxModal('<?= base_url('modal/popup/beban_edit/' . $row['payment_id']); ?>');">
                                    <i class="entypo-pencil"></i>
                                    Edit
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" onclick="confirm_modal('<?= base_url('admin/akuntansi/hapus_beban/' . $row['payment_id']); ?>');">
                                    <i class="entypo-trash"></i>
                                    Hapus
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
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
                        datatable.fnSetColumnVis(0, false);
                        datatable.fnSetColumnVis(6, false);

                        this.fnPrint(true, oConfig);

                        window.print();

                        $(window).keyup(function(e) {
                            if (e.which == 27) {
                                datatable.fnSetColumnVis(0, true);
                                datatable.fnSetColumnVis(6, true);
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