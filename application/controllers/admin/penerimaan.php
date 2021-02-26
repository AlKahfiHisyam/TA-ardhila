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
}

?>