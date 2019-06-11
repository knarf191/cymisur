<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Herramientas extends CI_Controller {

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
            $data['msj']    = $msj;
            $data['page']   = $page;
            $data['html']   = $html;
            $this->load->view('gestor_body',$data);
        }               
        else
        {       
            redirect(base_url().'gestor','refresh');
        }
	}

    public function agregar()
    {
        if($this->input->post())
        {
            $data_post = array(
                'id'          => $this->input->post('id'),
                'herramienta' => $this->input->post('herramienta') ,
                'cantidad'    => $this->input->post('cantidad') ,
                'tipo'        => $this->input->post('tipo') , 
                'bodega'      => $this->input->post('bodega') ,
                'obra'        => $this->input->post('obra') ,       
            );

            $validation = $this->agregar->setHerramientas($data_post);

            if ($validation) 
            {
                echo '<script language="javascript">alert("Los datos se han agregado correctamente");</script>';
                redirect(base_url().'app/herramientas','refresh');
            }

            else
            {
                echo '<script language="javascript">alert("No se han podido cargar los datos, intente de nuevo");</script>'; 
                redirect(base_url().'app/herramientas','refresh'); 
            }       
        }
    }

    function update()
    {
        
        if ($this->input->post()) 
        {

            $id = $this->input->post('id');

            $data = array(
                'id'          => $this->input->post('id'),
                'herramienta' => $this->input->post('herramienta') ,
                'cantidad'    => $this->input->post('cantidad') ,
                'tipo'        => $this->input->post('tipo') , 
                'bodega'      => $this->input->post('bodega') ,
                'obra'        => $this->input->post('obra') ,      
            );

            $validation = $this->agregar->updateHerramientas($id,$data);


            if($id)
            {   
                echo "true";        
            }
            else
            {
                echo "false";
            } 
        }   
    }

    function eliminar()
    {       
        $id = $this->input->post('id');
        $delete = $this->eliminar->deleteHerramientas($id);

        if($delete)
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

        $da = $this->consultas->getHerramientas();

        $html .= '<div class="span12">';
            
            $html .= '<div class="page-header"><h3>Herramientas</h3></div>'; 
                $html .= '<div class="content-table table-responsive">'; 
                    $html .= '<form class="form-inline" action="'.base_url().'app/herramientas/agregar" method="post">';
                        $html .= '<table id="tHerramientas" class="table table-striped table-bordered table-hover table-condensed">';
                            $html .= '<thead>';
                                $html .= '<tr>';
                                    $html .= '<th>ID</th>';
                                    $html .= '<th>Herramienta</th>';
                                    $html .= '<th>Cantidad</th>';
                                    $html .= '<th>Tipo</th>';
                                    $html .= '<th>Cant. Bodega</th>';
                                    $html .= '<th>Cant. Obras</th>';
                                    $html .= '<th></th>';
                                    $html .= '</tr>';
                            $html .= '</thead>';
                            $html .= '<tbody>';
                                if(!empty($da))
                                {
                                    foreach ($da as $clave => $row) 
                                    {
                                        $html .= '<tr>';
                                            $html .= '<td>'.$row->id.'</td>';
                                            $html .= '<td>'.$row->herramienta.'</td>';
                                            $html .= '<td>'.$row->cantidad.'</td>';
                                            $html .= '<td>'.$row->tipo.'</td>';
                                            $html .= '<td>'.$row->bodega.'</td>';
                                            $html .= '<td>'.$row->obra.'</td>';
                                            $html .= '<td>';
                                                $html .= '<button class="btn btn-danger" title="Eliminar"><i class="fa fa-minus-circle"></i></button>';
                                                $html .= '  <a href="" class="btn btn-warning" title="Modificar">';
                                                    $html .= '<i class="fa fa-pencil"></i>';
                                                $html .= '</a>';
                                            $html .= '</td>';     
                                        $html .= '</tr>';
                                    }
                                }
                                    $html .= '<tr>';
                                        $html .= '<td><input type="text" required=""  name="id"       class="form-control"></td>';
                                        $html .= '<td><input type="text" required=""  name="herramienta"   class="form-control"></td>';
                                        $html .= '<td><input type="text" required=""  name="cantidad"    class="form-control"></td>';
                                        $html .= '<td><input type="text" required=""  name="tipo" class="form-control"></td>';
                                        $html .= '<td><input type="text" required=""  name="bodega"   class="form-control"></td>';
                                        $html .= '<td><input type="text" required=""  name="obra"    class="form-control"></td>';
                                        $html .= '<td>';
                                            $html .= '<input type="submit" name="submit" value="Agregar" class="btn btn-success">';     
                                        $html .= '</td>';
                                    $html .= '</tr>';   
                                $html .= '</div>';
                            $html .= '</tbody>';
                        $html .= '</table>';                
                    $html .= '</form>';

                    $html .= '<div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalHerramientas" role="dialog" aria-bellebdy="mymodalLabel" aira-hidden="true">';
                        $html .= '<div class="modal-dialog modal-sm">';
                            $html .= '<div class="modal-content">';
                                $html .= '<div class="modal-header">';
                                    $html .= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                                    $html .= '<h4 class="modal-title" id="mymodalLabel">Modificacion de registro</h4>';
                                $html .= '</div>';
                                $html .= '<div class="modal-body">';
                                    $html .= '<form method="post" action="'.base_url().'app/herramientas/update" id="updateHerramientas">';
                                        $html .= '<p>ID: <input type="text" name="id" value="" class="form-control" id="idHerramienta" required=""><br></p>';
                                        $html .= '<p>Herramienta: <input type="text" name="herramienta" value="" class="form-control" id="herramienta" required=""><br></p>';
                                        $html .= '<p>Cantidad: <input type="text" name="cantidad" value="" class="form-control" id="cantidad" required=""></p>';
                                        $html .= '<p>Tipo: <input type="text" name="tipo" value="" class="form-control" id="tipo" required=""><br></p>';
                                        $html .= '<p>Bodega: <input type="text" name="bodega" value="" class="form-control" id="bodega" required=""><br></p>';
                                        $html .= '<p>Obra: <input type="text" name="obra" value="" class="form-control" id="obra" required=""></p>';
                                        $html .= '<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar </button>';
                                        $html .= '<input type="submit" class="btn btn-success" value="Guardar" id="saveHerramienta">';
                                        $html .= '<br>';
                                    $html .= '</form>';
                                $html .= '</div>';
                            $html .= '</div>';
                        $html .= '</div>';
                    $html .= '</div>';

                $html .= '</div>';
            $html .= '</div>';
        $html .= '</div>';

        $html .= '<div>';
            $html .= '<input type="hidden" value="'.base_url().'app/herramientas/eliminar" id="deleteHerramienta">';
        $html .= '</div>';

		$this->init('','principal',$html);
	}
}
