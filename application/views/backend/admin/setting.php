<?php
$page_title         = $judulHalaman;

foreach ($setting as $dataSetting) {
    $system_name    = $dataSetting->system_name;
    $address        = $dataSetting->address;
    $phone          = $dataSetting->phone;
    $currency       = $dataSetting->currency;
    $email          = $dataSetting->email;
    $text_align     = $dataSetting->text_align;
}

?>

<h3>
    <i class="entypo-right-circled"></i>
    <?php echo $page_title; ?>
</h3>
<hr />

<div class="row">
    <?php echo form_open(
        base_url('admin/setting/save'),
        array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')
    ); ?>
    <div class="col-md-9">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    System Settings
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Sekolah</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="system_name" value="<?= $system_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" value="<?= $address; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">No. Tlp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone" value="<?= $phone; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Currency</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="currency" value="<?= $currency; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="system_email" value="<?= $email; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Text Align</label>
                    <div class="col-sm-9">
                        <select name="text_align" class="form-control">
                            <option value="left-to-right" <?= $text_align == 'left-to-right' ? 'selected' : null; ?>> left-to-right</option>
                            <option value="right-to-left" <?= $text_align == 'right-to-left' ? 'selected' : null; ?>> right-to-left</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <?php echo form_close(); ?>

    <div class="col-md-3">
        <?php echo form_open(base_url('admin/setting/upload_logo'), array(
            'class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data'
        )); ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                Refresh Logo (CTRL + shift + R)
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Logo</label>
                    <div class="col-sm-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="logo">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">Pilih Logo</span>
                                    <span class="fileinput-exists">Ubah</span>
                                    <input type="file" name="userfile" accept="image/*">
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info">Upload</button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>