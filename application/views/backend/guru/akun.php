<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?php echo $page_title; ?>
</h3>

<div class="row">
    <div class="col-md-12">
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-user"></i>
                    Manage Profil
                </a>
            </li>
            <li>
                <a href="#password" data-toggle="tab"><i class="entypo-key"></i>
                    Ubah Password
                </a>
            </li>
        </ul>
        <!------CONTROL TABS END------>
        <div class="tab-content">
            <!----EDITING FORM STARTS---->
            <div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content">
                    <?php
                    $teachers    =    $this->db->get_where('guru', array('teacher_id' => $this->session->userdata('teacher_id')))->result_array();
                    foreach ($teachers as $row) : ?>
                        <?php echo form_open(base_url('guru/akun/save/' . $this->session->userdata('teacher_id')), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Photo</label>

                            <div class="col-sm-5">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                        <img src="<?php echo $this->myModel->get_image_url('guru', $row['teacher_id']); ?>" alt="...">
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
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </div>
                        </form>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <!----EDITING FORM ENDS-->
            <div class="tab-pane box" id="password" style="padding: 5px">
                <div class="box-content padded">
                    <?php
                    $teachers    =    $this->db->get_where('guru', array('teacher_id' => $this->session->userdata('teacher_id')))->result_array();
                    foreach ($teachers as $row) : ?>
                        <?php echo form_open(base_url('guru/akun/ubah_password/' . $this->session->userdata('teacher_id')), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password Saat Ini</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="password" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password Baru</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="new_password" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ulangi Password Baru</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="confirm_new_password" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">Ubah Password</button>
                            </div>
                        </div>
                        </form>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>