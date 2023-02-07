<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
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
        $data['judulHalaman']   = 'Private Message';
        $data['halaman']        = 'message';
        $data['level']          = 'admin';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/message', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function baca($param = '')
    {
        $data['judulHalaman']   = 'Private Message';
        $data['halaman']        = 'message';
        $data['level']          = 'admin';
        $data['setting']        = $this->db->get('setting')->result();
        $data['current_message_thread_code'] = $param;  // $param2 = message_thread_code

        $this->myModel->mark_thread_messages_read($param);
        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/message', $data);
        $this->load->view('backend/temp/footer', $data);
    }
}
