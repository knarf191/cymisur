<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_gestor extends CI_Controller 
{

	function in()
	{
		if($this->input->post())
		{
			$email    = $this->input->post('email');
			$password = $this->input->post('password');

			$query  = $this->consultas->loginGestor($email, $password);

			if($query)
			{

				$datos = $this->consultas->getDatabyGestor($email);

				$sesion_data = array('nombre'   => $datos['nombre'],
									 'email'	=> $datos['email'],
									 'password'	=> $datos['password'],
									 'logueado' => TRUE);	
																					
				$this->session->set_userdata($sesion_data);	


				redirect(base_url().'app/usuarios','refresh');
			}	
			else
			{
				echo '<script language="javascript">alert("Usuario o contraseña inválido");</script>'; 
				redirect(base_url().'gestor','refresh');
			}
		}
		else
		{
			echo '<script language="javascript">alert("Por favor llene todos los campos");</script>'; 
            redirect(base_url().'gestor','refresh');
		}
	}

	function close_session()
	{
		$sesion_data = array ('logueado' => FALSE);
		$this->session->set_userdata($sesion_data);
 	    redirect(base_url().'gestor', 'refresh');
	}
}