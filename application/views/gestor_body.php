<?php
	$this->load->view('header_app');

	$this->load->view('navbar');

	$this->load->view($page);

	$this->load->view('footer_dashboard');
?>