<hr />
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th width="10%">Tanggal</th>
            <th>Kelas</th>
            <th width='10%' class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <form method="post" action="<?= base_url('guru/siswa/absen/kelola'); ?>" class="form">
            <tr class="gradeA">
                <td>
                    <input type="text" name="date" class="form-control datepicker" value="<?= $hari == '' ? date("d/m/Y") : $hari ?>">
                </td>
                <td>
                    <select name="class_id" class="form-control">
                        <option value="">Pilih Kelas...</option>
                        <?php
                        $classes    =    $this->db->get('kelas')->result_array();
                        foreach ($classes as $row) : ?>
                            <option value="<?= $row['class_id']; ?>" <?php if (isset($class_id) && $class_id == $row['class_id']) echo 'selected="selected"'; ?>>
                                <?= $row['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td align="center"><input type="submit" value="Kelola" class="btn btn-info" /></td>
            </tr>
        </form>
    </tbody>
</table>
<hr />
<?php if ($hari != '') : ?>
    <center>
        <div class="row">
            <div class="col-sm-offset-4 col-sm-4">
                <div class="tile-stats tile-white-gray">
                    <div class="icon"><i class="entypo-suitcase"></i></div>
                    <?php
                    $full_date  = date("Y-m-d", strtotime($hari));   //$year . '-' . $month . '-' . $date;
                    $timestamp  = strtotime($full_date);
                    $day        = strtolower(date('l', $timestamp));
                    ?>
                    <h2><?= ucwords($day); ?></h2>
                    <h3>Dafta Hadir Kelas <?= $this->myModel->get_nama('kelas', array('class_id' => $class_id)); ?></h3>
                    <p><?= date("d F Y", strtotime($hari)); //$date . '-' . $month . '-' . $year; 
                        ?></p>
                </div>
                <a href="#" id="update_attendance_button" onclick="return update_attendance()" class="btn btn-info">
                    Update Absen
                </a>
            </div>

        </div>
    </center>
    <hr />
    <div class="row" id="attendance_list">
        <div class="col-sm-offset-3 col-md-6">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Nama</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $students   =   $this->db->get_where('siswa', array('class_id' => $class_id))->result_array();
                    $i          = 1;
                    foreach ($students as $row) : ?>
                        <tr class="gradeA">
                            <td><?= $i++; ?></td>
                            <td><?= $row['name']; ?></td>
                            <?php
                            //inserting blank data for students attendance if unavailable
                            $verify_data    =   array(
                                'student_id' => $row['student_id'],
                                'date' => $full_date
                            );
                            $query = $this->db->get_where('absen', $verify_data);
                            if ($query->num_rows() < 1)
                                $this->db->insert('absen', $verify_data);

                            //showing the attendance status editing option
                            $attendance = $this->db->get_where('absen', $verify_data)->row();
                            $status     = $attendance->status;
                            ?>
                            <?php if ($status == 1) : ?>
                                <td align="center">
                                    <span class="badge badge-success"><?= ('Present'); ?></span>
                                </td>
                            <?php endif; ?>
                            <?php if ($status == 2) : ?>
                                <td align="center">
                                    <span class="badge badge-danger"><?= ('Absent'); ?></span>
                                </td>
                            <?php endif; ?>
                            <?php if ($status == 0) : ?>
                                <td></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" id="update_attendance">
        <!-- STUDENT's attendance submission form here -->
        <form method="post" action="<?= base_url('guru/siswa/absen/update'); ?>">
            <div class="col-sm-offset-3 col-md-6">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr class="gradeA">
                            <th>#</th>
                            <th>Nama</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //STUDENTS ATTENDANCE
                        $students    =    $this->db->get_where('siswa', array('class_id' => $class_id))->result_array();
                        $i           = 1;
                        foreach ($students as $row) {
                        ?>
                            <tr class="gradeA">
                                <td><?= $i++ ?></td>
                                <td><?= $row['name']; ?></td>
                                <td align="center">
                                    <?php
                                    //inserting blank data for students attendance if unavailable
                                    $verify_data    =    array(
                                        'student_id' => $row['student_id'],
                                        'date' => $full_date
                                    );
                                    $query = $this->db->get_where('absen', $verify_data);
                                    if ($query->num_rows() < 1)
                                        $this->db->insert('absen', $verify_data);
                                    //showing the attendance status editing option
                                    $attendance = $this->db->get_where('absen', $verify_data)->row();
                                    $status        = $attendance->status;
                                    ?>
                                    <select name="status_<?= $row['student_id']; ?>" class="form-control" style="width:100px; float:left;">
                                        <option value="0" <?php if ($status == 0) echo 'selected="selected"'; ?>></option>
                                        <option value="1" <?php if ($status == 1) echo 'selected="selected"'; ?>>Present</option>
                                        <option value="2" <?php if ($status == 2) echo 'selected="selected"'; ?>>Absent</option>
                                    </select>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <input type="hidden" name="class_id" value="<?= $class_id ?>">
                <input type="hidden" name="date" value="<?= $full_date; ?>" />
                <center>
                    <input type="submit" class="btn btn-info" value="save changes">
                </center>
            </div>
        </form>
    </div>
<?php endif; ?>

<script type="text/javascript">
    $("#update_attendance").hide();

    function update_attendance() {

        $("#attendance_list").hide();
        $("#update_attendance_button").hide();
        $("#update_attendance").show();

    }
</script>