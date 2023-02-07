<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?php echo $page_title; ?>
</h3>

<div class="row">
    <div class="col-md-12">

        <div class="row">

            <div class="card-body">
                <div class="h-100">
                    <img src="<?= base_url('assets/images/bg-dashboard.png') ?>" height="60" alt="SMP" style="width: 100%; height:100%; border-radius:8px" />
                </div>         
            </div>
            <!--  <div class="col-md-4">
                <div class="tile-stats tile-cyan">
                    <div class="icon"><i class="entypo-credit-card"></i></div>
                    <div class="num" data-start="0" data-end="<?php $query = $this->db->query('SELECT SUM(amount_paid)as total FROM spp WHERE status = "paid"')->row();
                                                                echo floatval($query->total); ?>" data-postfix="" data-duration="500" data-delay="0">0</div>
                    <h3>Jumlah Penerimaan</h3>
                </div>
            </div> -->
            <div class="col-md-4">
                <div class="tile-stats tile-blue">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('guru'); ?>" data-postfix="" data-duration="800" data-delay="0">0</div>
                    <h3>Guru</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tile-stats tile-aqua">
                    <div class="icon"><i class="entypo-flow-tree"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('kelas'); ?>" data-postfix="" data-duration="500" data-delay="0">0</div>
                    <h3>Jumlah Kelas</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tile-stats tile-red">
                    <div class="icon"><i class="entypo-graduation-cap"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('siswa'); ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
                    <h3>Siswa</h3>
                </div>
            </div>

            <!-- <div class="col-md-4">
                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-calendar"></i></div>
                    <?php
                    $check    =    array('date' => date('Y-m-d'), 'status' => '1');
                    $query = $this->db->get_where('absen', $check);
                    $present_today        =    $query->num_rows();
                    ?>
                    <div class="num" data-start="0" data-end="<?php echo $present_today; ?>" data-postfix="" data-duration="500" data-delay="0">0</div>
                    <h3>Kehadiran Hari Ini</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tile-stats tile-purple">
                    <div class="icon"><i class="entypo-user"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('wali'); ?>" data-postfix="" data-duration="500" data-delay="0">0</div>
                    <h3>Orang Tua/Wali Murid</h3>
                </div>
            </div> -->


            <!-- <div class="col-md-4">
                <div class="tile-stats tile-brown">
                    <div class="icon"><i class="entypo-user"></i></div>
                    <div class="num" data-start="0" data-end="<?php $query = $this->db->query('SELECT * FROM spp WHERE status = "unpaid"');
                                                                echo $query->num_rows(); ?>" data-postfix="" data-duration="500" data-delay="0">0</div>
                    <h3><?php echo ('Unpaid Fees'); ?></h3>
                </div>
            </div> -->
            <!-- <div class="col-md-4">
                <div class="tile-stats tile-pink">
                    <div class="icon"><i class="entypo-comment"></i></div>
                    <div class="num" data-start="0" data-end="<?php $query = $this->db->query('SELECT * FROM message WHERE sender = "admin-1" && read_status="0"');
                                                                echo $query->num_rows(); ?>" data-postfix="" data-duration="500" data-delay="0">0</div>

                    <h3>Pesan Masuk</h3>
                </div>

            </div> -->
            <!--  <div class="col-md-4">
                <div class="tile-stats tile-aqua">
                    <div class="icon"><i class="entypo-alert"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('pengumuman'); ?>" data-postfix="" data-duration="500" data-delay="0">0</div>
                    <h3>Pemberitahuan</h3>
                </div>
            </div> -->

        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
            <!-- CALENDAR-->
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-primary " data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-calendar"></i>
                            Kalender Kegiatan dan Hari Libur
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

</div>