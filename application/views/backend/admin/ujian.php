<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?= $page_title; ?>
</h3>

<hr />
<a href="javascript:;" onclick="showAjaxModal('<?= base_url('modal/popup/ujian_tambah'); ?>');" class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    Tambah Jenis Ujian
</a>
<br>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#home" data-toggle="tab">
                    <span class="hidden-xs"><i class="entypo-menu"></i> Jenis Ujian</span>
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
                            <th class="text-center">
                                <div>Jenis Ujian</div>
                            </th>
                            <th class="text-center" class="span3">
                                <div>Tangal Ujian</div>
                            </th>
                            <th class="text-center" width="7%">
                                <div>Aksi</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ujian   =   $this->db->get('ujian')->result_array();
                        $i          = 1;
                        foreach ($ujian as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= strlen($row['date']) <= 0 ? 'Tanggal Ditentukan Oleh Guru Pengampu' : date("d F Y", strtotime($row['date'])); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                            <li>
                                                <a href="#" onclick="showAjaxModal('<?= base_url('modal/popup/ujian_edit/' . $row['exam_id']); ?>');">
                                                    <i class="entypo-pencil"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#" onclick="confirm_modal('<?= base_url('admin/ujian/delete/ujian/' . $row['exam_id']); ?>');">
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