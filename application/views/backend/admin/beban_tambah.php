<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Tambah Pengeluaran
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open(base_url('admin/akuntansi/simpan_beban'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Kategori</label>
                    <div class="col-sm-6">
                        <select name="expense_category_id" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            <?php
                            $categories = $this->db->get('kategori_beban')->result_array();
                            foreach ($categories as $row) :
                            ?>
                                <option value="<?php echo $row['expense_category_id']; ?>"><?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Keterangan</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="description" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Jumlah</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="amount" value="">
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
                        <input type="text" class="datepicker form-control" name="timestamp" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>