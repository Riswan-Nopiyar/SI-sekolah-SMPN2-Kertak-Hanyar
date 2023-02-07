<?php
$page_title         = $judulHalaman;
?>
<h3>
    <i class="entypo-right-circled"></i>
    <?= $page_title; ?>
</h3>

<hr />
<table class="table table-bordered table-hover table-striped datatable" id="table_export">
    <thead>
        <tr>
            <th>
                <div>#</div>
            </th>
            <th>
                <div>Sumber Pendapatan</div>
            </th>
            <th>
                <div>Keterangan</div>
            </th>
            <th>
                <div>Cara Pembayaran</div>
            </th>
            <th>
                <div>Jumlah</div>
            </th>
            <th>
                <div>Tanggal</div>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        /* $this->db->where('payment_type', 'income');
        $this->db->order_by('timestamp', 'desc'); */
        $expenses   = $this->db->query("select spp_metode_pembayaran.*, siswa.name , kelas.name as kelas from spp_metode_pembayaran, siswa, kelas WHERE spp_metode_pembayaran.student_id=siswa.student_id and siswa.class_id=kelas.class_id and spp_metode_pembayaran.payment_type='income' order by spp_metode_pembayaran.timestamp")->result_array();
        /* $expenses = $this->db->get('spp_metode_pembayaran')->result_array(); */
        foreach ($expenses as $row) :
        ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><?= $row['title']; ?></td>
                <td><?= $row['description'] . ' atas nama ' . $row['name'] . ' kelas ' . $row['kelas']; ?></td>
                <td>
                    <?php
                    if ($row['method'] == 1)
                        echo ('Tunai');
                    if ($row['method'] == 2)
                        echo ('Cek Giro');
                    if ($row['method'] == 3)
                        echo ('Kartu Kredit/Debet');
                    if ($row['method'] == 'paypal')
                        echo 'Paypal';
                    ?>
                </td>
                <td class="text-right"><?= number_format($row['amount'], 0, ',', '.'); ?></td>
                <td><?= date('d F Y', $row['timestamp']); ?></td>
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

                        this.fnPrint(true, oConfig);

                        window.print();

                        $(window).keyup(function(e) {
                            if (e.which == 27) {
                                datatable.fnSetColumnVis(0, true);
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