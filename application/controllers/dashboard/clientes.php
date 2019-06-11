<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

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

    function cargar()
    {
        $target_path = "img/logos/";
        $target_path = $target_path.basename($_FILES['inLogo']['name']);

                
        if (move_uploaded_file($_FILES['inLogo']['tmp_name'], $target_path)) 
        {
            echo '<script language="javascript">alert("La imagen se ha cargado correctamente");</script>'; 
            redirect(base_url().'dashboard/clientes','refresh');
        }
        else
        {
            echo '<script language="javascript">alert("Error: Algo ha salido mal, por favor intente de nuevo");</script>';
            redirect(base_url().'dashboard/clientes','refresh');
        }
    }

    public function eliminar()
    {
        $dir = "img/logos/";
        $archivo = $this->input->post('valor');
        $borrar = unlink($dir.$archivo);

        if ($borrar) 
        {
            echo "true";
        }
        else
        {
            echo "false";
        }
    }

	private function load()
	{
		$html  = '';

        $da = $this->consultas->getAdministradores();

        $html .= '<div class="span12" id="page-content-wrapper">';
            $html .= '<div class="page-header"><h3>Clientes</h3></div>'; 
            $html .= '<div class="administrador_clientes">'; 

                $html .= '<form method="post" action="'.base_url().'/dashboard/clientes/cargar" enctype="multipart/form-data">';
                    $html .= '<input type="file" id="inBackground" name="inLogo" accept="image/jpeg,image/png">';
                    $html .= '<br>';
                    $html .= '<input type="submit" name="submit" value="Cargar Imagen" class="btn btn-success">';
                $html .= '</form>';

                $html .= '<div class="logos_clientes">'; 
                    $map = directory_map("img/logos/");
                    foreach ($map as $key => $value) 
                    {
                        $html .= '<div class="col-md-4">';
                            $html .= '<div class="delete" data-img="'.$value.'"><i class="fa fa-times-circle fa-lg" ></i></div>';
                            $html .= '<img src="'.base_url().'img/logos/'.$value.'" alt="'.$value.'"  '.$key.'" class="img-responsive">';   
                        $html .= '</div>';     
                    }
                $html .= '</div>';
            $html .= '</div>';
        $html .= '</div>';

        $html .= '<div>';
            $html .= '<input type="hidden" value="'.base_url().'dashboard/clientes/eliminar" id="deleteCliente">';
        $html .= '</div>';

		$this->init('','principal',$html);
	}
}
