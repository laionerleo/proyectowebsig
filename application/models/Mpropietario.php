<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpropietario extends CI_MODEL {
	/**/
	public function __construct()
    {
        parent::__construct();

 	}

 	/*funcion que debuelve toda las razas de la tablas razas*/
 	public function read_all(){
        $this->db->where('pro_estado',"1");
 		$query = $this->db->get('sig_propietario');
 		$result = $query->result();
 		return $result;
 	}
 	/**///read_one
 	public function read_one($id){
         //$this->db->where('pro_id',$id);
         $this->db->where('pro_id',"$id");
        $this->db->where('pro_estado',"1");
 		$query = $this->db->get('sig_propietario');
 		$result = $query->result();
 		return @$result;
 	}
 	/**/
 	public function guardar($dato){

    $datos = array( 'pro_nombrecompleto' =>$dato['inpnombrecompleto'],
                    'pro_celular' =>$dato['inpcelular'],
										'pro_direccion' =>$dato['inpdir'],
										'pro_ci' =>$dato['inpci'],
                    'pro_estado' =>"1",
                        );

    $this->db->insert("sig_propietario",$datos);
    $nuevo=$this->db->insert_id();
    return $nuevo;
    }
 	/**/
      public function edit_one($dator){
 $datos = array( 'pro_fullname' =>$dato['inp_fullname'],
                    'pro_email' =>$dato['inp_email'],
                    'pro_facebook' =>$dato['inp_facebook'],
                    'pro_twitter' =>$dato['inp_twitter'],
                    'pro_youtube' =>$dato['inp_youtube'],
                    'pro_title' =>$dato['inp_title'],
                    'pro_description' =>$dato['inp_description'],
                    'pro_position' =>$dato['inp_position'],
                    'lan' =>$dato['inp_lan'],
                    'registration_date' =>date('y-m-d h:i:s'),
                    'user_id' =>$dato['inp_user'],
                    'pro_status' =>'1',
                        );
    $this->db->where('pro_id',$dato['teaid']);
    $this->db->update("sig_propietario",$datos);

    return $dator['teaid'];
    }

    /**/
    public function delete_one($id){

    $datos = array( 'pro_status' => "0"

                        );
    $this->db->where('pro_id',$id);
    $this->db->update("sig_propietario",$datos);


    }
    /**/


}
