<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class C_spp extends CI_Controller
{
    public $title = 'SPP';
    public $table = 'spp';

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
        $data['data'] = $this->global->getAll($this->table)->result();
        $data['mahasiswa'] = $this->global->getAll('tbl_mahasiswa')->result();
        $data['goto'] = 'tambahmahasiswa';
        $this->load->view('template/head', $data);
        $this->load->view('content/spp', $data);
        $this->load->view('template/footer', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required');

        $this->form_validation->set_message('required', '%s harus diisi!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
            $this->index();
        } else {
            $record = array(
                "nik" => $this->input->post('nik'),
                "tanggalBayar" => $this->input->post('tgl'),
                "totalBayar" => $this->input->post('total')
            );
            $this->global->insert($this->table, $record);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
            redirect('spp');
        }
    }
    public function update()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('tgl', 'Tangmgal', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required');

        $this->form_validation->set_message('required', '%s harus diisi!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data gagal diubah!');
            $this->index();
        } else {
            $record = array(
                "nik" => $this->input->post('nik'),
                "tanggalBayar" => $this->input->post('tgl'),
                "totalBayar" => $this->input->post('total')
            );
            $where = array(
                "idSpp" => $this->input->post('id'),
            );
            $act = $this->global->update($this->table, $record, $where);
            if ($act) {
                $this->session->set_flashdata('sukses', 'Data berhasil diubah!');
            } else {
                $this->session->set_flashdata('gagal', 'Data gagal diubah!');
            }
            redirect('spp');
        }
    }
    public function delete($id)
    {
        $where = array(
            "idSpp" => $id,
        );
        $act = $this->global->delete($this->table, $where);
        if ($act) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus!');
        }

        redirect('spp');
    }
}
