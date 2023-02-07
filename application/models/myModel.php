<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MyModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function clear_cache()
    {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function cekLogin($user, $password)
    {
        $log = $this->db->query("select * FROM admin WHERE email='$user' AND password='$password'");
        if ($log->num_rows() > 0) {
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('admin_id', $log->row()->admin_id);
            $this->session->set_userdata('login_user_id', $log->row()->admin_id);
            $this->session->set_userdata('name', $log->row()->name);
            $this->session->set_userdata('login_type', 'admin');
            return $log->row();
        } else {
            $log = $this->db->query("select * FROM guru WHERE email='$user' AND password='$password'");
            if ($log->num_rows() > 0) {
                $this->session->set_userdata('teacher_login', '1');
                $this->session->set_userdata('teacher_id', $log->row()->teacher_id);
                $this->session->set_userdata('login_user_id', $log->row()->teacher_id);
                $this->session->set_userdata('name', $log->row()->name);
                $this->session->set_userdata('login_type', 'guru');
                return $log->row();
            } else {
                $log = $this->db->query("select * FROM wali WHERE email='$user' AND password='$password'");
                if ($log->num_rows() > 0) {
                    $this->session->set_userdata('parent_login', '1');
                    $this->session->set_userdata('parent_id', $log->row()->parent_id);
                    $this->session->set_userdata('login_user_id', $log->row()->parent_id);
                    $this->session->set_userdata('name', $log->row()->name);
                    $this->session->set_userdata('login_type', 'wali');
                    return $log->row();
                } else {
                    $log = $this->db->query("select * FROM siswa WHERE email='$user' AND password='$password'");
                    $this->session->set_userdata('student_login', '1');
                    $this->session->set_userdata('student_id', $log->row()->student_id);
                    $this->session->set_userdata('login_user_id', $log->row()->student_id);
                    $this->session->set_userdata('name', $log->row()->name);
                    $this->session->set_userdata('login_type', 'siswa');
                    if ($log->num_rows() > 0) {
                        return $log->row();
                    } else {
                        return FALSE;
                    }
                }
            }
        }
    }

    function get_image_url($type = '', $id = '')
    {
        if (file_exists('assets/images/' . $type . '/' . $id . '.jpg'))
            $image_url = base_url() . 'assets/images/' . $type . '/' . $id . '.jpg';
        else
            $image_url = base_url() . 'assets/images/user.jpg';

        return $image_url;
    }

    function account_opening_email($account_type = '', $email = '')
    {
        $system_name    =    $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;

        $email_msg      =    "Welcome to " . $system_name . "<br />";
        $email_msg     .=    "Your account type : " . $account_type . "<br />";
        $email_msg     .=    "Your login password : " . $this->db->get_where($account_type, array('email' => $email))->row()->password . "<br />";
        $email_msg     .=    "Login Here : " . base_url() . "<br />";

        $email_sub      =    "Account opening email";
        $email_to       =    $email;

        $this->do_email($email_msg, $email_sub, $email_to);
    }

    function do_email($msg = NULL, $sub = NULL, $to = NULL, $from = NULL)
    {

        $config = array();
        $config['useragent']    = "CodeIgniter";
        $config['mailpath']     = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']     = "smtp";
        $config['smtp_host']    = "localhost";
        $config['smtp_port']    = "25";
        $config['mailtype']     = 'html';
        $config['charset']      = 'utf-8';
        $config['newline']      = "\r\n";
        $config['wordwrap']     = TRUE;

        $this->load->library('email');
        $this->email->initialize($config);

        $system_name    =    $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
        if ($from == NULL)
            $from        =    $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;

        $this->email->from($from, $system_name);
        $this->email->from($from, $system_name);
        $this->email->to($to);
        $this->email->subject($sub);

        $msg    =    $msg . "<br /><br /><br /><br /><br /><br /><br /><hr /><center><a href=\"http://codecanyon.net/item/ekattor-school-management-system-pro/6087521?ref=joyontaroy\">&copy; 2013 Ekattor School Management System Pro</a></center>";
        $this->email->message($msg);
        $this->email->send();
    }

    public function mata_pelajaran($id)
    {
        $pelajaran = $this->db->get_where('pelajaran', array('subject_id' => $id))->row();
        return $pelajaran->name;
    }

    public function get_nama($table, $id)
    {
        $cari = $this->db->get_where($table, $id)->row();
        return $cari->name;
    }

    function get_grade($mark_obtained)
    {
        $query = $this->db->get('kategori_nilai');
        $grades = $query->result_array();
        foreach ($grades as $row) {
            if ($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto'])
                return $row;
        }
    }

    function count_unread_message_of_thread($message_thread_code)
    {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == '0')
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }

    function mark_thread_messages_read($message_thread_code)
    {
        // mark read only the oponnent messages of this thread, not currently logged in user's sent messages
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));
    }
}
