<?php

namespace App\controllers;

use App\models\General;
use \Core\View;
use \Core\Controller;
use \App\models\Transmision as TransmisionDao;
use \App\models\Talleres as TalleresDao;
use \App\models\Data as DataDao;

class Transmission extends Controller
{

    private $_contenedor;

    function __construct()
    {
        parent::__construct();
        $this->_contenedor = new Contenedor;
        View::set('header', $this->_contenedor->header());
        View::set('footer', $this->_contenedor->footer());
    }

    public function getUsuario()
    {
        return $this->__usuario;
    }

    public function index()
    {
        $extraHeader = <<<html
html;

        $extraFooter = <<<html
    <!--footer class="footer pt-0">
              <div class="container-fluid">
                  <div class="row align-items-center justify-content-lg-between">
                      <div class="col-lg-6 mb-lg-0 mb-4">
                          <div class="copyright text-center text-sm text-muted text-lg-start">
                              © <script>
                                  document.write(new Date().getFullYear())
                              </script>,
                              made with <i class="fa fa-heart"></i> by
                              <a href="https://www.creative-tim.com" class="font-weight-bold" target="www.grupolahe.com">Creative GRUPO LAHE</a>.
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                              <li class="nav-item">
                                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">privacy policies</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </footer--    >
          <!-- jQuery -->
            <script src="/js/jquery.min.js"></script>
            <!--   Core JS Files   -->
            <script src="/assets/js/core/popper.min.js"></script>
            <script src="/assets/js/core/bootstrap.min.js"></script>
            <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
            <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
            <!-- Kanban scripts -->
            <script src="/assets/js/plugins/dragula/dragula.min.js"></script>
            <script src="/assets/js/plugins/jkanban/jkanban.js"></script>
            <script src="/assets/js/plugins/chartjs.min.js"></script>
            <script src="/assets/js/plugins/threejs.js"></script>
            <script src="/assets/js/plugins/orbit-controls.js"></script>
            
          <!-- Github buttons -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
          <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
            <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
 
          <!-- VIEJO INICIO -->
            <script src="/js/jquery.min.js"></script>
          
            <script src="/js/custom.min.js"></script>

            <script src="/js/validate/jquery.validate.js"></script>
            <script src="/js/alertify/alertify.min.js"></script>
            <script src="/js/login.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <!-- VIEJO FIN -->
   <script>
    $( document ).ready(function() {

          $("#form_vacunacion").on("submit",function(event){
              event.preventDefault();
              
                  var formData = new FormData(document.getElementById("form_vacunacion"));
                  for (var value of formData.values()) 
                  {
                     console.log(value);
                  }
                  $.ajax({
                      url:"/Transmision/uploadComprobante",
                      type: "POST",
                      data: formData,
                      cache: false,
                      contentType: false,
                      processData: false,
                      beforeSend: function(){
                      console.log("Procesando....");
                  },
                  success: function(respuesta){
                      if(respuesta == 'success'){
                         // $('#modal_payment_ticket').modal('toggle');
                         
                          swal("¡Se ha guardado tu prueba correctamente!", "", "success").
                          then((value) => {
                              window.location.replace("/Transmision/");
                          });
                      }
                      console.log(respuesta);
                  },
                  error:function (respuesta)
                  {
                      console.log(respuesta);
                  }
              });
          });

      });
</script>

html;

        $transmision_1 = TransmisionDao::getTransmisionById(1);


        $data_1 = new \stdClass();
        $data_1->_tipo = 1;
        $data_1->_sala = 1;
        $data_1->_id_tipo = $transmision_1['id_transmision'];

        $chat_transmision_1 = TransmisionDao::getNewChatByID($data_1);
        $cont_chat_1 = '';

        foreach ($chat_transmision_1 as $chat => $value) {
            $nombre_completo = $value['nombre'] . ' ' . $value['apellidop'] . ' ' . $value['apellidom'];
            $cont_chat_1 .= <<<html
            <div class="d-flex mt-3">
                <div class="flex-shrink-0">
                    <img alt="Image placeholder" class="avatar rounded-circle" src="../../../img/users_musa/{$value['avatar_img']}">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="h5 mt-0">{$nombre_completo}</h6>
                    <p class="text-sm">{$value['chat']}</p>
                    
                </div>
            </div>
html;
        }


        $secs_t1 = TransmisionDao::getProgrsoTransmision($_SESSION['id_registrado'], $transmision_1['id_transmision']);


        if ($secs_t1) {
            $secs_t1 = TransmisionDao::getProgrsoTransmision($_SESSION['id_registrado'], $transmision_1['id_transmision']);
        } else {
            TransmisionDao::insertProgreso($_SESSION['id_registrado'], $transmision_1['id_transmision'], $transmision_1['sala']);
            $secs_t1 = TransmisionDao::getProgrsoTransmision($_SESSION['id_registrado'], $transmision_1['id_transmision']);
        }

        $info_user = DataDao::getInfoUserById($_SESSION['id_registrado']);


        //get info transmision 1 porcentaje 
        $duracion_t1 = $transmision_1['duracion'];
        $secs_totales_t1 = (intval($duracion_t1) * 60);
        $porcentaje_t1 = round(($secs_t1['minutos'] * 100) / $duracion_t1);

        $preguntas  = TalleresDao::getPreguntasByTransmision(1);// parametro es el id de la evaluaucion
        $pregs = '';
        $num_pregunta = 1;

        foreach ($preguntas as $key => $value) {
            $pregs .= <<<html
            <div class="col-12">
                <div class="mb-3 text-dark">
                    <h6 class="">{$value['orden']}) {$value['pregunta']}</h6>
                </div>
html;
            $respuestas = TalleresDao::getRespuestasByPreguntas($value['id_pregunta']);


            // <!--aqui van las opciones-->
            foreach ($respuestas as $key => $value2) {
                $pregs .= <<<html
                
                <div class="form-group pregunta_evaluacion_$num_pregunta">                    
                    <input type="radio"  id="opcion_preg_{$value2['id_respuesta']}" name="opcion_preg_{$value2['id_pregunta']}_{$value['id_evaluacion']}" value="{$value2['id_respuesta']}" required>
                    <label class=" form-label opcion-encuesta" for="opcion_preg_{$value2['id_respuesta']}">{$value2['valor']}) {$value2['respuesta']}</label>                    
                </div>
html;
            }

