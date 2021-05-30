<?php

class List_item_satuan extends CI_Controller
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
			'judul'		=> 'List_item_satuan',
			'user'    => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
			'item_satuan'	=> $this->db->get('item_satuan')->result_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/navbar');
		$this->load->view('client/list_item_satuan');
		$this->load->view('templates/footer');
	}

	public function detail_item($id_item)
	{
		$data = [
			'judul'		=> 'Item',
			'user'    => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
			'item_satuan'	=> $this->db->get_where('item_satuan', ['id_item' => $id_item])->row_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/navbar');
		$this->load->view('client/detail_item');
		$this->load->view('templates/footer');
	}
}
