<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Tambah Jadwal Pelajaran
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open(base_url('admin/jadwal/save/'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Kelas</label>
                    <div class="col-sm-7">
                        <select name="class_id" class="form-control">
                            <?php
                            $classes = $this->db->get('kelas')->result_array();
                            foreach ($classes as $row2) :
                            ?>
                                <option value="<?php echo $row2['class_id']; ?>">
                                    <?php echo $row2['name']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Mata Pelajaran</label>
                    <div class="col-sm-7">
                        <select name="subject_id" class="form-control">
                            <?php
                            $subjects = $this->db->get('pelajaran')->result_array();
                            foreach ($subjects as $row2) :
                            ?>
                                <option value="<?php echo $row2['subject_id']; ?>">
                                    <?php echo $row2['name']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Hari</label>
                    <div class="col-sm-7">
                        <select name="day" class="form-control">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Jam</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="time" name="time_start">
                    </div>
                    <label class="col-sm-1 control-label">s.d</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="time" name="time_end">
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