            $pregs .= <<<html
                </div>
html;
        }

        //segundo examen
        $preguntas_2  = TalleresDao::getPreguntasByTransmision(2);// parametro es el id de la evaluaucion
        $pregs_2 = '';
        $num_pregunta_2 = 1;

        foreach ($preguntas_2 as $key => $value) {
            $pregs_2 .= <<<html
            <div class="col-12">
                <div class="mb-3 text-dark">
                    <h6 class="">{$value['orden']}) {$value['pregunta']}</h6>
                </div>
html;
            $respuestas_2 = TalleresDao::getRespuestasByPreguntas($value['id_pregunta']);


            // <!--aqui van las opciones-->
            foreach ($respuestas_2 as $key => $value2) {
                $pregs_2 .= <<<html
                
                <div class="form-group pregunta_evaluacion_$num_pregunta_2">                    
                    <input type="radio"  id="opcion_preg_{$value2['id_respuesta']}" name="opcion_preg_{$value2['id_pregunta']}_{$value['id_evaluacion']}" value="{$value2['id_respuesta']}" required>
                    <label class=" form-label opcion-encuesta" for="opcion_preg_{$value2['id_respuesta']}">{$value2['valor']}) {$value2['respuesta']}</label>                    
                </div>
html;
            }

            $pregs_2 .= <<<html
                </div>
