<?php

class Item_bundling extends CI_Controller
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
      'nama_menu'         => 'bundling',
      'judul'             => 'Item Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => $this->db->get('manage_by')->result_array(),
      'item_bundling'     => $this->db->get('item_bundling')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('bundling/item_bundling/index');
    $this->load->view('templates/footer');
  }

  public function detail_item($id_item_bundling)
  {
    $data = [
      'nama_menu'       => 'bundling',
      'judul'           => 'Detail Item Bundling',
      'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_bundling'   => $this->db->query("SELECT * FROM item_bundling JOIN manage_by ON item_bundling.id_manage_by = manage_by.id_manage_by WHERE item_bundling.id_item_bundling = $id_item_bundling ")->row_array(),
      'item_bundling_detail' => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling WHERE ibd.id_item_bundling = $id_item_bundling ")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('bundling/item_bundling/detail');
    $this->load->view('templates/footer');
  }

  public function create_item()
  {
    $data = [
      'judul'             => 'Create Item Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => $this->db->get('manage_by')->result_array(),
      'item_nonbundling'  => $this->db->get('item_nonbundling')->result_array(),
      'select'            => ['Yes', 'No']
    ];
    $this->form_validation->set_rules('item_bundling_code', 'item_bundling_code', 'required|trim');
    $this->form_validation->set_rules('item_bundling_name', 'item_bundling_name', 'required|trim');
    $this->form_validation->set_rules('id_manage_by', 'manage by', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('bundling/item_bundling/create');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'item_bundling_code'       => htmlspecialchars($this->input->post('item_bundling_code')),
        'item_bundling_name'       => htmlspecialchars($this->input->post('item_bundling_name')),
        'id_manage_by'             => htmlspecialchars($this->input->post('id_manage_by')),
        'qty'                      => 0,
        'total_price'              => 0,
        'created_date'             => date('Y-m-d')
      ];
      $this->db->insert('item_bundling', $data);
      $id_item_bundling = $this->db->insert_id();
      redirect('bundling/item_bundling/detail_information/' . $id_item_bundling);
    }
  }

  public function detail_information($id_item_bundling)
  {
    $data = [
      'judul'             => 'Detail Information',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => $this->db->get('manage_by')->result_array(),
      'item_nonbundling'  => $this->db->get('item_nonbundling')->result_array(),
      'item_bundling'     => $this->db->query("SELECT * FROM item_bundling WHERE id_item_bundling = $id_item_bundling")->row(),
      'item_bundling_detail'     => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS id ON ibd.id_item_bundling = id.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling  WHERE ibd.id_item_bundling = $id_item_bundling")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('bundling/item_bundling/detail_information');
    $this->load->view('templates/footer');
  }

  public function add_item()
  {
    $id_item_bundling        = $this->input->post('id_item_bundling');
    $id_item_nonbundling     = $this->input->post('id_item_nonbundling');
    $item_qty                = $this->input->post('item_qty');

    // mengambil satu baris data item non bundling
    $item_nonbundling = $this->db->get_where("item_nonbundling", ['id_item_nonbundling' => $id_item_nonbundling])->row();

    $price = $item_qty * $item_nonbundling->publish_price;
    // mengambil satu baris data item bundling
    $item_bundling    = $this->db->get_where("item_bundling", ['id_item_bundling' => $id_item_bundling])->row();

    $data = [
      'id_item_bundling'      => $id_item_bundling,
      'id_item_nonbundling'   => $id_item_nonbundling,
      'item_qty'              => $item_qty,
      'price'                 => $price
    ];

    $this->db->insert('item_bundling_detail', $data);

    $qty = $item_bundling->qty + $item_qty;
    $total_price = $item_bundling->total_price + $price;
    // update tabel item bundling
    $this->db->set('qty', $qty);
    $this->db->set('total_price', $total_price);
    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->update('item_bundling');

    redirect('bundling/item_bundling/detail_information/' . $id_item_bundling);
  }

  public function add_edit_item()
  {
    $id_item_bundling        = $this->input->post('id_item_bundling');
    $id_item_nonbundling     = $this->input->post('id_item_nonbundling');
    $item_qty                = $this->input->post('item_qty');

    // mengambil satu baris data item non bundling
    $item_nonbundling = $this->db->get_where("item_nonbundling", ['id_item_nonbundling' => $id_item_nonbundling])->row();

    $price = $item_qty * $item_nonbundling->publish_price;
    // mengambil satu baris data item bundling
    $item_bundling    = $this->db->get_where("item_bundling", ['id_item_bundling' => $id_item_bundling])->row();

    $data = [
      'id_item_bundling'      => $id_item_bundling,
      'id_item_nonbundling'   => $id_item_nonbundling,
      'item_qty'              => $item_qty,
      'price'                 => $price
    ];

    $this->db->insert('item_bundling_detail', $data);

    $qty = $item_bundling->qty + $item_qty;
    $total_price = $item_bundling->total_price + $price;
    // update tabel item bundling
    $this->db->set('qty', $qty);
    $this->db->set('total_price', $total_price);
    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->update('item_bundling');

    redirect('bundling/item_bundling/edit_item/' . $id_item_bundling);
  }

  public function edit_item($id_item_bundling)
  {
    $data = [
      'judul'             => 'Edit Item Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => $this->db->get('manage_by')->result_array(),
      'item_nonbundling'  => $this->db->get('item_nonbundling')->result_array(),
      'item_bundling'     => $this->db->get_where('item_bundling', ['id_item_bundling' => $id_item_bundling])->row_array(),
      'item_bundling_detail'     => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS id ON ibd.id_item_bundling = id.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling  WHERE ibd.id_item_bundling = $id_item_bundling")->result_array()
    ];
    $this->form_validation->set_rules('item_bundling_code', 'item_bundling_code', 'required|trim');
    $this->form_validation->set_rules('item_bundling_name', 'item_bundling_name', 'required|trim');
    $this->form_validation->set_rules('id_manage_by', 'manage by', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('bundling/item_bundling/edit');
      $this->load->view('templates/footer');
    } else {
      $id_item_bundling            = htmlspecialchars($this->input->post('id_item_bundling'));
      $item_bundling_code          = htmlspecialchars($this->input->post('item_bundling_code'));
      $item_bundling_name          = htmlspecialchars($this->input->post('item_bundling_name'));
      $id_manage_by                = htmlspecialchars($this->input->post('id_manage_by'));

      $this->db->set('item_bundling_code', $item_bundling_code);
      $this->db->set('item_bundling_name', $item_bundling_name);
      $this->db->set('id_manage_by', $id_manage_by);
      $this->db->where('id_item_bundling', $id_item_bundling);
      $this->db->update('item_bundling');

      redirect('bundling/item_bundling/edit_item/' . $id_item_bundling);
    }
  }


  public function delete_item($id_item_bundling)
  {
    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->delete('item_bundling');

    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->delete('item_bundling_detail');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('bundling/item_bundling');
  }

  public function delete_item_satuan()
  {
    $id_item_bundling         = $this->input->post('id_item_bundling');
    $id_item_bundling_detail  = $this->input->post('id_item_bundling_detail');
    $item_qty                 = $this->input->post('item_qty');
    $price                    = $this->input->post('price');
    $this->db->where('id_item_bundling_detail', $id_item_bundling_detail);
    $this->db->delete('item_bundling_detail');


    $item_bundling = $this->db->query("SELECT * FROM item_bundling WHERE id_item_bundling = $id_item_bundling")->row();
    $this->db->set('qty', $item_bundling->qty - $item_qty);
    $this->db->set('total_price', $item_bundling->total_price - $price);
    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->update('item_bundling');

    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('bundling/item_bundling/edit_item/' . $id_item_bundling);
  }

  public function delete_item_satuann()
  {
    $id_item_bundling         = $this->input->post('id_item_bundling');
    $id_item_bundling_detail  = $this->input->post('id_item_bundling_detail');
    $item_qty                 = $this->input->post('item_qty');
    $price                    = $this->input->post('price');
    $this->db->where('id_item_bundling_detail', $id_item_bundling_detail);
    $this->db->delete('item_bundling_detail');


    $item_bundling = $this->db->query("SELECT * FROM item_bundling WHERE id_item_bundling = $id_item_bundling")->row();
    $this->db->set('qty', $item_bundling->qty - $item_qty);
    $this->db->set('total_price', $item_bundling->total_price - $price);
    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->update('item_bundling');

    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('bundling/item_bundling/detail_information/' . $id_item_bundling);
  }
}
