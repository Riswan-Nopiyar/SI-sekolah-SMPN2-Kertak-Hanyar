<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login_type') != 'admin') {
            $this->session->set_flashdata('pesan', '<div class="form-login-error" style="display: block; height: auto;">
                                                        <h3><strong>Oops!</strong></h3>
                                                        <p>Session Anda Telah Habis, Silakan Login Ulang</p>
                                                    </div>');
            redirect('login');
        }
    }

    public function index($param = '')
    {
    }

    public function informasi($param = '')
    {
        $data['judulHalaman']   = 'Daftar Nama Siswa Kelas ' . $this->myModel->get_nama('kelas', array('class_id' => $param));
        $data['halaman']        = 'informasi_siswa';
        $data['level']          = 'admin';
        $data['class_id']       = $param;
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/siswa_informasi', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function nilai($param = '')
    {
        $data['judulHalaman']   = 'Daftar Nilai Siswa Kelas ' . $this->myModel->get_nama('kelas', array('class_id' => $param));
        $data['halaman']        = 'rapor_siswa';
        $data['level']          = 'admin';
        $data['class_id']       = $param;
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/siswa_rapor', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function absen($param1 = '')
    {
        $data['judulHalaman']   = 'Absensi Harian Siswa';
        $data['halaman']        = 'absen';
        $data['level']          = 'admin';
        $data['hari']           = '';
        $data['setting']        = $this->db->get('setting')->result();

        if ($param1 == 'kelola') {
            $data['hari']       = $this->input->post('date');
            $data['class_id']   = $this->input->post('class_id');
        } elseif ($param1 == 'update') {
            $data['hari']       = $this->input->post('date');
            $data['class_id']   = $this->input->post('class_id');

            $students   =   $this->db->get_where('siswa', array('class_id' => $this->input->post('class_id')))->result_array();
            foreach ($students as $row) {
                $attendance_status  =   $this->input->post('status_' . $row['student_id']);

                $this->db->where('student_id', $row['student_id']);
                $this->db->where('date', $this->input->post('date'));

                $this->db->update('absen', array('status' => $attendance_status));
            }

            $this->session->set_flashdata('flash_message', 'data berhasil diupdate');
            /* redirect(base_url() . 'index.php?admin/manage_attendance/' . $date . '/' . $month . '/' . $year . '/' . $class_id, 'refresh'); */
        }

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/absen', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function tambah()
    {
        $data['judulHalaman']   = 'Tambah Data Siswa';
        $data['halaman']        = 'siswa_tambah';
        $data['level']          = 'admin';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/siswa_tambah', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function delete()
    {
        $where = array(
            'class_id'   => $this->uri->segment(4),
            'student_id' => $this->uri->segment(5),
        );

        $this->db->where($where);
        $this->db->delete('siswa');
        $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
        redirect(base_url('admin/siswa/informasi/' . $this->uri->segment(4)), 'refresh');
    }

    public function update()
    {
        $data['name']        = $this->input->post('name');
        $data['place']       = $this->input->post('place');
        $data['birthday']    = $this->input->post('birthday');
        $data['parent_id']   = $this->input->post('parent_id');
        $data['class_id']    = $this->input->post('class_id');
        $data['sex']         = $this->input->post('sex');
        $data['address']     = $this->input->post('address');
        $data['phone']       = $this->input->post('phone');
        $data['email']       = $this->input->post('email');

        $this->db->where(array('class_id' => $this->uri->segment(4), 'student_id' => $this->uri->segment(5)));
        $this->db->update('siswa', $data);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/images/siswa/' . $this->uri->segment(5) . '.jpg');
        $this->myModel->clear_cache();
        $this->session->set_flashdata('flash_message', 'data berhasil diupdate');
        redirect(base_url('admin/siswa/informasi/' . $this->uri->segment(4)), 'refresh');
    }

    public function save()
    {
        $data['name']       = $this->input->post('name');
        $data['place']       = $this->input->post('place');
        $data['birthday']   = $this->input->post('birthday');
        $data['sex']        = $this->input->post('sex');
        $data['address']    = $this->input->post('address');
        $data['phone']      = $this->input->post('phone');
        $data['email']      = $this->input->post('email');
        $data['class_id']   = $this->input->post('class_id');
        $data['parent_id']  = $this->input->post('parent_id');
        $data['password']   = $this->input->post('password');

        $this->db->insert('siswa', $data);
        /* $student_id = $this->db->insert_id(); */
        /* move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $student_id . '.jpg'); */
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        /* $this->email_model->account_opening_email('student', $data['email']); */ //SEND EMAIL ACCOUNT OPENING EMAIL
        if ($this->uri->segment(3) == 'tambah') {
            redirect(base_url('admin/siswa/tambah'), 'refresh');
        } else {
            redirect(base_url('admin/siswa/informasi/' . $this->uri->segment(4)), 'refresh');
        }
    }
}
