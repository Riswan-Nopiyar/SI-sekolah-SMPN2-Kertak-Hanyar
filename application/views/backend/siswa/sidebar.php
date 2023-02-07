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

    <!-- GURU -->
    <li class="<?php if ($page_name == 'guru') echo 'active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/guru'); ?>">
            <i class="entypo-users"></i>
            <span>Guru</span>
        </a>
    </li>

    <!-- PELAJARAN -->
    <li class="<?php if ($page_name == 'pelajaran') echo 'opened active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/pelajaran/kelas/' . $this->db->get_where('siswa', array('student_id' => $this->session->userdata('student_id')))->row()->class_id); ?>">
            <i class="entypo-docs"></i>
            <span>Mata Pelajaran</span>
        </a>
    </li>

    <!-- JADWAL PELAJARAN -->
    <li class="<?php if ($page_name == 'jadwal') echo 'active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/jadwal'); ?>">
            <i class="entypo-calendar"></i>
            <span>&nbsp;Jadwal Pelajaran</span>
        </a>
    </li>

    <!-- BAHAN PELAJARAN -->
    <li class="<?php if ($page_name == 'bahan_pelajaran') echo 'active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/pelajaran/bahan'); ?>">
            <i class="entypo-book-open"></i>
            <span>Bahan Pelajaran</span>
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
        <a href="<?= base_url($this->session->userdata('login_type') . '/ujian/nilai'); ?>">
            <i class="entypo-graduation-cap"></i>
            <span>Nilai Ujian</span>
        </a>
    </li>

    <!-- PEMBAYARAn SPP -->
    <li class="<?php if ($page_name == 'invoice') echo 'active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/spp'); ?>">
            <i class="entypo-credit-card"></i>
            <span>Pembayaran SPP</span>
        </a>
    </li>

    <!-- PERPUSTAKAAN -->
    <li class="<?php if ($page_name == 'library') echo 'active'; ?> ">
        <a href="<?= base_url($this->session->userdata('login_type') . '/perpustakaan'); ?>">
            <i class="entypo-book"></i>
            <span>Perpustakaan</span>
        </a>
    </li>

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