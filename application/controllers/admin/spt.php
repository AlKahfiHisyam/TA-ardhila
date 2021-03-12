<?php

class spt extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Data Surat Pemberitahuan Pajak (SPT)";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/spt', $data);
		$this->load->view('templates_admin/footer', $data);
	}
	public function tambahData()
	{
		$data['title'] = "Tambah Data SPT";
		$data['wajibpajak'] = $this->pajakModel->get_data('data_wajibpajak')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/tambahDataSpt', $data);
		$this->load->view('templates_admin/footer', $data);
	}
	public function tambahDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$nop					= $this->input->post('nop');
			$npwp					= $this->input->post('npwp');
			$nama_wajibpajak		= $this->input->post('nama_wajibpajak');
			$luas_bumi				= $this->input->post('luas_bumi');
			$luas_bangunan			= $this->input->post('luas_bangunan');
			$alamat_objekpajak		= $this->input->post('alamat_objekpajak');
			$alamat_wajibpajak		= $this->input->post('alamat_wajibpajak');
			$njop_dasar				= $this->input->post('njop_dasar');
			$njoptk					= $this->input->post('njoptk');
			$njop_perhitungan		= $this->input->post('njop_perhitungan');
			$pbb_terutang			= $this->input->post('pbb_terutang');
			$tgl_jatuhtempo			= $this->input->post('tgl_jatuhtempo');
			$data = array(
				'id_objekpajak'		=> $nop,
				'id_wajibpajak'		=> $npwp,
				'id_wajibpajak'		=> $nama_wajibpajak,
				'luas_bumi'			=> $luas_bumi,
				'luas_bangunan'		=> $luas_bangunan,
				'alamat_objekpajak'	=> $alamat_objekpajak,
				'alamat_wajibpajak'	=> $alamat_wajibpajak,
				'njop_dasar'		=> $njop_dasar,
				'njoptk'			=> $njoptk,
				'njop_perhitungan'	=> $njop_perhitungan,
				'pbb_terutang'		=> $pbb_terutang,
				'tgl_jatuhtempo'	=> $tgl_jatuhtempo,

			);
			$this->pajakModel->insert_data($data, 'spt');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Data SPT Berhasil Ditambahkan!</strong> 
				  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
			redirect('admin/spt');
		}
	}
}

?>