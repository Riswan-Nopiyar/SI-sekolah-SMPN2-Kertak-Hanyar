<?php $class_info = $this->db->get('kelas')->result_array(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <h3>Tambah Bahan Pelajaran</h3>
                </div>
            </div>
            <div class="panel-body">
                <?= form_open(base_url('guru/pelajaran/bahan_simpan'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Tanggal</label>
                    <div class="col-sm-7">
                        <div class="date-and-time">
                            <input type="text" name="timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" placeholder="date here">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Judul</label>
                    <div class="col-sm-5">
                        <input type="text" name="title" class="form-control" id="field-1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label">Keterangan</label>
                    <div class="col-sm-9">
                        <textarea name="description" class="form-control wysihtml5" id="field-ta" data-stylesheet-url="assets/css/wysihtml5-color.css"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label">Kelas</label>
                    <div class="col-sm-5">
                        <select name="class_id" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($class_info as $row) { ?>
                                <option value="<?= $row['class_id']; ?>"><?= $row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">File</label>
                    <div class="col-sm-5">
                        <input type="file" name="file_name" class="form-control file2 inline btn btn-primary" data-label="<i class='fa fa-file'></i> Browse" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label">Tipe File</label>
                    <div class="col-sm-5">
                        <select name="file_type" class="form-control">
                            <option value="">Pilih Tipe File</option>
                            <option value="Image">Image</option>
                            <option value="Doc">Document</option>
                            <option value="PDF">PDF</option>
                            <option value="Excel">Excel</option>
                            <option value="Other">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3 control-label col-sm-offset-2">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>