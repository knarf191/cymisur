<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria extends CI_Controller {

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
           $html .= '<h3>Trabajos realizados</h3>';
           $html .= '<HR>';
            $datos = $this->consultas->getGaleria();
            if(!empty($datos))
            {
                foreach ($datos as $clave => $row) {
                     $html .= '<div class="col-md-4">';
                        $html .= '<img src="'.base_url().'img/galeria/'.$row->foto.'" alt="'.$row->foto.'">';
                        $html .= '<p>'.$row->informacion.'</p>';
                    $html .= '</div>'; 
                }             
            }
           $html .= '<HR>';
        $html .= '</div>';

		$this->init('','principal',$html);
	}
}
