<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function index()
    {
        $data = [
            'judul'     => 'Edit Profile',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password1', 'trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('edit_profile');
            $this->load->view('templates/footer');
        } else {
            $id_user          = $this->input->post('id_user');
            $fullname         = $this->input->post('fullname');
            $username         = $this->input->post('username');
            $email            = $this->input->post('email');
            $no_telp          = $this->input->post('phone');
            $password         = $this->input->post('password1');
            $this->db->set('fullname', $fullname);
            $this->db->set('username', $username);
            $this->db->set('email', $email);
            $this->db->set('no_telp', $no_telp);
            if (!empty($password)) {
                $this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
            }
            $this->db->where('id_user', $id_user);
            $this->db->update('user');            
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil diubah</div>');
            redirect('profile');
        }
    }
}
