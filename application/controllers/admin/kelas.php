<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
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
        $data['judulHalaman']   = 'Daftar Kelas';
        $data['halaman']        = 'kelas';
        $data['level']          = 'admin';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/kelas', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function delete()
    {
        $this->db->where('class_id', $this->uri->segment(4));
        $this->db->delete('kelas');
        $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
        redirect(base_url('admin/kelas'), 'refresh');
    }

    public function update()
    {
        $data['name']         = $this->input->post('name');
        /* $data['name_numeric'] = $this->input->post('name_numeric'); */
        $data['teacher_id']   = $this->input->post('teacher_id');

        $this->db->where('class_id', $this->uri->segment(4));
        $this->db->update('kelas', $data);
        $this->session->set_flashdata('flash_message', 'data berhasil diupdate');
        redirect(base_url('admin/kelas'), 'refresh');
    }

    public function save()
    {
        $data['name']         = $this->input->post('name');
        /* $data['name_numeric'] = $this->input->post('name_numeric'); */
        $data['teacher_id']   = $this->input->post('teacher_id');
        $this->db->insert('kelas', $data);
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('admin/kelas'), 'refresh');
    }
}
