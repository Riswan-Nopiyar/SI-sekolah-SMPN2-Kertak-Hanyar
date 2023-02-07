<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Tambah Buku Pelajaran
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open(base_url('admin/perpustakaan/save/'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Judul Buku</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Pengarang/Penerbit</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="author" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Keterangan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="description" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Harga</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="price" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Kelas</label>
                    <div class="col-sm-9">
                        <select name="class_id" class="form-control" style="width:100%;">
                            <?php
                            $classes = $this->db->get('kelas')->result_array();
                            foreach ($classes as $row) :
                            ?>
                                <option value="<?php echo $row['class_id']; ?>"><?php echo $row['name']; ?></option>
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
                            <option value="available"><?php echo ('Available'); ?></option>
                            <option value="unavailable"><?php echo ('Unavailable'); ?></option>
                        </select>
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