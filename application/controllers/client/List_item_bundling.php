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
			'judul'		=> 'Item Bundling',
			'user'    => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
			'item_bundling'	=> $this->db->get('item_bundling')->result_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/navbar');
		$this->load->view('client/list_item_bundling');
		$this->load->view('templates/footer');
	}

	public function detail_item($id_bundling)
	{
		$data = [
			'judul'		=> 'Item',
			'user'    => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
			'item_bundling'	=> $this->db->get_where('item_bundling', ['id_bundling' => $id_bundling])->row_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/navbar');
		$this->load->view('client/detail_item_bundling');
		$this->load->view('templates/footer');
	}
}
