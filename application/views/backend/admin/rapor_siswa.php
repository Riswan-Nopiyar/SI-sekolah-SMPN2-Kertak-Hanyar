<style>
    #chartdiv {
        width: 100%;
        height: 250px;
        font-size: 11px;
    }
</style>

<?php
$student_info = $this->db->get_where('siswa', array('student_id' => $this->uri->segment(4)))->result_array();
foreach ($student_info as $row1) :
?>
    <center>
        <div style="font-size: 20px;font-weight: 200;margin: 10px;"><?= $row1['name']; ?></div>
        <div class="panel-group joined" id="accordion-test-2">
            <?php
            /////SEMESTER WISE RESULT, RESULTSHEET FOR EACH SEMESTER SEPERATELY
            $toggle = true;
            $exams = $this->db->get('ujian')->result_array();
            foreach ($exams as $row0) :
                $total_grade_point = 0;
                $total_marks = 0;
                $total_subjects = 0;
            ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapse<?= $row0['exam_id']; ?>">
                                <i class="entypo-rss"></i> <?= $row0['name']; ?>
                            </a>
                        </h4>
                    </div>

                    <div id="collapse<?= $row0['exam_id']; ?>" class="panel-collapse collapse <?php
                                                                                                if ($toggle) {
                                                                                                    echo 'in';
                                                                                                    $toggle = false;
                                                                                                }
                                                                                                ?>">
                        <div class="panel-body">
                            <center>
                                <table class="table table-bordered table-hover table-striped ">
                                    <thead>
                                        <tr>
                                            <th>Pelajaran</th>
                                            <th>Nilai</th>
                                            <th>Nilai Kelas Tertinggi</th>
                                            <th>Grade</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $subjects = $this->db->get_where('pelajaran', array('class_id' => $row1['class_id']))->result_array();
                                        foreach ($subjects as $row2) :
                                            $total_subjects++;
                                        ?>
                                            <tr>
                                                <td><?= $row2['name'];
                                                    $subject_name[] = $row2['name']; ?></td>
                                                <td>
                                                    <?php
                                                    //obtained marks
                                                    $verify_data = array(
                                                        'exam_id' => $row0['exam_id'],
                                                        'class_id' => $row1['class_id'],
                                                        'subject_id' => $row2['subject_id'],
                                                        'student_id' => $row1['student_id']
                                                    );
                                                    /* print_r($verify_data); */
                                                    $query = $this->db->get_where('nilai_ujian', $verify_data);
                                                    $marks = $query->result_array();
                                                    $nilai = 0;
                                                    foreach ($marks as $row3) :
                                                        echo $row3['mark_obtained'];
                                                        $mark_obtained[] = $row3['mark_obtained'];
                                                        $total_marks += $row3['mark_obtained'];
                                                        $nilai = $row3['mark_obtained'];
                                                    endforeach;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    //highest marks
                                                    $verify_data = array(
                                                        'exam_id' => $row0['exam_id'],
                                                        'subject_id' => $row2['subject_id']
                                                    );
                                                    $this->db->select_max('mark_obtained', 'mark_highest');
                                                    $query = $this->db->get_where('nilai_ujian', $verify_data);
                                                    $marks = $query->result_array();
                                                    foreach ($marks as $row4) :
                                                        echo $row4['mark_highest'];
                                                        $mark_highest[] = $row4['mark_highest'];
                                                    endforeach;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($nilai > 0) {
                                                        $grade = $this->myModel->get_grade($nilai);
                                                        echo $grade['name'];
                                                        $total_grade_point += $grade['grade_point'];
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($nilai > 0) {
                                                        echo $row3['comment'];
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <hr />
                                Total Nilai : <?= $total_marks; ?>
                                <hr />
                                Indeks Prestasi : <?= round($total_grade_point / $total_subjects, 2); ?>
                                <div id="chartdiv"></div>
                                <script>
                                    setTimeout(function() {
                                        var chart = AmCharts.makeChart("chartdiv", {
                                            "theme": "none",
                                            "type": "serial",
                                            "dataProvider": [
                                                <?php for ($i = 0; $i < count($subjects); $i++) { ?> {
                                                        "subject": "<?= $subject_name[$i]; ?>",
                                                        "mark_obtained": <?= $mark_obtained[$i]; ?>,
                                                        "mark_highest": <?= $mark_highest[$i]; ?>
                                                    },
                                                <?php } ?>
                                            ],
                                            "valueAxes": [{
                                                "stackType": "3d",
                                                "unit": "%",
                                                "position": "left",
                                                "title": "Obtained Mark vs Highest Mark"
                                            }],
                                            "startDuration": 1,
                                            "graphs": [{
                                                "balloonText": "Obtained Mark in [[category]]: <b>[[value]]</b>",
                                                "fillAlphas": 0.9,
                                                "lineAlpha": 0.2,
                                                "title": "2004",
                                                "type": "column",
                                                "fillColors": "#7f8c8d",
                                                "valueField": "mark_obtained"
                                            }, {
                                                "balloonText": "Highest Mark in [[category]]: <b>[[value]]</b>",
                                                "fillAlphas": 0.9,
                                                "lineAlpha": 0.2,
                                                "title": "2005",
                                                "type": "column",
                                                "fillColors": "#34495e",
                                                "valueField": "mark_highest"
                                            }],
                                            "plotAreaFillAlphas": 0.1,
                                            "depth3D": 20,
                                            "angle": 45,
                                            "categoryField": "subject",
                                            "categoryAxis": {
                                                "gridPosition": "start"
                                            },
                                            "exportConfig": {
                                                "menuTop": "20px",
                                                "menuRight": "20px",
                                                "menuItems": [{
                                                    "format": 'png'
                                                }]
                                            }
                                        });
                                    }, 500);
                                </script>
                            </center>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </center>
<?php endforeach; ?>