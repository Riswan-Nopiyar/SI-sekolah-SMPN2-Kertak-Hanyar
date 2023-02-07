<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
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
        $data['judulHalaman']   = 'System Setting';
        $data['halaman']        = 'setting';
        $data['level']          = 'admin';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/setting', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function save()
    {
        $data = array(
            'system_name' => $this->input->post('system_name'),
            'address'     => $this->input->post('address'),
            'phone'       => $this->input->post('phone'),
            'currency'    => $this->input->post('currency'),
            'email'       => $this->input->post('system_email'),
            'text_align'  => $this->input->post('text_align'),
        );

        $this->db->where('id', '1');
        $this->db->update('setting', $data);

        $this->session->set_flashdata('flash_message', 'Data Berhasil Disimpan');
        redirect(base_url('admin/setting'), 'refresh');
    }

    public function upload_logo()
    {

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/images/logo.png')) {
            $this->myModel->clear_cache();
            $this->session->set_flashdata('flash_message', 'Logo Berhasil Diupload');
            redirect(base_url('admin/setting'), 'refresh');
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('flash_message', $error['error']);
        }
    }
}
