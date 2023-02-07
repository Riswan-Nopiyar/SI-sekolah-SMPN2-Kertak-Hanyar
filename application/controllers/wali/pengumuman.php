<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login_type') != 'wali') {
            $this->session->set_flashdata('pesan', '<div class="form-login-error" style="display: block; height: auto;">
                                                        <h3><strong>Oops!</strong></h3>
                                                        <p>Session Anda Telah Habis, Silakan Login Ulang</p>
                                                    </div>');
            redirect('login');
        }
    }

    public function index()
    {
        $data['judulHalaman']   = 'Pengumuman Sekolah';
        $data['halaman']        = 'noticeboard';
        $data['level']          = 'wali';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/wali/sidebar', $data);
        $this->load->view('backend/wali/pengumuman', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function delete($param = '')
    {
        $this->db->where('notice_id', $param);
        $this->db->delete('pengumuman');

        $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
        redirect(base_url('wali/perpustakaan'), 'refresh');
    }

    public function update($param = '')
    {
        $data['notice_title']     = $this->input->post('notice_title');
        $data['notice']           = $this->input->post('notice');
        $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));

        $this->db->where('notice_id', $param);
        $this->db->update('pengumuman', $data);

        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('wali/pengumuman'), 'refresh');
    }

    public function save()
    {
        $data['notice_title']     = $this->input->post('notice_title');
        $data['notice']           = $this->input->post('notice');
        $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));

        $this->db->insert('pengumuman', $data);
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('wali/pengumuman'), 'refresh');
    }
}
