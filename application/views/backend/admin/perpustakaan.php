<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?= $page_title; ?>
</h3>

<a href="javascript:;" onclick="showAjaxModal('<?= base_url('modal/popup/buku_tambah'); ?>')" class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    Tambah Buku
</a>
<br><br>
<table class="table table-bordered table-hover table-striped datatable" id="table_export">
    <thead>
        <tr>
            <th width="5%" class="text-center">#</th>
            <th class="text-center">Judul</th>
            <th class="text-center">Pengarang/Pengerbit</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Kelas</th>
            <th witdh="5%" class="text-center">Status</th>
            <th width="7%" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $buku = $this->db->get('buku')->result_array();
        foreach ($buku as $row) :
        ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['author']; ?></td>
                <td><?= $row['description']; ?></td>
                <td class="text-right"><?= number_format($row['price'], 0, ',', '.'); ?></td>
                <td class="text-center"><?= $this->myModel->get_nama('kelas', array('class_id' => $row['class_id'])); ?></td>
                <!-- $this->myModel->get_nama('kelas', array('class_id' => $param)) -->
                <td class="text-center"><span class="label label-<?php if ($row['status'] == 'available') echo 'success';
                                                                    else echo 'secondary'; ?>"><?php echo $row['status']; ?></span></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <li>
                                <a href="#" onclick="showAjaxModal('<?= base_url('modal/popup/buku_edit/' . $row['book_id']); ?>');">
                                    <i class="entypo-pencil"></i>
                                    Edit
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" onclick="confirm_modal('<?= base_url('admin/perpustakaan/delete/' . $row['book_id']); ?>');">
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
<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [{
                    "sExtends": "print",
                    "fnSetText": "Press 'esc' to return",
                    "fnClick": function(nButton, oConfig) {
                        datatable.fnSetColumnVis(0, false);
                        datatable.fnSetColumnVis(6, false);

                        this.fnPrint(true, oConfig);

                        window.print();

                        $(window).keyup(function(e) {
                            if (e.which == 27) {
                                datatable.fnSetColumnVis(0, true);
                                datatable.fnSetColumnVis(6, true);
                            }
                        });
                    },
                }, ]
            },
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
</script>