<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comentarios_m extends CI_Model{
		
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
	
	public function obtenComentarios(){
		$this->db->select('id,nombre,correo,comentarios,fecha,categoria_id,estado');
		$this->db->from('comentarios');
		$this->db->order_by('fecha','desc');
		
		$resultado = $this->db->get();
		
		if($resultado->num_rows()>0){
			$indice=1;
	        foreach ($resultado->result_array() as $value) {
	        	$datos[$indice]=$value;	
				$indice++;
	        }
			return $datos;		
		}else{
			return -1;
		}
	}
	
	public function obtenRespuestas($comentarios_id){
		$this->db->select('id,comentarios_id,nombre,correo,respuesta,fecha,estado');
		$this->db->from('respuestas');
		$this->db->where('comentarios_id', $comentarios_id);
		$this->db->order_by('fecha');
		
		$resultado = $this->db->get();
		
		if($resultado->num_rows()>0){
			$indice=1;
	        foreach ($resultado->result_array() as $value) {
	        	$datos[$indice]=$value;	
				$indice++;
	        }
			return $datos;		
		}else{
			return -1;
		}
	}
	
	function obtenComentarios_id(){
		$this->db->select('id');
		$this->db->from('comentarios');
		$this->db->order_by('fecha');
		$resultado = $this->db->get();
		
		if($resultado->num_rows()>0){
			$indice=1;
	        foreach ($resultado->result_array() as $value) {
	        	$datos[$indice]=$value['id'];	
				$indice++;
	        }
			return $datos;		
		}else{
			return -1;
		}
	}	
}
?>