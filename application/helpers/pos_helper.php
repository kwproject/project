<?php

function check_session()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('isLogin');
    if($session!='oke')
    {
        redirect('login/login_form');
    }
}


function chek_session_login()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('isLogin');
    if($session=='oke')
    {
        redirect('dashboard');
    }
}
?>
