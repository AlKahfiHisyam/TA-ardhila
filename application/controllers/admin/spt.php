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
}

?>