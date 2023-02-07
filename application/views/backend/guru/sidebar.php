<?php
$page_name          = $halaman;
$account_type       = $level;

foreach ($setting as $dataSetting) {
    $system_name    = $dataSetting->system_name;
    $text_align     = $dataSetting->text_align;
}
?>

<div></div>
<ul id="main-menu" class="">
    <!-- DASHBOARD -->
    <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/dashboard'); ?>">
            <i class="entypo-gauge"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Siswa -->
    <li class="<?php
                if (
                    $page_name == 'siswa_tambah' ||
                    $page_name == 'informasi_siswa' ||
                    $page_name == 'rapor_siswa'
                )
                    echo 'opened active has-sub';
                ?> ">
        <a href="#">
            <i class="fa fa-group"></i>
            <span>&nbsp;Siswa</span>
        </a>
        <ul>
            <!-- Tambah Siswa -->
            <li class="<?php if ($page_name == 'siswa_tambah') echo 'active'; ?> ">
                <a href="<?= base_url($this->session->userdata('login_type') . '/siswa/tambah'); ?>">
                    <span><i class=" entypo-dot"></i> Tambah Siswa</span>
                </a>
            </li>

            <!-- Informasi Siswa -->
            <li class="<?php if ($page_name == 'informasi_siswa') echo 'opened active'; ?> ">
                <a href="#">
                    <span><i class="entypo-dot"></i> Daftar Nama Siswa</span>
                </a>
                <ul>
                    <?php
                    $classes = $this->db->get('kelas')->result_array();
                    foreach ($classes as $row) :
                    ?>
                        <li class="<?php if ($page_name == 'informasi_siswa' && $class_id == $row['class_id']) echo 'active'; ?>">
                            <a href="<?= base_url($this->session->userdata('login_type') . '/siswa/informasi/' . $row['class_id']); ?>">
                                <span><i class="entypo-dot"></i> Kelas <?= $row['name']; ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <!-- Nilai Siswa -->
            <li class="<?php if ($page_name == 'rapor_siswa') echo 'opened active'; ?> ">
                <a href="#">
                    <span><i class="entypo-dot"></i> Nilai Rapor Siswa</span>
                </a>
                <ul>
                    <?php
                    $classes = $this->db->get('kelas')->result_array();
                    foreach ($classes as $row) :
                    ?>
                        <li class="<?php if ($page_name == 'student_marksheet' && $class_id == $row['class_id']) echo 'active'; ?>">
                            <a href="<?= base_url($this->session->userdata('login_type') . '/siswa/nilai/' . $row['class_id']); ?>">
                                <span><i class="entypo-dot"></i> Kelas <?= $row['name']; ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    </li>

    <!-- GURU -->
    <li class="<?php if ($page_name == 'guru') echo 'active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/guru'); ?>">
            <i class="entypo-users"></i>
            <span>Guru</span>
        </a>
    </li>

    <!-- PELAJARAN -->
    <li class="<?php if ($page_name == 'pelajaran') echo 'opened active'; ?> ">
        <a href="#">
            <i class="entypo-docs"></i>
            <span>Mata Pelajaran</span>
        </a>
        <ul>
            <?php
            $classes = $this->db->get('kelas')->result_array();
            foreach ($classes as $row) :
            ?>
                <li class="<?php if ($page_name == 'pelajaran') echo 'active'; ?>">
                    <a href="<?= base_url($this->session->userdata('login_type') . '/pelajaran/kelas/' . $row['class_id']); ?>">
                        <span>Kelas <?= $row['name']; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </li>

    <!-- JADWAL PELAJARAN -->
    <li class="<?php if ($page_name == 'jadwal') echo 'active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/jadwal'); ?>">
            <i class="entypo-calendar"></i>
            <span>Jadwal Pelajaran</span>
        </a>
    </li>

    <!-- BAHAN PELAJARAN -->
    <li class="<?php if ($page_name == 'bahan_pelajaran') echo 'active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/pelajaran/bahan'); ?>">
            <i class="entypo-book-open"></i>
            <span>Bahan Pelajaran</span>
        </a>
    </li>

    <!-- DAILY ATTENDANCE -->
    <li class="<?php if ($page_name == 'absen') echo 'active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/siswa/absen'); ?>">
            <i class="entypo-chart-area"></i>
            <span>Absensi Harian</span>
        </a>
    </li>

    <!-- UJIAN -->
    <li class="<?php
                if (
                    $page_name == 'ujian' ||
                    $page_name == 'kategori' ||
                    $page_name == 'nilai_ujian'
                )
                    echo 'opened active';
                ?> ">
        <a href="#">
            <i class="entypo-graduation-cap"></i>
            <span>Ujian Sekolah</span>
        </a>
        <ul>
            <li class="<?php if ($page_name == 'nilai_ujian') echo 'active'; ?> ">
                <a href="<?= base_url($this->session->userdata('login_type') . '/ujian/nilai'); ?>">
                    <span><i class="entypo-dot"></i> Nilai Ujian</span>
                </a>
            </li>
        </ul>
    </li>

    <!-- PERPUSTAKAAN -->
    <li class="<?php if ($page_name == 'library') echo 'active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/perpustakaan'); ?>">
            <i class="entypo-book"></i>
            <span>Perpustakaan</span>
        </a>
    </li>

    <!-- TRANSPORT -->
    <!-- <li class="<? //php if ($page_name == 'transport') echo 'active'; 
                    ?> ">
        <a href="<? //= base_url(); 
                    ?>index.php?<? //= $account_type; 
                                ?>/transport">
            <i class="entypo-location"></i>
            <span><? //= ('Transport'); 
                    ?></span>
        </a>
    </li> -->

    <!-- NOTICEBOARD -->
    <li class="<?php if ($page_name == 'noticeboard') echo 'active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/pengumuman'); ?>">
            <i class=" entypo-doc-text-inv"></i>
            <span>Pengumuman</span>
        </a>
    </li>

    <!-- MESSAGE -->
    <!-- <li class="<? //php if ($page_name == 'message') echo 'active'; 
                    ?> ">
        <a href="<? //= base_url(); 
                    ?>index.php?<?= $account_type; ?>/message">
            <i class="entypo-mail"></i>
            <span><? //= ('Message'); 
                    ?></span>
        </a>
    </li> -->

    <!-- ACCOUNT -->
    <li class="<?php if ($page_name == 'akun') echo 'active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/akun'); ?>">
            <i class="entypo-lock"></i>
            <span>Akun</span>
        </a>
    </li>

</ul>

</div>
<!-- END OF SIDEBAR -->
<div class="main-content">
    <div class="row">
        <div class="col-md-12 col-sm-12 clearfix" style="text-align:center;">
            <h2 style="font-weight:200; margin:0px;"><?= $system_name; ?></h2>
        </div>
        <div class="col-md-12 col-sm-12 clearfix ">
            <ul class="list-inline links-list pull-left">
                <li class="dropdown language-selector">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                        <i class="entypo-user"></i> <?= $this->session->userdata('name'); ?>
                    </a>
                    <ul class="dropdown-menu <?php if ($text_align == 'right-to-left') echo 'pull-right';
                                                else echo 'pull-left'; ?>">
                        <li>
                            <a href="<?= base_url($this->session->userdata('login_type') . '/akun'); ?>">
                                <i class="entypo-info"></i>
                                <span>Edit Profiles</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="list-inline links-list pull-right">
                <li>
                <button type="button" class="btn btn-danger">
                    <a href="<?= base_url('login/logout'); ?>">
                        Logout <i class="entypo-logout right"></i>
                    </a>
                </button>
                </li>
            </ul>
        </div>
    </div>
    <hr style="margin-top:0px;" />
    <!-- END OF HEADER -->