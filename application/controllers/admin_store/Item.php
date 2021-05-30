<?php

class Item extends CI_Controller
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
			'judul'		=> 'Item',
			'user'    => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
			'item_satuan'	=> $this->db->get('item_satuan')->result_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/navbar');
		$this->load->view('admin_store/item');
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
		$this->load->view('admin_store/detail_item');
		$this->load->view('templates/footer');
	}

	public function add_item()
	{
		$data = [
			'judul'		=> 'Item',
			'user'    => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
		];
		$this->form_validation->set_rules('manage_by', 'manage by', 'required|trim');
		$this->form_validation->set_rules('item_code', 'item_code', 'required|trim');
		$this->form_validation->set_rules('barcode', 'barcode', 'required|trim');
		$this->form_validation->set_rules('item_name', 'item_name', 'required|trim');
		$this->form_validation->set_rules('description', 'description', 'required|trim');
		$this->form_validation->set_rules('brand', 'brand', 'required|trim');
		$this->form_validation->set_rules('category', 'category', 'required|trim');
		$this->form_validation->set_rules('model', 'model', 'required|trim');
		$this->form_validation->set_rules('minimum_stock', 'minimum_stock', 'required|trim');
		$this->form_validation->set_rules('publish_price', 'publish_price', 'required|trim');
		$this->form_validation->set_rules('addtional_expired', 'addtional_expired', 'required|trim');
		$this->form_validation->set_rules('size', 'size', 'required|trim');
		$this->form_validation->set_rules('lenght', 'lenght', 'required|trim');
		$this->form_validation->set_rules('width', 'width', 'required|trim');
		$this->form_validation->set_rules('height', 'height', 'required|trim');
		$this->form_validation->set_rules('weight', 'weight', 'required|trim');
		$this->form_validation->set_rules('dimension', 'dimension', 'required|trim');
		$this->form_validation->set_rules('pilihan', 'pilihan', 'required|trim');
		$this->form_validation->set_rules('is_fragile', 'is_fragile', 'required|trim');
		$this->form_validation->set_rules('active', 'active', 'required|trim');
		$this->form_validation->set_rules('cool_storage', 'cool_storage', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/navbar');
			$this->load->view('admin_store/add_item');
			$this->load->view('templates/footer');
		} else {
			$data = [
				'manage_by' => htmlspecialchars($this->input->post('manage_by')),
				'item_code' => htmlspecialchars($this->input->post('item_code')),
				'barcode' => htmlspecialchars($this->input->post('barcode')),
				'item_name' => htmlspecialchars($this->input->post('item_name')),
				'description' => htmlspecialchars($this->input->post('description')),
				'brand' => htmlspecialchars($this->input->post('brand')),
				'category' => htmlspecialchars($this->input->post('category')),
				'model' => htmlspecialchars($this->input->post('model')),
				'minimum_stock' => htmlspecialchars($this->input->post('minimum_stock')),
				'publish_price' => htmlspecialchars($this->input->post('publish_price')),
				'addtional_expired' => htmlspecialchars($this->input->post('addtional_expired')),
				'size' => htmlspecialchars($this->input->post('size')),
				'lenght' => htmlspecialchars($this->input->post('lenght')),
				'width' => htmlspecialchars($this->input->post('width')),
				'height' => htmlspecialchars($this->input->post('height')),
				'weight' => htmlspecialchars($this->input->post('weight')),
				'dimension' => htmlspecialchars($this->input->post('dimension')),
				'pilihan' => htmlspecialchars($this->input->post('pilihan')),
				'is_fragile' => htmlspecialchars($this->input->post('is_fragile')),
				'active' => htmlspecialchars($this->input->post('active')),
				'cool_storage' => htmlspecialchars($this->input->post('cool_storage')),
			];
			$this->db->insert('item_satuan', $data);
			redirect('admin_store/item');
		}
	}

	public function edit_item($id_item)
	{
		$data = [
			'judul'		=> 'Item',
			'user'    => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
			'item'		=> $this->db->get_where('item_satuan', ['id_item' => $id_item])->row_array()
		];
		$this->form_validation->set_rules('manage_by', 'manage by', 'required|trim');
		$this->form_validation->set_rules('item_code', 'item_code', 'required|trim');
		$this->form_validation->set_rules('barcode', 'barcode', 'required|trim');
		$this->form_validation->set_rules('item_name', 'item_name', 'required|trim');
		$this->form_validation->set_rules('description', 'description', 'required|trim');
		$this->form_validation->set_rules('brand', 'brand', 'required|trim');
		$this->form_validation->set_rules('category', 'category', 'required|trim');
		$this->form_validation->set_rules('model', 'model', 'required|trim');
		$this->form_validation->set_rules('minimum_stock', 'minimum_stock', 'required|trim');
		$this->form_validation->set_rules('publish_price', 'publish_price', 'required|trim');
		$this->form_validation->set_rules('addtional_expired', 'addtional_expired', 'required|trim');
		$this->form_validation->set_rules('size', 'size', 'required|trim');
		$this->form_validation->set_rules('lenght', 'lenght', 'required|trim');
		$this->form_validation->set_rules('width', 'width', 'required|trim');
		$this->form_validation->set_rules('height', 'height', 'required|trim');
		$this->form_validation->set_rules('weight', 'weight', 'required|trim');
		$this->form_validation->set_rules('dimension', 'dimension', 'required|trim');
		$this->form_validation->set_rules('pilihan', 'pilihan', 'required|trim');
		$this->form_validation->set_rules('is_fragile', 'is_fragile', 'required|trim');
		$this->form_validation->set_rules('active', 'active', 'required|trim');
		$this->form_validation->set_rules('cool_storage', 'cool_storage', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/navbar');
			$this->load->view('admin_store/edit_item');
			$this->load->view('templates/footer');
		} else {
			$id_item 					= htmlspecialchars($this->input->post('id_item'));
			$manage_by 				= htmlspecialchars($this->input->post('manage_by'));
			$item_code 				= htmlspecialchars($this->input->post('item_code'));
			$barcode 					= htmlspecialchars($this->input->post('barcode'));
			$item_name 				= htmlspecialchars($this->input->post('item_name'));
			$description 			= htmlspecialchars($this->input->post('description'));
			$brand 						= htmlspecialchars($this->input->post('brand'));
			$category 				= htmlspecialchars($this->input->post('category'));
			$model 						= htmlspecialchars($this->input->post('model'));
			$minimum_stock 		= htmlspecialchars($this->input->post('minimum_stock'));
			$publish_price 		= htmlspecialchars($this->input->post('publish_price'));
			$addtional_expired = htmlspecialchars($this->input->post('addtional_expired'));
			$size 						= htmlspecialchars($this->input->post('size'));
			$lenght 					= htmlspecialchars($this->input->post('lenght'));
			$width 						= htmlspecialchars($this->input->post('width'));
			$height 					= htmlspecialchars($this->input->post('height'));
			$weight 					= htmlspecialchars($this->input->post('weight'));
			$dimension 				= htmlspecialchars($this->input->post('dimension'));
			$pilihan					= htmlspecialchars($this->input->post('pilihan'));
			$is_fragile 			= htmlspecialchars($this->input->post('is_fragile'));
			$active 					= htmlspecialchars($this->input->post('active'));
			$cool_storage 		= htmlspecialchars($this->input->post('cool_storage'));

			$this->db->set('manage_by', $manage_by);
			$this->db->set('item_code', $item_code);
			$this->db->set('barcode', $barcode);
			$this->db->set('item_name', $item_name);
			$this->db->set('description', $description);
			$this->db->set('brand', $brand);
			$this->db->set('category', $category);
			$this->db->set('model', $model);
			$this->db->set('minimum_stock', $minimum_stock);
			$this->db->set('publish_price', $publish_price);
			$this->db->set('addtional_expired', $addtional_expired);
			$this->db->set('size', $size);
			$this->db->set('lenght', $lenght);
			$this->db->set('width', $width);
			$this->db->set('height', $height);
			$this->db->set('weight', $weight);
			$this->db->set('dimension', $dimension);
			$this->db->set('pilihan', $pilihan);
			$this->db->set('is_fragile', $is_fragile);
			$this->db->set('active', $active);
			$this->db->set('cool_storage', $cool_storage);
			$this->db->where('id_item', $id_item);
			$this->db->update('item_satuan');

			redirect('admin_store/item');
		}
	}
}
