<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('NIP')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('menu', ['url' => $menu])->row_array();
        $menuId = $queryMenu['id'];

        $userAccessMenu = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menuId])->row_array();

        if (!$userAccessMenu) {
            redirect('auth/blocked');
        }
    }
}

function session()
{
    $ci = get_instance();
    if (!$ci->session->userdata('NIP')) {
        redirect('auth');
    }
}
