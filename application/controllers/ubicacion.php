<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubicacion extends CI_Controller {

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
               $html .= '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d948.829442809486!2d-94.71896241307948!3d17.963946902189726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5fdaeb2d641c7c51!2sCYMISUR!5e0!3m2!1ses-419!2s!4v1464203043802" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>';
            $html .= '</div>';

            $html .= '<div class="col-md-6" id="textLeft">';

             $html .= '<h3>Oficinas</h3>';
                $html .= '<HR>';
                $html .= '<h4>Jaltipan, Veracruz</h4>';
                $html .= '<p>Calle Miguel Hidalgo No. 508 int.</p>';
                $html .= '<p>Col. Centro</p>';
                $html .= '<p>Tel. 922 26 4 74 72</p>';
                $html .= '<p>Email: cymisur_2000@hotmail.com</p>';
        	$html .= '</div>';
        $html .= '</div>';

		$this->init('','principal',$html);

	}
}
