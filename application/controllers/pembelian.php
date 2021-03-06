<?php

class Pembelian extends CI_controller
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();

		$this->load->model('pembelian_model');
		$this->load->model('bahan_model');
		$this->load->model('vendor_model');
		$this->load->model('pegawai_model');
		$this->model = $this->pembelian_model;

		$this->load->database();
	}

	public function index()
	{
		$data = [];
		$this->read();
	}

	public function layout()
	{
		// Header
		$data['title'] = "Kinicheese Tea - Pembelian";
		$data['breadcrumbs_title'] = "Pembelian";
		$data['head'] = $this->load->view('layout/head', $data, TRUE);
		$data['header'] = $this->load->view('layout/header', NULL, TRUE);
		$data['sidebar_left'] = $this->load->view('layout/sidebar_left', NULL, TRUE);
		$data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

		// Footer
		$data['sidebar_right'] = $this->load->view('layout/sidebar_right', NULL, TRUE);
		$data['footer'] = $this->load->view('layout/footer', NULL, TRUE);
		$data['scripts'] = $this->load->view('layout/scripts', NULL, TRUE);

		return $data;
	}

	public function create()
	{
		if (isset($_POST['btnsubmit'])) {
			$this->model->id_pembelian = $_POST['id_pembelian'];
			$this->model->id_bahan_baku = $_POST['id_bahan_baku'];
			$this->model->jumlah = $_POST['jumlah'];
			$this->model->id_pegawai = $_POST['id_pegawai'];
			$this->model->kd_vendor = $_POST['kd_vendor'];
			$this->model->insert();

			$this->model->insert();
			redirect('pembelian');
		} else {
			$data = $this->layout();
			$data['sub_breadcrumbs_title'] = "Tambah Pegawai";
			$data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

			$last_id = $this->model->db->query("SELECT * FROM pembelian ORDER BY id_pembelian DESC LIMIT 1");

			if ($last_id->num_rows() == 0)
				$last_id = 'X001';
			else
				$last_id = $last_id->result()[0]->id_pembelian;

			$id_number = (int) substr($last_id, 1, 3);
			$id_number++;
			$id_number = (string) $id_number;

			if (strlen($id_number) == 1)
				$id_string = 'X00' . $id_number;
			else if (strlen($id_number) == 2)
				$id_string = 'X0' . $id_number;
			else
				$id_string = 'X' .  $id_number;

			$data['bahan_baku'] = $this->bahan_model->read();
			$data['vendor'] = $this->vendor_model->read();
			$data['pegawai'] = $this->pegawai_model->read();
			$data['model'] = $this->model;
			$data['id_string'] = $id_string;

			$this->load->view('pembelian_create_view', $data);
		}
	}

	public function read()
	{
		$data = $this->layout();
		$data['sub_breadcrumbs_title'] = "Lihat Pegawai";
		$data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

		$data['rows'] = $this->model->read();
		$this->load->view('pembelian_read_view', $data);
	}

	public function update($id)
	{
		if (isset($_POST['btnsubmit'])) {
			$this->model->id_pembelian = $_POST['id_pembelian'];
			$this->model->id_bahan_baku = $_POST['id_bahan_baku'];
			$this->model->jumlah = $_POST['jumlah'];
			$this->model->id_pegawai = $_POST['id_pegawai'];
			$this->model->kd_vendor = $_POST['kd_vendor'];

			$this->model->update();
			redirect('pembelian');
		} else {
			$query = $this->db->query("SELECT * FROM pembelian where id_pembelian='$id'");
			$detail_pembelian = $this->db->get_where('detail_pembelian', ['id_pembelian' => $id])->result();
			if ($query->num_rows() > 0) {
				$row = $this->layout();
				$row['sub_breadcrumbs_title'] = "Ubah Pegawai";
				$row['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $row, TRUE);

				$row['row'] = $query->row();

				// $this->model->id_pembelian = $row->id_pembelian;
				// $this->model->id_pegawai = $row->id_pegawai;
				// $this->model->kd_vendor = $row->kd_vendor;

				$row['bahan_baku'] = $this->bahan_model->read();
				$row['vendor'] = $this->vendor_model->read();
				$row['pegawai'] = $this->pegawai_model->read();
				$row['detail_pembelian'] = $detail_pembelian;

				$this->load->view('pembelian_update_view', $row);
			} else {
				echo "<script>alert('TIDAK KETEMU')</script>";
				$this->load->view('pembelian_update_view', ['model' => $this->model]);
			}
		}
	}

	public function delete($id)
	{
		$this->model->id = $id;
		$this->model->delete();
		redirect('pembelian');
	}

	public function insert()
	{
		$this->model->insert();
	}

	public function storecreate()
	{
		$rules =
			[
				'field' => 'jumlah[]',
				'label' => 'jumlah',
				'rules' => 'required',
				'errors' => [
					'required' => "%s harus diisi",

				],
				[
					'field' => 'id_pegawai',
					'label' => 'id_pegawai',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",

					]
				],
				[
					'field' => 'kd_vendor',
					'label' => 'kd_vendor',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",

					]
				]


			];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == False) {

			redirect('pembelian/create');
		} else {

			$this->model->insert();
			foreach ($_POST['id_bahan_baku'] as $k => $v) {
				if ($v == "")
					break;
				$this->model->increase($v, $_POST['jumlah'][$k]);
			}
			redirect('pembelian');
		}
	}

	public function storeupdate()
	{
		$rules =
			[
				[
					'field' => 'id_pembelian',
					'label' => 'id_pembelian',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
					]
				],


				[
					'field' => 'id_bahan_baku',
					'label' => 'id_bahan_baku',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
					]
				],


				[
					'field' => 'jumlah',
					'label' => 'jumlah',
					'rules' => 'required',
					'errors' => [
						'required' => "%s harus diisi",
					]
				],
				[
					'field' => 'id_pegawai',
					'label' => 'id_pegawai',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",

					]
				],
				[
					'field' => 'kd_vendor',
					'label' => 'kd_vendor',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",

					]
				]


			];
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == False) {

			$data = [];
			$this->load->view('master/header', $data);
			$this->load->view('pembelian_create_view', $data);
			$this->load->view('master/footer', $data);
		} else {

			$this->load->model('pembelian_model');
			$this->pembelian_model->update();
			redirect('pembelian');
		}
	}
}
