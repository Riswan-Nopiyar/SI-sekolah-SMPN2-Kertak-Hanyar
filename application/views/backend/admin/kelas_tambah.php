<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Tambah Data Kelas
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open(base_url('admin/kelas/save/'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Kelas</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Kelas Wajib Diisi" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Wali Kelas</label>
                    <div class="col-sm-5">
                        <select name="teacher_id" class="form-control" style="width:100%;">
                            <?php
                            $teachers = $this->db->get('guru')->result_array();
                            foreach ($teachers as $row) :
                            ?>
                                <option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                            endforeach;
                            ?>
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