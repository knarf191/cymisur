<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load();
	}

	private function init($msj, $page, $html)
	{
		if($this->session->userdata('logueado'))
        {
            $data = array();
            $data['nombre'] = $this->session->userdata('nombre');
            $data['msj']  = $msj;
            $data['page'] = $page;
            $data['html'] = $html;
            $this->load->view('body_dashboard',$data);
        }               
        else
        {       
            redirect(base_url().'administrador','refresh');
        }
	}

	private function load()
	{
		$html  = '';

        $html .= '<div class="span12" id="page-content-wrapper">';
            $html .= '<div class="content-table">'; 
                $html .= '<div class="page-header"><h3>Dashboard</h3></div>'; 


                $html .= '</div>';
            $html .= '</div>';
        $html .= '</div>';

		$this->init('','principal',$html);
	}
}
