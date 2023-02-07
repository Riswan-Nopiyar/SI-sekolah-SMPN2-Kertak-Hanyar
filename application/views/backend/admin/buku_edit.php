<?php
$edit_data        =    $this->db->get_where('buku', array('book_id' => $param2))->result_array();
foreach ($edit_data as $row) :
?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="entypo-plus-circled"></i>
                        Edit Buku Pelajaran
                    </div>
                </div>
                <div class="panel-body">
                    <?= form_open(base_url('admin/perpustakaan/update/' . $row['book_id']), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Judul Buku</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="<?= $row['name'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Pengarang/Penerbit</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="author" value="<?= $row['author'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="description" value="<?= $row['description'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="price" value="<?= $row['price'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kelas</label>
                        <div class="col-sm-9">
                            <select name="class_id" class="form-control" style="width:100%;">
                                <?php
                                $classes = $this->db->get('kelas')->result_array();
                                foreach ($classes as $row1) :
                                ?>
                                    <option value="<?= $row1['class_id']; ?>" <?= $row1['class_id'] == $row['class_id'] ? 'selected' : null ?>><?= $row1['name']; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-9">
                            <select name="status" class="form-control" style="width:100%;">
                                <option value="available" <?= $row['status'] == 'available' ? 'selected' : null ?>><?= ('Available'); ?></option>
                                <option value="unavailable" <?= $row['status'] == 'unavailable' ? 'selected' : null ?>><?= ('Unavailable'); ?></option>
                            </select>
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