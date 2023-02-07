<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelajaran extends CI_Controller
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

    public function index($param = '')
    {
    }

    public function bahan()
    {
        $data['judulHalaman']   = 'Daftar Bahan Pelajaran ';
        $data['halaman']        = 'bahan_pelajaran';
        $data['level']          = 'guru';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/guru/sidebar', $data);
        $this->load->view('backend/guru/pelajaran_bahan', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function bahan_simpan()
    {
        $data['timestamp']      = strtotime($this->input->post('timestamp'));
        $data['title']          = $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['file_name']      = $_FILES["file_name"]["name"];
        $data['file_type']      = $this->input->post('file_type');
        $data['class_id']       = $this->input->post('class_id');

        $this->db->insert('bahan_pelajaran', $data);

        /* $document_id            = $this->db->insert_id(); */
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "assets/documents/" . $_FILES["file_name"]["name"]);
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('guru/pelajaran/bahan'), 'refresh');
    }

    public function bahan_update($param = '')
    {
        $data['timestamp']      = strtotime($this->input->post('timestamp'));
        $data['title']          = $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['class_id']       = $this->input->post('class_id');

        $this->db->update('bahan_pelajaran', $data, array('document_id' => $param));
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('guru/pelajaran/bahan'), 'refresh');
    }

    public function bahan_delete($param = '')
    {
        $this->db->where(array('document_id' => $param));
        $this->db->delete('bahan_pelajaran');
        $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
        redirect(base_url('guru/pelajaran/bahan'), 'refresh');
    }

    public function kelas($param = '')
    {
        $class                  = $this->db->query("select * from kelas where class_id='$param'")->result();
        foreach ($class as $dataKelas) {
            $kelas              = $dataKelas->name;
            $data['kelas']      = $dataKelas->class_id;
        }

        $data['judulHalaman']   = 'Daftar Mata Pelajaran Kelas ' . strtoupper($kelas);
        $data['halaman']        = 'pelajaran';
        $data['level']          = 'guru';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/guru/sidebar', $data);
        $this->load->view('backend/guru/pelajaran', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function delete()
    {
        $where = array(
            'class_id'   => $this->uri->segment(4),
            'subject_id' => $this->uri->segment(5),
        );

        $this->db->where($where);
        $this->db->delete('pelajaran');
        $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
        redirect(base_url('guru/pelajaran/kelas/' . $this->uri->segment(4)), 'refresh');
    }

    public function update()
    {
        $data['name']         = $this->input->post('name');
        $data['teacher_id']   = $this->input->post('teacher_id');

        $where = array(
            'class_id'   => $this->uri->segment(4),
            'subject_id' => $this->uri->segment(5),
        );

        $this->db->update('pelajaran', $data, $where);
        $this->session->set_flashdata('flash_message', 'data berhasil diupdate');
        redirect(base_url('guru/pelajaran/kelas/' . $this->uri->segment(4)), 'refresh');
    }

    public function save()
    {
        $data['name']         = $this->input->post('name');
        $data['class_id']     = $this->uri->segment(4);
        $data['teacher_id']   = $this->input->post('teacher_id');

        $this->db->insert('pelajaran', $data);
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('guru/pelajaran/kelas/' . $this->uri->segment(4)), 'refresh');
    }
}
