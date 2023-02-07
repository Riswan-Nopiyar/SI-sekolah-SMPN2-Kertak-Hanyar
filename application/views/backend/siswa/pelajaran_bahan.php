<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?php echo $page_title; ?>
</h3>

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
        </tr>
    </thead>
    <tbody>
        <?php
        $bahan    =  $this->db->get_where('bahan_pelajaran', array('class_id' => $this->db->get_where('siswa', array('student_id' => $this->session->userdata('student_id')))->row()->class_id))->result_array();  /* $this->db->get('kelas')->result_array(); */
        $i        =  1;
        foreach ($bahan as $row) : ?>
            <tr>
                <td class="text-center"><?= $i++ ?></td>
                <td><?= date("d M Y", $row['timestamp']); ?></td>
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