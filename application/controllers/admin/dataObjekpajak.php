<?php

class DataObjekpajak extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Data Objek Pajak";
		$data['objekpajak'] = $this->pajakModel->get_data_objekpajak();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/dataObjekpajak', $data);
		$this->load->view('templates_admin/footer', $data);
	}
	public function tambahData()
	{
		$data['title'] = "Tambah Data Objek Pajak";
		$data['wajibpajak'] = $this->pajakModel->get_data('data_wajibpajak')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/tambahDataObjekpajak', $data);
		$this->load->view('templates_admin/footer', $data);
	}
	public function tambahDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$nop					= $this->input->post('nop');
			$nama_wajibpajak		= $this->input->post('nama_wajibpajak');
			$alamat_objekpajak		= $this->input->post('alamat_objekpajak');
			$luas_bumi				= $this->input->post('luas_bumi');
			$luas_bangunan			= $this->input->post('luas_bangunan');
			$data = array(
				'nop'				=> $nop,
				'id_wajibpajak'		=> $nama_wajibpajak,
				'alamat_objekpajak'	=> $alamat_objekpajak,
				'luas_bumi'			=> $luas_bumi,
				'luas_bangunan'		=> $luas_bangunan,

			);
			$this->pajakModel->insert_data($data, 'data_objekpajak');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Data Objek Pajak Berhasil Ditambahkan!</strong> 
				  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
			redirect('admin/dataObjekpajak');
		}
	}
	public function updateData($id)
	{
		$where = array('id_objekpajak' => $id);
		$data['title'] = "Update Data Objek Pajak";		
		$data['wajibpajak'] = $this->pajakModel->get_data('data_wajibpajak')->result();
		$data['objekpajak'] = $this->pajakModel->update_data_objekpajak($id);
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/updateDataObjekpajak', $data);
		$this->load->view('templates_admin/footer', $data);
	}
	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->updateData();
		} else {
			$id					= $this->input->post('id_objekpajak');
			$nop					= $this->input->post('nop');
			$nama_wajibpajak		= $this->input->post('nama_wajibpajak');
			$alamat_objekpajak		= $this->input->post('alamat_objekpajak');
			$luas_bumi				= $this->input->post('luas_bumi');
			$luas_bangunan			= $this->input->post('luas_bangunan');
			$data = array(
				'nop'				=> $nop,
				'id_wajibpajak'		=> $nama_wajibpajak,
				'alamat_objekpajak'	=> $alamat_objekpajak,
				'luas_bumi'			=> $luas_bumi,
				'luas_bangunan'		=> $luas_bangunan,
			);
			$where = array(
				'id_objekpajak' => $id
			);

			$this->pajakModel->update_data('data_objekpajak', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Data Objek Pajak Berhasil Diupdate!</strong> 
				  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
			redirect('admin/dataObjekpajak');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nop', 'nop', 'required');
		$this->form_validation->set_rules('nama_wajibpajak', 'nama_wajibpajak', 'required');
		$this->form_validation->set_rules('alamat_objekpajak', 'alamat_objekpajak', 'required');
		$this->form_validation->set_rules('luas_bumi', 'luas_bumi', 'required');
		$this->form_validation->set_rules('luas_bangunan','luas_bangunan', 'required');

	}

	public function deleteData($id)
	{
		$where = array('id_ObjekSpajak' => $id);
		$this->pajakModel->delete_data($where, 'data_objekpajak');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Data Objek Pajak Berhasil Dihapus!</strong> 
				  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
			redirect('admin/dataObjekpajak');
	}
}
