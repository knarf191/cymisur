<?php
	$this->load->view('header_dashboard');

	$this->load->view('sidebar');

	$this->load->view($page);

	$this->load->view('footer_dashboard');
?>