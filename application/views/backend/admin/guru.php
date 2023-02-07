<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?php echo $page_title; ?>
</h3>

<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url('modal/popup/guru_tambah'); ?>');" class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    Tambah Guru Baru
</a>
<br><br>
<table class="table table-bordered table-hover datatable" id="table_export">
    <thead>
        <tr>
            <th class="text-center" width="7%">Photo</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Email</th>
            <th class="text-center" width="7%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $teachers    =    $this->db->get('guru')->result_array();
        foreach ($teachers as $row) : ?>
            <tr>
                <td><img src="<?= $this->myModel->get_image_url('guru', $row['teacher_id']);
                                ?>" class="img-circle" width="30" /></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>

                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                            <!-- teacher EDITING LINK -->
                            <li>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url('modal/popup/guru_edit/' . $row['teacher_id']); ?>');">
                                    <i class="entypo-pencil"></i>
                                    Edit
                                </a>
                            </li>
                            <li class="divider"></li>

                            <!-- teacher DELETION LINK -->
                            <li>
                                <a href="#" onclick="confirm_modal('<?php echo base_url('admin/guru/delete/' . $row['teacher_id']); ?>');">
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
                        "sExtends": "xls",
                        "mColumns": [1, 2]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [1, 2]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText": "Press 'esc' to return",
                        "fnClick": function(nButton, oConfig) {
                            datatable.fnSetColumnVis(0, false);
                            datatable.fnSetColumnVis(3, false);

                            this.fnPrint(true, oConfig);

                            window.print();

                            $(window).keyup(function(e) {
                                if (e.which == 27) {
                                    datatable.fnSetColumnVis(0, true);
                                    datatable.fnSetColumnVis(3, true);
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