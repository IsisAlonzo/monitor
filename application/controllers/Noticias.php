<?php


class Noticias extends M_Controller
{

    public function index()
    {
        //$this->load->model('NoticiasModel');

        $this->load->helper('url');
        //$data['noticias']=$this->NoticiasModel->getNoticias();

        $this->loadView('public/noticias',$data);
    }

    public function showOne($id)
    {
        $this->load->model('NoticiasModel');

        $this->load->helper('url');

        $res = $this->NoticiasModel->get_One($id);

        $date['id'] = $id;
        $data['nombre'] = $res[0]->nombre;
        $data['fecha'] = $res[0]->fecha;
        $data['imagen'] = $res[0]->imagen;
        $data['descripcion'] = $res[0]->descripcion;
        $data['contenido'] = $res[0]->contenido;
        
        $this->loadView('public/noticia',$data);
    }

}
