<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?php echo $page_title; ?>
</h3>

<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url('modal/popup/pelajaran_bahan_tambah'); ?>');" class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    Tambah Bahan Pelajaran Baru
</a>
<br><br>
<table class="table table-bordered table-hover datatable" id="table_export">
    <thead>
        <tr>
            <th class="text-center" width="7%">#</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Judul</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Kelas</th>
            <th class="text-center" width="7%">Download</th>
            <th class="text-center" width="7%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $bahan    =  $this->db->get('bahan_pelajaran')->result_array();  /* $this->db->get('kelas')->result_array(); */
        $i        =  1;
        foreach ($bahan as $row) : ?>
            <tr>
                <td class="text-center"><?= $i++ ?></td>
                <td><?= date("d F Y", $row['timestamp']); ?></td>
                <td><?= $row['title']; ?></td>
                <td><?= $row['description']; ?></td>
                <td>
                    <?php $name = $this->db->get_where('kelas', array('class_id' => $row['class_id']))->row()->name;
                    echo $name; ?>
                </td>
                <td>
                    <a href="<?php echo base_url() . 'uploads/document/' . $row['file_name']; ?>" class="btn btn-blue btn-icon icon-left">
                        <i class="entypo-download"></i>Download
                    </a>
                </td>
                <td>

                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <li>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url('modal/popup/pelajaran_bahan_edit/' . $row['document_id']); ?>');">
                                    <i class="entypo-pencil"></i>Edit
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" onclick="confirm_modal('<?php echo base_url('guru/pelajaran/delete_bahan/' . $row['document_id']); ?>');">
                                    <i class="entypo-trash"></i>Hapus
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
        var datatable = $("#table_export").dataTable();

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
</script>