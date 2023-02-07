<?php
$student_info    =    $this->db->get_where('siswa', array('student_id' => $param2))->result_array();
foreach ($student_info as $row) : ?>

    <div class="profile-env">
        <header class="row">
            <div class="col-sm-3">
                <a href="#" class="profile-picture">
                    <img src="<?php echo $this->myModel->get_image_url('student', $row['student_id']); ?>" class="img-responsive img-circle" />
                </a>
            </div>
            <div class="col-sm-9">

                <ul class="profile-info-sections">
                    <li style="padding:0px; margin:0px;">
                        <div class="profile-name">
                            <h3><?php echo $row['name']; ?></h3>
                        </div>
                    </li>
                </ul>
            </div>
        </header>

        <section class="profile-info-tabs">
            <div class="row">
                <div class="">
                    <br>
                    <table class="table table-bordered table-hover table-striped">
                        <?php if ($row['class_id'] != '') : ?>
                            <tr>
                                <td>Kelas</td>
                                <td><b><?= $this->myModel->get_nama('kelas', array('class_id' => $row['class_id'])); ?></b></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($row['birthday'] != '') : ?>
                            <tr>
                                <td>Tempat, Tanggal Lahir</td>
                                <td><b><?= $row['place'] . ', '; ?><?= date('d F Y', strtotime($row['birthday'])); ?></b></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($row['sex'] != '') : ?>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td><b><?= $row['sex']; ?></b></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($row['phone'] != '') : ?>
                            <tr>
                                <td>No. Telephone</td>
                                <td><b><?= $row['phone']; ?></b></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($row['email'] != '') : ?>
                            <tr>
                                <td>Email</td>
                                <td><b><?= $row['email']; ?></b></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($row['address'] != '') : ?>
                            <tr>
                                <td>Alamat</td>
                                <td><b><?= $row['address']; ?></b>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($row['parent_id'] != '') : ?>
                            <tr>
                                <td>Orang Tua/Wali Murid</td>
                                <td><b><?= $this->db->get_where('wali', array('parent_id' => $row['parent_id']))->row()->name; ?></b></td>
                            </tr>
                            <tr>
                                <td>No. Telephone Orang Tua</td>
                                <td><b><?= $this->db->get_where('wali', array('parent_id' => $row['parent_id']))->row()->phone; ?></b></td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </section>
    </div>
<?php endforeach; ?>