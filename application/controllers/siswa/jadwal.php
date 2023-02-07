<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login_type') != 'siswa') {
            $this->session->set_flashdata('pesan', '<div class="form-login-error" style="display: block; height: auto;">
                                                        <h3><strong>Oops!</strong></h3>
                                                        <p>Session Anda Telah Habis, Silakan Login Ulang</p>
                                                    </div>');
            redirect('login');
        }
    }

    public function index()
    {
        $data['judulHalaman']   = 'Jadwal Pelajaran';
        $data['halaman']        = 'jadwal';
        $data['level']          = 'siswa';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/siswa/sidebar', $data);
        $this->load->view('backend/siswa/jadwal', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function delete()
    {
        $this->db->where('class_routine_id', $this->uri->segment(4));
        $this->db->delete('jadwal');
        $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
        redirect(base_url('siswa/jadwal'), 'refresh');
    }

    public function update()
    {
        $data['class_id']     = $this->input->post('class_id');
        $data['subject_id']   = $this->input->post('subject_id');
        $data['time_start']   = $this->input->post('time_start');
        $data['time_end']     = $this->input->post('time_end');
        $data['day']          = $this->input->post('day');

        $this->db->where('class_routine_id', $this->uri->segment(4));
        $this->db->update('jadwal', $data);
        $this->session->set_flashdata('flash_message', 'data berhasil diupdate');
        redirect(base_url('siswa/jadwal'), 'refresh');
    }

    public function save()
    {
        $data['class_id']     = $this->input->post('class_id');
        $data['subject_id']   = $this->input->post('subject_id');
        $data['time_start']   = $this->input->post('time_start');
        $data['time_end']     = $this->input->post('time_end');
        $data['day']          = $this->input->post('day');

        $this->db->insert('jadwal', $data);
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('siswa/jadwal'), 'refresh');
    }
}
