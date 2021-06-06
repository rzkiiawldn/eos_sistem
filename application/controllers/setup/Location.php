<?php

class Location extends CI_Controller
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
      'judul'     => 'Location',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'location'  => $this->location_model->get()->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('setup/location/index');
    $this->load->view('templates/footer');
  }

  public function create_location()
  {
    $data = [
      'judul'     => 'Create Location',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'location'  => $this->location_model->get()->result_array()
    ];
    $this->form_validation->set_rules('location_code', 'Location Code', 'required|trim');
    $this->form_validation->set_rules('location_name', 'Location name', 'required|trim');
    $this->form_validation->set_rules('address', 'Address', 'required|trim');
    $this->form_validation->set_rules('province', 'Province', 'required|trim');
    $this->form_validation->set_rules('country', 'Country', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/location/create');
      $this->load->view('templates/footer');
    } else {

      $data_location = [
        'location_code'   => $this->input->post('location_code'),
        'location_name'   => $this->input->post('location_name'),
        'address'         => $this->input->post('address'),
        'province'        => $this->input->post('province'),
        'country'         => $this->input->post('country'),
        'created_date'    => date('Y-m-d H:i:s'),
        'created_by'      => $data['user']['fullname'],
      ];
      $this->location_model->add($data_location);
      $this->session->set_flashdata('message8', 'dataloc');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">location Berhasil ditambah</div>');
      redirect('setup/location');
    }
  }

  public function edit_location($id_location)
  {
    $data = [
      'judul'     => 'Edit Location',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'location'  => $this->location_model->get($id_location)->row_array()
    ];
    $this->form_validation->set_rules('location_code', 'Location Code', 'required|trim');
    $this->form_validation->set_rules('location_name', 'Location name', 'required|trim');
    $this->form_validation->set_rules('address', 'Address', 'required|trim');
    $this->form_validation->set_rules('province', 'Province', 'required|trim');
    $this->form_validation->set_rules('country', 'Country', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/location/edit');
      $this->load->view('templates/footer');
    } else {
      $id_location        = $this->input->post('id_location');
      $location_code      = $this->input->post('location_code');
      $location_name      = $this->input->post('location_name');
      $address            = $this->input->post('address');
      $province           = $this->input->post('province');
      $country            = $this->input->post('country');

      $this->db->set('location_code', $location_code);
      $this->db->set('location_name', $location_name);
      $this->db->set('address', $address);
      $this->db->set('province', $province);
      $this->db->set('country', $country);
      $this->db->where('id_location', $id_location);
      $this->location_model->edit();

      $this->session->set_flashdata('message2', 'wrongusername');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">location Berhasil diubah</div>');
      redirect('setup/location');
    }
  }

  public function delete_location($id_location)
  {
    $this->location_model->delete($id_location);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">location Berhasil Didelete</div>');
    redirect('setup/location');
  }
}
