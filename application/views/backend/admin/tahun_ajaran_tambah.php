<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Tambah Tahun Ajaran Akademik
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open(base_url('admin/tahun_ajaran/save/'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Tahun Ajaran</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="value_required" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Tanggal Mulai</label>
                    <div class="col-sm-4">
                        <input type="text" class="datepicker form-control" name="strt_dt">
                    </div>
                    <label class="col-sm-1 control-label">s.d</label>
                    <div class="col-sm-4">
                        <input type="text" class="datepicker form-control" name="end_dt">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-5">
                        <select name="is_open" class="form-control selectboxit visible" style="width:100%;">
                            <option value="0">Tahun Ajaran Lalu</option>
                            <option value="1">Berjalan</option>
                        </select>
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