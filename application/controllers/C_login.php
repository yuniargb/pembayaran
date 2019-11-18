<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class C_login extends CI_Controller
{
    public $title = 'Login';
    public $table = 'tbl_pegawai';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Template');
        $this->load->model('M_global', 'global');
    }

    public function index()
    {
        $this->load->view('login/login');
    }

    public function auth()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $auth = $this->global->_auth($username, md5($password));
        if ($auth->num_rows() > 0) {
            $data = $auth->row();
            $this->session->set_userdata('masuk', TRUE);
            $this->session->set_userdata('email', $data->email);
            $this->session->set_userdata('nama', $data->nmLengkap);
            $this->session->set_userdata('username', $data->username);
            $this->session->set_userdata('id', $data->idPegawai);
            redirect('mahasiswa');
        } else {
            $this->session->set_flashdata('gagal', 'Anda gagal login, Username atau password salah!');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
