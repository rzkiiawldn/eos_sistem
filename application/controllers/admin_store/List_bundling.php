<?php

class List_bundling extends CI_Controller
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
			'judul'					=> 'List_bundling',
			'user'      		=> $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
			'item_bundling'	=> $this->db->get('item_bundling')->result_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/navbar');
		$this->load->view('admin_store/list_bundling');
		$this->load->view('templates/footer');
	}

	public function detail_list_bundling($id_bundling)
	{
		$data = [
			'judul'					=> 'Item',
			'user'    			=> $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
			'item_bundling'	=> $this->db->get_where('item_bundling', ['id_bundling' => $id_bundling])->row_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/navbar');
		$this->load->view('admin_store/detail_list_bundling');
		$this->load->view('templates/footer');
	}

	public function add_list_bundling()
	{
		$data = [
			'judul'		=> 'Item',
			'user'    => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
		];
		$this->form_validation->set_rules('manage_by', 'manage by', 'required|trim');
		$this->form_validation->set_rules('bundling_code', 'bundling_code', 'required|trim');
		$this->form_validation->set_rules('bundling_name', 'bundling_name', 'required|trim');
		$this->form_validation->set_rules('detail_informasi', 'detail_informasi', 'required|trim');
		$this->form_validation->set_rules('quantity', 'quantity', 'required|trim');
		$this->form_validation->set_rules('form', 'form', 'required|trim');
		$this->form_validation->set_rules('item_code', 'item_code', 'required|trim');
		$this->form_validation->set_rules('barcode', 'barcode', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/navbar');
			$this->load->view('admin_store/add_list_bundling');
			$this->load->view('templates/footer');
		} else {
			$data = [
				'manage_by' => htmlspecialchars($this->input->post('manage_by')),
				'bundling_code' => htmlspecialchars($this->input->post('bundling_code')),
				'bundling_name' => htmlspecialchars($this->input->post('bundling_name')),
				'detail_informasi' => htmlspecialchars($this->input->post('detail_informasi')),
				'quantity' => htmlspecialchars($this->input->post('quantity')),
				'form' => htmlspecialchars($this->input->post('form')),
				'item_code' => htmlspecialchars($this->input->post('item_code')),
				'barcode' => htmlspecialchars($this->input->post('barcode')),
				'created_date' => time()
			];
			$this->db->insert('item_bundling', $data);
			redirect('admin_store/list_bundling');
		}
	}

	public function edit_list_bundling($id_bundling)
	{
		$data = [
			'judul'		=> 'Item',
			'user'    => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
			'item_bundling'		=> $this->db->get_where('item_bundling', ['id_bundling' => $id_bundling])->row_array()
		];
		$this->form_validation->set_rules('manage_by', 'manage by', 'required|trim');
		$this->form_validation->set_rules('bundling_code', 'bundling_code', 'required|trim');
		$this->form_validation->set_rules('bundling_name', 'bundling_name', 'required|trim');
		$this->form_validation->set_rules('detail_informasi', 'detail_informasi', 'required|trim');
		$this->form_validation->set_rules('quantity', 'quantity', 'required|trim');
		$this->form_validation->set_rules('form', 'form', 'required|trim');
		$this->form_validation->set_rules('item_code', 'item_code', 'required|trim');
		$this->form_validation->set_rules('barcode', 'barcode', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/navbar');
			$this->load->view('admin_store/edit_list_bundling');
			$this->load->view('templates/footer');
		} else {
			$id_bundling 			= htmlspecialchars($this->input->post('id_bundling'));
			$manage_by 				= htmlspecialchars($this->input->post('manage_by'));
			$bundling_code 				= htmlspecialchars($this->input->post('bundling_code'));
			$bundling_name 					= htmlspecialchars($this->input->post('bundling_name'));
			$detail_informasi 				= htmlspecialchars($this->input->post('detail_informasi'));
			$quantity 			= htmlspecialchars($this->input->post('quantity'));
			$form 						= htmlspecialchars($this->input->post('form'));
			$item_code 				= htmlspecialchars($this->input->post('item_code'));
			$barcode 						= htmlspecialchars($this->input->post('barcode'));

			$this->db->set('manage_by', $manage_by);
			$this->db->set('bundling_code', $bundling_code);
			$this->db->set('bundling_name', $bundling_name);
			$this->db->set('detail_informasi', $detail_informasi);
			$this->db->set('quantity', $quantity);
			$this->db->set('form', $form);
			$this->db->set('item_code', $item_code);
			$this->db->set('barcode', $barcode);
			$this->db->where('id_bundling', $id_bundling);
			$this->db->update('item_bundling');

			redirect('admin_store/list_bundling');
		}
	}
}
