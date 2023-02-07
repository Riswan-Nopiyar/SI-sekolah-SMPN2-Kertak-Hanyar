<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?= $page_title; ?>
</h3>

<hr />
<a href="javascript:;" onclick="showAjaxModal('<?= base_url('modal/popup/siswa_tambah'); ?>');" class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    Tambah Siswa Baru
</a>
<br>

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
                            <th class="text-center" class="span3">
                                <div>Alamat</div>
                            </th>
                            <th class="text-center">
                                <div>Email</div>
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
                                <td><?= $row['address']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                            <li>
                                                <a href="#" onclick="showAjaxModal('<?= base_url('modal/popup/siswa_profil/' . $row['student_id']); ?>');">
                                                    <i class="entypo-user"></i>
                                                    Profil
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="showAjaxModal('<?= base_url('modal/popup/siswa_edit/' . $row['student_id']); ?>');">
                                                    <i class="entypo-pencil"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#" onclick="confirm_modal('<?= base_url('admin/siswa/delete/' . $class_id . '/' . $row['student_id']); ?>');">
                                                    <i class="entypo-trash"></i>
                                                    Hapus
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

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


        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [

                    {
                        "sExtends": "xls",
                        "mColumns": [0, 2, 3, 4]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [0, 2, 3, 4]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText": "Press 'esc' to return",
                        "fnClick": function(nButton, oConfig) {
                            datatable.fnSetColumnVis(1, false);
                            datatable.fnSetColumnVis(5, false);

                            this.fnPrint(true, oConfig);

                            window.print();

                            $(window).keyup(function(e) {
                                if (e.which == 27) {
                                    datatable.fnSetColumnVis(1, true);
                                    datatable.fnSetColumnVis(5, true);
                                }
                            });
                        },

                    },
                ]
            },

        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
</script>