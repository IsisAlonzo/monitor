<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dominio
{
    public function validarPassword($usuario,$pass)
	{
		$request = new Request();
		$request->usuario = $usuario;
        $request->password = $pass;
        $response=null;
        
        //var_dump($request);        
		
		try {
	       $client = new SoapClient('http://sisturws/sisturws/index.php?r=autenticacion/Autenticacion/ServiceInterface', array('classmap' => array('AutenticaUsuarioDominioResponse' => new Response())));
	       $response = $client->ObtenerUsuarioValido($request);
	       $this->valido = $response->usuarioValido;
	       $this->mensaje = $response->mensaje;

		}catch (SoapFault $e) {     
       		$mensaje = $e->getMessage();
     	}
 		catch(Exception $e){
   			$mensaje = $e->getMessage();
        }
           
        return $response;
    }      
}

class Request
{
 /**
  * @var string
  * @soap
  **/
  public $usuario;
  
  /**
  * @var string
  * @soap
  **/
  public $password;
}

class Response
{
      /**
  * @var boolean
  * @soap
  **/
  public $usuarioValido;
  
  
  /**
  * @var string
  * @soap
  **/
  public $mensaje;
  
  public function __construct(){}
}