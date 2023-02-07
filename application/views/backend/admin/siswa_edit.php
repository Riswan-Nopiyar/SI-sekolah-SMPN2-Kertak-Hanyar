<?php
$edit_data        =    $this->db->get_where('siswa', array('student_id' => $param2))->result_array();
foreach ($edit_data as $row) :
?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="entypo-plus-circled"></i>
                        Edit Data Siswa
                    </div>
                </div>
                <div class="panel-body">
                    <?= form_open(base_url('admin/siswa/update/' . $row['class_id'] . '/' . $row['student_id']), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Photo</label>
                        <div class="col-sm-5">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                    <img src="<?= $this->myModel->get_image_url('student', $row['student_id']); ?>" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Pilih Photo</span>
                                        <span class="fileinput-exists">Ubah</span>
                                        <input type="file" name="userfile" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required" value="<?= $row['name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Tempat Lahir</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control datepicker" name="place" value="<?= $row['place']; ?>" data-start-view="2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Tanggal Lahir</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control datepicker" name="birthday" value="<?= $row['birthday']; ?>" data-start-view="2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Nama Orang Tua</label>
                        <div class="col-sm-5">
                            <select name="parent_id" class="form-control" data-validate="required" data-message-required="Tidak Boleh Kosong">
                                <option value="">Pilih Nama...</option>
                                <?php
                                $parents = $this->db->get('wali')->result_array();
                                foreach ($parents as $row3) :
                                ?>
                                    <option value="<?= $row3['parent_id']; ?>" <?= ($row['parent_id'] == $row3['parent_id']) ? 'selected' : null; ?>>
                                        <?= $row3['name']; ?>
                                    </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Kelas</label>
                        <div class="col-sm-5">
                            <select name="class_id" class="form-control" data-validate="required" id="class_id" data-message-required="Tidak Boleh Kosong" onchange="return get_class_sections(this.value)">
                                <option value="">Pilih Kelas...</option>
                                <?php
                                $classes = $this->db->get('kelas')->result_array();
                                foreach ($classes as $row2) :
                                ?>
                                    <option value="<?= $row2['class_id']; ?>" <?= ($row['class_id'] == $row2['class_id']) ? 'selected' : null; ?>>
                                        <?= $row2['name']; ?>
                                    </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-5">
                            <select name="sex" class="form-control">
                                <option value="">Pilih...</option>
                                <option value="Pria" <?= ($row['sex'] == 'Pria') ? 'selected' : null; ?>>Pria</option>
                                <option value="Wanita" <?= ($row['sex'] == 'Wanit') ? 'selected' : null; ?>>Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="address" value="<?= $row['address']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">No. Telephone</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="phone" value="<?= $row['phone']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email" value="<?= $row['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>

<?php
endforeach;
?>

<script type="text/javascript">
    function get_class_sections(class_id) {

        $.ajax({
            url: '<?= base_url(); ?>index.php?admin/get_class_section/' + class_id,
            success: function(response) {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }

    var class_id = $("#class_id").val();

    $.ajax({
        url: '<?= base_url(); ?>index.php?admin/get_class_section/' + class_id,
        success: function(response) {
            jQuery('#section_selector_holder').html(response);
        }
    });
</script>