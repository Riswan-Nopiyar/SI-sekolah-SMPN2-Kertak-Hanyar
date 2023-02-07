<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?php echo $page_title; ?>
</h3>
<div class="label label-primary pull-right" style="font-size: 14px;">
    <i class="entypo-user"></i>
    <?= $this->db->get_where('siswa', array('student_id' => $this->session->userdata('student_id')))->row()->name; ?>
</div>
<br>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="panel-group joined" id="accordion-test-2">
            <?php
            $toggle = true;
            $classes = $this->db->query("select kelas.* from kelas, siswa where kelas.class_id=siswa.class_id and siswa.student_id='" . $this->session->userdata('student_id') . "'")->result_array();
            foreach ($classes as $row) :
            ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapse<?php echo $row['class_id']; ?>">
                                <i class="entypo-flow-tree"></i> Kelas <?php echo $row['name']; ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?php echo $row['class_id']; ?>" class="panel-collapse collapse <?php if ($toggle) {
                                                                                                            echo 'in';
                                                                                                            $toggle = false;
                                                                                                        } ?>">
                        <div class="panel-body">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped table-bordered">
                                <tbody>
                                    <?php
                                    for ($d = 1; $d <= 7; $d++) :

                                        if ($d == 1) $day = 'Senin';
                                        else if ($d == 2) $day = 'Selasa';
                                        else if ($d == 3) $day = 'Rabu';
                                        else if ($d == 4) $day = 'Kamis';
                                        else if ($d == 5) $day = 'Jumat';
                                        else if ($d == 6) $day = 'Sabtu';
                                        else if ($d == 7) $day = 'Minggu';
                                    ?>
                                        <tr class="gradeA">
                                            <td width="100"><?php echo strtoupper($day); ?></td>
                                            <td>
                                                <?php
                                                $this->db->order_by("time_start", "asc");
                                                $this->db->where('day', $day);
                                                $this->db->where('class_id', $row['class_id']);
                                                $routines    =    $this->db->get('jadwal')->result_array();
                                                foreach ($routines as $row2) :
                                                ?>
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            <?php echo $this->myModel->mata_pelajaran($row2['subject_id']); ?>
                                                            <?php echo '(' . $row2['time_start'] . '-' . $row2['time_end'] . ')'; ?>
                                                            <!-- <span class="caret"></span> -->
                                                        </button>
                                                        <!-- <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="#" onclick="showAjaxModal('<?php echo base_url('modal/popup/jadwal_edit/' . $row2['class_routine_id']); ?>');">
                                                                    <i class="entypo-pencil"></i>
                                                                    Edit
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" onclick="confirm_modal('<?= base_url('admin/jadwal/delete/' . $row2['class_routine_id']); ?>');">
                                                                    <i class="entypo-trash"></i>
                                                                    Hapus
                                                                </a>
                                                            </li>
                                                        </ul> -->
                                                    </div>
                                                <?php endforeach; ?>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
        <!-- </div> -->
        <!-- <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/class_routine/create', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Class'); ?></label>
                        <div class="col-sm-5">
                            <select name="class_id" class="form-control" style="width:100%;" onchange="return get_class_subject(this.value)">
                                <option value=""><?php echo ('Select Class'); ?></option>
                                <?php
                                $classes = $this->db->get('kelas')->result_array();
                                foreach ($classes as $row) :
                                ?>
                                    <option value="<?php echo $row['class_id']; ?>"><?php echo $row['name']; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Subject'); ?></label>
                        <div class="col-sm-5">
                            <select name="subject_id" class="form-control" style="width:100%;" id="subject_selection_holder">
                                <option value=""><?php echo ('Select Class First'); ?></option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Day'); ?></label>
                        <div class="col-sm-5">
                            <select name="day" class="form-control" style="width:100%;">
                                <option value="sunday">sunday</option>
                                <option value="monday">monday</option>
                                <option value="tuesday">tuesday</option>
                                <option value="wednesday">wednesday</option>
                                <option value="thursday">thursday</option>
                                <option value="friday">friday</option>
                                <option value="saturday">saturday</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Starting Time'); ?></label>
                        <div class="col-sm-5">
                            <select name="time_start" class="form-control" style="width:100%;">
                                <?php for ($i = 0; $i <= 12; $i++) : ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <select name="starting_ampm" class="form-control" style="width:100%">
                                <option value="1">am</option>
                                <option value="2">pm</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Ending Time'); ?></label>
                        <div class="col-sm-5">
                            <select name="time_end" class="form-control" style="width:100%;">
                                <?php for ($i = 0; $i <= 12; $i++) : ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <select name="ending_ampm" class="form-control" style="width:100%">
                                <option value="1">am</option>
                                <option value="2">pm</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo ('Add Class Routine'); ?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div> -->
        <!-- </div> -->
    </div>
</div>

<script type="text/javascript">
    function get_class_subject(class_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_class_subject/' + class_id,
            success: function(response) {
                jQuery('#subject_selection_holder').html(response);
            }
        });
    }
</script>