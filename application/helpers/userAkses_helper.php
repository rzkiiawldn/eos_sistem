<?php

function belum_login()
{
    // buat instansiasi, karena kita tidak bisa membuat this begitu saja
    $ci = get_instance();
    // jika user belum login maka arahkan ke halaman login
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    }
}

function cek_akses($id_level, $id_menu, $id_submenu)
{
    $ci = get_instance();
    // get data terlebih dahulu dari tabel user akses menu, kemudian di sesuaikan
    // id_level = $id_level dan id_menu = $id_menu
    // $akses_menu = $ci->db->get_where('user_access_menu', [
    //     'id_level'      => $id_level,
    //     'id_menu'       => $id_menu,
    //     'id_submenu'    => $id_submenu,
    // ]);
    $ci->db->select('*');
    $ci->db->from('user_access_menu');
    $ci->db->where('id_level', $id_level);
    $ci->db->where('id_menu', $id_menu);
    $ci->db->where('id_submenu', $id_submenu);
    $ci->db->or_where('id_submenu', 0);
    $akses_menu = $ci->db->get();

    // $akses_menu = $ci->db->query("SELECT * user_access_menu WHERE id_level = $id_level AND id_menu = $id_menu AND id_submenu = $id_submenu");

    // jika query akses menu tersebut nilainya lebih dari 1, atau bernilai TRUE maka tampilkan checked

    if ($akses_menu->num_rows() > 0) {
        return "checked='checked'";
    }
}
