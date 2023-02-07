<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?= $page_title; ?>
</h3>

<!-- <a href="javascript:;" onclick="showAjaxModal('<?= base_url('modal/popup/pengumuman_tambah'); ?>')" class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    Tambah Pengumuman
</a> -->
<br><br>
<table class="table table-bordered table-hover table-striped datatable" id="table_export">
    <thead>
        <tr>
            <th width="5%" class="text-center">#</th>
            <th width="20%" class="text-center">Judul</th>
            <th class="text-center">Isi Pengumuman</th>
            <th width="15%" class="text-center">Tanggal</th>
            <!-- <th width="7%" class="text-center">Aksi</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $pengumuman = $this->db->get('pengumuman')->result_array();
        foreach ($pengumuman as $row) :
        ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><?= $row['notice_title']; ?></td>
                <td><?= $row['notice']; ?></td>
                <td class="text-center"><?= date("d F Y", $row['create_timestamp']) ?></td>
                <!-- <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <li>
                                <a href="#" onclick="showAjaxModal('<? //= base_url('modal/popup/pengumuman_edit/' . $row['notice_id']); 
                                                                    ?>');">
                                    <i class="entypo-pencil"></i>
                                    Edit
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" onclick="confirm_modal('<? //= base_url('admin/pengumuman/delete/' . $row['notice_id']); 
                                                                    ?>');">
                                    <i class="entypo-trash"></i>
                                    Hapus
                                </a>
                            </li>
                        </ul>
                    </div>
                </td> -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var datatable = $("#table_export").dataTable();

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
</script>