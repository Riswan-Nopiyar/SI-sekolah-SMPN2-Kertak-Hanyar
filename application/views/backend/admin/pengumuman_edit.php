<?php
$edit_data        =    $this->db->get_where('pengumuman', array('notice_id' => $param2))->result_array();
foreach ($edit_data as $row) :
?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="entypo-plus-circled"></i>
                        Tambah Pengumuman
                    </div>
                </div>
                <div class="panel-body">
                    <?php echo form_open(base_url('admin/pengumuman/update/' . $param2), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Judul</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="notice_title" value="<?= $row['notice_title'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Isi Pengumuman</label>
                        <div class="col-sm-9">
                            <div class="box closable-chat-box">
                                <div class="box-content padded">
                                    <div class="chat-message-box">
                                        <textarea name="notice" id="ttt" rows="5" placeholder="Isikan Pengumuman Disini" class="form-control"><?= $row['notice'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-5">
                            <input type="text" class="datepicker form-control" name="create_timestamp" value="<?= date("d/m/Y", $row['create_timestamp']) ?>" />
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
<?php endforeach; ?>