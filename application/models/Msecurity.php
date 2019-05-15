<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msecurity extends CI_MODEL {

	public function __construct()
    {
        parent::__construct();

        //cargamos el helper url y el helper form
        $this->load->helper(array('url', 'language'));
 	}

 	/**/

    public function sanear($string){

    	$string = strtoupper($string);

	    if($string) {

	    	$prohibited = array(" SELECT ", 
								" * ", 
								" DELETE ", 
								" FROM ", 
								" UPDATE ", 
								" INSERT ", 
								" UNION ALL ", 
								" ALL ", 
								" ORDER ", 
								" TRUNCATE ", 
								" EDIT ", 
								" SHOW ", 
								" TABLES ",
								" TABLE ",  
								" DATABASE ",
								"SELECT ", 
								"* ", 
								"DELETE ", 
								"FROM ", 
								"UPDATE ", 
								"INSERT ", 
								"UNION ALL ", 
								"ALL ", 
								"ORDER ", 
								"TRUNCATE ", 
								"EDIT ", 
								"SHOW ", 
								"TABLES ",
								"TABLE ",  
								"DATABASE ");

	    	$prohibited2 = $prohibited;

			$notprohibited = array("", "", "", "", "", "", "", "", "", "", 
								   "", "", "", "", "", "", "", "", "", "", 
								   "", "", "", "", "", "", "", "", "", "", 
								   "", "", "", "", "", "", "", "", "", "", 
								   "", "", "", "", "", "", "", "", "", ""
								  );
			
			

			$array_string = explode(" ", $string);

			$string = "";

			foreach ($array_string as $value) {
				if($this->search_array($prohibited2, $value))
					$value = "";
				$string .=$value." ";			
			}

			$string = str_replace($prohibited, $notprohibited, $string);

		    $string = trim($string);

		    $string = str_replace(
		        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
		        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
		        $string
		    );

		    $string = str_replace(
		        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
		        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
		        $string
		    );

		    $string = str_replace(
		        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
		        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
		        $string
		    );

		    $string = str_replace(
		        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
		        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
		        $string
		    );

		    $string = str_replace(
		        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
		        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
		        $string
		    );

		    $string = str_replace(
		        array('ñ', 'Ñ', 'ç', 'Ç'),
		        array('n', 'N', 'c', 'C',),
		        $string
		    );

		    $array_not = array("=", ">", "<","¨", "º", ";", "~", "\"", "*", "'", "^", "`", "¨", "´");

		    $string = str_replace(
		    						$array_not, 
		    						"", 
		    						$string 
		    					);

	    	$string = strip_tags($string);
	    	$string = str_replace('"',"",$string);
			$string = str_replace("'","",$string);
			$string = trim($string);
			$string = htmlentities($string);
			
		}

		return $string;
	}

	/**/

	public function sanear_array($array){
		foreach($array as $key=>$value) {
    		$array[$key] = $this->sanear($value);
		}
		return $array;
	}

	/**/

	public function search_array($array, $value){
		$next = false;
		for($i=0; $i<count($array); $i++){
			if($array[$i] == $value) $next = true;
		}
		return $next;
	}

	/**/

	public function is_ajax(){
      if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        return true;
      }
      else{
        return false;
      }
  	}
  
  	/**/

  	public function is_url(){
    	
    	$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
    	$url = substr($url, 0, strlen(base_url()));

    	if($url == base_url() || $url == '') 
    		return true;
    	else 
    		return false;
  	}

  	/**/

  	public function get_real_ip(){
	    if (!empty($_SERVER['HTTP_CLIENT_IP']))
	        return $_SERVER['HTTP_CLIENT_IP'];
	       
	    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	        return $_SERVER['HTTP_X_FORWARDED_FOR'];
	   
	    return $_SERVER['REMOTE_ADDR'];
	}

	/**/

	public function get_user_lan(){  
        $lan =substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2); 
    	return $lan;  
  	}

  	/**/

  	public function url_and_lan(&$d){
		$d['url'] = base_url().$this->lang->lang().'/';
		$d['lan_pc'] = $this->get_user_lan();
		$d['lan_user'] = $this->lang->lang();
	}

	/**/

}