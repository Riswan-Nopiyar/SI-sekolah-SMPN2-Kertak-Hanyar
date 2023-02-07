<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    Nilai Ujian
                </a>
            </li>
        </ul>
        <!----TABLE LISTING STARTS-->
        <div class="tab-pane  <? //php if (!isset($edit_data) && !isset($personal_profile) && !isset($academic_result)) echo 'active'; 
                                ?>" id="list">
            <center>
                <?= form_open(base_url('guru/ujian/nilai')); ?>
                <table border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover table-striped">
                    <tr>
                        <td>Jenis Ujian</td>
                        <td>Kelas</td>
                        <td>Mata Pelajaran</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <select name="exam_id" class="form-control" style="float:left;">
                                <option value="">Pilih Jenis Ujian...</option>
                                <?php
                                $exams = $this->db->get('ujian')->result_array();
                                foreach ($exams as $row) :
                                ?>
                                    <option value="<?= $row['exam_id']; ?>" <?= ($exam_id == $row['exam_id']) ? 'selected' : null; ?>><?= $row['name']; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="class_id" class="form-control" onchange="show_subjects(this.value)" style="float:left;">
                                <option value="">Pilih Kelas</option>
                                <?php
                                $classes = $this->db->get('kelas')->result_array();
                                foreach ($classes as $row) :
                                ?>
                                    <option value="<?= $row['class_id']; ?>" <?= ($class_id == $row['class_id']) ? 'selected' : null; ?>>
                                        Kelas <?= $row['name']; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </td>
                        <td>
                            <?php
                            $classes    =    $this->db->get('kelas')->result_array();
                            foreach ($classes as $row) : ?>
                                <select name="<?= ($class_id == $row['class_id']) ? 'subject_id' : 'temp'; ?>" id="subject_id_<?php echo $row['class_id']; ?>" style="display:<?= ($class_id == $row['class_id']) ? 'block' : 'none'; ?>;" class="form-control" style="float:left;">
                                    <option value="">Mata Pelajaran Kelas <?= $row['name']; ?></option>
                                    <?php
                                    $subjects    =  $this->db->query("select * from pelajaran where class_id='" . $row['class_id'] . "'")->result_array();  // $this->crud_model->get_subjects_by_class($row['class_id']);
                                    foreach ($subjects as $row2) : ?>
                                        <option value="<?= $row2['subject_id']; ?>" <?php if (isset($subject_id) && $subject_id == $row2['subject_id'])
                                                                                        echo 'selected="selected"'; ?>><?= $row2['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            <?php endforeach; ?>
                            <select name="temp" id="subject_id_0" style="display:<?php if (isset($subject_id) && $subject_id > 0) echo 'none';
                                                                                    else echo 'block'; ?>;" class="form-control" style="float:left;">
                                <option value="">Pilih Mata Pelajaran...</option>
                            </select>
                        </td>
                        <td>
                            <input type="hidden" name="jenis" value="tampilkan" />
                            <input type="submit" value="Kelola Nilai" class="btn btn-info" />
                        </td>
                    </tr>
                </table>
                </form>
            </center>
            <br /><br />
            <?php if ($exam_id > 0 && $class_id > 0 && $subject_id > 0) : ?>
                <?php
                /* INSERT DATA DI TABEL NILAI KHUSUS UNTUK YANG BELUM ADA NILAINYA */
                $students    =    $this->db->get_where('siswa', array('class_id' => $class_id))->result_array();
                foreach ($students as $row) :
                    $verify_data    =    array(
                        'exam_id'    => $exam_id,
                        'class_id'   => $class_id,
                        'subject_id' => $subject_id,
                        'student_id' => $row['student_id']
                    );

                    $query = $this->db->get_where('nilai_ujian', $verify_data);
                    if ($query->num_rows() < 1)
                        $this->db->insert('nilai_ujian', $verify_data);
                endforeach;
                ?>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>Nilai Ujian (10 s.d 100)</td>
                            <td>Keterangan/Komentar</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $students    =    $this->db->get_where('siswa', array('class_id' => $class_id))->result_array();
                        foreach ($students as $row) :
                            $verify_data    =    array(
                                'exam_id'    => $exam_id,
                                'class_id'   => $class_id,
                                'subject_id' => $subject_id,
                                'student_id' => $row['student_id']
                            );

                            $query    = $this->db->get_where('nilai_ujian', $verify_data);
                            $marks    =    $query->result_array();
                            foreach ($marks as $row2) :
                        ?>
                                <?= form_open(base_url('guru/ujian/nilai')) ?>
                                <tr>
                                    <td><?= $row['name']; ?></td>
                                    <td><input type="number" max="100" min="10" value="<?= $row2['mark_obtained']; ?>" name="mark_obtained" class="form-control" /></td>
                                    <td><textarea name="comment" class="form-control"><?= $row2['comment']; ?></textarea></td>
                                    <td>
                                        <input type="hidden" name="mark_id" value="<?= $row2['mark_id']; ?>" />
                                        <input type="hidden" name="exam_id" value="<?= $exam_id; ?>" />
                                        <input type="hidden" name="class_id" value="<?= $class_id; ?>" />
                                        <input type="hidden" name="subject_id" value="<?= $subject_id; ?>" />
                                        <input type="hidden" name="jenis" value="update" />
                                        <button type="submit" class="btn btn-primary"> Update</button>
                                    </td>
                                </tr>
                                </form>
                        <?php
                            endforeach;
                        endforeach;
                        ?>
                    </tbody>
                </table>

            <?php endif; ?>
        </div>
        <!----TABLE LISTING ENDS-->

    </div>
</div>
</div>

<script type="text/javascript">
    function show_subjects(class_id) {
        console.log(class_id);
        for (i = 0; i <= 100; i++) {

            try {
                document.getElementById('subject_id_' + i).style.display = 'none';
                document.getElementById('subject_id_' + i).setAttribute("name", "temp");
            } catch (err) {}
        }
        document.getElementById('subject_id_' + class_id).style.display = 'block';
        document.getElementById('subject_id_' + class_id).setAttribute("name", "subject_id");
    }
</script>