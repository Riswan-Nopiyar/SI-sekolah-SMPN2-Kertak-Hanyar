<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
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
        $data['judulHalaman']   = 'Daftar Guru';
        $data['halaman']        = 'guru';
        $data['level']          = 'guru';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/guru/sidebar', $data);
        $this->load->view('backend/guru/guru', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function delete()
    {
        $this->db->where('teacher_id', $this->uri->segment(4));
        $this->db->delete('guru');
        $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
        redirect(base_url('guru/guru'), 'refresh');
    }

    public function update()
    {
        $data['name']        = $this->input->post('name');
        $data['birthday']    = $this->input->post('birthday');
        $data['sex']         = $this->input->post('sex');
        $data['address']     = $this->input->post('address');
        $data['phone']       = $this->input->post('phone');
        $data['email']       = $this->input->post('email');

        $this->db->where('teacher_id', $this->uri->segment(4));
        $this->db->update('guru', $data);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/images/guru/' . $this->uri->segment(4) . '.jpg');
        $this->session->set_flashdata('flash_message', 'data berhasil diupdate');
        redirect(base_url('guru/guru'), 'refresh');
    }

    public function save()
    {
        $data['name']        = $this->input->post('name');
        $data['birthday']    = $this->input->post('birthday');
        $data['sex']         = $this->input->post('sex');
        $data['address']     = $this->input->post('address');
        $data['phone']       = $this->input->post('phone');
        $data['email']       = $this->input->post('email');
        $data['password']    = $this->input->post('password');

        $this->db->insert('guru', $data);
        $teacher_id = $this->db->insert_id();
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/images/guru/' . $teacher_id . '.jpg');
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        /* $this->email_model->account_opening_email('teacher', $data['email']);  */ //SEND EMAIL ACCOUNT OPENING EMAIL
        redirect(base_url('guru/guru'), 'refresh');
    }
}
