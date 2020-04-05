<?php
class Bahan extends CI_controller
{
    public $model = null;
    public function __construct()
    {
        parent::__construct();
        //memuat model
        $this->load->model('bahan_model');
        $this->model = $this->bahan_model;
        //memuat library database
        $this->load->database();
    }

    public function index()
    {
        $this->read();
    }

    public function layout()
    {
        // Header
        $data['title'] = "Kinicheese Tea - Bahan Baku";
        $data['breadcrumbs_title'] = "Bahan Baku";
        $data['head'] = $this->load->view('layout/head', $data, TRUE);
        $data['header'] = $this->load->view('layout/header', NULL, TRUE);
        $data['sidebar_left'] = $this->load->view('layout/sidebar_left', NULL, TRUE);


        // Footer
        $data['sidebar_right'] = $this->load->view('layout/sidebar_right', NULL, TRUE);
        $data['footer'] = $this->load->view('layout/footer', NULL, TRUE);
        $data['scripts'] = $this->load->view('layout/scripts', NULL, TRUE);

        return $data;
    }

    public function read()
    {
        $data = $this->layout();
        $data['sub_breadcrumbs_title'] = "Lihat Bahan Baku";
        $data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);
        $data['rows'] = $this->model->read();
        $this->load->view('bahan_read_view', $data);
    }

    public function insert()
    {
        $this->load->model('bahan_model');
        $this->bahan_model->insert();
    }

    public function storecreate()
    {
        $data = [];
        $rules = [

            array(
                'field'
                => 'id_bahan_baku',
                'label' => 'ID Bahan Baku',
                'rules' => 'required',
                'errors' => array(
                    'required'              => '%s Wajib diisi !',
                    'alpha_numeric_spaces'  => '%s hanya angka 8-9 atau huruf A-Z'
                )
            ),
            array(
                'field' => 'nama_bahan_baku',
                'label' => 'Nama Bahan Baku',
                'rules' => 'required',
                'errors' => array(
                    'required'              => '%s Wajib diisi !',
                    'alpha'  => '%s hanya huruf A-Z'
                )
            ),
            array(
                'field' => 'satuan',
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => array(
                    'required'              => '%s Wajib diisi !',
                    'numeric'  => '%s hanya angka'
                )
            ),
            array(
                'field' => 'harga_satuan',
                'label' => 'Harga Satuan',
                'rules' => 'required',
                'errors' => array(
                    'required'              => '%s Wajib diisi bro !',
                    'numeric'  => '%s hanya angka'
                )
            ),

        ];

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
            $data = $this->layout();
            $data['sub_breadcrumbs_title'] = "Tambah Bahan Baku";
            $data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

            $last_id = $this->model->get_last_row()[0]->id_bahan_baku;
            $id_number = (int) substr($last_id, 1, 3);
            $id_number++;
            $id_number = (string) $id_number;
            if (strlen($id_number) == 1)
                $id_string = 'B00' . $id_number;
            else if (strlen($id_number) == 2)
                $id_string = 'B0' . $id_number;
            else
                $id_string = 'B' .  $id_number;

            $data['model'] = $this->model;
            $data['id_string'] = $id_string;
            $this->load->view('bahan_create_view', $data);
        } else {
            $this->insert();
            redirect(site_url('bahan'));
        }
    }

    public function storeupdate()
    {
        $rules =
            [
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
                    'field' => 'nama_bahan_baku',
                    'label' => 'nama_bahan_baku',
                    'rules' => 'required|alpha',
                    'errors' => [
                        'required' => "%s harus diisi",
                        'alpha' => "%s hanya huruf a-z"
                    ]
                ],


                [
                    'field' => 'satuan',
                    'label' => 'satuan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => "%s harus diisi",
                    ]
                ],
                [
                    'field' => 'harga_satuan',
                    'label' => 'harga_satuan',
                    'rules' => 'required|alpha_numeric',
                    'errors' => [
                        'required' => "%s harus diisi",
                        'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
                    ]
                ]


            ];
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->layout();
            $data['sub_breadcrumbs_title'] = "Ubah Bahan Baku";
            $data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

            $this->load->view('bahan_create_view', $data);
        } else {

            $this->load->model('bahan_model');
            $this->minuman_model->update();
            redirect('bahan');
        }
    }

    public function create()
    {
        //belum implementasi
        if (isset($_POST['btnsubmit'])) {
            $this->model->id_bahan_baku = $_POST['id_bahan_baku'];
            $this->model->nama_bahan_baku = $_POST['nama_bahan_baku'];
            $this->model->satuan = $_POST['satuan'];
            $this->model->harga_satuan = $_POST['harga_satuan'];
            $this->model->insert();

            redirect('bahan');
        } else {
            $data = $this->layout();
            $data['sub_breadcrumbs_title'] = "Tambah Bahan Baku";
            $data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

            $last_id = $this->model->get_last_row();

            if ($last_id->num_rows() == 0)
                $last_id = 'B001';
            else
                $last_id = $last_id->result()[0]->id_bahan_baku;

            $id_number = (int) substr($last_id, 1, 3);
            $id_number++;
            $id_number = (string) $id_number;
            if (strlen($id_number) == 1)
                $id_string = 'B00' . $id_number;
            else if (strlen($id_number) == 2)
                $id_string = 'B0' . $id_number;
            else
                $id_string = 'B' .  $id_number;

            $data['model'] = $this->model;
            $data['id_string'] = $id_string;
            $this->load->view('bahan_create_view', $data);
        }
    }

    public function update($id)
    {
        //belum implementasi
        if (isset($_POST['btnsubmit'])) {
            $this->model->id_bahan_baku = $_POST['id_bahan_baku'];
            $this->model->nama_bahan_baku = $_POST['nama_bahan_baku'];
            $this->model->satuan = $_POST['satuan'];
            $this->model->harga_satuan = $_POST['harga_satuan'];

            $this->model->update();
            redirect('bahan');
        } else {
            $query = $this->db->query("SELECT * FROM bahan_baku WHERE id_bahan_baku='$id'");
            if ($query->num_rows() > 0) {

                $row = $this->layout();

                $row['row'] = $query->row();

                $row['sub_breadcrumbs_title'] = "Ubah Bahan Baku";
                $row['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $row, TRUE);
                $this->load->view('bahan_update_view', $row);
            } else {
                echo "<script>alert('TIDAK KETEMU')</script>";
                $this->load->view('bahan_update_view', ['model' => $this->model]);
            }
        }
    }

    public function delete($id)
    {
        //menentukan kode yang akan di hapus
        $this->model->id = $id;
        //menghapus baris data didalam tabel barang
        $this->model->delete();
        //mengarahkan kembali kehalaman utama/index
        redirect('bahan');
    }
}
