<?php 

 class Invoice extends CI_Controller
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
 			'judul'		=> 'Invoice',
 			'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
 		];
 		$this->load->view('templates/header', $data);
 		$this->load->view('templates/sidebar');
 		$this->load->view('templates/navbar');
 		$this->load->view('admin_operation/invoice');
 		$this->load->view('templates/footer');
 	}
 } ?>