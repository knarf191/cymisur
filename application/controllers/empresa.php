<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

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
             $html .= '<h3>Nuestra Historia</h3>';
            $html .= '<HR>';
            $html .= '<p>';
                $html .= 'Construcciones y Mantenimientos Industriales del Sur (CYMISUR) se consolida como una micro empresa en Mayo del 2000 bajo la dirección del Ing. Zosimo Reyes Alor, brindando servicios de obra eléctrica a empresas públicas y privadas de la región, posteriormente su crecimiento lleva a implementar nuevos servicios como lo son obra mecánica, obra civil y obras de instrumentación para la satisfacción de sus clientes.';
            $html .= '</p>';

            $html .= '<p>';
                $html .= 'En sus inicios CYMISUR contaba con poco personal, apenas para cubrir las necesidades de los trabajos requeridos. Gracias al esfuerzo y empeño de su personal y directivos ha crecido y actualmente dispone de personal para cubrir satisfactoriamente todas sus áreas y sin limitaciones.';
            $html .= '</p>';

            $html .= '<p>';
                $html .= 'CYMISUR ha tenido la oportunidad de brindar servicios a empresas importantes de la región tales como Bachoco, Cemex concretos, Materias Primas Monterrey, Silice del Itsmo, Minsa, entre otros.';
            $html .= '</p>';

            $html .= '<p>';
                $html .= 'Actualmente CYMISUR se encuentra en una etapa de desarrollo y crecimiento  constante, implementando nuevas áreas y recursos, viéndose en la necesidad de generar más capital humano y material y de esta manera poder seguir brindando servicios de calidad y en tiempo y forma.';
            $html .= '</p>';

            $html .= '<h3>Misión</h3>';
            $html .= '<HR>';
            $html .= '<p>';
                $html .= 'Brindar un servicio de calidad a todos nuestros clientes en las áreas de obra eléctrica, mecánica, civil y de instrumentación para darles la confiabilidad de seguir trabajando con nosotros en cualquier momento requerido por ellos teniendo como resultado la generación de empleos con el fin de apoyar a los habitantes de la zona.';
            $html .= '</p>';

             $html .= '<h3>Visión</h3>';
            $html .= '<HR>';
            $html .= '<p>';
                $html .= 'Consolidarnos como la mejor empresa de la zona en el ramo industrial, de servicios y mantenimientos en las áreas de obra eléctrica, mecánica, civil y de instrumentación.';
            $html .= '</p>';
        $html .= '</div>';

		$this->init('','principal',$html);
	}
}
