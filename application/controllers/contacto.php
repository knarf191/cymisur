<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

	public function index()
	{
		$this->load();
	}

	private function init($msj, $page, $html)
	{
		$data['msj']  = $msj;
		$data['page'] = $page;
		$data['html'] = $html; 

		$this->load->view('body',$data);
	}

	private function load()
	{
		$html = '';

        $html .= '<div class="col-md-12" id="main">';
            $html .= '<h3>Dejanos tu comentario</h3>';
            $html .= '<HR>';
            $html .= '<div class="col-md-6">';
               $html .= '<form method="post" action="'.base_url().'contacto/enviar">';
                    $html .= '<div class="form-group">';
                        $html .= '<label>Nombre</label>';
                        $html .= '<input type="text" class="form-control" name="nombre" placeholder="Nombre" required id="nombre">';
                    $html .= '</div>';
        
                    $html .= '<div class="form-group">';
                        $html .= '<label>Email</label>';
                        $html .= '<input type="text" class="form-control" name="emil" placeholder="Correo" required id="correo">';
                    $html .= '</div>';
                    $html .= '<div class="form-group">';
                        $html .= '<label>Teléfono</label>';
                        $html .= '<input type="text" class="form-control" name="telefono" placeholder="Teléfono" required id="telefono">';
                    $html .= '</div>';
                    $html .= '<div class="form-group">';
                        $html .= '<label>Comentario y/o Duda</label>';
                        $html .= '<textarea type="text" class="form-control" name="detalles" rows="3" id="detalles"></textarea>';
                    $html .= '</div>';
                    $html .= '<div class="form-group">';
                        $html .= '<input type="submit" class="btn btn-success" value="Enviar Mensaje" id="send">';
                    $html .= '</div>';
               $html .= '</form>';
            $html .= '</div>';

            $html .= '<div class="col-md-6" id="imgContac">';
                $html .= '<img src="'.base_url().'img/recepcionista.png">';
            $html .= '</div>'; 
        $html .= '</div>';

		$this->init('','principal',$html);

	}
}