html;
        }

        


        $id_registrado = $_SESSION['id_registrado'];

        View::set('transmision_1', $transmision_1);
        // View::set('transmision_2', $transmision_2);
        View::set('chat_transmision_1', $cont_chat_1);
        // View::set('chat_transmision_2', $cont_chat_2);

        View::set('porcentaje_t1', $porcentaje_t1);
        View::set('secs_totales_t1', $secs_totales_t1);
        View::set('duracion_t1', $duracion_t1);

        View::set('secs_t1', $secs_t1);
        View::set('preguntas', $pregs);
        View::set('preguntas_2', $pregs_2);
        View::set('id_evaluacion',$preguntas[0]['id_evaluacion']);

        View::set('info_user', $info_user);
        View::set('id_registrado', $id_registrado);
        View::set('header', $this->_contenedor->header($extraHeader));
        View::set('footer', $extraFooter);
        View::render("transmission");
    }

    public function sala1()
    {
        $extraHeader = <<<html
html;

        $extraFooter = <<<html
    <!--footer class="footer pt-0">
              <div class="container-fluid">
                  <div class="row align-items-center justify-content-lg-between">
                      <div class="col-lg-6 mb-lg-0 mb-4">
                          <div class="copyright text-center text-sm text-muted text-lg-start">
                              © <script>
                                  document.write(new Date().getFullYear())
                              </script>,
                              made with <i class="fa fa-heart"></i> by
                              <a href="https://www.creative-tim.com" class="font-weight-bold" target="www.grupolahe.com">Creative GRUPO LAHE</a>.
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                              <li class="nav-item">
                                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">privacy policies</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </footer--    >
          <!-- jQuery -->
            <script src="/js/jquery.min.js"></script>
            <!--   Core JS Files   -->
            <script src="/assets/js/core/popper.min.js"></script>
            <script src="/assets/js/core/bootstrap.min.js"></script>
            <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
            <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
            <!-- Kanban scripts -->
            <script src="/assets/js/plugins/dragula/dragula.min.js"></script>
            <script src="/assets/js/plugins/jkanban/jkanban.js"></script>
            <script src="/assets/js/plugins/chartjs.min.js"></script>
            <script src="/assets/js/plugins/threejs.js"></script>
            <script src="/assets/js/plugins/orbit-controls.js"></script>
            
          <!-- Github buttons -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
          <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
            <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
 
          <!-- VIEJO INICIO -->
            <script src="/js/jquery.min.js"></script>
          
            <script src="/js/custom.min.js"></script>

            <script src="/js/validate/jquery.validate.js"></script>
            <script src="/js/alertify/alertify.min.js"></script>
            <script src="/js/login.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <!-- VIEJO FIN -->
   <script>
    $( document ).ready(function() {

          $("#form_vacunacion").on("submit",function(event){
              event.preventDefault();
              
                  var formData = new FormData(document.getElementById("form_vacunacion"));
                  for (var value of formData.values()) 
                  {
                     console.log(value);
                  }
                  $.ajax({
                      url:"/Transmision/uploadComprobante",
                      type: "POST",
                      data: formData,
                      cache: false,
                      contentType: false,
                      processData: false,
                      beforeSend: function(){
                      console.log("Procesando....");
                  },
                  success: function(respuesta){
                      if(respuesta == 'success'){
                         // $('#modal_payment_ticket').modal('toggle');
                         
                          swal("¡Se ha guardado tu prueba correctamente!", "", "success").
                          then((value) => {
                              window.location.replace("/Transmision/");
                          });
                      }
                      console.log(respuesta);
                  },
                  error:function (respuesta)
                  {
                      console.log(respuesta);
                  }
              });
          });

      });
</script>

html;

        $transmision_1 = TransmisionDao::getTransmisionById(1);




        // $transmision_1_p1 = TransmisionDao::getTransmisionById(1);
        // $transmision_2_p2 = TransmisionDao::getTransmisionById(2);

        // $data_p1 = new \stdClass();
        // $data_p1->_tipo = 1;
        // $data_p1->_sala = 1;
        // $data_p1->_id_tipo = $transmision_1_p1['id_transmision'];

        // $data_p2 = new \stdClass();
        // $data_p2->_tipo = 1;
        // $data_p2->_sala = 2;
        // $data_p2->_id_tipo = $transmision_2_p2['id_transmision'];

        //$pregunta_transmision_1 = TransmisionDao::getPreguntaById($data_p1);



        $data_1 = new \stdClass();
        $data_1->_tipo = 1;
        $data_1->_sala = 1;
        $data_1->_id_tipo = $transmision_1['id_transmision'];

        $chat_transmision_1 = TransmisionDao::getNewChatByID($data_1);
        $cont_chat_1 = '';

        // var_dump($chat_transmision_1);

        foreach ($chat_transmision_1 as $chat => $value) {
            $nombre_completo = $value['nombre'] . ' ' . $value['apellidop'] . ' ' . $value['apellidom'];
            $cont_chat_1 .= <<<html
            <div class="d-flex mt-3">
                <div class="flex-shrink-0">
                    <img alt="Image placeholder" class="avatar rounded-circle" src="../../../img/users_musa/{$value['avatar_img']}">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="h5 mt-0">{$nombre_completo}</h6>
                    <p class="text-sm">{$value['chat']}</p>
                    
                </div>
            </div>
html;
        }



        $secs_t1 = TransmisionDao::getProgrsoTransmision($_SESSION['id_registrado'], $transmision_1['id_transmision']);


        if ($secs_t1) {
            $secs_t1 = TransmisionDao::getProgrsoTransmision($_SESSION['id_registrado'], $transmision_1['id_transmision']);
        } else {
            TransmisionDao::insertProgreso($_SESSION['id_registrado'], $transmision_1['id_transmision'], $transmision_1['sala']);
            $secs_t1 = TransmisionDao::getProgrsoTransmision($_SESSION['id_registrado'], $transmision_1['id_transmision']);
        }


        $info_user = DataDao::getInfoUserById($_SESSION['id_registrado']);


        //get info transmision 1 porcentaje 
        $duracion_t1 = $transmision_1['duracion'];
        $secs_totales_t1 = (intval($duracion_t1) * 60);
        $porcentaje_t1 = round(($secs_t1['minutos'] * 100) / $duracion_t1);



        View::set('transmision_1', $transmision_1);

        View::set('chat_transmision_1', $cont_chat_1);


        View::set('porcentaje_t1', $porcentaje_t1);
        View::set('secs_totales_t1', $secs_totales_t1);
        View::set('duracion_t1', $duracion_t1);

        View::set('secs_t1', $secs_t1);

        View::set('info_user', $info_user);
        View::set('header', $this->_contenedor->header($extraHeader));
        View::set('footer', $extraFooter);
        View::render("transmission_sala1");
    }

    public function sala2()
    {
        $extraHeader = <<<html
html;

        $extraFooter = <<<html
    <!--footer class="footer pt-0">
              <div class="container-fluid">
                  <div class="row align-items-center justify-content-lg-between">
                      <div class="col-lg-6 mb-lg-0 mb-4">
                          <div class="copyright text-center text-sm text-muted text-lg-start">
                              © <script>
                                  document.write(new Date().getFullYear())
                              </script>,
                              made with <i class="fa fa-heart"></i> by
                              <a href="https://www.creative-tim.com" class="font-weight-bold" target="www.grupolahe.com">Creative GRUPO LAHE</a>.
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                              <li class="nav-item">
                                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">privacy policies</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </footer--    >
          <!-- jQuery -->
            <script src="/js/jquery.min.js"></script>
            <!--   Core JS Files   -->
            <script src="/assets/js/core/popper.min.js"></script>
            <script src="/assets/js/core/bootstrap.min.js"></script>
            <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
            <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
            <!-- Kanban scripts -->
            <script src="/assets/js/plugins/dragula/dragula.min.js"></script>
            <script src="/assets/js/plugins/jkanban/jkanban.js"></script>
            <script src="/assets/js/plugins/chartjs.min.js"></script>
            <script src="/assets/js/plugins/threejs.js"></script>
            <script src="/assets/js/plugins/orbit-controls.js"></script>
            
          <!-- Github buttons -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
          <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
            <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
 
          <!-- VIEJO INICIO -->
            <script src="/js/jquery.min.js"></script>
          
            <script src="/js/custom.min.js"></script>

            <script src="/js/validate/jquery.validate.js"></script>
            <script src="/js/alertify/alertify.min.js"></script>
            <script src="/js/login.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <!-- VIEJO FIN -->
   <script>
    $( document ).ready(function() {

          $("#form_vacunacion").on("submit",function(event){
              event.preventDefault();
              
                  var formData = new FormData(document.getElementById("form_vacunacion"));
                  for (var value of formData.values()) 
                  {
                     console.log(value);
                  }
                  $.ajax({
                      url:"/Transmision/uploadComprobante",
                      type: "POST",
                      data: formData,
                      cache: false,
                      contentType: false,
                      processData: false,
                      beforeSend: function(){
                      console.log("Procesando....");
                  },
                  success: function(respuesta){
                      if(respuesta == 'success'){
                         // $('#modal_payment_ticket').modal('toggle');
                         
                          swal("¡Se ha guardado tu prueba correctamente!", "", "success").
                          then((value) => {
                              window.location.replace("/Transmision/");
                          });
                      }
                      console.log(respuesta);
                  },
                  error:function (respuesta)
                  {
                      console.log(respuesta);
                  }
              });
          });

      });
</script>

html;
        $transmision_2 = TransmisionDao::getTransmisionById(2);



        // $transmision_1_p1 = TransmisionDao::getTransmisionById(1);
        // $transmision_2_p2 = TransmisionDao::getTransmisionById(2);

        // $data_p1 = new \stdClass();
        // $data_p1->_tipo = 1;
        // $data_p1->_sala = 1;
        // $data_p1->_id_tipo = $transmision_1_p1['id_transmision'];

        // $data_p2 = new \stdClass();
        // $data_p2->_tipo = 1;
        // $data_p2->_sala = 2;
        // $data_p2->_id_tipo = $transmision_2_p2['id_transmision'];

        //$pregunta_transmision_1 = TransmisionDao::getPreguntaById($data_p1);




        $data_2 = new \stdClass();
        $data_2->_tipo = 1;
        $data_2->_sala = 2;
        $data_2->_id_tipo = $transmision_2['id_transmision'];

        $chat_transmision_2 = TransmisionDao::getNewChatByID($data_2);
        $cont_chat_2 = '';


        foreach ($chat_transmision_2 as $chat => $value) {
            $nombre_completo = $value['nombre'] . ' ' . $value['apellidop'] . ' ' . $value['apellidom'];
            $cont_chat_2 .= <<<html
            <div class="d-flex mt-3">
                <div class="flex-shrink-0">
                    <img alt="Image placeholder" class="avatar rounded-circle" src="../../../img/users_musa/{$value['avatar_img']}">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="h5 mt-0">{$nombre_completo}</h6>
                    <p class="text-sm">{$value['chat']}</p>
                    
                </div>
            </div>
html;
        }

        $secs_t2 = TransmisionDao::getProgrsoTransmision($_SESSION['id_registrado'], $transmision_2['id_transmision']);

        if ($secs_t2) {
            $secs_t2 = TransmisionDao::getProgrsoTransmision($_SESSION['id_registrado'], $transmision_2['id_transmision']);
        } else {
            TransmisionDao::insertProgreso($_SESSION['id_registrado'], $transmision_2['id_transmision'], $transmision_2['sala']);
            $secs_t2 = TransmisionDao::getProgrsoTransmision($_SESSION['id_registrado'], $transmision_2['id_transmision']);
        }

        $info_user = DataDao::getInfoUserById($_SESSION['id_registrado']);


        //get info transmision 2 porcentaje 
        $duracion_t2 = $transmision_2['duracion'];
        $secs_totales_t2 = (intval($duracion_t2) * 60);
        $porcentaje_t2 = round(($secs_t2['minutos'] * 100) / $duracion_t2);

        View::set('transmision_2', $transmision_2);

        View::set('chat_transmision_2', $cont_chat_2);



        View::set('porcentaje_t2', $porcentaje_t2);
        View::set('secs_totales_t2', $secs_totales_t2);
        View::set('duracion_t2', $duracion_t2);


        View::set('secs_t2', $secs_t2);

        View::set('info_user', $info_user);
        View::set('header', $this->_contenedor->header($extraHeader));
        View::set('footer', $extraFooter);
        View::render("transmission_sala2");
    }

    public function sala($sala)
    {
        $extraHeader = <<<html
html;

        $extraFooter = <<<html
    <!--footer class="footer pt-0">
              <div class="container-fluid">
                  <div class="row align-items-center justify-content-lg-between">
                      <div class="col-lg-6 mb-lg-0 mb-4">
                          <div class="copyright text-center text-sm text-muted text-lg-start">
                              © <script>
                                  document.write(new Date().getFullYear())
                              </script>,
                              made with <i class="fa fa-heart"></i> by
                              <a href="https://www.creative-tim.com" class="font-weight-bold" target="www.grupolahe.com">Creative GRUPO LAHE</a>.
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                              <li class="nav-item">
                                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">privacy policies</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </footer--    >
          <!-- jQuery -->
            <script src="/js/jquery.min.js"></script>
            <!--   Core JS Files   -->
            <script src="/assets/js/core/popper.min.js"></script>
            <script src="/assets/js/core/bootstrap.min.js"></script>
            <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
            <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
            <!-- Kanban scripts -->
            <script src="/assets/js/plugins/dragula/dragula.min.js"></script>
            <script src="/assets/js/plugins/jkanban/jkanban.js"></script>
            <script src="/assets/js/plugins/chartjs.min.js"></script>
            <script src="/assets/js/plugins/threejs.js"></script>
            <script src="/assets/js/plugins/orbit-controls.js"></script>
            
          <!-- Github buttons -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
          <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
            <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
 
          <!-- VIEJO INICIO -->
            <script src="/js/jquery.min.js"></script>
          
            <script src="/js/custom.min.js"></script>

            <script src="/js/validate/jquery.validate.js"></script>
            <script src="/js/alertify/alertify.min.js"></script>
            <script src="/js/login.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <!-- VIEJO FIN -->
   <script>
    $( document ).ready(function() {

          $("#form_vacunacion").on("submit",function(event){
              event.preventDefault();
              
                  var formData = new FormData(document.getElementById("form_vacunacion"));
                  for (var value of formData.values()) 
                  {
                     console.log(value);
                  }
                  $.ajax({
                      url:"/Transmision/uploadComprobante",
                      type: "POST",
                      data: formData,
                      cache: false,
                      contentType: false,
                      processData: false,
                      beforeSend: function(){
                      console.log("Procesando....");
                  },
                  success: function(respuesta){
                      if(respuesta == 'success'){
                         // $('#modal_payment_ticket').modal('toggle');
                         
                          swal("¡Se ha guardado tu prueba correctamente!", "", "success").
                          then((value) => {
                              window.location.replace("/Transmision/");
                          });
                      }
                      console.log(respuesta);
                  },
                  error:function (respuesta)
                  {
                      console.log(respuesta);
                  }
              });
          });

      });
</script>

html;



        //Validar si existe la transmision
        if (is_numeric($sala)) {
            $transmision_1 = TransmisionDao::getTransmisionById($sala);
            if ($transmision_1) {
                $permiso_taller = TalleresDao::getProductoByAsignacion($_SESSION['id_registrado'], $transmision_1['id_producto']);
            } else {
                $transmision_1 = false;
            }
        } else {
            $transmision_1 = false;
        }


        if ($transmision_1) {

            if ($permiso_taller) {
                // $transmision_1_p1 = TransmisionDao::getTransmisionById(1);
                // $transmision_2_p2 = TransmisionDao::getTransmisionById(2);

                // $data_p1 = new \stdClass();
                // $data_p1->_tipo = 1;
                // $data_p1->_sala = 1;
                // $data_p1->_id_tipo = $transmision_1_p1['id_transmision'];

                // $data_p2 = new \stdClass();
                // $data_p2->_tipo = 1;
                // $data_p2->_sala = 2;
                // $data_p2->_id_tipo = $transmision_2_p2['id_transmision'];

                //$pregunta_transmision_1 = TransmisionDao::getPreguntaById($data_p1);



                $data_1 = new \stdClass();
                $data_1->_tipo = 1;
                $data_1->_sala = $transmision_1['sala'];
                $data_1->_id_tipo = $transmision_1['id_transmision'];

                $chat_transmision_1 = TransmisionDao::getNewChatByID($data_1);
                $cont_chat_1 = '';


                foreach ($chat_transmision_1 as $chat => $value) {

                    $img_avatar = $value['avatar_img'] != '' ? '../../../img/users_musa/' . $value['avatar_img'] : '../../../img/users_musa/form.jpg';
                    $nombre_completo = $value['nombre'] . ' ' . $value['apellidop'] . ' ' . $value['apellidom'];
                    $cont_chat_1 .= <<<html
                <div class="d-flex mt-3">
                    <div class="flex-shrink-0">
                        <img alt="Image placeholder" class="avatar rounded-circle" src="{$img_avatar}">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="h5 mt-0">{$nombre_completo}</h6>
                        <p class="text-sm">{$value['chat']}</p>
                        
                    </div>
                </div>
    html;
                }

                $secs_t1 = TransmisionDao::getProgrsoTransmision($_SESSION['id_registrado'], $transmision_1['id_transmision']);


                if ($secs_t1) {
                    $secs_t1 = TransmisionDao::getProgrsoTransmision($_SESSION['id_registrado'], $transmision_1['id_transmision']);
                } else {
                    TransmisionDao::insertProgreso($_SESSION['id_registrado'], $transmision_1['id_transmision'], $transmision_1['sala']);
                    $secs_t1 = TransmisionDao::getProgrsoTransmision($_SESSION['id_registrado'], $transmision_1['id_transmision']);
                }


                $info_user = DataDao::getInfoUserById($_SESSION['id_registrado']);



                //get info transmision 1 porcentaje 
                $duracion_t1 = $transmision_1['duracion'];
                $secs_totales_t1 = (intval($duracion_t1) * 60);
                $porcentaje_t1 = round(($secs_t1['minutos'] * 100) / $duracion_t1);
                $salapre = $sala;


                View::set('transmision_1', $transmision_1);
                View::set('salapre', $salapre);
                View::set('chat_transmision_1', $cont_chat_1);
                View::set('porcentaje_t1', $porcentaje_t1);
                View::set('secs_totales_t1', $secs_totales_t1);
                View::set('duracion_t1', $duracion_t1);

                View::set('secs_t1', $secs_t1);

                View::set('info_user', $info_user);

                View::set('header', $this->_contenedor->header($extraHeader));
                View::set('footer', $extraFooter);
                View::render("transmission_sala");
            } else {
                View::render("error_congreso");
            }
        } else {
            View::render("404");
        }
    }





    public function getChatById()
    {
        $id_tipo = $_POST['id_tipo'];
        $sala = $_POST['sala'];

        $transmision = TransmisionDao::getTransmisionById($id_tipo);
        $data = new \stdClass();
        $data->_tipo = 1;
        $data->_sala = $sala;
        $data->_id_tipo = $transmision['id_transmision'];

        $chat_transmision = TransmisionDao::getNewChatByID($data);

        echo json_encode($chat_transmision);
    }

    public function updateProgress()
    {
        $progreso = $_POST['segundos'];
        $transmision = $_POST['transmision'];

        TransmisionDao::updateProgreso($transmision, $_SESSION['id_registrado'], $progreso);

        echo $progreso . ' ID_Tr: ' . $transmision;
    }


    public function savePregunta()
    {
        $pregunta = $_POST['txt_pregunta'];
        $salapre = $_POST['salapre'];
        $id_tipopre = $_POST['id_tipopre'];



        $data = new \stdClass();
        $data->_id_registrado = $_SESSION['id_registrado'];
        $data->_pregunta = $pregunta;
        $data->_tipopre = 1;
        $data->_id_tipopre = $id_tipopre;
        $data->_salapre = $salapre;


        $id = TransmisionDao::insertPregunta($data);

        if ($id) {
            echo "success";
        } else {
            echo "fail";
        }
    }


    public function saveExamen()
    {

        try {
            $respuestas = $_POST;
            $id_evaluacion = '';

            
            foreach ($respuestas as $key => $value) {
                $names  = $key;
                $name = explode("_", $names);                
                $id_pregunta = intval($name[2]); //id_pregunta
                $id_evaluacion = intval($name[3]);//id_evaluacion   
                
                $data = new \stdClass();

                $data->_pregunta_id = $id_pregunta;
                $data->_respuesta_id = $value;
                $data->_id_registrado = $_SESSION['id_registrado'];

                // $getTotalRespuestas = TransmisionDao::getTotalRespuestasByUserAndEvaluacion($_SESSION['id_registrado'],$id_evaluacion);
                // if(!$getTotalRespuestas){
                    
                    $insertRespuestas = TransmisionDao::insertRespuestas($data);
                // }            
                
            }            

            $getTotalRespuestas = TransmisionDao::getTotalRespuestasByUserAndEvaluacion($_SESSION['id_registrado'],$id_evaluacion);
            $total_preguntas = count($getTotalRespuestas);
            $count = 0;
            foreach ($getTotalRespuestas as $key => $value) {
                if($value['status_correcta'] == 1){
                    $count++;
                }
            }
            $calificacion_inicial = (($count / $total_preguntas) * 100) / 10;
            // echo number_format($calificacion_inicial,1);
            $documento = new \stdClass();

            $documento->_evaluacion_inicial = 1;
            $documento->_calificacion_inicial = number_format($calificacion_inicial,1);
            $documento->_id_registrado = $_SESSION['id_registrado'];

            $getDataUser = TransmisionDao::getDataUser($_SESSION['id_registrado']);

            // var_dump($getDataUser);
            if($getDataUser['evaluacion_inicial'] == 0 || $getDataUser['evaluacion_inicial'] == "0"){
                $updateDataUser = TransmisionDao::updateDataUser($documento);
            }else{
                $updateDataUser = true;
            }
            

            if($updateDataUser){
                echo "success";
            }else{
                echo "fail";
            }

        } catch (\Throwable $th) {
            //throw $th;
            echo "fail";
        }
    }

    public function saveExamenOriginal()
    {

        try {
            $respuestas = $_POST;
            $id_evaluacion = '';

            
            foreach ($respuestas as $key => $value) {
                $names  = $key;
                $name = explode("_", $names);                
                $id_pregunta = intval($name[2]); //id_pregunta
                $id_evaluacion = intval($name[3]);//id_evaluacion   
                
                $data = new \stdClass();

                $data->_pregunta_id = $id_pregunta;
                $data->_respuesta_id = $value;
                $data->_id_registrado = $_SESSION['id_registrado'];

                // $getTotalRespuestas = TransmisionDao::getTotalRespuestasByUserAndEvaluacion($_SESSION['id_registrado'],$id_evaluacion);
                // if(!$getTotalRespuestas){
                    
                    $insertRespuestas = TransmisionDao::insertRespuestas($data);
                // }            
                
            }            

            $getTotalRespuestas = TransmisionDao::getTotalRespuestasByUserAndEvaluacion($_SESSION['id_registrado'],$id_evaluacion);
            $total_preguntas = count($getTotalRespuestas);
            $count = 0;
            foreach ($getTotalRespuestas as $key => $value) {
                if($value['status_correcta'] == 1){
                    $count++;
                }
            }
            $calificacion_final = (($count / $total_preguntas) * 100) / 10;
            // echo number_format($calificacion_final,1);
            $documento = new \stdClass();

            $documento->_evaluacion_final = 1;
            $documento->_calificacion_final = number_format($calificacion_final,1);
            $documento->_id_registrado = $_SESSION['id_registrado'];

            $getDataUser = TransmisionDao::getDataUser($_SESSION['id_registrado']);

            // var_dump($getDataUser);
            if($getDataUser['evaluacion_final'] == 0 || $getDataUser['evaluacion_final'] == "0"){
                $updateDataUser = TransmisionDao::updateDataUserCalificacionFinal($documento);
            }else{
                $updateDataUser = true;
            }
            

            if($updateDataUser){
                echo "success";
            }else{
                echo "fail";
            }

        } catch (\Throwable $th) {
            //throw $th;
            echo "fail";
        }
    }

    public function saveChat()
    {
        $chat = $_POST['txt_chat'];
        $sala = $_POST['sala'];
        $id_tipo = $_POST['id_tipo'];

        $data = new \stdClass();
        $data->_id_registrado = $_SESSION['id_registrado'];
        $data->_chat = $chat;
        $data->_tipo = 1;
        $data->_id_tipo = $id_tipo;
        $data->_sala = $sala;


        $id = TransmisionDao::insertNewChat($data);

        if ($id) {
            echo "success";
        } else {
            echo "fail";
        }
    }

    public function updateProgressWithDate()
    {
        $progreso = $_POST['segundos'];
        $transmision = $_POST['transmision'];

        TransmisionDao::updateProgresoFecha($transmision, $_SESSION['id_registrado'], $progreso);

        echo $progreso . ' ID_Tr: ' . $transmision;
    }

    // public function uploadComprobante()
    // {

    //     $documento = new \stdClass();

    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //         $marca_ = '';
    //         $usuario = $_POST["user_"];
    //         $numero_dosis = $_POST['numero_dosis'];
    //         foreach ($_POST['checkbox_marcas'] as $selected) {
    //             $marca_ = $selected . "/ ";
    //         }
    //         $marca = $marca_;
    //         $file = $_FILES["file_"];

    //         $pdf = $this->generateRandomString();

    //         move_uploaded_file($file["tmp_name"], "comprobante_vacunacion/" . $pdf . '.pdf');

    //         $documento->_url = $pdf . '.pdf';
    //         $documento->_user = $usuario;
    //         $documento->_numero_dosis = $numero_dosis;
    //         $documento->_marca_dosis = $marca;

    //         $id = TransmisionDao::insert($documento);

    //         if ($id) {
    //             echo 'success';
    //         } else {
    //             echo 'fail';
    //         }
    //     } else {
    //         echo 'fail REQUEST';
    //     }
    // }

    public function checkPreCongress()
    {
        $id_registrado = $_POST['id_registrado'];

        $id = TransmisionDao::checkPreCongress($id_registrado);

        if ($id) {
            echo "success";
        } else {
            echo "error";
        }
    }

    function generateRandomString($length = 10)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
}
