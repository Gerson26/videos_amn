<?php
namespace App\controllers;

use \Core\View;
use \Core\Controller;
use \App\models\Profesores AS ProfesoresDao;

class Profesores extends Controller{

    private $_contenedor;

    function __construct(){
        parent::__construct();
        $this->_contenedor = new Contenedor;
        View::set('header',$this->_contenedor->header());
        View::set('footer',$this->_contenedor->footer());
    }

    public function getUsuario(){
        return $this->__usuario;
    }

    public function index() {

        $prof_nacional = ProfesoresDao::getAll();
        $card_profesores_nacionales = '';

        foreach ($prof_nacional as $key => $value) {
            $card_profesores_nacionales .= <<<html
            
            <div class="col-12 col-md-3 text-center">
            <br>
            <div class="estilo-card card p-2">
                <div class="card card-body card-course p-0 border-radius-15">
                    <input class="curso" hidden type="text" value="{$value['id_profesor']}" readonly>
                        <!--<img class="profesor-img" src="/profesores_img/{$value['img']}.png">-->
                        <div class="mt-2 color-vine font-14 text-bold"><p><b>{$value['ponente']}</b></p></div>
                        <!--<div class="color-vine font-12" style="color:#0F978D;"><p style="color:#0F978D; font-size:11px;">{$value['descripcion']}</p></div>-->
                </div>
            </div>
            </div>
html;
        }

        View::set('card_profesores_nacionales',$card_profesores_nacionales);
        View::render("profesores_all");
    }

    function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

}