<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?= $page_title; ?>
</h3>

<hr />
<a href="javascript:;" onclick="showAjaxModal('<?= base_url('modal/popup/kategori_tambah'); ?>');" class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    Tambah Kategori
</a>
<br>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#home" data-toggle="tab">
                    <span class="hidden-xs"><i class="entypo-menu"></i> Kategori Penilaian</span>
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
                                <div>Grade</div>
                            </th>
                            <th class="text-center" class="span3">
                                <div>Poin</div>
                            </th>
                            <th class="text-center" class="span3">
                                <div>Nilai</div>
                            </th>
                            <th class="text-center" class="span3">
                                <div>Keterangan</div>
                            </th>
                            <th class="text-center" width="7%">
                                <div>Aksi</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $kategori   = $this->db->get('kategori_nilai')->result_array();
                        $i          = 1;
                        foreach ($kategori as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['grade_point'] ?></td>
                                <td><?= $row['mark_from'] ?> - <?= $row['mark_upto'] ?></td>
                                <td><?= $row['comment']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                            <li>
                                                <a href="#" onclick="showAjaxModal('<?= base_url('modal/popup/kategori_edit/' . $row['grade_id']); ?>');">
                                                    <i class="entypo-pencil"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#" onclick="confirm_modal('<?= base_url('admin/ujian/delete/kategori/' . $row['grade_id']); ?>');">
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


        var datatable = $("#table_export").dataTable();

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
</script>