<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login_type') != 'wali') {
            $this->session->set_flashdata('pesan', '<div class="form-login-error" style="display: block; height: auto;">
                                                        <h3><strong>Oops!</strong></h3>
                                                        <p>Session Anda Telah Habis, Silakan Login Ulang</p>
                                                    </div>');
            redirect('login');
        }
    }

    public function index()
    {
        $data['judulHalaman']   = 'Daftar Jenis Ujian Sekolah';
        $data['halaman']        = 'ujian';
        $data['level']          = 'wali';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/wali/sidebar', $data);
        $this->load->view('backend/wali/ujian', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function nilai($kategori = '', $kelas = '', $pelajaran = '')
    {
        $data['judulHalaman']   = 'Daftar Nilai Ujian Siswa';
        $data['halaman']        = 'nilai_ujian';
        $data['level']          = 'wali';
        $data['class_id']       = $kelas;
        $data['setting']        = $this->db->get('setting')->result();

        $data['exam_id']        = '';
        $data['class_id']       = '';
        $data['subject_id']     = '';

        if ($this->input->post('jenis') == 'tampilkan') {
            $exam_id    = $this->input->post('exam_id');
            $class_id   = $this->input->post('class_id');
            $subject_id = $this->input->post('subject_id');

            if ($exam_id > 0 && $class_id > 0 && $subject_id > 0) {
                $data['exam_id']    = $exam_id;
                $data['class_id']   = $class_id;
                $data['subject_id'] = $subject_id;
            }
        } elseif ($this->input->post('jenis') == 'update') {
            $data_nilai['exam_id']    = $this->input->post('exam_id');
            $data_nilai['class_id']   = $this->input->post('class_id');
            $data_nilai['subject_id'] = $this->input->post('subject_id');

            if ($data_nilai['exam_id'] > 0 && $data_nilai['class_id'] > 0 && $data_nilai['subject_id'] > 0) {
                $data['exam_id']    = $data_nilai['exam_id'];
                $data['class_id']   = $data_nilai['class_id'];
                $data['subject_id'] = $data_nilai['subject_id'];

                $where = array(
                    'mark_id' => $this->input->post('mark_id'),
                    'exam_id' => $this->input->post('exam_id'),
                    'class_id' => $this->input->post('class_id'),
                    'subject_id' => $this->input->post('subject_id'),
                );

                $this->db->where($where);
                $this->db->update('nilai_ujian', array('mark_obtained' => $this->input->post('mark_obtained'), 'comment' => $this->input->post('comment')));
                $this->session->set_flashdata('flash_message', 'data berhasil diupdate');
                /* redirect(base_url('wali/ujian/nilai/' . $data['exam_id'] . '/' . $data['class_id'] . '/' . $data['subject_id']), 'refresh'); */
            }
        }

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/wali/sidebar', $data);
        $this->load->view('backend/wali/ujian_nilai', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function kategori()
    {
        $data['judulHalaman']   = 'Kategori Penilaian';
        $data['halaman']        = 'kategori';
        $data['level']          = 'wali';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/wali/sidebar', $data);
        $this->load->view('backend/wali/kategori_nilai', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function delete($param1 = '', $param2 = '')
    {
        if ($param1 == 'ujian') {
            $where = array(
                'exam_id'   => $param2,
            );

            $this->db->where($where);
            $this->db->delete('ujian');
            $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
            redirect(base_url('wali/ujian'), 'refresh');
        } elseif ($param1 == 'kategori') {
            $where = array(
                'grade_id'   => $param2,
            );

            $this->db->where($where);
            $this->db->delete('kategori_nilai');
            $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
            redirect(base_url('wali/ujian/kategori'), 'refresh');
        }
    }

    public function update($param1 = '', $param2 = '')
    {
        if ($param1 == 'ujian') {
            $data['name']        = $this->input->post('name');
            $data['date']        = $this->input->post('date');
            $data['comment']     = $this->input->post('comment');

            $this->db->where(array('exam_id' => $param2));
            $this->db->update('ujian', $data);
            $this->session->set_flashdata('flash_message', 'data berhasil diupdate');
            redirect(base_url('wali/ujian'), 'refresh');
        } elseif ($param1 == 'kategori') {
            $data['name']        = $this->input->post('name');
            $data['grade_point'] = $this->input->post('grade_point');
            $data['mark_from']   = $this->input->post('mark_from');
            $data['mark_upto']   = $this->input->post('mark_upto');
            $data['comment']     = $this->input->post('comment');

            $this->db->where(array('grade_id' => $param2));
            $this->db->update('kategori_nilai', $data);
            $this->session->set_flashdata('flash_message', 'data berhasil diupdate');
            redirect(base_url('wali/ujian/kategori'), 'refresh');
        }
    }

    public function save($param1 = '', $param2 = '')
    {
        if ($param1 == null) {
            $data['name']        = $this->input->post('name');
            $data['date']        = $this->input->post('date');
            $data['comment']     = $this->input->post('comment');

            $this->db->insert('ujian', $data);
            $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
            redirect(base_url('wali/ujian'), 'refresh');
        } elseif ($param1 == 'kategori') {
            $data['name']        = $this->input->post('name');
            $data['grade_point'] = $this->input->post('grade_point');
            $data['mark_from']   = $this->input->post('mark_from');
            $data['mark_upto']   = $this->input->post('mark_upto');
            $data['comment']     = $this->input->post('comment');

            $this->db->insert('kategori_nilai', $data);
            $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
            redirect(base_url('wali/ujian/kategori'), 'refresh');
        }
    }
}
