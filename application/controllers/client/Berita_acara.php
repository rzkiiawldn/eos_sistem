<?php 

 class Berita_acara extends CI_Controller
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
 			'judul'		=> 'Berita_acara'
 		];
 		$this->load->view('templates/header', $data);
 		$this->load->view('templates/sidebar');
 		$this->load->view('templates/navbar');
 		$this->load->view('client/berita_acara');
 		$this->load->view('templates/footer');
 	}
 } ?>