<?php

class penerimaan extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Transaksi Penerimaan Pajak";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/penerimaan', $data);
		$this->load->view('templates_admin/footer', $data);
	}
	public function tambahData()
	{
		$data['title'] = "Tambah Data Penerimaan Pajak";
		$data['wajibpajak'] = $this->pajakModel->get_data('data_wajibpajak')->result();
		$data['objekpajak'] = $this->pajakModel->get_data('data_objekpajak')->result();
		$data['pegawai'] = $this->pajakModel->get_data('data_pegawai')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/tambahDataPenerimaan', $data);
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
			$pbb_terutang			= $this->input->post('pbb_terutang');
			$pajak_dibayar			= $this->input->post('pajak_dibayar');
			$tgl_dibayar			= $this->input->post('tgl_dibayar');
			$nama_pegawai			= $this->input->post('nama_pegawai');
			$data = array(
				'id_objekpajak'		=> $nop,
				'id_wajibpajak'		=> $npwp,
				'id_wajibpajak'		=> $nama_wajibpajak,
				'luas_bumi'			=> $luas_bumi,
				'luas_bangunan'		=> $luas_bangunan,
				'alamat_objekpajak'	=> $alamat_objekpajak,
				'alamat_wajibpajak'	=> $alamat_wajibpajak,
				'id_spt'			=> $pbb_terutang,
				'pajak_dibayar'		=> $pajak_dibayar,
				'id_pegawai'		=> $nama_pegawai,
				'tgl_dibayar'		=> $tgl_dibayar,

			);
			$this->pajakModel->insert_data($data, 'penerimaan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Data SPT Berhasil Ditambahkan!</strong> 
				  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
			redirect('admin/penerimaan');
		}
	}
}

?>