<?php
$edit_data = $this->db->get_where('spp', array('invoice_id' => $param2))->result_array();
foreach ($edit_data as $row) :
?>
    <center>
        <a onClick="PrintElem('#invoice_print')" class="btn btn-default btn-icon icon-left hidden-print pull-right">
            Cetak
            <i class="entypo-print"></i>
        </a>
    </center>
    <br><br>
    <div id="invoice_print">
        <table width="100%" border="0">
            <tr>
                <td>
                    <div class="row">
                        <label class="h5 col-sm-2 mb-5">Tanggal</label>
                        <label class="h5 col-sm-10">: <?= $row['creation_timestamp']; ?></label>
                    </div>
                    <div class="row">
                        <label class="h5 col-sm-2">Tagihan</label>
                        <label class="h5 col-sm-10">: <?= $row['title']; ?></label>
                    </div>
                    <div class="row">
                        <label class="h5 col-sm-2">Keterangan</label>
                        <label class="h5 col-sm-10">: <?= $row['description']; ?></label>
                    </div>
                    <div class="row">
                        <label class="h5 col-sm-2">Status</label>
                        <label class="h5 col-sm-10">: <?= $row['due'] == 0 ? 'Lunas' : 'Kurang/Belum Bayar'; ?></label>
                    </div>
                </td>
            </tr>
        </table>
        <hr>
        <table width="100%" border="0">
            <tr>
                <td align="left" width="50%">
                    <h4></h4>
                </td>
                <td align="right">
                    <h4>Kepada Yth.</h4>
                </td>
            </tr>

            <tr>
                <td align="left" valign="top">
                    <?= $this->db->get('setting')->row()->system_name; ?><br>
                    <?= $this->db->get('setting')->row()->address; ?><br>
                    <?= $this->db->get('setting')->row()->phone; ?>
                </td>
                <td align="right" valign="top">
                    <?= $this->db->query("select wali.* from wali, siswa where wali.parent_id=siswa.parent_id and siswa.student_id='" . $row['student_id'] . "'")->row()->name; ?><br>
                    Orang Tua/Wali Murid dari <br><?= $this->db->get_where('siswa', array('student_id' => $row['student_id']))->row()->name; ?><br>
                    <?php
                    $class_id = $this->db->get_where('siswa', array('student_id' => $row['student_id']))->row()->class_id;
                    echo 'Kelas ' . $this->db->get_where('kelas', array('class_id' => $class_id))->row()->name;
                    ?><br>
                </td>
            </tr>
        </table>
        <hr>
        <table width="100%" border="0">
            <tr>
                <td align="right" width="80%">Total Pembayaran :</td>
                <td align="right"><?= $this->db->get('setting')->row()->currency; ?>. <?= number_format($row['amount'], 0, ",", "."); ?></td>
            </tr>
            <tr>
                <td align="right" width="80%">
                    <h4>Telah Dibayar :</h4>
                </td>
                <td align="right">
                    <h4><?= $this->db->get('setting')->row()->currency; ?>. <?= number_format($row['amount_paid'], 0, ',', '.'); ?></h4>
                </td>
            </tr>
            <?php if ($row['due'] != 0) : ?>
                <tr>
                    <td align="right" width="80%">
                        <h4>Sisa Pembayaran :</h4>
                    </td>
                    <td align="right">
                        <h4><?= $this->db->get('setting')->row()->currency; ?>. <?= number_format($row['due'], 0, ',', '.'); ?></h4>
                    </td>
                </tr>
            <?php endif; ?>
        </table>
        <hr>
        <h4>Rincian Pembayaran Sebelumnya</h4>
        <table class="table table-bordered table-hover" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Metode</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $payment_history = $this->db->get_where('spp_metode_pembayaran', array('invoice_id' => $row['invoice_id']))->result_array();
                foreach ($payment_history as $row2) :
                ?>
                    <tr>
                        <td><?= date("d F Y", $row2['timestamp']); ?></td>
                        <td><?= $this->db->get('setting')->row()->currency; ?>. <?= number_format($row2['amount'], 0, ',', '.'); ?></td>
                        <td>
                            <?php
                            if ($row2['method'] == 1)
                                echo ('Tunai');
                            if ($row2['method'] == 2)
                                echo ('Cek Giro');
                            if ($row2['method'] == 3)
                                echo ('Kartu Kredit/Debet');
                            if ($row2['method'] == 'paypal')
                                echo 'Paypal';
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tbody>
        </table>
    </div>
<?php endforeach; ?>


<script type="text/javascript">
    // print invoice function
    function PrintElem(elem) {
        Popup($(elem).html());
    }

    function Popup(data) {
        var mywindow = window.open('', 'invoice', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Invoice</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>