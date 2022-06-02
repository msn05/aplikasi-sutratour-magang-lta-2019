<?php

function check_already_login(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('email');

	if($user_session){
		redirect('page');
	}

}

function check_not_login(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('email');

	if(!$user_session){
		redirect('users_login/login_karyawan');
	}	

}

function lah(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('email');

	if($user_session){
		redirect('dashboard');
	}

}

function belom(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('email');

	if(!$user_session){
		redirect('jamaah_login');
	}	

}

function tampil($str)
{
	echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}