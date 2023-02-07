<?php
$page_title         = $judulHalaman;
?>
<h3>
    <i class="entypo-right-circled"></i>
    <?= $page_title; ?>
</h3>

<hr />

<a href="javascript:;" onclick="showAjaxModal('<?= base_url('modal/popup/beban_kategori_tambah'); ?>');" class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    Tambah Kategori Baru
</a>
<br><br>
<table class="table table-bordered table-hover table-striped datatable" id="table_export">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Nama</th>
            <th width="7%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $expenses = $this->db->get('kategori_beban')->result_array();
        foreach ($expenses as $row) :
        ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><?= $row['name']; ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <li>
                                <a href="#" onclick="showAjaxModal('<?= base_url('modal/popup/beban_kategori_edit/' . $row['expense_category_id']); ?>');">
                                    <i class="entypo-pencil"></i>
                                    Edit
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" onclick="confirm_modal('<?= base_url('admin/akuntansi/delete_kategori/' . $row['expense_category_id']); ?>');">
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
                        datatable.fnSetColumnVis(2, false);

                        this.fnPrint(true, oConfig);

                        window.print();

                        $(window).keyup(function(e) {
                            if (e.which == 27) {
                                datatable.fnSetColumnVis(2, true);
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