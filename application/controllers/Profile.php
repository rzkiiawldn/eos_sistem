<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller 
{

    public function index()
    {
        $data['judul'] = 'Edit Profile';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('edit_profile');
        $this->load->view('templates/footer');
    }
}