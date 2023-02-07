<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spp extends CI_Controller
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
        $data['judulHalaman']   = 'Kelola Pembayaran Uang SPP';
        $data['halaman']        = 'invoice';
        $data['level']          = 'admin';
        $data['setting']        = $this->db->get('setting')->result();
        $data['invoices']       = $this->db->get('spp')->result_array();

        $this->load->view('backend/temp/header', $data);
        $this->load->view('backend/admin/sidebar', $data);
        $this->load->view('backend/admin/spp', $data);
        $this->load->view('backend/temp/footer', $data);
    }

    public function buat_tagihan()
    {
        $data['student_id']         = $this->input->post('student_id');
        $data['title']              = $this->input->post('title');
        $data['description']        = $this->input->post('description');
        $data['amount']             = $this->input->post('amount');
        $data['amount_paid']        = $this->input->post('amount_paid');
        $data['due']                = $data['amount'] - $data['amount_paid'];
        $data['status']             = $this->input->post('status');
        $data['creation_timestamp'] = strtotime($this->input->post('date'));

        $this->db->insert('spp', $data);
        $invoice_id = $this->db->insert_id();

        $data2['invoice_id']        =   $invoice_id;
        $data2['student_id']        =   $this->input->post('student_id');
        $data2['title']             =   $this->input->post('title');
        $data2['description']       =   $this->input->post('description');
        $data2['payment_type']      =  'income';
        $data2['method']            =   $this->input->post('method');
        $data2['amount']            =   $this->input->post('amount_paid');
        $data2['timestamp']         =   strtotime($this->input->post('date'));

        $this->db->insert('spp_metode_pembayaran', $data2);

        $this->session->set_flashdata('flash_message', 'data nerhasil disimpan');
        redirect(base_url('admin/spp'), 'refresh');
    }

    public function update_tagihan($param1 = '')
    {
        $data['student_id']         = $this->input->post('student_id');
        $data['title']              = $this->input->post('title');
        $data['description']        = $this->input->post('description');
        $data['amount']             = $this->input->post('amount');
        /* $data['amount_paid']        = $this->input->post('amount_paid'); */
        $data['due']                = $data['amount'] - $this->input->post('amount_paid');
        $data['status']             = $this->input->post('status');
        $data['creation_timestamp'] = strtotime($this->input->post('date'));

        $this->db->where(array('invoice_id' => $param1));
        $this->db->update('spp', $data);

        $this->session->set_flashdata('flash_message', 'data berhasil disimpan');
        redirect(base_url('admin/spp'), 'refresh');
    }

    public function delete($param1 = '')
    {
        $this->db->where('invoice_id', $param1);
        $this->db->delete('spp');

        $this->db->where('invoice_id', $param1);
        $this->db->delete('spp_metode_pembayaran');
        $this->session->set_flashdata('flash_message', 'data berhasil dihapus');
        redirect(base_url('admin/spp'), 'refresh');
    }

    public function bayar($param2 = '')
    {
        $data['invoice_id']   =   $this->input->post('invoice_id');
        $data['student_id']   =   $this->input->post('student_id');
        $data['title']        =   $this->input->post('title');
        $data['description']  =   $this->input->post('description');
        $data['payment_type'] =   'income';
        $data['method']       =   $this->input->post('method');
        $data['amount']       =   $this->input->post('amount');
        $data['timestamp']    =   strtotime($this->input->post('timestamp'));
        $this->db->insert('spp_metode_pembayaran', $data);

        $data2['amount_paid']   =   $this->input->post('amount');
        $this->db->where('invoice_id', $param2);
        $this->db->set('amount_paid', 'amount_paid + ' . $data2['amount_paid'], FALSE);
        $this->db->set('due', 'due - ' . $data2['amount_paid'], FALSE);
        $this->db->update('spp');

        $this->session->set_flashdata('flash_message', 'Pembayaran Berhasil Disimpan');
        redirect(base_url('admin/spp'), 'refresh');
    }
}
