<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?= $page_title; ?>
</h3>

<hr />
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#home" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-users"></i></span>
                    <span class="hidden-xs"><i class="entypo-menu"></i> Daftar Siswa</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <table class="table table-bordered datatable table-hover table-striped" id="table_export">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">
                                <div>#</div>
                            </th>
                            <th class="text-center" width="80">
                                <div>Photo</div>
                            </th>
                            <th class="text-center">
                                <div>Nama</div>
                            </th>
                            <th class="text-center" width="7%">
                                <div>Aksi</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $students   =   $this->db->get_where('siswa', array('class_id' => $class_id))->result_array();
                        $i          = 1;
                        foreach ($students as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><img src="<?= $this->myModel->get_image_url('student', $row['student_id']); ?>" class="img-circle" width="30" /></td>
                                <td><?= $row['name']; ?></td>
                                <td>
                                    <a href="#" onclick="showAjaxModal('<?= base_url('modal/popup/rapor_siswa/' . $row['student_id']); ?>');" class="btn btn-default">
                                        <i class="entypo-chart-bar"></i>
                                        Tampilkan Nilai
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var datatable = $("#table_export").dataTable();

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
</script>