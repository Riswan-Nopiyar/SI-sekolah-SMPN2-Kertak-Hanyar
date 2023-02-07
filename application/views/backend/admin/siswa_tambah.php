<!-- <?php
        $page_title         = $judulHalaman;
        ?>

<h3>
    <i class="entypo-right-circled"></i>
    <?php echo $page_title; ?>
</h3> -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Tambah Data Siswa
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open(base_url('admin/siswa/save'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Nama Lengkap</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo ('Value Required'); ?>" value="" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="place" value="" data-start-view="2">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control datepicker" name="birthday" value="" data-start-view="2">
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Jenis Kelamin</label>
                    <div class="col-sm-3">
                        <select name="sex" class="form-control">
                            <option value="">Pilih...</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="address" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">No. Telephone</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="phone" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Kelas</label>

                    <div class="col-sm-5">
                        <select name="class_id" class="form-control" data-validate="required" id="class_id" data-message-required="<?php echo ('Value Required'); ?>" onchange="return get_class_sections(this.value)">
                            <option value="">Pilih...</option>
                            <?php
                            $classes = $this->db->get('kelas')->result_array();
                            foreach ($classes as $row) :
                            ?>
                                <option value="<?php echo $row['class_id']; ?>">
                                    <?php echo $row['name']; ?>
                                </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Orang Tua/Wali Murid</label>
                    <div class="col-sm-5">
                        <select name="parent_id" class="form-control">
                            <option value="">Pilih...</option>
                            <?php
                            $parents = $this->db->get('wali')->result_array();
                            foreach ($parents as $row) :
                            ?>
                                <option value="<?php echo $row['parent_id']; ?>">
                                    <?php echo $row['name']; ?>
                                </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                </div>

                <!-- <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo ('Photo'); ?></label>
                        
						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="http://placehold.it/200x200" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="userfile" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
						</div>
					</div> -->

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function get_class_sections(class_id) {

        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_class_section/' + class_id,
            success: function(response) {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }
</script>