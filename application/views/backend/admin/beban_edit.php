<?php
$edit_data    =    $this->db->get_where('spp_metode_pembayaran', array(
    'payment_id' => $param2
))->result_array();
foreach ($edit_data as $row) :
?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="entypo-plus-circled"></i>
                        Edit Pengeluaran
                    </div>
                </div>
                <div class="panel-body">
                    <?= form_open(base_url('admin/akuntansi/update_beban/' . $row['payment_id']), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kategori</label>
                        <div class="col-sm-6">
                            <select name="expense_category_id" class="form-control" required>
                                <option value="">Pilih Kategori...</option>
                                <?php
                                $categories = $this->db->get('kategori_beban')->result_array();
                                foreach ($categories as $row2) :
                                ?>
                                    <option value="<?= $row2['expense_category_id']; ?>" <?php if ($row['expense_category_id'] == $row2['expense_category_id'])
                                                                                                echo 'selected'; ?>>
                                        <?= $row2['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="description" value="<?= $row['description']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Jumlah</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="amount" value="<?= $row['amount']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Cara Pembayaran</label>
                        <div class="col-sm-6">
                            <select name="method" class="form-control">
                                <option value="1" <?php if ($row['method'] == 1) echo 'selected'; ?>>Tunai</option>
                                <option value="2" <?php if ($row['method'] == 2) echo 'selected'; ?>>Cek Giro</option>
                                <option value="3" <?php if ($row['method'] == 3) echo 'selected'; ?>>Kartu Kredit/Debet</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-6">
                            <input type="text" class="datepicker form-control" name="timestamp" value="<?= $row['timestamp']; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>