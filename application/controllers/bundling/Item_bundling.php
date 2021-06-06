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
      'item_bundling'   => $this->db->get_where('item_bundling', ['id_item_bundling' => $id_item_bundling])->row_array()
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
    $this->form_validation->set_rules('id_item_nonbundling', 'id_item_nonbundling', 'required|trim');
    $this->form_validation->set_rules('total_price', 'total_price', 'required|trim');

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
        'id_item_nonbundling'      => htmlspecialchars($this->input->post('id_item_nonbundling')),
        'total_price'              => $this->input->post('total_price'),
      ];
      $this->db->insert('item_bundling', $data);
      redirect('bundling/item_bundling');
    }
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
    ];
    $this->form_validation->set_rules('item_bundling_code', 'item_bundling_code', 'required|trim');
    $this->form_validation->set_rules('item_bundling_name', 'item_bundling_name', 'required|trim');
    $this->form_validation->set_rules('id_item_nonbundling', 'id_item_nonbundling', 'required|trim');
    $this->form_validation->set_rules('id_manage_by', 'manage by', 'required|trim');
    $this->form_validation->set_rules('total_price', 'total_price', 'required|trim');

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
      $id_item_nonbundling         = htmlspecialchars($this->input->post('id_item_nonbundling'));
      $total_price                 = htmlspecialchars($this->input->post('total_price'));

      $this->db->set('item_bundling_code', $item_bundling_code);
      $this->db->set('item_bundling_name', $item_bundling_name);
      $this->db->set('id_manage_by', $id_manage_by);
      $this->db->set('id_item_nonbundling', $id_item_nonbundling);
      $this->db->set('total_price', $total_price);
      $this->db->where('id_item_bundling', $id_item_bundling);
      $this->db->update('item_bundling');

      redirect('bundling/item_bundling');
    }
  }


  public function delete_item($id_item_bundling)
  {
    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->delete('item_bundling');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('bundling/item_bundling');
  }
}
