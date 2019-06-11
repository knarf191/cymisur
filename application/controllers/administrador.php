<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function index()
	{
		$this->load();
	}

	private function init($msj, $page, $html)
	{
		$data['msj']  = $msj;
		$data['page'] = $page;
		$data['html'] = $html; 

		$this->load->view('dashboard',$data);
	}

	private function load()
	{
		$html  = '';

        $html .= '<div class="jumbotron col-md-12">';
            $html .= '<form method="post" action="'.base_url().'login/in" id="logAdmin">';
                $html .= '<legend>Iniciar sesión</legend>';
                $html .= '<div class="input-group form-group">';
                    $html .= '<span class="input-group-addon">';
                        $html.= '<i class="fa fa-user"></i>';
                    $html .= '</span>';
                    $html    .= '<input type="text" class="form-control" name="email" placeholder="usuario@example.com" required>';
                $html .= '</div>';
                    
                $html .= '<div class="input-group form-group">';
                    $html .= '<span class="input-group-addon">';
                        $html.= '<i class="fa fa-key"></i>';
                    $html .= '</span>';
                    $html .= '<input type="password" class="form-control" name="password" placeholder="Contraseña" required">';
                $html .= '</div>';                            

                $html .= '<div class="form-group">';
                    $html .= '<input type="submit" class="btn btn-success" value="Aceptar">';
                $html .= '</div>';
            $html .= '</form>';               
        $html .= '</div>';   

		$this->init('','principal',$html);

	}
}
