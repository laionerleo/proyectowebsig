<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chofer extends CI_Controller {

	public function __construct(){
        
        parent::__construct();
 
        //cargamos la base de datos por defecto
        $this->load->database('default');
        
        //cargamos los agentes para los dispositivos
        $this->load->library('user_agent');

		//cargamos el helper url y el helper form
        $this->load->helper(array('url', 'language'));
        
        //cargamamos la libreria del lenguaje
        $this->lang->load('welcome');

        //cargamos los modelos
		$this->load->model(array('Msecurity','Mchofer'));
        /*    if(!@$_SESSION['user']){
            $d = array();
            $this->Msecurity->url_and_lan($d);
            redirect($d['url']."?m=Usted tiene que iniciar session !!!");
		}
		*/

    }

	/**/
		
	public function index()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);
		 //$d["produccion"]=$this->Mchofer->read_all();
		$this->load->view('chofer/index', $d);
	
	}
	/**/
	
	
	public function registrar($lan, $idproduccion){
        $d = array();
        $this->Msecurity->url_and_lan($d);
		if ($idproduccion==0) {
		$d["produccion"]=$this->Mchofer->getproduccion();
		$d["personas"]=$this->Mpersonas->get_all();
		$this->load->view('produccion/create',$d);        	
      
		}	
    }
	/**/
	public function eliminar($lan, $idproduccion){
        $d = array();
        $this->Msecurity->url_and_lan($d);
		$this->Mchofer->eliminarproduccion($idproduccion);
	
	
		      
			
    }
	/**/
	   public function guardar()
   {
        $d = array();
		$this->Msecurity->url_and_lan($d);
        parse_str($this->input->post("datos"), $nuevodato);
        $nuevodato = $this->Msecurity->sanear_array($nuevodato);
          $ok=$this->Mchofer->guardar($nuevodato);
          $d["produccion"]=$this->Mchofer->getproduccion();

      	$this->load->view('produccion/listarproduccion',$d);        		    

       
        
 
       
   }
	/**/

	public function error404($lan='es')
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$this->load->view('error404', $d);
	
	}

	/**/

	public function error($lan='es')
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$this->load->view('error403', $d);
	
	}

	/**/

	public function error403($lan='es')
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$this->load->view('error403', $d);
	
	}


	/**/
}