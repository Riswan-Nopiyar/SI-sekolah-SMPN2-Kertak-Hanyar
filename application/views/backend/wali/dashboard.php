<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?php echo $page_title . ' ' . ucwords($this->session->userdata('login_type')); ?>
</h3>

<div class="row">
    <div class="col-md-8">
        <div class="row">
            <!-- CALENDAR-->
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-primary " data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-calendar"></i>
                            Kalender Kegiatan
                        </div>
                    </div>
                    <div class="panel-body" style="padding:0px;">
                        <div class="calendar-env">
                            <div class="calendar-body">
                                <div id="notice_calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">

                <div class="tile-stats tile-red">
                    <div class="icon"><i class="fa fa-group"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('siswa'); ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>

                    <h3>Siswa</h3>
                    <p>Total Siswa</p>
                </div>

            </div>
            <div class="col-md-12">

                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('guru'); ?>" data-postfix="" data-duration="800" data-delay="0">0</div>

                    <h3>Guru</h3>
                    <p>Total Guru</p>
                </div>

            </div>
            <div class="col-md-12">

                <div class="tile-stats tile-aqua">
                    <div class="icon"><i class="entypo-user"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('wali'); ?>" data-postfix="" data-duration="500" data-delay="0">0</div>

                    <h3>Orang Tua/Wali Murid</h3>
                    <p>Total Orang Tua/Wali Murid</p>
                </div>

            </div>
            <div class="col-md-12">

                <div class="tile-stats tile-blue">
                    <div class="icon"><i class="entypo-chart-bar"></i></div>
                    <?php
                    $check    =    array('date' => date('Y-m-d'), 'status' => '1');
                    $query = $this->db->get_where('absen', $check);
                    $present_today        =    $query->num_rows();
                    ?>
                    <div class="num" data-start="0" data-end="<?php echo $present_today; ?>" data-postfix="" data-duration="500" data-delay="0">0</div>

                    <h3>Absensi Harian</h3>
                    <p>Jmlah Siswa Hadir Hari Ini</p>
                </div>

            </div>
        </div>
    </div>
</div>