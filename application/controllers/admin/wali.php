<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wali extends CI_Controller
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
        $data['judulHalaman']   = 'Daftar Orang Tua/Wali Murid';
        $data['halaman']        = 'wali';
        $data['level']          = 'admin';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/wali', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function delete()
    {
        $this->db->where('parent_id', $this->uri->segment(4));
        $this->db->delete('wali');
        $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
        redirect(base_url('admin/wali'), 'refresh');
    }

    public function update()
    {
        $data['name']        = $this->input->post('name');
        $data['email']       = $this->input->post('email');
        $data['phone']       = $this->input->post('phone');
        $data['address']     = $this->input->post('address');
        $data['profession']  = $this->input->post('profession');

        $this->db->where('parent_id', $this->uri->segment(4));
        $this->db->update('wali', $data);
        /* move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/images/guru/' . $this->uri->segment(4) . '.jpg'); */
        $this->session->set_flashdata('flash_message', 'data berhasil diupdate');
        redirect(base_url('admin/wali'), 'refresh');
    }

    public function save()
    {
        $data['name']        = $this->input->post('name');
        $data['email']       = $this->input->post('email');
        $data['phone']       = $this->input->post('phone');
        $data['address']     = $this->input->post('address');
        $data['profession']  = $this->input->post('profession');

        $this->db->insert('wali', $data);
        /* $teacher_id = $this->db->insert_id();
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/images/guru/' . $teacher_id . '.jpg'); */
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        /* $this->email_model->account_opening_email('teacher', $data['email']);  */ //SEND EMAIL ACCOUNT OPENING EMAIL
        redirect(base_url('admin/wali'), 'refresh');
    }
}
