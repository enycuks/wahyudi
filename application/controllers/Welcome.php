<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Undangan_model');
	}
	public function index()
	{
		$this->load->view('login');
		// $this->load->view('template/atas');
		// $this->load->view('beranda');
		// $this->load->view('template/bawah');
	}

	public function login()
	{
		$username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
		$password = $this->input->post('password'); // Ambil isi dari inputan password pada form login dan encrypt dengan md5

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if (empty($user)) { // Jika hasilnya kosong / user tidak ditemukan
			$this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
			redirect('welcome'); // Redirect ke halaman login
		} else {
			if ($password == $user['password']) { // Jika password yang diinput sama dengan password yang didatabase
				$data = array(
					'authenticated' => true, // Buat session authenticated dengan value true
					'id' => $user['id'],
					'username' => $user['username']
				);

				$this->session->set_userdata($data); // Buat session sesuai $session
				redirect('welcome/beranda'); // Redirect ke halaman welcome
			} else {
				$this->session->set_flashdata('message', 'Usenmae & Password Tidak Sesuai'); // Buat session flashdata
				redirect('welcome'); // Redirect ke halaman login
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy(); // Hapus semua session
		redirect('welcome'); // Redirect ke halaman login
	}

	public function beranda()
	{
		$data['undangan'] = $this->Undangan_model->getAllUndangan();
		$this->form_validation->set_rules('tgl_terima', 'Tanggal Terima', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/atas');
			$this->load->view('beranda', $data);
			$this->load->view('template/bawah');
		} else {
			$upload_image = $_FILES['file']['name'];
			if ($upload_image != '') {
				$config['file_name'] = $upload_image;
				$config['upload_path']		= './assets/berkas';
				$config['allowed_types']	= 'jpg|jpeg|png|pdf';
				$config['max_size']	= '500';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('file', $new_image);
				} else {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error['error']);
					redirect('welcome/beranda');
				}
			}
			$this->Undangan_model->tambahUndangan();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('welcome/beranda');
		}
	}

	public function edit_undangan($id)
	{
		$data['undangan'] = $this->Undangan_model->getUndanganById($id);
		$this->form_validation->set_rules('tgl_terima', 'Tanggal Terima', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/atas');
			$this->load->view('edit', $data);
			$this->load->view('template/bawah');
		} else {
			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['file']['name'];

			if ($upload_image) {
				$config['upload_path']		= './assets/berkas';
				$config['allowed_types']	= 'jpg|jpeg|png|pdf';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {

					$new_image = $this->upload->data('file_name');
					$this->db->set('file', $new_image);
				} else {
					echo $this->upload->dispay_errors();
				}
			}
			$this->Undangan_model->editUndangan();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('welcome/beranda');
		}
	}

	public function download($id)
	{
		$fileinfo = $this->Undangan_model->getUndanganById($id);
		$file = $fileinfo['file'];
		force_download(FCPATH . '/assets/berkas/' . $file, NULL);
	}

	public function hapus_undangan($id)
	{
		$this->Undangan_model->hapusUndangan($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('welcome/beranda');
	}

	public function profil()
	{
		$id = $this->session->userdata('id');
		$data['user'] = $this->Undangan_model->getProfil();
		$this->load->view('template/atas');
		$this->load->view('profil', $data);
		$this->load->view('template/bawah');
	}

	public function profil_edit()
	{
		$id = $this->session->userdata('id');
		$data['user'] = $this->Undangan_model->getProfil($id);
		$this->form_validation->set_rules('username', 'Username', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/atas');
			$this->load->view('editprofil', $data);
			$this->load->view('template/bawah');
		} else {
			$this->Undangan_model->editProfil();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('welcome/profil');
		}
	}

	public function user_add()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/atas');
			$this->load->view('addprofil');
			$this->load->view('template/bawah');
		} else {
			$this->Undangan_model->addUser();
			$this->session->set_flashdata('flash', 'Ditambah');
			redirect('welcome/profil');
		}
	}

	public function bot()
	{
		$undangan = $this->Undangan_model->getAllUndangan();
		$tgl = $undangan[0]['tgl_pelaksana'];
		$sekarang = date("Y-m-d");
		if ($tgl == $sekarang) {
			// echo "sama";
			$token = "2034678400:AAHbegJHNtivzW1-ZnfLJCOZUKpUj11FJAg"; // token bot
			$data = array(
				'text' => $undangan[0]['perihal'],
				'chat_id' => '429602844,'  //contoh bot, group id -442697126
			);

			file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));
		} else {
			echo "tidak ada";
		}
	}

	public function undangan()
	{
		if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
			$filter = $_GET['filter']; // Ambil data filder yang dipilih user
			if ($filter == '1') { // Jika filter nya 1 (per tanggal)
				$tgl = $_GET['tanggal'];

				$ket = 'Data Undangan Tanggal ' . date('d-m-y', strtotime($tgl));
				$url_cetak = 'welcome/cetak?filter=1&tanggal=' . $tgl;
				$transaksi = $this->Undangan_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
			} else if ($filter == '2') { // Jika filter nya 2 (per bulan)
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				$nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

				$ket = 'Data Undangan Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
				$url_cetak = 'welcome/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
				$transaksi = $this->Undangan_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
			} else { // Jika filter nya 3 (per tahun)
				$tahun = $_GET['tahun'];

				$ket = 'Data Undangan Tahun ' . $tahun;
				$url_cetak = 'welcome/cetak?filter=3&tahun=' . $tahun;
				$transaksi = $this->Undangan_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
			}
		} else { // Jika user tidak mengklik tombol tampilkan
			$ket = 'Semua Data Undangan';
			$url_cetak = 'welcome/cetak';
			$transaksi = $this->Undangan_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
		}

		$data['ket'] = $ket;
		$data['url_cetak'] = base_url('index.php/' . $url_cetak);
		$data['transaksi'] = $transaksi;
		$data['option_tahun'] = $this->Undangan_model->option_tahun();
		$this->load->view('template/atas');
		$this->load->view('view', $data);
		$this->load->view('template/bawah');
	}

	public function cetak()
	{
		if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
			$filter = $_GET['filter']; // Ambil data filder yang dipilih user
			if ($filter == '1') { // Jika filter nya 1 (per tanggal)
				$tgl = $_GET['tanggal'];

				$ket = 'Data Undangan Tanggal ' . date('d-m-y', strtotime($tgl));
				$transaksi = $this->Undangan_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
			} else if ($filter == '2') { // Jika filter nya 2 (per bulan)
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				$nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

				$ket = 'Data Undangan Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
				$transaksi = $this->Undangan_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
			} else { // Jika filter nya 3 (per tahun)
				$tahun = $_GET['tahun'];

				$ket = 'Data Undangan Tahun ' . $tahun;
				$transaksi = $this->Undangan_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
			}
		} else { // Jika user tidak mengklik tombol tampilkan
			$ket = 'Semua Data Undangan';
			$transaksi = $this->Undangan_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
		}

		$data['ket'] = $ket;
		$data['transaksi'] = $transaksi;

		ob_start();
		$this->load->view('print', $data);
		$html = ob_get_contents();
		ob_end_clean();
		require './assets/html2pdf/autoload.php'; // Load plugin html2pdfnya
		$pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');  // Settingan PDFnya
		$pdf->WriteHTML($html);
		$pdf->Output('Data Transaksi.pdf', 'D');
	}
}
