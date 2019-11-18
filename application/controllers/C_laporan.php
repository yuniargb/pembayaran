<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class C_laporan extends CI_Controller
{
    public $title = 'Laporan';
    public $table = 'spp s';
    public $table2 = 'tbl_mahasiswa a';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_global', 'global');
        // date_default_timezone_set("Asia/Jakarta");
        if (!$this->session->userdata('masuk')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['data'] = $this->global->laporan()->result();
        $this->load->view('template/head', $data);
        $this->load->view('content/laporan', $data);
        $this->load->view('template/footer', $data);
    }

    public function cetak()
    {
        $data['data'] = $this->global->laporan()->result();
        $this->load->view('content/cetak', $data);
    }
}
