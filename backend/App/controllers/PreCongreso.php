<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\Controller;
use \App\models\Home AS HomeDao;
use \App\models\Programa AS ProgramaDao;

class PreCongreso extends Controller{

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
     $extraHeader =<<<html
      <link id="pagestyle" href="/assets/css/style.css" rel="stylesheet" />
      <title>
            Home
      </title>
html;

        $data_user = HomeDao::getDataUser($this->__usuario);
    
        View::set('header',$this->_contenedor->header($extraHeader));      
        View::set('datos',$data_user);
        //View::set('tabla',$tabla);
        View::render("congreso_all");
    }

    public function Programa($precongreso){
        $programa_precongreso1 = '';
        if($precongreso == 1){

            // ----- Variables para primer precongreso ----- //
        $info_fecha1 = ProgramaDao::getCongresoUno();
        $programa_precongreso1 = <<<html
        <div class="row mb-3">
            <img src="/assets/img/header_programa.png" align="center">
            <h5 class="mb-3 color-green" style="text-align:right;">Lunes 19 de Septiembre</h5>
        </div>    
html;

        foreach ($info_fecha1 as $key => $value) {
            $progreso = ProgramaDao::getProgreso($_SESSION['id_registrado'],$value['id_programa']);

            $hora_inicio =substr($value['hora_inicio'],0,strlen($value['hora_inicio'])-3);
            $hora_fin = substr($value['hora_fin'],0,strlen($value['hora_fin'])-3);

            $max_time = $value['duracion'];
            $duracion_sec = substr($max_time,strlen($max_time)-2,2);
            $duracion_min = substr($max_time,strlen($max_time)-5,2);
            $duracion_hrs = substr($max_time,0,strpos($max_time,':'));

            $secs_totales = (intval($duracion_hrs)*3600)+(intval($duracion_min)*60)+intval($duracion_sec);

            $porcentaje = round(($progreso['segundos']*100)/$secs_totales);
            $subtitulo = '';
            $descripcion = '';
            $descripcion_subtitulo = '';
            
            if($value['hora_fin'] == '00:00:00'){
                $simposio = '';
            }else if($value['hora_fin'] == '23:59:59'){
                $simposio = <<<html
                <div class="col-12 col-md-2">
                    <span class="color-yellow text-bold">
                     {$hora_inicio}
                    </span>
                </div>
                <br>
html;
            }else{
                $simposio = <<<html
                <div class="col-12 col-md-2">
                    <span class="color-yellow text-bold">
                     {$hora_inicio} - {$hora_fin}
                    </span>
                </div>
                <br>
html;
            }

            if($value['subtitulo'] != ''){
                $subtitulo = <<<html
                <span class="color-green text-bold font-16 text-lg">
                    {$value['subtitulo']}
                </span>
                <br>
html;
            }
            if($value['descripcion'] != ''){
                $descripcion = <<<html
                <span class="color-blue text-bold font-18 text-lg">
                    {$value['descripcion']}
                </span>
                <br>
html;
            }
            if($value['descripcion_subtitulo'] != ''){
                $descripcion_subtitulo = <<<html
                <span class="color-black text-bold font-14 text-lg">
                    {$value['descripcion_subtitulo']}
                </span>
html;
            }

            if($value['url'] != ''){
                $programa = <<<html
                <a href="{$value['url']}">
                        <span class="clase-pa-hover">
                            {$subtitulo}
                            {$descripcion}
                            {$descripcion_subtitulo}
                            <br>
                        </span>
                    </a>
                            <!--<span class="mt-4">
                                <b>Progreso: $porcentaje %</b>
                                <progress class="barra_progreso_small_green mt-2" max="$secs_totales" value="{$progreso['segundos']}"></progress>
                            </span>-->
html;
            }else if($value['url'] == ''){
                $programa = <<<html
                            {$subtitulo}
                            {$descripcion}
                            {$descripcion_subtitulo}
                            <br>
                            <!--<span class="mt-4">
                                <b>Progreso: $porcentaje %</b>
                                <progress class="barra_progreso_small_green mt-2" max="$secs_totales" value="{$progreso['segundos']}"></progress>
                            </span>-->
html;
            }


            $programa_precongreso1 .= <<<html
                <div class="row mb-3">
                        {$simposio}
                    <div class="col-12 col-md-6">
                        {$programa}
                    </div>
                </div>
html;
        }


        }else if($precongreso == 2){


                // ----- Variables para segundo precongreso ----- //
        $info_fecha1 = ProgramaDao::getCongresoDos();
        $programa_precongreso1 = <<<html
        <div class="row mb-3">
            <img src="/assets/img/header_programa.png" align="center">
            <h5 class="mb-3 color-green" style="text-align:right;">Martes 20 de Septiembre</h5>
        </div>    
html;

        foreach ($info_fecha1 as $key => $value) {
            $progreso = ProgramaDao::getProgreso($_SESSION['id_registrado'],$value['id_programa']);

            $hora_inicio =substr($value['hora_inicio'],0,strlen($value['hora_inicio'])-3);
            $hora_fin = substr($value['hora_fin'],0,strlen($value['hora_fin'])-3);

            $max_time = $value['duracion'];
            $duracion_sec = substr($max_time,strlen($max_time)-2,2);
            $duracion_min = substr($max_time,strlen($max_time)-5,2);
            $duracion_hrs = substr($max_time,0,strpos($max_time,':'));

            $secs_totales = (intval($duracion_hrs)*3600)+(intval($duracion_min)*60)+intval($duracion_sec);

            $porcentaje = round(($progreso['segundos']*100)/$secs_totales);
            $subtitulo = '';
            $descripcion = '';
            $descripcion_subtitulo = '';
            
            if($value['hora_fin'] == '00:00:00'){
                $simposio = '';
            }else if($value['hora_fin'] == '23:59:59'){
                $simposio = <<<html
                <div class="col-12 col-md-2">
                    <span class="color-yellow text-bold">
                     {$hora_inicio}
                    </span>
                </div>
                <br>
html;
            }else{
                $simposio = <<<html
                <div class="col-12 col-md-2">
                    <span class="color-yellow text-bold">
                     {$hora_inicio} - {$hora_fin}
                    </span>
                </div>
                <br>
html;
            }

            if($value['subtitulo'] != ''){
                $subtitulo = <<<html
                <span class="color-green text-bold font-16 text-lg">
                    {$value['subtitulo']}
                </span>
                <br>
html;
            }
            if($value['descripcion'] != ''){
                $descripcion = <<<html
                <span class="color-blue text-bold font-18 text-lg">
                    {$value['descripcion']}
                </span>
                <br>
html;
            }
            if($value['descripcion_subtitulo'] != ''){
                $descripcion_subtitulo = <<<html
                <span class="color-black text-bold font-14 text-lg">
                    {$value['descripcion_subtitulo']}
                </span>
html;
            }

            if($value['url'] != ''){
                $programa = <<<html
                <a href="{$value['url']}">
                        <span class="clase-pa-hover">
                            {$subtitulo}
                            {$descripcion}
                            {$descripcion_subtitulo}
                            <br>
                        </span>
                    </a>
                            <!--<span class="mt-4">
                                <b>Progreso: $porcentaje %</b>
                                <progress class="barra_progreso_small_green mt-2" max="$secs_totales" value="{$progreso['segundos']}"></progress>
                            </span>-->
html;
            }else if($value['url'] == ''){
                $programa = <<<html
                            {$subtitulo}
                            {$descripcion}
                            {$descripcion_subtitulo}
                            <br>
                            <!--<span class="mt-4">
                                <b>Progreso: $porcentaje %</b>
                                <progress class="barra_progreso_small_green mt-2" max="$secs_totales" value="{$progreso['segundos']}"></progress>
                            </span>-->
html;
            }


            $programa_precongreso1 .= <<<html
                <div class="row mb-3">
                        {$simposio}
                    <div class="col-12 col-md-6">
                        {$programa}
                    </div>
                </div>
html;
        }


        }else if($precongreso == 3){


                // ----- Variables para tercer precongreso ----- //
        $info_fecha1 = ProgramaDao::getCongresoTres();
        $programa_precongreso1 = <<<html
        <div class="row mb-3">
            <img src="/assets/img/header_programa.png" align="center">
            <h5 class="mb-3 color-green" style="text-align:right;">Viernes 23 de Septiembre</h5>
        </div>    
html;

        foreach ($info_fecha1 as $key => $value) {
            $progreso = ProgramaDao::getProgreso($_SESSION['id_registrado'],$value['id_programa']);

            $hora_inicio =substr($value['hora_inicio'],0,strlen($value['hora_inicio'])-3);
            $hora_fin = substr($value['hora_fin'],0,strlen($value['hora_fin'])-3);

            $max_time = $value['duracion'];
            $duracion_sec = substr($max_time,strlen($max_time)-2,2);
            $duracion_min = substr($max_time,strlen($max_time)-5,2);
            $duracion_hrs = substr($max_time,0,strpos($max_time,':'));

            $secs_totales = (intval($duracion_hrs)*3600)+(intval($duracion_min)*60)+intval($duracion_sec);

            $porcentaje = round(($progreso['segundos']*100)/$secs_totales);
            $subtitulo = '';
            $descripcion = '';
            $descripcion_subtitulo = '';
            
            if($value['hora_fin'] == '00:00:00'){
                $simposio = '';
            }else if($value['hora_fin'] == '23:59:59'){
                $simposio = <<<html
                <div class="col-12 col-md-2">
                    <span class="color-yellow text-bold">
                     {$hora_inicio}
                    </span>
                </div>
                <br>
html;
            }else{
                $simposio = <<<html
                <div class="col-12 col-md-2">
                    <span class="color-yellow text-bold">
                     {$hora_inicio} - {$hora_fin}
                    </span>
                </div>
                <br>
html;
            }

            if($value['subtitulo'] != ''){
                $subtitulo = <<<html
                <span class="color-green text-bold font-16 text-lg">
                    {$value['subtitulo']}
                </span>
                <br>
html;
            }
            if($value['descripcion'] != ''){
                $descripcion = <<<html
                <span class="color-blue text-bold font-18 text-lg">
                    {$value['descripcion']}
                </span>
                <br>
html;
            }
            if($value['descripcion_subtitulo'] != ''){
                $descripcion_subtitulo = <<<html
                <span class="color-black text-bold font-14 text-lg">
                    {$value['descripcion_subtitulo']}
                </span>
html;
            }

            if($value['url'] != ''){
                $programa = <<<html
                <a href="{$value['url']}">
                        <span class="clase-pa-hover">
                            {$subtitulo}
                            {$descripcion}
                            {$descripcion_subtitulo}
                            <br>
                        </span>
                    </a>
                            <!--<span class="mt-4">
                                <b>Progreso: $porcentaje %</b>
                                <progress class="barra_progreso_small_green mt-2" max="$secs_totales" value="{$progreso['segundos']}"></progress>
                            </span>-->
html;
            }else if($value['url'] == ''){
                $programa = <<<html
                            {$subtitulo}
                            {$descripcion}
                            {$descripcion_subtitulo}
                            <br>
                            <!--<span class="mt-4">
                                <b>Progreso: $porcentaje %</b>
                                <progress class="barra_progreso_small_green mt-2" max="$secs_totales" value="{$progreso['segundos']}"></progress>
                            </span>-->
html;
            }


            $programa_precongreso1 .= <<<html
                <div class="row mb-3">
                        {$simposio}
                    <div class="col-12 col-md-6">
                        {$programa}
                    </div>
                </div>
html;
        }


        }else{
            $programa_precongreso1 = 'Precongreso Inválido';
        }

        View::set('programa_precongreso1',$programa_precongreso1);
        View::render("precongreso_all");
    }
}
