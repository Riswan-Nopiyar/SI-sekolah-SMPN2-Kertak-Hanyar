<?php
$edit_data        =    $this->db->get_where('guru', array('teacher_id' => $param2))->result_array();
foreach ($edit_data as $row) :
?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="entypo-pencil"></i>
                        Edit Data Guru
                    </div>
                </div>
                <div class="panel-body">
                    <?php echo form_open(base_url('admin/guru/update/' . $row['teacher_id']), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Photo</label>

                        <div class="col-sm-5">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                    <img src="<?php echo $this->myModel->get_image_url('teacher', $row['teacher_id']); ?>" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Pilih Foto</span>
                                        <span class="fileinput-exists">Ubah Foto</span>
                                        <input type="file" name="userfile" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tgl. Lahir</label>
                        <div class="col-sm-5">
                            <input type="text" class="datepicker form-control" name="birthday" value="<?php echo $row['birthday']; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jns. Kelamin</label>
                        <div class="col-sm-5">
                            <select name="sex" class="form-control">
                                <option value="Male" <?php if ($row['sex'] == 'Male') echo 'selected'; ?>>Pria</option>
                                <option value="Female" <?php if ($row['sex'] == 'Female') echo 'selected'; ?>>Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">No. Tlp</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>" />
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

<?php
endforeach;
?>