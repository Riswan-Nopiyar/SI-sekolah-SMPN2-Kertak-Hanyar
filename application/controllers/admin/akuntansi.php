<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akuntansi extends CI_Controller
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

    public function index($param = '')
    {
    }

    public function income()
    {
        $data['judulHalaman']   = 'Pendapatan';
        $data['halaman']        = 'income';
        $data['level']          = 'admin';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/pendapatan', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function beban()
    {
        $data['judulHalaman']   = 'Daftar Pengeluaran';
        $data['halaman']        = 'expense';
        $data['level']          = 'admin';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/beban', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function simpan_beban()
    {
        $data['expense_category_id'] =   $this->input->post('expense_category_id');
        $data['description']         =   $this->input->post('description');
        $data['payment_type']        =   'expense';
        $data['method']              =   $this->input->post('method');
        $data['amount']              =   $this->input->post('amount');
        $data['timestamp']           =   strtotime($this->input->post('timestamp'));

        $this->db->insert('spp_metode_pembayaran', $data);
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('admin/akuntansi/beban'), 'refresh');
    }

    public function update_beban($param2 = '')
    {
        $data['expense_category_id'] =   $this->input->post('expense_category_id');
        $data['description']         =   $this->input->post('description');
        $data['payment_type']        =   'expense';
        $data['method']              =   $this->input->post('method');
        $data['amount']              =   $this->input->post('amount');
        $data['timestamp']           =   strtotime($this->input->post('timestamp'));

        $this->db->where('payment_id', $param2);
        $this->db->update('spp_metode_pembayaran', $data);
        $this->session->set_flashdata('flash_message', 'data berhasil diupdate');
        redirect(base_url('admin/akuntansi/beban'), 'refresh');
    }

    public function hapus_beban($param = '')
    {
        $this->db->where('payment_id', $param);
        $this->db->delete('spp_metode_pembayaran');
        $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
        redirect(base_url('admin/akuntansi/beban'), 'refresh');
    }

    public function kategori_beban()
    {
        $data['judulHalaman']   = 'Kategori Beban';
        $data['halaman']        = 'expense_category';
        $data['level']          = 'admin';
        $data['setting']        = $this->db->get('setting')->result();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/beban_kategori', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function simpan_kategori()
    {
        $data['name']   =   $this->input->post('name');
        $this->db->insert('kategori_beban', $data);
        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('admin/akuntansi/kategori_beban'));
    }

    public function update_kategori($param = '')
    {
        $data['name']   =   $this->input->post('name');

        $this->db->where(array('expense_category_id' => $param));
        $this->db->update('kategori_beban', $data);

        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('admin/akuntansi/kategori_beban'));
    }

    public function delete_kategori($param = '')
    {
        $this->db->where(array('expense_category_id' => $param));
        $this->db->delete('kategori_beban');
        $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
        redirect(base_url('admin/akuntansi/kategori_beban'));
    }
}
