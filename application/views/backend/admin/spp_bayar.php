<?php
$edit_data    =    $this->db->get_where('spp', array('invoice_id' => $param2))->result_array();
foreach ($edit_data as $row) :
?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-shadow" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">Rincian Pembayaran Sebelumnya</div>
                </div>
                <div class="panel-body">

                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Jumlah</td>
                                <td>Cara Pembayaran</td>
                                <td>Tanggal</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            $payments = $this->db->get_where('spp_metode_pembayaran', array(
                                'invoice_id' => $row['invoice_id']
                            ))->result_array();
                            foreach ($payments as $row2) :
                            ?>
                                <tr>
                                    <td><?= $count++; ?></td>
                                    <td><?= number_format($row2['amount'], 0, ',', '.'); ?></td>
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
                                    <td><?= date('d F Y', $row2['timestamp']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-shadow" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">Pembayaran</div>
                </div>
                <div class="panel-body">
                    <?= form_open(base_url('admin/spp/bayar/' . $row['invoice_id']), array(
                        'class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top'
                    )); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jumlah Tagihan</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="<?= number_format($row['amount'], 0, ',', '.'); ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Telah Dibayar</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="amount_paid" value="<?= number_format($row['amount_paid'], 0, ',', '.'); ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Sisa yang Belum Dibayar</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="<?= number_format($row['due'], 0, ',', '.'); ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jumlah Pembayaran</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="amount" value="" placeholder="Masukkan Jumlah Pembayaran" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Cara Pembayaran</label>
                        <div class="col-sm-6">
                            <select name="method" class="form-control">
                                <option value="1">Tunai</option>
                                <option value="2">Cek Giro</option>
                                <option value="3">Kartu Kredit/Debet</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-6">
                            <input type="text" class="datepicker form-control" name="timestamp" value="" />
                        </div>
                    </div>
                    <input type="hidden" name="invoice_id" value="<?= $row['invoice_id']; ?>">
                    <input type="hidden" name="student_id" value="<?= $row['student_id']; ?>">
                    <input type="hidden" name="title" value="<?= $row['title']; ?>">
                    <input type="hidden" name="description" value="<?= $row['description']; ?>">
                    <div class="form-group">
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-info">Bayar</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>