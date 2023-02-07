<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Tambah Data Orang Tua/Wali Murid
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open(base_url('admin/wali/save/'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Nama</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo ('Value Required'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">No. Tlp.</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="phone">
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Alamat</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="address">
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Pekerjaan</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="profession">
                    </div>
                </div>

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