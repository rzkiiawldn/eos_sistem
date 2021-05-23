<?php

function belum_login()
{
    // buat instansiasi, karena kita tidak bisa membuat this begitu saja
    $ci = get_instance();
    // jika user belum login maka arahkan ke halaman login
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        // jika sudah login di cek dulu, user tersebut dari role apa ? dengan cara mengambil data dari session role
        $department_id    	= $ci->session->userdata('department_id');

        // kemudian cek, kita berada di menu apa dengan menggunakan uri->segment()
        $menu       		= $ci->uri->segment(1);

        // maksud tujuan mengecek kita berada di menu apa, untuk menyocokan uri->segment dengan role

        // kemudian kita query lagi di tabel role, cocokan apakah field role sama atau tidak dengan uri->segment
        $queryAkses    		= $ci->db->get_where('department', [
            'department_id'   	=> $department_id,
            'kd_department'      		=> $menu
        ]);

        // lalu di cek kembali, jika user akses ada datanya maka jalankan
        // jika tidak ada atau < 1, maka arahkann ke halaman blocked
        if ($queryAkses->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
