<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login_type') != 'guru') {
            $this->session->set_flashdata('pesan', '<div class="form-login-error" style="display: block; height: auto;">
                                                        <h3><strong>Oops!</strong></h3>
                                                        <p>Session Anda Telah Habis, Silakan Login Ulang</p>
                                                    </div>');
            redirect('login');
        }
    }

    public function index()
    {
        $data['judulHalaman']   = 'Profile Setting';
        $data['halaman']        = 'akun';
        $data['level']          = 'guru';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/guru/sidebar', $data);
        $this->load->view('backend/guru/akun', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function save($param = '')
    {

        $data['name']  = $this->input->post('name');
        $data['email'] = $this->input->post('email');

        $this->db->where('teacher_id', $param);
        $this->db->update('guru', $data);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/images/guru/' . $param . '.jpg');
        $this->session->set_flashdata('flash_message', 'data berhasil diupdate');
        redirect(base_url('guru/akun'), 'refresh');
    }

    public function upload_logo()
    {

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/images/logo.png')) {
            $this->session->set_flashdata('flash_message', 'Logo Berhasil Diupload');
            redirect(base_url('admin/setting'), 'refresh');
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('flash_message', $error['error']);
        }
    }

    public function ubah_password($param = '')
    {
        $data['password']             = $this->input->post('password');
        $data['new_password']         = $this->input->post('new_password');
        $data['confirm_new_password'] = $this->input->post('confirm_new_password');

        $current_password = $this->db->get_where('guru', array(
            'teacher_id' => $param
        ))->row()->password;
        if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
            $this->db->where('teacher_id', $param);
            $this->db->update('guru', array(
                'password' => $data['new_password']
            ));
            $this->session->set_flashdata('flash_message', 'Password Berhasil Diupdate');
        } else {
            $this->session->set_flashdata('flash_message', 'Password Tidak Sesuai');
        }
        redirect(base_url('guru/akun'), 'refresh');
    }
}
