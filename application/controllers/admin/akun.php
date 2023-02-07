<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
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

    public function index()
    {
        $data['judulHalaman']   = 'Profile Setting';
        $data['halaman']        = 'akun';
        $data['level']          = 'admin';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/akun', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function save()
    {

        $data['name']  = $this->input->post('name');
        $data['email'] = $this->input->post('email');

        $this->db->where('admin_id', '1');
        $this->db->update('admin', $data);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/images/guru/admin.jpg');
        $this->session->set_flashdata('flash_message', 'data berhasil diupdate');
        redirect(base_url('admin/akun'), 'refresh');
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

    public function ubah_password()
    {
        $data['password']             = $this->input->post('password');
        $data['new_password']         = $this->input->post('new_password');
        $data['confirm_new_password'] = $this->input->post('confirm_new_password');

        $current_password = $this->db->get_where('admin', array(
            'admin_id' => '1'
        ))->row()->password;
        if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
            $this->db->where('admin_id', '1');
            $this->db->update('admin', array(
                'password' => $data['new_password']
            ));
            $this->session->set_flashdata('flash_message', 'Password Berhasil Diupdate');
        } else {
            $this->session->set_flashdata('flash_message', 'Password Tidak Sesuai');
        }
        redirect(base_url('admin/akun'), 'refresh');
    }
}
