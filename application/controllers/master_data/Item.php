<?php

class Item extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index($id_client = null, $id_location = null)
  {
    $id1 = $id_client;
    $id2 = $id_location;

    if ($id1 != null and empty($id2)) {
      $item = $this->db->query("SELECT * FROM item_nonbundling WHERE id_client = $id1")->result_array();
    } elseif ($id2 != null) {
      $item = $this->db->query("SELECT * FROM item_nonbundling WHERE id_client = $id1 AND id_location = $id2")->result_array();
    } else {
      $item = $this->db->get('item_nonbundling')->result_array();
    }

    $data = [
      'judul'             => 'Item',
      'nama_menu'         => 'master data',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => $this->db->get('manage_by')->result_array(),
      'client'            => $this->db->get('client')->result_array(),
      'location'          => $this->db->get('location')->result_array(),
      'item_nonbundling'  => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('master_data/item/index');
    $this->load->view('templates/footer');
  }

  public function index_client()
  {
    $user     = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $id_user  = $user['id_user'];
    $client   = $this->db->get_where('client', ['user_id' => $id_user])->row_array();
    $id_client = $client['id_client'];
    $data = [
      'judul'             => 'Item',
      'nama_menu'         => 'master data',
      'user'              => $user,
      'manage_by'         => $this->db->get('manage_by')->result_array(),
      'location'          => $this->db->get('location')->result_array(),
      'item_nonbundling'  => $this->db->get_where('item_nonbundling', ['id_client' => $id_client])->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('master_data/item/index');
    $this->load->view('templates/footer');
  }

  public function item_client($id_client)
  {
    $data = [
      'judul'             => 'Item',
      'nama_menu'         => 'master data',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => $this->db->get('manage_by')->result_array(),
      'client'            => $this->db->get('client')->result_array(),
      'id_client'         => $id_client,
      'location'          => $this->db->query("SELECT * FROM item_nonbundling JOIN location ON item_nonbundling.id_location = location.id_location WHERE id_client = $id_client")->result_array(),
      'item_nonbundling'  => $this->db->query("SELECT * FROM item_nonbundling WHERE id_client = $id_client")->result_array()
    ];
    $this->load->view('templates/header', $data);
    if ($id_client != null) {
      $this->load->view('templates/sidebarr');
    } else {
      $this->load->view('templates/sidebarr');
    }
    $this->load->view('templates/navbar');
    $this->load->view('master_data/item/index');
    $this->load->view('templates/footer');
  }

  public function detail_itemclient($id_item_nonbundling)
  {
    $data = [
      'judul'       => 'Detail Item',
      'nama_menu'   => 'master data',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_nonbundling'  => $this->db->query("SELECT * FROM item_nonbundling JOIN manage_by ON item_nonbundling.id_manage_by = manage_by.id_manage_by WHERE id_item_nonbundling = $id_item_nonbundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('master_data/item/detail');
    $this->load->view('templates/footer');
  }
  public function detail_item($id_client = null, $id_location = null, $id_item_nonbundling)
  {
    $id1 = $id_client;
    $id2 = $id_location;
    $data = [
      'judul'       => 'Detail Item',
      'nama_menu'   => 'master data',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'id_client'   => $id1,
      'id_location' => $id2,
      'item_nonbundling'  => $this->db->query("SELECT * FROM item_nonbundling JOIN manage_by ON item_nonbundling.id_manage_by = manage_by.id_manage_by WHERE id_item_nonbundling = $id_item_nonbundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('master_data/item/detail');
    $this->load->view('templates/footer');
  }
  public function detail_itemm($id_client = null, $id_item_nonbundling)
  {
    $id1 = $id_client;
    $data = [
      'judul'       => 'Detail Item',
      'nama_menu'   => 'master data',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'id_client'   => $id1,
      'item_nonbundling'  => $this->db->query("SELECT * FROM item_nonbundling JOIN manage_by ON item_nonbundling.id_manage_by = manage_by.id_manage_by WHERE id_item_nonbundling = $id_item_nonbundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('master_data/item/detail');
    $this->load->view('templates/footer');
  }

  public function create_item($id_client = null, $id_location = null)
  {
    $id1 = $id_client;
    $id2 = $id_location;

    $data = [
      'judul'       => 'Create Item',
      'nama_menu'   => 'master data',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'   => $this->db->get('manage_by')->result_array(),
      'id_client'   => $id1,
      'id_location' => $id2,
      'select'      => ['Yes', 'No'],
      'size'        => ['S', 'M', 'L', 'XL', 'XXL'],
    ];
    $this->form_validation->set_rules('item_nonbundling_code', 'item_nonbundling_code', 'required|trim');
    $this->form_validation->set_rules('item_nonbundling_name', 'item_nonbundling_name', 'required|trim');
    $this->form_validation->set_rules('item_nonbundling_barcode', 'item_nonbundling_barcode', 'required|trim');
    $this->form_validation->set_rules('id_manage_by', 'manage by', 'required|trim');
    $this->form_validation->set_rules('description', 'description', 'required|trim');
    $this->form_validation->set_rules('brand', 'brand', 'required|trim');
    $this->form_validation->set_rules('model', 'model', 'required|trim');
    $this->form_validation->set_rules('category', 'category', 'required|trim');
    $this->form_validation->set_rules('minimum_stock', 'minimum stock', 'required|trim');
    $this->form_validation->set_rules('publish_price', 'publish price', 'required|trim');
    $this->form_validation->set_rules('additional_expired', 'addtional expired', 'required|trim');
    $this->form_validation->set_rules('size', 'size', 'required|trim');
    $this->form_validation->set_rules('length', 'length', 'required|trim');
    $this->form_validation->set_rules('width', 'width', 'required|trim');
    $this->form_validation->set_rules('height', 'height', 'required|trim');
    $this->form_validation->set_rules('weight', 'weight', 'required|trim');
    $this->form_validation->set_rules('dimension', 'dimension', 'required|trim');
    $this->form_validation->set_rules('active', 'active', 'required|trim');
    $this->form_validation->set_rules('is_fragile', 'is_fragile', 'required|trim');
    $this->form_validation->set_rules('cool_storage', 'cool_storage', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('master_data/item/create');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'item_nonbundling_code'       => htmlspecialchars($this->input->post('item_nonbundling_code')),
        'item_nonbundling_name'       => htmlspecialchars($this->input->post('item_nonbundling_name')),
        'item_nonbundling_barcode'                     => htmlspecialchars($this->input->post('item_nonbundling_barcode')),
        'id_manage_by'                => htmlspecialchars($this->input->post('id_manage_by')),
        'description'                 => $this->input->post('description'),
        'brand'                       => htmlspecialchars($this->input->post('brand')),
        'model'                       => htmlspecialchars($this->input->post('model')),
        'category'                    => htmlspecialchars($this->input->post('category')),
        'minimum_stock'               => htmlspecialchars($this->input->post('minimum_stock')),
        'publish_price'               => htmlspecialchars($this->input->post('publish_price')),
        'additional_expired'           => htmlspecialchars($this->input->post('additional_expired')),
        'size'                        => htmlspecialchars($this->input->post('size')),
        'length'                      => htmlspecialchars($this->input->post('length')),
        'width'                       => htmlspecialchars($this->input->post('width')),
        'height'                      => htmlspecialchars($this->input->post('height')),
        'weight'                      => htmlspecialchars($this->input->post('weight')),
        'dimension'                   => htmlspecialchars($this->input->post('dimension')),
        'is_fragile'                  => htmlspecialchars($this->input->post('is_fragile')),
        'active'                      => htmlspecialchars($this->input->post('active')),
        'cool_storage'                => htmlspecialchars($this->input->post('cool_storage')),
        'id_client'                   => htmlspecialchars($this->input->post('id_client')),
        'id_location'                 => htmlspecialchars($this->input->post('id_location')),
        'created_date'                => date('Y-m-d'),
        'created_by'                  => $this->session->userdata('id_user'),
      ];
      $this->db->insert('item_nonbundling', $data);

      if (!empty($this->uri->segment(5))) {
        redirect('master_data/item/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
      } else {
        redirect('master_data/item');
      }
    }
  }

  public function edit_item($id_client = null, $id_location = null, $id_item_nonbundling)
  {
    $id1 = $id_client;
    $id2 = $id_location;
    $data = [
      'judul'             => 'Edit Item',
      'nama_menu'         => 'master data',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => $this->db->get('manage_by')->result_array(),
      'id_client'         => $id1,
      'id_location'       => $id2,
      'item_nonbundling'  => $this->db->get_where('item_nonbundling', ['id_item_nonbundling' => $id_item_nonbundling])->row_array(),
      'select'            => ['Yes', 'No'],
      'size'              => ['S', 'M', 'L', 'XL', 'XXL'],
    ];
    $this->form_validation->set_rules('item_nonbundling_code', 'item_nonbundling_code', 'required|trim');
    $this->form_validation->set_rules('item_nonbundling_name', 'item_nonbundling_name', 'required|trim');
    $this->form_validation->set_rules('item_nonbundling_barcode', 'item_nonbundling_barcode', 'required|trim');
    $this->form_validation->set_rules('id_manage_by', 'manage by', 'required|trim');
    $this->form_validation->set_rules('description', 'description', 'required|trim');
    $this->form_validation->set_rules('brand', 'brand', 'required|trim');
    $this->form_validation->set_rules('model', 'model', 'required|trim');
    $this->form_validation->set_rules('category', 'category', 'required|trim');
    $this->form_validation->set_rules('minimum_stock', 'minimum stock', 'required|trim');
    $this->form_validation->set_rules('publish_price', 'publish price', 'required|trim');
    $this->form_validation->set_rules('additional_expired', 'addtional expired', 'required|trim');
    $this->form_validation->set_rules('size', 'size', 'required|trim');
    $this->form_validation->set_rules('length', 'length', 'required|trim');
    $this->form_validation->set_rules('width', 'width', 'required|trim');
    $this->form_validation->set_rules('height', 'height', 'required|trim');
    $this->form_validation->set_rules('weight', 'weight', 'required|trim');
    $this->form_validation->set_rules('dimension', 'dimension', 'required|trim');
    $this->form_validation->set_rules('active', 'active', 'required|trim');
    $this->form_validation->set_rules('is_fragile', 'is_fragile', 'required|trim');
    $this->form_validation->set_rules('cool_storage', 'cool_storage', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('master_data/item/edit');
      $this->load->view('templates/footer');
    } else {
      $id_item_nonbundling            = htmlspecialchars($this->input->post('id_item_nonbundling'));
      $item_nonbundling_code          = htmlspecialchars($this->input->post('item_nonbundling_code'));
      $item_nonbundling_name          = htmlspecialchars($this->input->post('item_nonbundling_name'));
      $item_nonbundling_barcode                        = htmlspecialchars($this->input->post('item_nonbundling_barcode'));
      $id_manage_by                   = htmlspecialchars($this->input->post('id_manage_by'));
      $description                    = $this->input->post('description');
      $brand                          = htmlspecialchars($this->input->post('brand'));
      $model                          = htmlspecialchars($this->input->post('model'));
      $category                       = htmlspecialchars($this->input->post('category'));
      $minimum_stock                  = htmlspecialchars($this->input->post('minimum_stock'));
      $publish_price                  = htmlspecialchars($this->input->post('publish_price'));
      $additional_expired              = htmlspecialchars($this->input->post('additional_expired'));
      $size                           = htmlspecialchars($this->input->post('size'));
      $length                         = htmlspecialchars($this->input->post('length'));
      $width                          = htmlspecialchars($this->input->post('width'));
      $height                         = htmlspecialchars($this->input->post('height'));
      $weight                         = htmlspecialchars($this->input->post('weight'));
      $dimension                      = htmlspecialchars($this->input->post('dimension'));
      $is_fragile                     = htmlspecialchars($this->input->post('is_fragile'));
      $active                         = htmlspecialchars($this->input->post('active'));
      $cool_storage                   = htmlspecialchars($this->input->post('cool_storage'));

      $this->db->set('item_nonbundling_code', $item_nonbundling_code);
      $this->db->set('item_nonbundling_name', $item_nonbundling_name);
      $this->db->set('item_nonbundling_barcode', $item_nonbundling_barcode);
      $this->db->set('id_manage_by', $id_manage_by);
      $this->db->set('description', $description);
      $this->db->set('brand', $brand);
      $this->db->set('model', $model);
      $this->db->set('category', $category);
      $this->db->set('minimum_stock', $minimum_stock);
      $this->db->set('publish_price', $publish_price);
      $this->db->set('additional_expired', $additional_expired);
      $this->db->set('size', $size);
      $this->db->set('length', $length);
      $this->db->set('width', $width);
      $this->db->set('height', $height);
      $this->db->set('weight', $weight);
      $this->db->set('dimension', $dimension);
      $this->db->set('is_fragile', $is_fragile);
      $this->db->set('active', $active);
      $this->db->set('cool_storage', $cool_storage);
      $this->db->where('id_item_nonbundling', $id_item_nonbundling);
      $this->db->update('item_nonbundling');

      if (!empty($this->uri->segment(5))) {
        redirect('master_data/item/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
      } else {
        redirect('master_data/item');
      }
    }
  }


  public function delete_item($id_client = null, $id_location = null, $id_item_nonbundling)
  {
    $this->db->where('id_item_nonbundling', $id_item_nonbundling);
    $this->db->delete('item_nonbundling');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    if (!empty($this->uri->segment(5))) {
      redirect('master_data/item/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
    } else {
      redirect('master_data/item');
    }
  }
}
