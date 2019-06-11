<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
    		$html .= '<div class="col-md-6">';
                $html .= '<p>';
                    $html .= 'CYMISUR es una empresa socialmente responsable que cuenta con una gran experiencia en el ramo industrial, sector publico y privado en obras de tipo civil, industrial, mecanica e instrumentacion electrica.';
                $html .= '</p>';
                $html .= '<p>';
                    $html .= 'El principal objetivo de nuestra empresa es brindar el mejor servicio para satisfacer las necesidades y cumplir con los resultados esperados por nuestros clientes, siempre con la confiabilidad de realizar un trabajo de calidad.';
                $html .= '</p>';
            $html .= '</div>';

            $html .= '<div class="col-md-6">';
                $html .= '<div id="slider" class="carousel slide" data-ride="carousel">'; 
                    $html .= '<div class="carousel-inner" role="listbox" id="slider">';
                        $map = directory_map("img/carusel/");
                        foreach ($map as $key => $value) 
                        {
                            if ($key==0) 
                            {
                                $html .= '<div class="item active">';
                                    $html .= '<img src="'.base_url().'img/carusel/'.$value.'" alt="'.$value.'"  '.$key.'">';
                                $html .= '</div>';
                            }
                            else
                            {  
                                $html .= '<div class="item">'; 
                                    $html .= '<img src="'.base_url().'img/carusel/'.$value.'" alt="'.$value.'"  '.$key.'">';
                                $html .= '</div>';
                            }
                        }
                    $html .= '</div>';
                $html .= '</div>';
            $html .= '</div>';   

            $html .= '<div class="col-md-12">';
                $html .= '<div id="slider" class="carousel slide" data-ride="carousel">'; 
                    $html .= '<div class="bxslider">';
                        $map = directory_map("img/logos/");
                        foreach ($map as $key => $value) 
                        {
                            if ($key==0) 
                            {
                                $html .= '<div class="item active">';
                                    $html .= '<img src="'.base_url().'img/logos/'.$value.'" alt="'.$value.'"  '.$key.'">';
                                $html .= '</div>';
                            }
                            else
                            {  
                                $html .= '<div class="item">'; 
                                    $html .= '<img src="'.base_url().'img/logos/'.$value.'" alt="'.$value.'"  '.$key.'">';
                                $html .= '</div>';
                            }
                        }
                    $html .= '</div>';
                $html .= '</div>';
            $html .= '</div>';       
        $html .= '</div>';

		$this->init('','principal',$html);

	}
}
