<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {

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
            $html .= '<div class="col-md-12">';
        		$html .= '<div class="col-md-6">';
                    $html .= '<h3>Obra Civil</h3>';
                    $html .= '<HR>';
                    $html .= '<p>';
                        $html .= 'CYMISUR se caracteriza por realizar trabajos de tipo civil en areas industriales, casa-habitaciones y edificios publicos y privados, dentro de los cuales incluye: construccion de bardas, inmuebles casa-habitción, fachadas, concreto hidráulico, reparaciones, entre otras.';
                    $html .= '</p>';
                    $html .= '<p>';
                        $html .= 'El principal objetivo de nuestra empresa es brindar el mejor servicio para satisfacer las necesidades y cumplir con los resultados esperados por nuestros clientes, siempre con la confiabilidad de realizar un trabajo de calidad.';
                    $html .= '</p>';
                $html .= '</div>';

                $html .= '<div class="col-md-6">';
                    $html .= '<img src="'.base_url().'img/servicios/civil.png">';
                $html .= '</div>';
            $html .= '</div>';

            $html .= '<div class="col-md-12">';
                $html .= '<div class="col-md-6">';
                   $html .= '<img src="'.base_url().'img/servicios/mecanica.png">';
                $html .= '</div>';

                $html .= '<div class="col-md-6" id="textLeft">';

                 $html .= '<h3>Obra Mecánica</h3>';
                    $html .= '<HR>';
                    $html .= '<p>';
                        $html .= 'Dentro del ramo mecánico contamos con personal ampliamente capacito para realizar estructuras para puentes, silos, elicoidales, estructuras para galeras, talleres, entre otros.';
                    $html .= '</p>';
                    $html .= '<p>';
                        $html .= 'CYMISUR es socialmente responsable es por eso que todo el personal cuenta con las medidas de segurdad correspondientes para que su personal tenga la confianza de realizar su trabajo de la mejor manera posible';
                    $html .= '</p>';
                    
                $html .= '</div>';
            $html .= '</div>';

            $html .= '<div class="col-md-12">';
                $html .= '<div class="col-md-6">';

                    $html .= '<h3>Obra Eléctrica</h3>';
                    $html .= '<HR>';
                    $html .= '<p>';
                        $html .= 'Siendo esta su especialidad y teniendo años de experiencia, CYMISUR brinda servicios eléctricos desde instalacones eléctricas domésticas hasta instlaciones eléctricas industriales';
                    $html .= '</p>';
                    $html .= '<p>';
                        $html .= 'CYMISUR cuenta con la experiencia realizando correcciones instalaciones en casas-habitaciones, pero tambien cuenta con la experiencia de ramo industrial como lo son instalación de pararrayos, sistemas de tierra fisica, entre otros.';
                    $html .= '</p>';
                  
                $html .= '</div>';

                $html .= '<div class="col-md-6" id="textLeft">';
                     $html .= '<img src="'.base_url().'img/servicios/electricidad.png">';                    
                $html .= '</div>';
            $html .= '</div>';

            $html .= '<div class="col-md-12">';
                $html .= '<div class="col-md-6">';
                   $html .= '<img src="'.base_url().'img/servicios/instrumentacion.png">';
                $html .= '</div>';

                $html .= '<div class="col-md-6" id="textLeft">';

                 $html .= '<h3>Instrumentación Eléctrica</h3>';
                    $html .= '<HR>';
                    $html .= '<p>';
                        $html .= 'Si bien el ramo eléctrico es la especialidad, cuenta con personal altamente capacitado para llevar a cabo tareas instrumentistas.';
                    $html .= '</p>';
                    $html .= '<p>';
                        $html .= 'CYMISUR cuenta con personal tableristas que son capaces de cumplir con un trabajo de calidad y con la garantía de cero errores.';
                    $html .= '</p>';
                    
                $html .= '</div>';
            $html .= '</div>';

        $html .= '</div>';

		$this->init('','principal',$html);

	}
}
