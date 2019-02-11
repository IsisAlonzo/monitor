<?php

class M_Controller extends Ci_Controller
{

    Private $metodo="AES-256-CBC";
    private  $secret_iv="101712";
    private  $secret_key="upqroo";

    public $status=false;
    //Tipo del usuario logueado
    public $tipoUsario=0;
    //Nombre del usuario logueado
    public $nombre='    ';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
    }

    //Revisa el estado del usuario (logueado=true, noLogueado=false)
    public function checkLogin()
    {
        return $this->tipoUsario;
    }
        
    public function encryption($string){
        $output=FALSE;
        $key=hash('sha256', $this->config->item('encryption_key'));
        $iv=substr(hash('sha256', $this->secret_iv), 0, 16);
        $output=openssl_encrypt($string, $this->metodo, $key, 0, $iv);
        $output=base64_encode($output);
        return $output;
    }
    public function decryption($string){
        $key=hash('sha256', $this->config->item('encryption_key'));
        $iv=substr(hash('sha256', $this->secret_iv), 0, 16);
        $output=openssl_decrypt(base64_decode($string), $this->metodo, $key, 0, $iv);
        return $output;
    }

    public function Login($username,$password)
    {
        $this->load->library('dominio');
        /*$this->load->model('AdminModel');
        $resultado=$this->AdminModel->login($username,$password);*/
        $resultado=$this->dominio->validarPassword($username,$password);
        return $resultado;
    }

    public function Logout()
    {
        unset($_SESSION['UserName']);
        unset($_SESSION['Userid']);
    }
    
    //Carga las vistas publicas
    public function loadView($view,$data)
    {
        $this->load->view('templates/header',$data);
        $this->load->view($view,$data);
        $this->load->view('templates/footer');
    }


    //Carga la vista de administrador
    public function loadViewAdmin($view,$data)
    {
        $this->load->view('private/admin',$data);
        $this->load->view('private/'.$view,$data);
    }

    public function renameFileIfExist($nombre,$folder)
    {
        $nNombre=substr($nombre,0,strlen($nombre)-4);
        $aux=substr($nombre,strlen($nNombre),strlen($nombre));
        if(is_dir($folder))
        {
            if(is_file($folder.'/'.$nombre))
            {
                $directorio = opendir($folder);
                $contRep=0;
                while ($archivo = readdir($directorio))
                {
                    $nArchivo=substr($archivo,0,strlen($archivo)-4);

                    if($nArchivo==$nNombre)
                    {
                        $contRep++;
                    }
                }
                $nNombre.=$contRep;
                return $this->renameFileIfExist($nNombre.$aux,$folder);
            }
            else
            {
                $nNombre.=$aux;
            }
        }
        return $nNombre;
    }

    public function genereteRute($relaviteRute)
    {
        $rute="";
        if(!empty($relaviteRute) && $relaviteRute!="")
        {
            if (is_dir($relaviteRute))
            {
                $date=date('Y-m-d');
                $date.='-'.rand();
                $relaviteRute.=$date;
                return $this->genereteRute($relaviteRute);
            }
            else
            {

                $rute=$relaviteRute;
                mkdir($rute, 0777, TRUE);
            }
        }
        return $rute;
    }


    /*Carga una imagen
    *@param field Nombre del input
    *@param newName nombre que tendra la imagen
    *@param rute ruta espesifica, si no espesifica se pondra en la carpeta raiz
    *@param same bool false: busca una nueva ruta true: misma ruta espesificada
    */
    public function uploadImg($field,$newName,$rute,$sameFolder)
    {
        $result=array();
        $date=date('Y-m-d');
        //echo $field.' '.$newName.' '.$rute.''.$sameFolder;

        if(!$sameFolder || $sameFolder == "false")
        {
            $rute='public/images/';
            if (!is_dir($rute.$date)) {
                $rute.=$date;
                mkdir($rute, 0777, TRUE);
            }
            else
            {
                $date.='-'.rand();
                $rute.=$date;
                mkdir($rute, 0777, TRUE);
            }
        }
        else
        {
            $aux=$rute;
            $rute='public/images/'.$aux;
            if (!is_dir($rute)) {
                //$rute.=$date;
                mkdir($rute, 0777, TRUE);
            }
        }

        $config['upload_path'] = $rute;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $config['max_size'] = "2048000";
        /*$config['encrypt_name'] = TRUE;*/

        //echo $config['upload_path'];

        $this->load->library('upload');        

        if(is_array($_FILES[$field]['name']))
        {
            //echo "Es una galeria";
            $files = $_FILES;
            //echo count($_FILES[$field]['name']);
            $aux=$newName;
            for($i=0; $i< count($_FILES[$field]['name']); $i++)
            {

                $newName=$aux;
                $newName.=$date.($i+1);
                $config['file_name'] =$newName;

                $_FILES['userfile']['name']= $files[$field]['name'][$i];
                $_FILES['userfile']['type']= $files[$field]['type'][$i];
                $_FILES['userfile']['tmp_name']= $files[$field]['tmp_name'][$i];
                $_FILES['userfile']['error']= $files[$field]['error'][$i];
                $_FILES['userfile']['size']= $files[$field]['size'][$i];

                $this->upload->initialize($config);

                if ($this->upload->do_upload())
                {
                    //$result['path'][$i]=$this->upload->data('full_path');
                    $tipe=$this->upload->data('file_ext');
                    $result['rute'][$i]=$rute;
                    $result['full-rute'][$i]=base_url().$rute.'/'.$newName.$tipe;
                }
                else
                {
                    $result["Error Galeria"]= 'Error al subir la galeria '.$config['file_name'].' en '.$rute;
                }                
            }
        }
        else
        {
            //echo 'Es una sola imagen';
            /*$newName.=$date;
            $config['file_name'] =$newName;*/

            $this->upload->initialize($config);

            if ($this->upload->do_upload($field))
            {
                //$result['path']=$this->upload->data('full_path');
                $tipe=$this->upload->data('file_ext');
                $nombre=$this->upload->data('file_name');
                $result['rute']=$rute;
                $result['full-rute']=base_url().$rute.'/'.$nombre;
            }
            else
            {
                $result["Error Imagen"]= 'Error al subir la imagen '.$config['file_name'].' en '.$rute;
            }
        }
        //var_dump($result);
        return $result;
    }

}
?>