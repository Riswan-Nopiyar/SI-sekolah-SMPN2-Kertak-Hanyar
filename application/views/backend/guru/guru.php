<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?php echo $page_title; ?>
</h3>

<!-- <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url('modal/popup/guru_tambah'); ?>');" class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    Tambah Guru Baru
</a> -->
<br><br>
<table class="table table-bordered table-hover datatable" id="table_export">
    <thead>
        <tr>
            <th class="text-center" width="7%">Photo</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Email</th>
            <!-- <th class="text-center" width="7%">Aksi</th> -->
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
                <!-- <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <li>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url('modal/popup/guru_edit/' . $row['teacher_id']); ?>');">
                                    <i class="entypo-pencil"></i>
                                    Edit
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" onclick="confirm_modal('<?php echo base_url('admin/guru/delete/' . $row['teacher_id']); ?>');">
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