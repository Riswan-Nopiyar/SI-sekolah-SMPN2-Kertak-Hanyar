<?php
$edit_data        =    $this->db->get_where('jadwal', array('class_routine_id' => $param2))->result_array();
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-pencil"></i>
                    Edit Jadwal Pelajaran
                </div>
            </div>
            <div class="panel-body">
                <?php foreach ($edit_data as $row) : ?>
                    <?php echo form_open(base_url('admin/jadwal/update/' . $row['class_routine_id']), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kelas</label>
                        <div class="col-sm-7">
                            <select name="class_id" class="form-control">
                                <?php
                                $classes = $this->db->get('kelas')->result_array();
                                foreach ($classes as $row2) :
                                ?>
                                    <option value="<?php echo $row2['class_id']; ?>" <?php if ($row['class_id'] == $row2['class_id']) echo 'selected'; ?>>
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
                                    <option value="<?php echo $row2['subject_id']; ?>" <?php if ($row['subject_id'] == $row2['subject_id']) echo 'selected'; ?>>
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
                                <option value="Senin" <?php if ($row['day'] == 'Senin') echo 'selected="selected"'; ?>>Senin</option>
                                <option value="Selasa" <?php if ($row['day'] == 'Selasa') echo 'selected="selected"'; ?>>Selasa</option>
                                <option value="Rabu" <?php if ($row['day'] == 'Rabu') echo 'selected="selected"'; ?>>Rabu</option>
                                <option value="Kamis" <?php if ($row['day'] == 'Kamis') echo 'selected="selected"'; ?>>Kamis</option>
                                <option value="Jumat" <?php if ($row['day'] == 'Jumat') echo 'selected="selected"'; ?>>Jumat</option>
                                <option value="Sabtu" <?php if ($row['day'] == 'Sabtu') echo 'selected="selected"'; ?>>Sabtu</option>
                                <option value="Minggu" <?php if ($row['day'] == 'Minggu') echo 'selected="selected"'; ?>>Minggu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jam</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="time" name="time_start" value="<?= $row['time_start'] ?>">
                        </div>
                        <label class="col-sm-1 control-label">s.d</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="time" name="time_end" value="<?= $row['time_end'] ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>