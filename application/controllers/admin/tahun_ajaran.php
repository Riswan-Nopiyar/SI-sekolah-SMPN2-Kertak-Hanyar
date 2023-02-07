<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller
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
        $data['judulHalaman']   = 'Tahun Ajaran Akademik';
        $data['halaman']        = 'tahun_ajaran';
        $data['level']          = 'admin';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/tahun_ajaran', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function delete()
    {
        $this->db->where('id', $this->uri->segment(4));
        $this->db->delete('tahun_ajaran');
        $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
        redirect(base_url('admin/tahun_ajaran'), 'refresh');
    }

    public function update()
    {
        $data['name']         = $this->input->post('name');
        $data['strt_dt']      = date('Y-m-d', strtotime($this->input->post('strt_dt')));
        $data['end_dt']       = date('Y-m-d', strtotime($this->input->post('end_dt')));
        $data['is_open']      = $this->input->post('is_open');

        $this->db->where('id', $this->uri->segment(4));
        $this->db->update('tahun_ajaran', $data);
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('admin/tahun_ajaran'), 'refresh');
    }

    public function save()
    {
        $data['name']         = $this->input->post('name');
        $data['strt_dt']      = date('Y-m-d', strtotime($this->input->post('strt_dt')));
        $data['end_dt']       = date('Y-m-d', strtotime($this->input->post('end_dt')));
        $data['is_open']      = $this->input->post('is_open');
        $this->db->insert('tahun_ajaran', $data);
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('admin/tahun_ajaran'), 'refresh');
    }
}
