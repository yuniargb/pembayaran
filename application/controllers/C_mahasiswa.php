<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class C_mahasiswa extends CI_Controller
{
	public $title = 'Mahasiswa';
	public $table = 'tbl_mahasiswa';

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
		$data['goTo'] = 'tambahmahasiswa';
		$this->load->view('template/head', $data);
		$this->load->view('content/mahasiswa', $data);
		$this->load->view('template/footer', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[tbl_mahasiswa.nik]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		$this->form_validation->set_message('required', '%s harus diisi!');
		$this->form_validation->set_message('is_unique', '%s sudah ada!');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
			$this->index();
		} else {
			$record = array(
				"nik" => $this->input->post('nik'),
				"nama" => $this->input->post('nama'),
				"alamat" => $this->input->post('alamat')
			);
			$this->global->insert($this->table, $record);
			$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
			redirect('mahasiswa');
		}
	}
	public function update()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_message('required', '%s harus diisi!');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('gagal', 'Data gagal diubah!');
			$this->index();
		} else {
			$record = array(
				"nik" => $this->input->post('nik'),
				"nama" => $this->input->post('nama'),
				"alamat" => $this->input->post('alamat')
			);
			$where = array(
				"nik" => $this->input->post('nik'),
			);
			$act = $this->global->update($this->table, $record, $where);
			if ($act) {
				$this->session->set_flashdata('sukses', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('gagal', 'Data gagal diubah!');
			}
			redirect('mahasiswa');
		}
	}
	public function delete($id)
	{
		$where = array(
			"nik" => $id,
		);
		$act = $this->global->delete($this->table, $where);
		if ($act) {
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('gagal', 'Data gagal dihapus!');
		}

		redirect('mahasiswa');
	}
}
