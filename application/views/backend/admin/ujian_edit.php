<?php
$edit_data        =    $this->db->get_where('ujian', array('exam_id' => $param2))->result_array();
foreach ($edit_data as $row) :
?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="entypo-plus-circled"></i>
                        Edit Jenis Ujian
                    </div>
                </div>
                <div class="panel-body">

                    <?= form_open(base_url('admin/ujian/update/ujian/' . $row['exam_id']), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" value="<?= $row['name']; ?>" data-validate="required" data-message-required="<?= ('Value Required'); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal</label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="date" value="<?= $row['date']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="comment" value="<?= $row['comment']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php
endforeach;
    ?>