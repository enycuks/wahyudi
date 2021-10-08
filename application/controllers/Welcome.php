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
		$this->load->view('template/atas');
		$this->load->view('profil');
		$this->load->view('template/bawah');
	}

	public function bot()
	{
		$undangan = $this->Undangan_model->getUndangan();
		$sekarang = date("Y-m-d");
		$jam1 = date("H:i:s");
		$perihal = $undangan['perihal'];

		$tgl = date('d-m-Y', strtotime($undangan['tgl_pelaksana']));
		$jam = date('H:i', strtotime($undangan['jam']));

		$sql = $this->db->query("SELECT * FROM undangan where tgl_pelaksana='$sekarang'");
		$cek_nim = $sql->num_rows();
		if ($cek_nim > 0) {
			// echo $jam1;
			$token = "2034678400:AAHbegJHNtivzW1-ZnfLJCOZUKpUj11FJAg"; // token bot
			$data = [
				'text' => "Ada Kegiatan $perihal Hari Ini Tanggal $tgl Pukul $jam",
				'chat_id' => '429602844'  //contoh bot, group id -442697126
			];
			file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));
		} else {
			echo "tidak ada";
		}
	}

	public function boti()
	{
		$undangan = $this->Undangan_model->getUndangan();

		$jam1 = time();
		$awal1  =  strtotime('now'); //waktu awal
		$awal  =  strtotime($undangan['jam']); //waktu awal

		$beda = $jam1 - $awal1;

		//membagi detik menjadi jam
		$jam    = floor($beda / (60 * 60));

		//membagi sisa detik setelah dikurangi $jam menjadi menit
		$menit    = $beda - $jam * (60 * 60);

		echo $awal1;
		echo "<br>";
		echo $jam1;
		echo "<br>";
		echo $beda;
		echo "<br>";
		echo $menit;
	}
}
