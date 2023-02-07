<?php
$edit_data        =    $this->db->get_where('spp', array('invoice_id' => $param2))->result_array();
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Edit Tagihan Pembayaran SPP
                </div>
            </div>
            <div class="panel-body">
                <?php foreach ($edit_data as $row) : ?>
                    <?= form_open(base_url('admin/spp/update_tagihan/' . $param2), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default panel-shadow" data-collapsed="0">
                                <div class="panel-heading">
                                    <div class="panel-title">Informasi Tagihan</div>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nama Siswa</label>
                                        <div class="col-sm-9">
                                            <select name="student_id" class="form-control select2">
                                                <?php
                                                $this->db->order_by('class_id', 'asc');
                                                $students = $this->db->get('siswa')->result_array();
                                                foreach ($students as $row1) :
                                                ?>
                                                    <option value="<?= $row1['student_id']; ?>" <?= $row['student_id'] == $row1['student_id'] ? 'selected' : null ?>>
                                                        Kelas <?= $this->myModel->get_nama('kelas', array('class_id' => $row1['class_id'])); ?> -
                                                        <?= $row1['name']; ?>
                                                    </option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Keperluan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="title" value="<?= $row['title'] ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="description" value="<?= $row['description'] ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Tanggal</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="datepicker form-control" name="date" value="<?= date('d/m/Y', $row['creation_timestamp']) ?>" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default panel-shadow" data-collapsed="0">
                                <div class="panel-heading">
                                    <div class="panel-title">Informasi Pembayaran</div>
                                </div>
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Jumlah Tagihan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="amount" value="<?= $row['amount'] ?>" placeholder="Masukkan Total Tagihan" />
                                            <input type="hidden" name="amount_paid" value="<?= $row['amount_paid'] ?>">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-sm-3 control-label">Jumlah Pembayaran</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="amount_paid" value="<? //= $row['amount_paid'] 
                                                                                                                ?>" placeholder="Masukkan Jumlah Pembayaran" />
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-9">
                                            <select name="status" class="form-control">
                                                <option value="paid" <?= $row['status'] == 'paid' ? 'selected' : null ?>>Terbayar</option>
                                                <option value="unpaid" <?= $row['status'] == 'unpaid' ? 'selected' : null ?>>Belum Bayar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Metode</label>
                                        <div class="col-sm-9">
                                            <select name="method" class="form-control">
                                                <option value="1" <?= $this->db->get_where('spp_metode_pembayaran', array('invoice_id' => $param2))->row()->method == '1' ? 'selected' : null ?>>Tunai</option>
                                                <option value="2" <?= $this->db->get_where('spp_metode_pembayaran', array('invoice_id' => $param2))->row()->method == '2' ? 'selected' : null ?>>Cek Giro</option>
                                                <option value="3" <?= $this->db->get_where('spp_metode_pembayaran', array('invoice_id' => $param2))->row()->method == '3' ? 'selected' : null ?>>Kartu Kredit/Debet</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-info">Update Tagihan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>