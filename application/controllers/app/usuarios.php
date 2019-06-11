<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

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
                'id'        => $this->input->post('id'),
                'nombre'    => $this->input->post('nombre') ,
                'email'     => $this->input->post('email') ,
                'password'  => $this->input->post('password') ,         
            );

            $validation = $this->agregar->setUsuarios($data_post);

            if ($validation) 
            {
                echo '<script language="javascript">alert("Los datos se han agregado correctamente");</script>';
                redirect(base_url().'app/usuarios','refresh');
            }

            else
            {
                echo '<script language="javascript">alert("No se han podido cargar los datos, intente de nuevo");</script>'; 
                redirect(base_url().'app/usuarios','refresh'); 
            }       
        }
    }

    function modificar()
    {
        
        if ($this->input->post()) 
        {
            $email = $this->input->post('email');

            $data = array(  
            'id'       => $this->input->post('id'),
            'nombre'   => $this->input->post('nombre'),
            'email'    => $this->input->post('email'),
            'password' => $this->input->post('password')            
            );

            $update = $this->agregar->updateUser($email,$data);

            if($update)
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
        $email = $this->input->post('email');
        $delete = $this->eliminar->deleteUsuarios($email);

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

        $da = $this->consultas->getUsuarios();

        $html .= '<div class="span12">';
            
            $html .= '<div class="page-header"><h3>Usuarios</h3></div>'; 
                $html .= '<div class="content-table table-responsive">'; 
                    $html .= '<form class="form-inline" action="'.base_url().'app/usuarios/agregar" method="post">';
                        $html .= '<table id="tUsuarios" class="table table-striped table-bordered table-hover table-condensed">';
                            $html .= '<thead>';
                                $html .= '<tr>';
                                    $html .= '<th>ID</th>';
                                    $html .= '<th>Nombre</th>';
                                    $html .= '<th>Email</th>';
                                    $html .= '<th>Contraseña</th>';
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
                                            $html .= '<td>'.$row->nombre.'</td>';

                                            $superUser = $row->email;

                                            if($superUser == "root")
                                            {
                                                $html .= '<td>'.$row->email.'</td>';
                                                $html .= '<td>'.$row->password.'</td>';
                                                $html .= '<td></td>';   
                                            }
                                            else
                                            {
                                                $html .= '<td>'.$row->email.'</td>';
                                                $html .= '<td>'.$row->password.'</td>';
                                                
                                                                                    
                                                $html .= '<td>';
                                                    $html .= '<button class="btn btn-danger" title="Eliminar"><i class="fa fa-minus-circle"></i></button>';
                                                    $html .= '  <a href="" class="btn btn-warning" title="Modificar">';
                                                        $html .= '<i class="fa fa-pencil"></i>';
                                                    $html .= '</a>';
                                                $html .= '</td>';   
                                            }

                                            
                                        $html .= '</tr>';
                                    }
                                }
                                    $html .= '<tr>';
                                        $html .= '<td><input type="text" required=""  name="id"       class="form-control" id="id"></td>';
                                        $html .= '<td><input type="text" required=""  name="nombre"   class="form-control"></td>';
                                        $html .= '<td><input type="text" required=""  name="email"    class="form-control"></td>';
                                        $html .= '<td><input type="text" required=""  name="password" class="form-control"></td>';
                                        $html .= '<td>';
                                            $html .= '<input type="submit" name="submit" value="Agregar" class="btn btn-success">';     
                                        $html .= '</td>';
                                    $html .= '</tr>';   
                                $html .= '</div>';
                            $html .= '</tbody>';
                        $html .= '</table>';                
                    $html .= '</form>';

                    $html .= '<div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalUser" role="dialog" aria-bellebdy="mymodalLabel" aira-hidden="true">';
                        $html .= '<div class="modal-dialog modal-sm">';
                            $html .= '<div class="modal-content">';
                                $html .= '<div class="modal-header">';
                                    $html .= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                                    $html .= '<h4 class="modal-title" id="mymodalLabel">Modificacion de registro</h4>';
                                $html .= '</div>';
                                $html .= '<div class="modal-body">';
                                    $html .= '<form method="post" action="'.base_url().'app/usuarios/modificar" id="updateUser">';
                                        $html .= '<p>ID: <input type="text" name="id" value="" class="form-control" id="idUser" required=""><br></p>';
                                        $html .= '<p>Nombre: <input type="text" name="" value="" class="form-control" id="nombreUser" required=""><br></p>';
                                        $html .= '<p>Email: <input type="text" name="email" value="" class="form-control" id="emailUser"></p>';
                                        $html .= '<p>Constraseña: <input type="text" name="password" value="" class="form-control" id="passwordUser"></p>';
                                        $html .= '<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar </button>';
                                        $html .= '<input type="submit" class="btn btn-success" value="Guardar" id="saveUser">';
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
            $html .= '<input type="hidden" value="'.base_url().'app/usuarios/eliminar" id="deleteUsuario">';
        $html .= '</div>';

		$this->init('','principal',$html);
	}
}
