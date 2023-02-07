<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perpustakaan extends CI_Controller
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
        $data['judulHalaman']   = 'Buku-Buku Perpustakaan';
        $data['halaman']        = 'library';
        $data['level']          = 'admin';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/perpustakaan', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function delete($param = '')
    {
        $this->db->where('book_id', $param);
        $this->db->delete('buku');
        $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
        redirect(base_url('admin/perpustakaan'), 'refresh');
    }

    public function update($param = '')
    {
        $data['name']        = $this->input->post('name');
        $data['description'] = $this->input->post('description');
        $data['price']       = $this->input->post('price');
        $data['author']      = $this->input->post('author');
        $data['class_id']    = $this->input->post('class_id');
        $data['status']      = $this->input->post('status');

        $this->db->where('book_id', $param);
        $this->db->update('buku', $data);
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('admin/perpustakaan'), 'refresh');
    }

    public function save()
    {
        $data['name']        = $this->input->post('name');
        $data['description'] = $this->input->post('description');
        $data['price']       = $this->input->post('price');
        $data['author']      = $this->input->post('author');
        $data['class_id']    = $this->input->post('class_id');
        $data['status']      = $this->input->post('status');

        $this->db->insert('buku', $data);
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('admin/perpustakaan'), 'refresh');
    }
}
