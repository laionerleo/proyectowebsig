<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mchofer extends CI_MODEL {
	/**/
	public function __construct()
    {
        parent::__construct();

 	}

 	/*funcion que debuelve toda las razas de la tablas razas*/
 	public function read_all(){
        $this->db->where('tea_status',"1");
 		$query = $this->db->get('sig_chofer');
 		$result = $query->result();
 		return $result;
 	}
 	/**///read_one
 	public function read_one($id){
         //$this->db->where('tea_id',$id);
         $this->db->where('corp_id',"$id");
        $this->db->where('tea_status',"1");
 		$query = $this->db->get('sig_chofer');
 		$result = $query->result();
 		return @$result;
 	}
 	/**/
 	public function create_one($dato){
    
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

    $this->db->insert("sig_chofer",$datos);
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
    $this->db->update("sig_chofer",$datos);

    return $dator['teaid'];
    }

    /**/
    public function delete_one($id){
    
    $datos = array( 'tea_status' => "0"
                
                        );
    $this->db->where('tea_id',$id);
    $this->db->update("sig_chofer",$datos);

    
    }
    /**/
 	

}