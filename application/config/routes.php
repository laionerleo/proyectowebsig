<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**/

$l                                        = '^(en|es|de|it|po)/';
$i                                        = '^(en|es|de|it|po)';

/**/

$route[$l.'personas']                 		= 'Persona';
$route[$l.'choferes']                 		= 'Chofer';
$route[$l.'choferes/vistacrear/(:num)']      ='Chofer/registrar/$1/$2';
$route[$l.'choferes/crear']      ='Chofer/guardar';
$route[$l.'propietarios']                 		= 'Propietario';
$route[$l.'propietarios/vistacrear/(:num)']      ='Propietario/registrar/$1/$2';
$route[$l.'propietarios/crear']      ='Propietario/guardar';
$route[$l.'micros']                 		= 'Micro';
$route[$l.'micros/vistacrear/(:num)']      ='Micro/registrar/$1/$2';
$route[$l.'micros/crear']                 ='Micro/guardar';
$route[$l.'crearretiro/(:any)/(:any)']                 ='Welcome/crearretiro/$1/$2/$3';


$route[$l.'sansiones']                 		= 'Sansion';
$route[$l.'sansiones/vistacrear/(:num)']      ='Sansion/registrar/$1/$2';
$route[$l.'sansiones/crear']                 ='Sansion/guardar';
$route[$l.'retiros']                 		= 'Retiro';
$route[$l.'retiros/vistacrear/(:num)']      ='Retiro/registrar/$1/$2';
$route[$l.'retiros/crear']                 ='Retiro/guardar';




$route[$l.'micro']                 		    = 'Micro';
$route[$l.'micro/mapa']                     = 'Micro/mapa';

$route[$l.'cargarmapa']                     = 'Micro/cargarmapa';

$route[$l.'ubicacion/(:any)/(:any)/(:any)']        = 'Micro/postubicacion/$1/$2/$3/$4';
$route[$l.'ubicacion']                     = 'Micro/mapa';
$route[$l.'choferes/lista']                 		= 'Chofer/consultabase';



$route[$l.'propietario']                 	= 'Propietario';
$route['default_controller']               = 'Welcome';
/*****dashboard ******/
$route[$l.'dash_v2']                 		= 'Dashboard/dashv2';



/*****dashboard ******/

/*****tables ******/

/*****tables ******/

/*****forms ******/

/*****forms ******/

$route[$l.'(.+)$']                        = "$2";
$route[$i.'$']                            = $route['default_controller'];


/**/

$route['translate_uri_dashes']            = TRUE;
$route['404_override']                    = 'Welcome/error404';
$route['403_override']                    = 'Welcome/error403';
$route['503_override']                    = 'Welcome/error503';
$route['504_override']                    = 'Welcome/error504';
/**/


?>
