<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comentarios_c extends CI_Controller {
	 
	function __construct(){
        parent::__construct();
        $this->load->model('comentarios_m');
        $this->load->helper(array('html', 'url'));
		
    }


	public function index(){
		
		$datos['comentarios']=$this->comentarios_m->obtenComentarios();
		$comentarios = $this->comentarios_m->obtenComentarios_id();
		
		$indice=1;
		
		foreach ($comentarios as $value) {
			$datos['respuestas'][$value]=$this->comentarios_m->obtenRespuestas($value);
			$indice++;	
		}
		$this->load->view('comentarios_v', $datos);	
	}	
}	