<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/login');
        } else {
            $check    = $this->myModel->cekLogin($this->input->post('email'), $this->input->post('password'));

            if ($check != FALSE) {
                if ($this->session->userdata('login_type') == 'admin') {
                    redirect('admin/dashboard');
                } elseif ($this->session->userdata('login_type') == 'guru') {
                    redirect('guru/dashboard');
                } elseif ($this->session->userdata('login_type') == 'wali') {
                    redirect('wali/dashboard');
                } elseif ($this->session->userdata('login_type') == 'siswa') {
                    redirect('siswa/dashboard');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="form-login-error" style="display: block; height: auto;">
                                                            <h3>Invalid login</h3>
                                                            <p>Please enter correct email and password!</p>
                                                        </div>');
                redirect('login');
            }
        }
    }

    public function _rules()
    {
        /* $this->form_validation->set_rules('username', 'User', 'required'); */
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_message('required', '%s Tidak Boleh Kosong, harus diisi lengkap ...');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url('login'), 'refresh');
    }
}
