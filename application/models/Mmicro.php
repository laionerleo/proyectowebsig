<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmicro extends CI_MODEL {
	/**/
	public function __construct()
    {
        parent::__construct();

 	}

 	/*funcion que debuelve toda las razas de la tablas razas*/
 	public function read_all(){
        //$this->db->where('tea_status',"1");
 		$query = $this->db->get('sig_micro');
 		$result = $query->result();
 		return $result;
     }


     public function getubicacion(){

        $this->db->select("max(ubi_hora),ubi_latitud,ubi_longitud");
        $this->db->group_by("mic_id");
        $query = $this->db->get('sig_ubicacion');
        $result = $query->result();
        return $result;
     }
     public function create_ubicacion($lat,$long,$idmi){

        $datos = array( 
            
                    'ubi_latitud' =>$lat,
                        'ubi_longitud' =>$long,
                        'mic_id'=>$idmi,
                        'ubi_hora'=>date('y-m-d h:i:s')

                            );

        $this->db->insert("sig_ubicacion",$datos);
        $nuevo=$this->db->insert_id();
        return $nuevo;
        }

        

        public function create_retiro($mot,$id){

            $datos = array( 
                
                        'ret_descripcion' =>$mot,
                            
                            'mic_id'=>$id,
                            'ret_fecha'=>date('y-m-d h:i:s'),
                            "re_estado"=>"1"
    
                                );
    
            $this->db->insert("sig_retiro",$datos);
            $nuevo=$this->db->insert_id();
            return $nuevo;
            }
 	/**///read_one
 	public function read_one($id){
         //$this->db->where('tea_id',$id);
         $this->db->where('corp_id',"$id");
        $this->db->where('tea_status',"1");
 		$query = $this->db->get('sig_micro');
 		$result = $query->result();
 		return @$result;
 	}
 	/**/
	public function guardar($dato){

		$datos = array( 'mic_nrointerno' =>$dato['inpnrointerno'],
										'mic_placa' =>$dato['inpplaca'],
										'mic_modelo' =>$dato['inpmodelo'],
										'mic_estado' =>"1",
												);

    $this->db->insert("sig_micro",$datos);
    $nuevo=$this->db->insert_id();
    return $nuevo;
    }
 	/**/
      public function edit_one($dator){
 $datos = array( 'tea_fullname' =>$dato['inp_fullname'],
                    'tea_email' =>$dato['inp_email'],
                    'tea_facebook' =>$dato['inp_facebook'],
                    'tea_twitter' =>$dato['inp_twitter'],
                    'tea_youtube' =>$dato['inp_youtube'],
                    'tea_title' =>$dato['inp_title'],
                    'tea_description' =>$dato['inp_description'],
                    'tea_position' =>$dato['inp_position'],
                    'lan' =>$dato['inp_lan'],
                    'registration_date' =>date('y-m-d h:i:s'),
                    'user_id' =>$dato['inp_user'],
                    'tea_status' =>'1',
                        );
    $this->db->where('tea_id',$dato['teaid']);
    $this->db->update("sig_micro",$datos);

    return $dator['teaid'];
    }

    /**/
    public function delete_one($id){

    $datos = array( 'tea_status' => "0"

                        );
    $this->db->where('tea_id',$id);
    $this->db->update("sig_micro",$datos);


    }
    /**/


}
