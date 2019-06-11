<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria extends CI_Controller {

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
        $target_path = "img/galeria/";
        $target_path = $target_path.basename($_FILES['imagen']['name']);
        
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) 
        {
            if($this->input->post()):
                $data = array(    
                    'foto' => $_FILES['imagen']['name'],
                    'informacion' => $this->input->post('informacion') ,            
                );

                $val = $this->agregar->setFotoGaleria($data);

                if ($val) 
                {
                    echo '<script language="javascript">alert("Datos agregados correctaente a la galeria.");</script>'; 
                    redirect(base_url().'dashboard/galeria','refresh');
                }
                else
                {
                    echo '<script language="javascript">alert("Error al intentar cargar los datos, por favor intente de nuevo.");</script>'; 
                    redirect(base_url().'dashboard/galeria','refresh');
                }       
            endif;
        }
        else
        {
            echo '<script language="javascript">alert("Error");</script>'; 
            redirect(base_url().'dashboard/galeria','refresh');
        }
    }

    public function eliminar()
    {
         $dir = "img/galeria/";
        $archivo = $this->input->post('foto');
        $borrar = unlink($dir.$archivo);
        $deleteDB = $this->eliminar->deleteGaleria($archivo);

        if ($borrar and $deleteDB) 
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
            $html .= '<div class="page-header"><h3>Galeria de obras realizadas</h3></div>'; 
            $html .= '<div class="administrador_galeria">'; 
                $html .= '<form method="post" action="'.base_url().'/dashboard/galeria/cargar" enctype="multipart/form-data">';
                    $html .= '<div class="col-md-12">';
                        $html .= '<div class="col-md-4">';
                            $html .= '<input type="file" id="foto" name="imagen" accept="image/jpeg,image/png">';
                        $html .= '</div>';
                        $html .= '<div class="col-md-4">';
                            $html .= '<textarea name="informacion"></textarea>';
                        $html .= '</div>';
                        $html .= '<div class="col-md-4">';
                            $html .= '<input type="submit" name="submit" value="Cargar Datos" class="btn btn-success">';
                        $html .= '</div>';
                    $html .= '</div>';

                $html .= '</form>';

                $html .= '<div class=" col-md-12 galeria">';

                    $datos = $this->consultas->getGaleria();
                    if(!empty($datos))
                    {
                        foreach ($datos as $clave => $row) {
                             $html .= '<div class="col-md-4">';
                                $html .= '<div class="delete" data-img="'.$row->foto.'"><i class="fa fa-times-circle fa-lg" ></i></div>';
                                $html .= '<img src="'.base_url().'img/galeria/'.$row->foto.'" alt="'.$row->foto.'">';
                                $html .= '<p>'.$row->informacion.'</p>';
                            $html .= '</div>'; 
                        }             
                    } 
                $html .= '</div>';
            $html .= '</div>';
        $html .= '</div>';

        $html .= '<div>';
            $html .= '<input type="hidden" value="'.base_url().'dashboard/galeria/eliminar" id="deleteFotoGaleria">';
        $html .= '</div>';

		$this->init('','principal',$html);
	}
}
