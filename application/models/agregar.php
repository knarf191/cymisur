<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agregar extends CI_Model {

	function __construct()
  	{         
		parent::__construct();     
 	}
	

	/********************************************************
						Administradores
	*********************************************************/		

	function setAdministradores($data_post)
	{
		return $this->db->insert('administradores',$data_post);
	}

	function updateAdministrador($email, $data)
	{
		$this->db->where('email', $email);

		return $this->db->update('administradores',$data);
	}	

	/********************************************************
						Galeria_Dashboard
	*********************************************************/	

	function setFotoGaleria($data_post)
	{
		return $this->db->insert('galeria',$data_post);
	}	

	/********************************************************
						Usuarios
	*********************************************************/	

	function setUsuarios($data_post)
	{
		return $this->db->insert('usuarios_gestor',$data_post);
	}	

	function updateUser($email, $data)
	{
		$this->db->where('email', $email);

		return $this->db->update('usuarios_gestor',$data);
	}	

	/********************************************************
						Empleados
	*********************************************************/	

	function setEmpleados($data_post)
	{
		return $this->db->insert('empleados',$data_post);
	}	

	function updateEmpleados($curp, $data)
	{
		$this->db->where('curp', $curp);

		return $this->db->update('empleados',$data);
	}	

	/********************************************************
						Gestor_Clientes
	*********************************************************/	

	function setGestorClientes($data_post)
	{
		return $this->db->insert('gestor_clientes',$data_post);
	}	

	function updateGestorClientes($id, $data)
	{
		$this->db->where('id', $id);

		return $this->db->update('gestor_clientes',$data);
	}	

	/********************************************************
						Proveedores
	*********************************************************/	

	function setProveedores($data_post)
	{
		return $this->db->insert('proveedores',$data_post);
	}	

	function updateProveedores($id, $data)
	{
		$this->db->where('id', $id);

		return $this->db->update('proveedores',$data);
	}

	/********************************************************
						Herramientas
	*********************************************************/	

	function setHerramientas($data_post)
	{
		return $this->db->insert('herramientas',$data_post);
	}	

	function updateHerramientas($id, $data)
	{
		$this->db->where('id', $id);

		return $this->db->update('herramientas',$data);
	}	
}