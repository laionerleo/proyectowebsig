<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sansion extends CI_Controller {

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
        $this->load->model(array('Msecurity','Msansion'));
      /*      if(!@$_SESSION['user']){
            $d = array();
            $this->Msecurity->url_and_lan($d);
            redirect($d['url']."?m=Usted tiene que iniciar session !!!");
        }*/

    }

	/**/

	public function index()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$d["sansiones"]=$this->Msansion->read_all();
		$this->load->view('sancion/index', $d);

	}
	/**/

	//vista que direcciona al formulario para crear sansion
	public function registrar($lan, $idsansion){
        $d = array();
        $this->Msecurity->url_and_lan($d);
		if ($idsansion==0) {
		$this->load->view('sansion/create',$d);
		}

    }
	/**/
	public function eliminar($lan, $idsansion){
        $d = array();
        $this->Msecurity->url_and_lan($d);
		$this->Msansion->eliminarsansion($idsansion);




    }
		/**/
		public function consultabase()
		{
				 $d["sansiones"]=$this->Mchofer->read_all();
				 print_r(json_encode(array("consulta" => $d["sansiones"])));
				 return json_encode(array("consulta" => $d["sansiones"]));

  	}
	/**/
	   public function guardar()
   {
        $d = array();
		$this->Msecurity->url_and_lan($d);
        parse_str($this->input->post("datos"), $nuevodato);
        $nuevodato = $this->Msecurity->sanear_array($nuevodato);
        $ok=$this->Msansion->guardar($nuevodato);
        $d["produccion"]=$this->Msansion->getproduccion();



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
