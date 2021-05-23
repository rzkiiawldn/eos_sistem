<?php 

 class Cetak_invoice extends CI_Controller
 {

 	public function __construct()
	{
		parent::__construct();
		belum_login();
		 date_default_timezone_set('Asia/Jakarta');
	}
 	
 	public function index()
 	{
 		$data = [
 			'judul'		=> 'Cetak_invoice'
 		];
 		$this->load->view('templates/header', $data);
 		$this->load->view('templates/sidebar');
 		$this->load->view('templates/navbar');
 		$this->load->view('client/cetak_invoice');
 		$this->load->view('templates/footer');
 	}
 } ?>