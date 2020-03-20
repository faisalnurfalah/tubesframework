<?php

class Pembelian extends CI_controller
{
	public $model = null;
	function __construct()
	{
		parent::__construct();

		$this->load->model('pembelian_model');
		$this->load->model('bahan_model');
		$this->load->model('vendor_model');
		$this->load->model('pegawai_model');
		$this->model = $this->pembelian_model;

		$this->load->database();
	}

	function index()
	{
		$data = [];
		$this->read();
	}

	function create()
	{
		if (isset($_POST['btnsubmit'])) {

			$this->load->view('master/header');

			$this->model->insert();
			$this->load->view('master/footer');
			redirect('minuman');
		} else {
			$this->load->view('master/header');

			$last_id = $this->model->db->query("SELECT * FROM pembelian ORDER BY id_pembelian DESC LIMIT 1")->result()[0]->id_pembelian;
			$id_number = (int) substr($last_id, 1, 3);
			$id_number++;
			$id_number = (string) $id_number;
			if (strlen($id_number) == 1)
				$id_string = 'X00' . $id_number;
			else if (strlen($id_number) == 2)
				$id_string = 'X0' . $id_number;
			else
				$id_string = 'X' .  $id_number;

			$bahan_baku = $this->bahan_model->read();
			$vendor = $this->vendor_model->read();
			$pegawai = $this->pegawai_model->read();

			$this->load->view('pembelian_create_view', ['model' => $this->model, 'vendor' => $vendor, 'pegawai' => $pegawai, 'bahan_baku' => $bahan_baku, 'id_string' => $id_string]);
			$this->load->view('master/footer');
		}
	}

<<<<<<< HEAD
<<<<<<< HEAD
	function read()
	{
		$this->load->view('master/header');
		$rows = $this->model->read();
		$this->load->view('pembelian_read_view', ['rows' => $rows]);
		$this->load->view('master/footer');
	}
=======
=======
>>>>>>> parent of 62618e0... modified page bahan and sidebar left
public function create(){
if(isset($_POST['btnsubmit'])){

$this->load->view('master/header');
	
$this->model->insert();
$this->load->view('master/footer');
redirect('pembelian');
}else{
	$this->load->view('master/header');
	
	$last_id = $this->model->db->query("SELECT * FROM pembelian ORDER BY id_pembelian DESC LIMIT 1")->result()[0]->id_pembelian;
	$id_number = (int) substr($last_id, 1,3);
	$id_number++;
	$id_number = (string) $id_number;
	if(strlen($id_number) == 1)
		$id_string = 'X00' . $id_number;
	else if(strlen($id_number) == 2)
		$id_string = 'X0' . $id_number;
	else
		$id_string = 'X' .  $id_number;

	$bahan_baku = $this->bahan_model->read();
	$vendor = $this->vendor_model->read();
	$pegawai = $this->pegawai_model->read();

	$this->load->view('pembelian_create_view',['model'=>$this->model, 'vendor' =>$vendor, 'pegawai' =>$pegawai, 'bahan_baku' =>$bahan_baku, 'id_string' => $id_string]);
$this->load->view('master/footer');
}
}
public function read(){
    $this->load->view('master/header');
$rows=$this->model->read();
$this->load->view('pembelian_read_view',['rows'=>$rows]);
$this->load->view('master/footer');
}
public function update($id){
	$data=[];
    
if(isset($_POST['btnsubmit'])){
$this->load->view('master/header');
$this->model->id_pembelian=$_POST['id_pembelian'];
$this->model->id_bahan_baku=$_POST['id_bahan_baku'];
$this->model->jumlah=$_POST['jumlah'];
$this->model->id_pegawai=$_POST['id_pegawai'];
$this->model->kd_vendor=$_POST['kd_vendor'];

$this->model->update();
redirect('pembelian');
$this->load->view('master/footer');
}else{
    $this->load->view('master/header');
$query=$this->db->query("SELECT * FROM pembelian where id_pembelian='$id'");
$detail_pembelian = $this->db->get_where('detail_pembelian', ['id_pembelian' => $id])->result();
if($query->num_rows()> 0) {
	$row=$query->row();

$this->model->id_pembelian=$row->id_pembelian;
$this->model->id_pegawai=$row->id_pegawai;
$this->model->kd_vendor=$row->kd_vendor;

$bahan_baku = $this->bahan_model->read();
	$vendor = $this->vendor_model->read();
	$pegawai = $this->pegawai_model->read();

$this->load->view('pembelian_update_view',['model'=>$row, 'bahan_baku'=> $bahan_baku,'detail_pembelian' => $detail_pembelian, 'pegawai' => $pegawai, 'vendor' => $vendor]);
$this->load->view('master/footer');
}
	else {
		echo "<script>alert('TIDAK KETEMU')</script>";
            $this->load->view('pembelian_update_view',['model'=>$this->model]);
	}$this->load->view('master/footer'); 
}
<<<<<<< HEAD
>>>>>>> parent of 62618e0... modified page bahan and sidebar left
=======
>>>>>>> parent of 62618e0... modified page bahan and sidebar left

	function update($id)
	{
		$data = [];

		if (isset($_POST['btnsubmit'])) {
			$this->load->view('master/header');
			$this->model->id_pembelian = $_POST['id_pembelian'];
			$this->model->id_bahan_baku = $_POST['id_bahan_baku'];
			$this->model->jumlah = $_POST['jumlah'];
			$this->model->id_pegawai = $_POST['id_pegawai'];
			$this->model->kd_vendor = $_POST['kd_vendor'];

			$this->model->update();
			redirect('pembelian');
			$this->load->view('master/footer');
		} else {
			$this->load->view('master/header');
			$query = $this->db->query("SELECT * FROM pembelian where id_pembelian='$id'");
			if ($query->num_rows() > 0) {
				$row = $query->row();

				$this->model->id_pembelian = $row->id_pembelian;
				$this->model->id_bahan_baku = $row->id_bahan_baku;
				$this->model->jumlah = $row->jumlah;
				$this->model->id_pegawai = $row->id_pegawai;
				$this->model->kd_vendor = $row->kd_vendor;

				$bahan_baku = $this->bahan_model->read();
				$vendor = $this->vendor_model->read();
				$pegawai = $this->pegawai_model->read();

				$this->load->view('pembelian_update_view', ['model' => $row, 'bahan_baku' => $bahan_baku, 'pegawai' => $pegawai, 'vendor' => $vendor]);
				$this->load->view('master/footer');
			} else {
				echo "<script>alert('TIDAK KETEMU')</script>";
				$this->load->view('pembelian_update_view', ['model' => $this->model]);
			}
			$this->load->view('master/footer');
		}
	}

	public function delete($id)
	{
		$this->model->id = $id;
		$this->model->delete();
		redirect('pembelian');
	}
	public function storecreate(){
	$rules=
	[	
			[
				'field'=>'id_pembelian',
				'label'=>'id_pembelian',
				'rules'=>'required|alpha_numeric',
				'errors'=>[
                'required'=>"%s harus diisi",
                'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
                ]
			],

			
			[
				'field'=>'id_bahan_baku[]',
				'label'=>'id_bahan_baku',
				'rules'=>'required|alpha_numeric',
				'errors'=>[
                'required'=>"%s harus diisi",
                'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
				]
			],

	public function insert()
	{
		$this->model->insert();
	}

	public function storecreate()
	{
		$rules =
			[
				'field'=>'jumlah[]',
				'label'=>'jumlah',
				'rules'=>'required',
				'errors'=>[
                'required'=>"%s harus diisi",
                ]
			],
			[
				'field'=>'id_pegawai',
				'label'=>'id_pegawai',
				'rules'=>'required|alpha_numeric',
				'errors'=>[
                'required'=>"%s harus diisi",
                'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
            
                ]
			],
			[
				'field'=>'kd_vendor',
				'label'=>'kd_vendor',
				'rules'=>'required|alpha_numeric',
				'errors'=>[
                'required'=>"%s harus diisi",
                'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
            
                ]
			]


			];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == False) {

			redirect('pembelian/create');
		} else {

			$this->insert();
			foreach($_POST['id_bahan_baku'] as $k => $v) {
				if($v=="")
					break;
				$this->model->increase($v, $_POST['jumlah'][$k]);
			}
       	 redirect('pembelian');


}}

public function storeupdate(){
	$rules=
	[	
		[
			'field'=>'id_pembelian',
			'label'=>'id_pembelian',
			'rules'=>'required|alpha_numeric',
			'errors'=>[
			'required'=>"%s harus diisi",
			'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
			]
		],

		
		[
			'field'=>'id_bahan_baku',
			'label'=>'id_bahan_baku',
			'rules'=>'required|alpha_numeric',
			'errors'=>[
			'required'=>"%s harus diisi",
			'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
			]
		],


		[
			'field'=>'jumlah',
			'label'=>'jumlah',
			'rules'=>'required',
			'errors'=>[
			'required'=>"%s harus diisi",
			]
		],
		[
			'field'=>'id_pegawai',
			'label'=>'id_pegawai',
			'rules'=>'required|alpha_numeric',
			'errors'=>[
			'required'=>"%s harus diisi",
			'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
		
			]
		],
		[
			'field'=>'kd_vendor',
			'label'=>'kd_vendor',
			'rules'=>'required|alpha_numeric',
			'errors'=>[
			'required'=>"%s harus diisi",
			'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
		
			]
		]


];
$this->form_validation->set_rules($rules);

if($this->form_validation->run() == False){
	
$data=[];
	$this->load->view('master/header',$data);
	$this->load->view('pembelian_create_view',$data);
	$this->load->view('master/footer',$data);
	
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
