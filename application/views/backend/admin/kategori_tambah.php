<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Tambah Kategori Penilaian
                </div>
            </div>
            <div class="panel-body">
                <?= form_open(base_url('admin/ujian/save/kategori'), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                <div class="padded">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Grade</label>
                        <div class="col-sm-5 controls">
                            <input type="text" class="form-control" name="name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Poin</label>
                        <div class="col-sm-5 controls">
                            <input type="text" class="form-control" name="grade_point" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nilai</label>
                        <div class="col-sm-2 controls">
                            <input type="number" class="form-control" name="mark_from" />
                        </div>
                        <label class="col-sm-1 control-label">s.d</label>
                        <div class="col-sm-2 controls">
                            <input type="number" class="form-control" name="mark_upto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-5 controls">
                            <input type="text" class="form-control" name="comment" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>