<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eliminar extends CI_Model {

	function __construct()
  	{         
		parent::__construct();     
 	}
	

	/********************************************************
						Administradores
	*********************************************************/		

	function deleteAdmin($email)
	{
		$this->db->where('email', $email);

		return $this->db->delete('administradores');
	}	

	/********************************************************
						Galeria_Dashoard
	*********************************************************/		

	function deleteGaleria($foto)
	{
		$this->db->where('foto', $foto);

		return $this->db->delete('galeria');
	}	

	/********************************************************
						Usuarios
	*********************************************************/		

	function deleteUsuarios($email)
	{
		$this->db->where('email', $email);

		return $this->db->delete('usuarios_gestor');
	}

	/********************************************************
						Empleados
	*********************************************************/		

	function deleteEmpleados($id)
	{
		$this->db->where('id', $id);

		return $this->db->delete('empleados');
	}	

	/********************************************************
						Gestor_Cliente
	*********************************************************/		

	function deleteGestorClientes($id)
	{
		$this->db->where('id', $id);

		return $this->db->delete('gestor_clientes');
	}	

	/********************************************************
						Proveedores
	*********************************************************/		

	function deleteProveedores($id)
	{
		$this->db->where('id', $id);

		return $this->db->delete('proveedores');
	}	

	/********************************************************
						Herramientas
	*********************************************************/		

	function deleteHerramientas($id)
	{
		$this->db->where('id', $id);

		return $this->db->delete('herramientas');
	}		
}