<?php
$edit_data        =    $this->db->get_where('bahan_pelajaran', array('document_id' => $param2))->result_array();
foreach ($edit_data as $row) :
?>
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
                    <?= form_open(base_url('guru/pelajaran/bahan_update/' . $param2), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" placeholder="date here" value="<?= date("d/m/Y", $row['timestamp']) ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Judul</label>
                        <div class="col-sm-5">
                            <input type="text" name="title" class="form-control" id="field-1" value="<?= $row['title'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea name="description" class="form-control wysihtml5" id="field-ta" data-stylesheet-url="assets/css/wysihtml5-color.css"><?= $row['description'] ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Kelas</label>
                        <div class="col-sm-5">
                            <select name="class_id" class="form-control">
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($class_info as $row1) { ?>
                                    <option value="<?= $row1['class_id']; ?>" <?= $row1['class_id'] == $row['class_id'] ? "selected" : null ?>><?= $row1['name']; ?></option>
                                <?php } ?>
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
<?php endforeach; ?>