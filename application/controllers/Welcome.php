<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
        $this->load->model(array('Msecurity'));

    }

	/**/
		/**/
	public function index()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);

		$this->load->view('index', $d);
	
	}
	public function plantilla1()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);

		$this->load->view('index1', $d);
	
	}

	/**/
	public function plantilla2()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);

		$this->load->view('index2', $d);
	
	}
	/**/
	public function plantilla3()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);

		$this->load->view('index3', $d);
	
	}
	/**/
	public function plantilla4()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);

		$this->load->view('index4', $d);
	
	}
	/**/
/**/
	public function T3()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);

		$this->load->view('T3/T3', $d);
	
	}/**/
	public function T4()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);

		$this->load->view('T4/T4', $d);
	
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