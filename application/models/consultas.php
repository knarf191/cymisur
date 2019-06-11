<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultas extends CI_Model {

	function __construct()
  	{         
		parent::__construct();     
 	}
	

	/********************************************************
						Galeria
	*********************************************************/		

	function getGaleria() 
	{
		$query = $this->db->get('galeria');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}	
	
	/********************************************************
						Dashboard
	*********************************************************/		

	function loginAdministrador($email, $password)
	{
		$query = $this->db->query("SELECT * FROM administradores WHERE email ='$email' and password = '$password'");

		if ($query->num_rows() > 0)
		{		     
		 	return TRUE;
		}   
		else
		{		    
			return FALSE;
		}		
	} 

	function getDatabyUser($email)
	{
		$query = $this->db->query("SELECT * FROM administradores WHERE email = '$email' ");
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}  
	}

	function getAdministradores() 
	{
		$query = $this->db->get('administradores');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}

	/********************************************************
					Gestor de Contenidos
	*********************************************************/		

	function loginGestor($email, $password)
	{
		$query = $this->db->query("SELECT * FROM usuarios_gestor WHERE email ='$email' and password = '$password'");

		if ($query->num_rows() > 0)
		{		     
		 	return TRUE;
		}   
		else
		{		    
			return FALSE;
		}		
	} 	

	function getDatabyGestor($email)
	{
		$query = $this->db->query("SELECT * FROM usuarios_gestor WHERE email = '$email' ");
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}  
	}	


	/********************************************************
					Usuarios
	*********************************************************/		

	function getUsuarios() 
	{
		$query = $this->db->get('usuarios_gestor');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}	

	/********************************************************
					Empleados
	*********************************************************/		

	function getEmpleados() 
	{
		$query = $this->db->get('empleados');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}	

	/********************************************************
					Gestor_Clientes
	*********************************************************/		

	function getGestorClientes() 
	{
		$query = $this->db->get('gestor_clientes');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}	

	/********************************************************
					Proveedores
	*********************************************************/		

	function getProveedores() 
	{
		$query = $this->db->get('proveedores');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}	

	/********************************************************
					Herramientas
	*********************************************************/		

	function getHerramientas() 
	{
		$query = $this->db->get('herramientas');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}	
}