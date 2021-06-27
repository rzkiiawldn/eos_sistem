<?php

class Request_bundling extends CI_Controller
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
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN packing_type AS pt ON rb.id_packing_type = pt.id_packing_type JOIN status ON rb.id_status = status.id_status WHERE rb.id_client = $id1")->result_array();
    } elseif ($id2 != null) {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN packing_type AS pt ON rb.id_packing_type = pt.id_packing_type JOIN status ON rb.id_status = status.id_status WHERE rb.id_client = $id1 AND rb.id_location = $id2")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN packing_type AS pt ON rb.id_packing_type = pt.id_packing_type JOIN status ON rb.id_status = status.id_status")->result_array();
    }

    $user    = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data = [
      'judul'             => 'Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $user,
      'request_bundling'  => $item,
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('bundling/request_bundling/index');
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
      'judul'             => 'Request Bundling',
      'user'              => $user,
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling AS rb LEFT JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling LEFT JOIN packing_type AS pt ON rb.id_packing_type = pt.id_packing_type LEFT JOIN status ON rb.id_status = status.id_status WHERE rb.id_client = '$id_client'")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('bundling/request_bundling/index');
    $this->load->view('templates/footer');
  }

  public function detail_itemclient($id_request_bundling)
  {
    $data = [
      'judul'             => 'Detail Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN packing_type AS pt ON rb.id_packing_type = pt.id_packing_type JOIN status ON rb.id_status = status.id_status WHERE id_request_bundling = $id_request_bundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('bundling/request_bundling/detail');
    $this->load->view('templates/footer');
  }

  public function detail_item($id_client = null, $id_location = null, $id_request_bundling)
  {
    $id1 = $id_client;
    $id2 = $id_location;
    $data = [
      'judul'             => 'Detail Request Bundling',
      'nama_menu'         => 'bundling',
      'id_client'   => $id1,
      'id_location' => $id2,
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN packing_type AS pt ON rb.id_packing_type = pt.id_packing_type JOIN status ON rb.id_status = status.id_status WHERE id_request_bundling = $id_request_bundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('bundling/request_bundling/detail');
    $this->load->view('templates/footer');
  }

  public function create_item($id_client = null, $id_location = null)
  {
    $id1 = $id_client;
    $id2 = $id_location;
    $data = [
      'judul'             => 'Create Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'      => $this->db->get('packing_type')->result_array(),
      'status'            => $this->db->get('status')->result_array(),
      'item_bundling'     => $this->db->get('item_bundling')->result_array(),
      'id_client'   => $id1,
      'id_location' => $id2,
    ];
    $this->form_validation->set_rules('request_bundling_code', 'request_bundling_code', 'required|trim');
    $this->form_validation->set_rules('bundling_type', 'bundling_type', 'required|trim');
    $this->form_validation->set_rules('id_item_bundling', 'id item bundling', 'required|trim');
    $this->form_validation->set_rules('request_quantity', 'request_quantity', 'required|trim');
    $this->form_validation->set_rules('id_packing_type', 'id_packing_type', 'required|trim');
    $this->form_validation->set_rules('id_status', 'id_status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('bundling/request_bundling/create');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'request_bundling_barcode'    => htmlspecialchars($this->input->post('request_bundling_barcode')),
        'request_bundling_code'       => htmlspecialchars($this->input->post('request_bundling_code')),
        'bundling_type'               => htmlspecialchars($this->input->post('bundling_type')),
        'id_item_bundling'            => htmlspecialchars($this->input->post('id_item_bundling')),
        'request_quantity'            => htmlspecialchars($this->input->post('request_quantity')),
        'id_packing_type'             => $this->input->post('id_packing_type'),
        'id_status'                   => $this->input->post('id_status'),
        'id_user'                     => $data['user']['id_user'],
        'id_client'                   => $this->input->post('id_client'),
        'id_location'                 => $this->input->post('id_location'),
      ];
      $this->db->insert('request_bundling', $data);

      if (!empty($this->uri->segment(5))) {
        redirect('bundling/request_bundling/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
      } else {
        redirect('bundling/request_bundling');
      }
    }
  }

  public function edit_item($id_client = null, $id_location = null, $id_request_bundling)
  {
    $id1 = $id_client;
    $id2 = $id_location;
    $data = [
      'judul'             => 'Edit Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'      => $this->db->get('packing_type')->result_array(),
      'item_bundling'     => $this->db->get('item_bundling')->result_array(),
      'status'            => $this->db->get('status')->result_array(),
      'id_client'         => $id1,
      'id_location'       => $id2,
      'request_bundling'  => $this->db->get_where('request_bundling', ['id_request_bundling' => $id_request_bundling])->row_array(),
    ];
    $this->form_validation->set_rules('request_bundling_code', 'request_bundling_code', 'required|trim');
    $this->form_validation->set_rules('bundling_type', 'bundling_type', 'required|trim');
    $this->form_validation->set_rules('request_quantity', 'request_quantity', 'required|trim');
    $this->form_validation->set_rules('id_item_bundling', 'id item bundling', 'required|trim');
    $this->form_validation->set_rules('id_packing_type', 'id_packing_type', 'required|trim');
    $this->form_validation->set_rules('id_status', 'id_status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('bundling/request_bundling/edit');
      $this->load->view('templates/footer');
    } else {
      $id_request_bundling        = htmlspecialchars($this->input->post('id_request_bundling'));
      $request_bundling_code      = htmlspecialchars($this->input->post('request_bundling_code'));
      $request_bundling_barcode      = htmlspecialchars($this->input->post('request_bundling_barcode'));
      $bundling_type              = htmlspecialchars($this->input->post('bundling_type'));
      $id_item_bundling           = htmlspecialchars($this->input->post('id_item_bundling'));
      $request_quantity           = htmlspecialchars($this->input->post('request_quantity'));
      $id_packing_type            = htmlspecialchars($this->input->post('id_packing_type'));
      $id_status                  = htmlspecialchars($this->input->post('id_status'));

      $this->db->set('request_bundling_barcode', $request_bundling_barcode);
      $this->db->set('request_bundling_code', $request_bundling_code);
      $this->db->set('bundling_type', $bundling_type);
      $this->db->set('id_item_bundling', $id_item_bundling);
      $this->db->set('request_quantity', $request_quantity);
      $this->db->set('id_packing_type', $id_packing_type);
      $this->db->set('id_status', $id_status);
      $this->db->where('id_request_bundling', $id_request_bundling);
      $this->db->update('request_bundling');

      if (!empty($this->uri->segment(5))) {
        redirect('bundling/request_bundling/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
      } else {
        redirect('bundling/request_bundling');
      }
    }
  }


  public function delete_item($id_client = null, $id_location = null, $id_request_bundling)
  {
    $this->db->where('id_request_bundling', $id_request_bundling);
    $this->db->delete('request_bundling');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    if (!empty($this->uri->segment(5))) {
      redirect('bundling/request_bundling/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
    } else {
      redirect('bundling/request_bundling');
    }
  }

  // REQUEST
  public function request()
  {
    $data = [
      'judul'             => 'Request',
      'nama_menu'         => 'Request',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'      => $this->db->get('packing_type')->result_array(),
      'status'            => $this->db->get('status')->result_array(),
      'item_bundling'     => $this->db->get('item_bundling')->result_array(),
    ];
    $this->form_validation->set_rules('request_bundling_code', 'request_bundling_code', 'required|trim');
    $this->form_validation->set_rules('bundling_type', 'bundling_type', 'required|trim');
    $this->form_validation->set_rules('id_item_bundling', 'id item bundling', 'required|trim');
    $this->form_validation->set_rules('request_quantity', 'request_quantity', 'required|trim');
    $this->form_validation->set_rules('id_packing_type', 'id_packing_type', 'required|trim');
    $this->form_validation->set_rules('id_status', 'id_status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('bundling/request_bundling/request');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'request_bundling_barcode'       => htmlspecialchars($this->input->post('request_bundling_barcode')),
        'request_bundling_code'       => htmlspecialchars($this->input->post('request_bundling_code')),
        'bundling_type'               => htmlspecialchars($this->input->post('bundling_type')),
        'id_item_bundling'            => htmlspecialchars($this->input->post('id_item_bundling')),
        'request_quantity'            => htmlspecialchars($this->input->post('request_quantity')),
        'id_packing_type'             => $this->input->post('id_packing_type'),
        'id_status'                   => $this->input->post('id_status'),
        'id_user'                     => $data['user']['id_user']
      ];
      $this->db->insert('request_bundling', $data);
      redirect('bundling/request_bundling');
    }
  }
}
