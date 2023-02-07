<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Buat Tagihan Pembayaran SPP
                </div>
            </div>
            <div class="panel-body">
                <?= form_open(base_url('admin/spp/buat_tagihan'), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
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
                                            foreach ($students as $row) :
                                            ?>
                                                <option value="<?= $row['student_id']; ?>">
                                                    Kelas <?= $this->myModel->get_nama('kelas', array('class_id' => $row['class_id'])); ?> -
                                                    <?= $row['name']; ?>
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
                                        <input type="text" class="form-control" name="title" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="description" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="datepicker form-control" name="date" />
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
                                        <input type="text" class="form-control" name="amount" placeholder="Masukkan Total Tahigan" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Jumlah Pembayaran</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="amount_paid" placeholder="Masukkan Jumlah Pembayaran" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control">
                                            <option value="paid">Terbayar</option>
                                            <option value="unpaid">Belum Bayar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Metode</label>
                                    <div class="col-sm-9">
                                        <select name="method" class="form-control">
                                            <option value="1">Tunai</option>
                                            <option value="2">Cek Giro</option>
                                            <option value="3">Kartu Kredit/Debet</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info">Buat Tagihan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
</div>