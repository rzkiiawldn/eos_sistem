<?php 

 class List_item_bundling extends CI_Controller
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
 			'judul'		=> 'Item Bundling'
 		];
 		$this->load->view('templates/header', $data);
 		$this->load->view('templates/sidebar');
 		$this->load->view('templates/navbar');
 		$this->load->view('client/list_item_bundling');
 		$this->load->view('templates/footer');
 	}
 } ?>