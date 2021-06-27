<?php

class Item_bundling extends CI_Controller
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
      $item = $this->db->query("SELECT * FROM item_bundling WHERE id_client = $id1")->result_array();
    } elseif ($id2 != null) {
      $item = $this->db->query("SELECT * FROM item_bundling WHERE id_client = $id1 AND id_location = $id2")->result_array();
    } else {
      $item = $this->db->get('item_bundling')->result_array();
    }

    $data = [
      'nama_menu'         => 'bundling',
      'judul'             => 'Item Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'client'            => $this->db->get('client')->result_array(),
      'location'          => $this->db->get('location')->result_array(),
      'manage_by'         => $this->db->get('manage_by')->result_array(),
      'item_bundling'     => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('bundling/item_bundling/index');
    $this->load->view('templates/footer');
  }

  public function index_client()
  {
    $user     = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $id_user  = $user['id_user'];
    $client   = $this->db->get_where('client', ['user_id' => $id_user])->row_array();
    $id_client = $client['id_client'];
    $data = [
      'nama_menu'         => 'bundling',
      'judul'             => 'Item Bundling',
      'user'              => $user,
      'item_bundling'     => $this->db->get_where('item_bundling', ['id_client' => $id_client])->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('bundling/item_bundling/index');
    $this->load->view('templates/footer');
  }
  public function detail_itemclient($id_item_bundling)
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

  public function detail_item($id_client = null, $id_location = null, $id_item_bundling)
  {
    $id1 = $id_client;
    $id2 = $id_location;
    $data = [
      'nama_menu'       => 'bundling',
      'judul'           => 'Detail Item Bundling',
      'id_client'   => $id1,
      'id_location' => $id2,
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

  public function create_item($id_client = null, $id_location = null)
  {
    $id1 = $id_client;
    $id2 = $id_location;
    $data = [
      'judul'             => 'Create Item Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => $this->db->get('manage_by')->result_array(),
      'id_client'   => $id1,
      'id_location' => $id2,
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
        'item_bundling_barcode'    => htmlspecialchars($this->input->post('item_bundling_barcode')),
        'id_manage_by'             => htmlspecialchars($this->input->post('id_manage_by')),
        'qty'                      => 0,
        'total_price'              => 0,
        'id_client'             => htmlspecialchars($this->input->post('id_client')),
        'id_location'             => htmlspecialchars($this->input->post('id_location')),
        'created_date'             => date('Y-m-d'),
        'created_by'               => $this->session->userdata('id_user'),
      ];
      $this->db->insert('item_bundling', $data);

      if (!empty($this->uri->segment(5))) {
        $id_item_bundling = $this->db->insert_id();
        redirect('bundling/item_bundling/detail_information/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
      } else {
        $id_item_bundling = $this->db->insert_id();
        redirect('bundling/item_bundling/detail_information/' . $id_item_bundling);
      }
    }
  }

  public function detail_information($id_client = null, $id_location = null, $id_item_bundling)
  {
    $id1 = $id_client;
    $id2 = $id_location;
    $data = [
      'judul'             => 'Detail Information',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => $this->db->get('manage_by')->result_array(),
      'item_nonbundling'  => $this->db->get('item_nonbundling')->result_array(),
      'id_client'         => $id1,
      'id_location'       => $id2,
      'item_bundling'     => $this->db->query("SELECT * FROM item_bundling WHERE id_item_bundling = $id_item_bundling")->row(),
      'item_bundling_detail'     => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS id ON ibd.id_item_bundling = id.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling  WHERE ibd.id_item_bundling = $id_item_bundling")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('bundling/item_bundling/detail_information');
    $this->load->view('templates/footer');
  }

  public function add_item($id_client = null, $id_location = null)
  {
    $id_item_bundling        = $this->input->post('id_item_bundling');
    $id_item_nonbundling     = $this->input->post('id_item_nonbundling');
    $item_qty                = $this->input->post('item_qty');

    $cek = $this->db->query("SELECT * FROM item_bundling_detail WHERE id_item_bundling = $id_item_bundling AND id_item_nonbundling = $id_item_nonbundling");

    if ($cek->num_rows() > 0) {
      // echo "<script> 
      // alert('item tidak boleh sama, silahkan pilih item lainnya');
      // </script>";

      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">item tidak boleh sama, silahkan pilih item lainnya</div>');
      if (!empty($this->uri->segment(5))) {
        redirect('bundling/item_bundling/detail_information/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
      } else {
        redirect('bundling/item_bundling/detail_information/' . $id_item_bundling);
      }
    } else {

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

      if (!empty($this->uri->segment(5))) {
        redirect('bundling/item_bundling/detail_information/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
      } else {
        redirect('bundling/item_bundling/detail_information/' . $id_item_bundling);
      }
    }
  }

  public function add_edit_item($id_client = null, $id_location = null)
  {
    $id_item_bundling        = $this->input->post('id_item_bundling');
    $id_item_nonbundling     = $this->input->post('id_item_nonbundling');
    $item_qty                = $this->input->post('item_qty');

    $cek = $this->db->query("SELECT * FROM item_bundling_detail WHERE id_item_bundling = $id_item_bundling AND id_item_nonbundling = $id_item_nonbundling");

    if ($cek->num_rows() > 0) {
      // echo "<script> 
      // alert('item tidak boleh sama, silahkan pilih item lainnya');
      // </script>";

      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">item tidak boleh sama, silahkan pilih item lainnya</div>');
      if (!empty($this->uri->segment(5))) {
        redirect('bundling/item_bundling/edit_item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
      } else {
        redirect('bundling/item_bundling/edit_item/' . $id_item_bundling);
      }
    } else {

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

      if (!empty($this->uri->segment(5))) {
        redirect('bundling/item_bundling/edit_item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
      } else {
        redirect('bundling/item_bundling/edit_item/' . $id_item_bundling);
      }
    }
  }

  public function edit_item($id_client = null, $id_location = null, $id_item_bundling)
  {
    $id1 = $id_client;
    $id2 = $id_location;
    $data = [
      'judul'             => 'Edit Item Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => $this->db->get('manage_by')->result_array(),
      'item_nonbundling'  => $this->db->get('item_nonbundling')->result_array(),
      'item_bundling'     => $this->db->get_where('item_bundling', ['id_item_bundling' => $id_item_bundling])->row_array(),
      'id_client'         => $id1,
      'id_location'       => $id2,
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
      $item_bundling_barcode       = htmlspecialchars($this->input->post('item_bundling_barcode'));
      $id_manage_by                = htmlspecialchars($this->input->post('id_manage_by'));

      $this->db->set('item_bundling_code', $item_bundling_code);
      $this->db->set('item_bundling_name', $item_bundling_name);
      $this->db->set('item_bundling_barcode', $item_bundling_barcode);
      $this->db->set('id_manage_by', $id_manage_by);
      $this->db->where('id_item_bundling', $id_item_bundling);
      $this->db->update('item_bundling');
      if (!empty($this->uri->segment(5))) {
        redirect('bundling/item_bundling/edit_item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
      } else {
        redirect('bundling/item_bundling/edit_item/' . $id_item_bundling);
      }
    }
  }


  public function delete_item($id_client = null, $id_location = null, $id_item_bundling)
  {
    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->delete('item_bundling');

    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->delete('item_bundling_detail');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    if (!empty($this->uri->segment(5))) {
      redirect('bundling/item_bundling/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
    } else {
      redirect('bundling/item_bundling');
    }
  }

  public function delete_item_satuan($id_client = null, $id_location = null)
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

    if (!empty($this->uri->segment(5))) {
      redirect('bundling/item_bundling/edit_item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
    } else {
      redirect('bundling/item_bundling/edit_item/' . $id_item_bundling);
    }
  }

  public function delete_item_satuann($id_client = null, $id_location = null)
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

    if (!empty($this->uri->segment(5))) {
      redirect('bundling/item_bundling/detail_information/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
    } else {
      redirect('bundling/item_bundling/detail_information/' . $id_item_bundling);
    }
  }
}
