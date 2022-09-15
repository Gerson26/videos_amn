<?php

namespace App\controllers;

defined("APPPATH") or die("Access denied");
require_once dirname(__DIR__) . '/../public/librerias/fpdf/fpdf.php';

use \Core\View;
use \Core\Controller;
use \App\models\Talleres as TalleresDao;
use \App\models\Transmision as TransmisionDao;
use \App\models\Register as RegisterDao;
use \App\models\Home as HomeDao;

class Videos extends Controller
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
                      url:"/Talleres/uploadComprobante",
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
                              window.location.replace("/Talleres/");
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
    }





    public function Video($clave)
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
                            url:"/Talleres/uploadComprobante",
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
                                    window.location.replace("/Talleres/");
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


        $curso = TalleresDao::getViodeoByClave($clave);    
        
        if ($curso) {
  
        $contenido_taller = '';
        

        $permiso_taller = TalleresDao::getProductoByAsignacion($_SESSION['id_registrado'], $curso['id_producto']);


        $progreso_curso = TalleresDao::getVideoProgreso($_SESSION['id_registrado'], $curso['id_video']);

        if ($progreso_curso) {
            $progreso_curso = TalleresDao::getVideoProgreso($_SESSION['id_registrado'], $curso['id_video']);
        } else {
            TalleresDao::insertVideoProgreso($_SESSION['id_registrado'], $curso['id_video']);
            $progreso_curso = TalleresDao::getVideoProgreso($_SESSION['id_registrado'], $curso['id_video']);
        }

        // duracion en minutos
        $duracion = $curso['duracion'];

        $secs_totales = (intval($duracion) * 60);

        $porcentaje = round(($progreso_curso['minutos'] * 100) / $duracion);

        
            $id_video = $curso['id_video'];
            // $id_curso = TalleresDao::getProductCursoByClave($clave)['id_producto'];
            // $url = TalleresDao::getProductCursoByClave($clave)['url'];
            // $nombre_taller = TalleresDao::getProductCursoByClave($clave)['nombre'];
            // $descripcion = TalleresDao::getProductCursoByClave($clave)['descripcion'];

            if ($permiso_taller) {
                $contenido_taller .= <<<html
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="{$curso['url']}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
                    </div>
                </div>
    
                <input type="text" value="{$clave}" id="clave_video" readonly hidden>
    
                <div>
                    <p>
                        <hr class="horizontal dark my-1">
                        <h6 class="mb-1 mt-2 text-center">{$curso['descripcion']}</h6>
                    </p>
                </div>               
                
html;
                if ($curso['status'] == 2 || $porcentaje >= 80) {
                    //                     $btn_encuesta = <<<html
                    //                     <button type="button" class="btn btn-primary" style="background-color: orangered!important;" data-toggle="modal" data-target="#encuesta">
                    //                         Examen
                    //                     </button>
                    // html;
                } else {
                    $btn_encuesta = '';
                }

                $encuesta = '';

                // $preguntas  = TalleresDao::getPreguntasByProductCursoUsuario($id_curso);
                // $ha_respondido = TalleresDao::getRespuestasCurso($_SESSION['id_registrado'], $id_curso);


                $data = new \stdClass();
                $data->_tipo = 4;
                $data->_sala = 1;
                $data->_id_tipo = $curso['id_video'];

                $chat_taller = TransmisionDao::getNewChatByID($data);
                $cont_chat = '';
                $avatar = '';

                foreach ($chat_taller as $chat => $value) {
                    $nombre_completo = $value['nombre'] . ' ' . $value['apellidop'] . ' ' . $value['apellidom'];
                    $nombre_completo = utf8_encode($nombre_completo);
                    $cont_chat .= <<<html
            <div class="d-flex mt-3">
                <div class="flex-shrink-0">
                    <img alt="Image placeholder" class="avatar rounded-circle" src="../../../img/users_musa/form.jpg">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="h5 mt-0">{$nombre_completo}</h6>
                    <p class="text-sm">{$value['chat']}</p>

                </div>
            </div>
html;
                    $avatar = 'form.jpg';
                }

                View::set('clave', $clave);
                View::set('encuesta', $encuesta);
                View::set('id_video', $id_video);
                View::set('descripcion', $curso['descripcion']);
                View::set('nombre_taller', $curso['nombre']);
                View::set('url', $curso['url']);
                View::set('btn_encuesta', $btn_encuesta);
                View::set('porcentaje', $porcentaje);
                View::set('contenido_taller', $contenido_taller);
                View::set('progreso_curso', $progreso_curso);
                View::set('secs_totales', $secs_totales);
                View::set('duracion', $duracion);
                View::set('cont_chat', $cont_chat);
                View::set('avatar', $avatar);
                View::set('header', $this->_contenedor->header($extraHeader));
                View::set('footer', $this->_contenedor->footer($extraFooter));
                View::render("video_all");
            } else {
                $contenido_taller .= <<<html
                <hr>
                <div class="row mt-3">
                    <div class="col-10 m-auto text-center">
                        <h2 class="text-bolder text-gradient text-danger">
                            <i class="fas fa-exclamation"></i><br>
                            Lo sentimos no tiene acceso a este curso, contacte a soporte.
                        </h2>
                    </div>
                </div>                
html;
                $btn_encuesta = '';
                View::render("error_video");
            }
        } else {
            View::render("404");
        }
    }

    public function Cart()
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
                      url:"/Talleres/uploadComprobante",
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
                              window.location.replace("/Talleres/");
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

        $productos = TalleresDao::getCarritoByIdUser($_SESSION['id_registrado']);
        $precios = array();
        $total = 0;

        foreach ($productos as $key => $value) {
            // echo $value['precio_publico'];
            if ($value['es_congreso'] == 1) {
                $precio = $value['amout_due'];
            } else if ($value['es_servicio'] == 1) {
                $precio = $value['precio_publico'];
            } else if ($value['es_curso'] == 1) {
                $precio = $value['precio_publico'];
            }
            array_push($precios, $precio);
        }

        if (count($productos) >= 1) {
            $style = 'display:flex;';
        } else {
            $style = 'display:none';
        }

        $total = array_sum($precios);

        //get productos
        $nombres_productos = '';
        $productos = TalleresDao::getCarritoByIdUser($_SESSION['id_registrado']);
        foreach ($productos as $key => $value) {
            // array_push($nombres_productos,$value['nombre']);
            $nombres_productos .= $value['nombre'] . ", ";
        }
        $nombres_productos = substr($nombres_productos, 0, -2);
        $clave = $this->generateRandomString();

        View::set('clave', $clave);
        View::set('producto_s', $nombres_productos);
        View::set('header', $this->_contenedor->header($extraHeader));
        View::set('footer', $this->_contenedor->footer($extraFooter));
        View::set('tabla', $this->getAllProductsCartByUser($_SESSION['id_registrado']));
        View::set('style', $style);
        View::set('total', intval($total));
        View::render("carrito");
    }

    public function getAllProductsCartByUser($id_user)
    {

        $html = "";
        foreach (TalleresDao::getCarritoByIdUser($id_user) as $key => $value) {

            if ($value['es_congreso'] == 1) {
                $precio = $value['amout_due'];
            } else if ($value['es_servicio'] == 1) {
                $precio = $value['precio_publico'];
            } else if ($value['es_curso'] == 1) {
                $precio = $value['precio_publico'];
            }

            $html .= <<<html
            <tr>
                <td >
                    
                    
                    <div class=""> 
                                                   
                            <p><button class="btn btn-danger btn-sm btn-icon-only btn-delete" style="margin-top: 10px; margin-right:10px;" value="{$value['id_carrito']}">x</button><img src="/caratulas/{$value['caratula']}" style="width:100px;heigth:100px; border-radius:8px;"> {$value['nombre']}</p>                       
                    </div>
                </td>
         
                <td style="text-align:left; vertical-align:middle;" > 
                    
                    <div class="text-center">
                        <p>{$precio} - {$value['tipo_moneda']}</p>
                    </div>
                  
                </td>

                <td style="text-align:left; vertical-align:middle;" > 
                    
                    <div class="text-center">
                        <p>{$precio} - {$value['tipo_moneda']}</p>
                    </div>
                
                </td>  

               
        </tr>
html;
        }

        if ($html == "") {

            $html .= <<<html

            <tr>
                    <td class="text-center">
                        
                        
                      
                    
                    </td>  

                    <td class="text-center">
                        
                            
                        No hay productos en su carrito
                    
                    </td>  

                 <td class="text-center">
                        
    
                
                </td>  

                
            </tr>
html;
        }

        return $html;
    }

    public function getNumberPorducts()
    {

        $user_id = $_SESSION['id_registrado'];

        $getNumberProducts = TalleresDao::getProductsNumber($user_id)[0]['total_productos'];

        echo $getNumberProducts;
    }


    public function searchProductCart()
    {
        $id_producto = $_POST['id_producto'];
        $data = [];
        $getProductCart = TalleresDao::getProductCart($_SESSION['id_registrado'], $id_producto);

        if ($getProductCart) {
            $data = [
                "msg" => "Este producto ya esta en su cesta",
                "status" => "warning"
            ];
        } else {
            $data = [
                "status" => "success"
            ];
        }

        echo json_encode($data);
    }

    public function cartShopping()
    {
        $id_producto =  $_POST['id_producto'];

        // $producto = TalleresDao::getProductoById($id_producto);

        $getProductCart = TalleresDao::getProductCart($_SESSION['id_registrado'], $id_producto);

        if ($getProductCart) {
            $data = [
                "msg" => "Este producto ya esta en su cesta",
                "status" => "warning"
            ];
        } else {
            $documento = new \stdClass();
            $documento->_id_producto = $id_producto;
            $documento->_user_id = $_SESSION['id_registrado'];

            $insertProductCart = TalleresDao::insertProductCart($documento);

            if ($insertProductCart) {
                $data = [
                    "msg" => "Se ingreso el producto a su cesta",
                    "status" => "success"
                ];
            } else {
                $data = [
                    "msg" => "Error al gurdar el producto",
                    "status" => "error"
                ];
            }
        }

        echo json_encode($data);
    }

    public function remove()
    {
        $id = $_POST['id'];

        $delete = TalleresDao::deleteItem($id);

        if ($delete) {
            echo "success";
        } else {
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
        $data->_tipo = 2; //taller
        $data->_id_tipo = $id_tipo;
        $data->_sala = $sala;

        $id = TransmisionDao::insertNewChat($data);

        if ($id) {
            echo "success";
        } else {
            echo "fail";
        }
    }

    public function getChatById()
    {
        $id_tipo = $_POST['id_tipo'];
        $sala = $_POST['sala'];

        $taller = TalleresDao::getPorductById($id_tipo);
        $data = new \stdClass();
        $data->_tipo = 2;
        $data->_sala = $sala;
        $data->_id_tipo = $taller['id_producto'];

        $chat_taller = TransmisionDao::getNewChatByID($data);

        echo json_encode($chat_taller);
    }




    public function savePregunta()
    {
        $pregunta = $_POST['txt_pregunta'];
        $sala = $_POST['sala'];
        $id_tipo = $_POST['id_tipo'];

        $data = new \stdClass();
        $data->_id_registrado = $_SESSION['id_registrado'];
        $data->_pregunta = $pregunta;
        $data->_tipo = 2; //taller
        $data->_id_tipo = $id_tipo;
        $data->_sala = $sala;

        $id = TransmisionDao::insertNewPregunta($data);

        if ($id) {
            echo "success";
        } else {
            echo "fail";
        }
    }

    public function getPreguntaById()
    {
        $id_tipo = $_POST['id_tipo'];
        $sala = $_POST['sala'];

        $taller = TalleresDao::getPorductById($id_tipo);
        $data = new \stdClass();
        $data->_tipo = 2;
        $data->_sala = $sala;
        $data->_id_tipo = $taller['id_producto'];

        $pregunta_taller = TransmisionDao::getNewPreguntaByID($data);

        echo json_encode($pregunta_taller);
    }






    public function guardarRespuestas()
    {
        $respuestas = $_POST['list_r'];
        $id_curso = $_POST['id_curso'];

        $ha_respondido = TalleresDao::getRespuestasCurso($_SESSION['id_registrado'], $id_curso);

        // var_dump($respuestas);
        $userData = RegisterDao::getUser($this->getUsuario())[0];

        // var_dump($userData['clave']);

        // exit;

        if ($ha_respondido) {
            // echo 'fail';
            $data = [
                'status' => 'success',
                'clave_user' => $userData['clave']
            ];
            echo json_encode($data);
        } else {
            foreach ($respuestas as $key => $value) {
                $id_pregunta = $value[0];
                $respuesta = $value[1];
                TalleresDao::insertRespuestaProductCurso($_SESSION['id_registrado'], $id_pregunta, $respuesta);
            }
            // echo 'success';
            $data = [
                'status' => 'success',
                'clave_user' => $userData['clave'],
                'href' => '/Talleres/abrirConstancia/' . $userData['clave'] . '/' . $id_curso,
                'href_download' => 'constancias/' . $userData['clave'] . $id_curso . '.pdf'
            ];
            echo json_encode($data);
        }
    }

    public function updateProgress()
    {
        $progreso = $_POST['segundos'];
        $curso = $_POST['curso'];

        TalleresDao::updateProgresoFechaProducto($curso, $_SESSION['id_registrado'], $progreso);

        echo 'minuto ' . $progreso . ' ' . $curso;
    }

    public function Vistas()
    {
        $clave = $_POST['clave_video'];
        $vistas = TalleresDao::getCursoByClave($clave)['vistas'];
        $vistas++;

        TalleresDao::updateVistasByClave($clave, $vistas);

        echo $clave;
    }

    public function Likes()
    {
        $clave = $_POST['clave'];
        $id_curso = TalleresDao::getProductCursoByClave($clave)['id_producto'];


        $hay_like = TalleresDao::getlikeProductCurso($id_curso, $_SESSION['id_registrado']);
        // var_dump($hay_like);

        if ($hay_like) {
            $status = 0;
            if ($hay_like['status'] == 1) {
                $status = 0;
            } else if ($hay_like['status'] == 0) {
                $status = 1;
            }
            TalleresDao::updateLikeProductos($id_curso, $_SESSION['id_registrado'], $status);
            // echo 'siuu '.$clave;
        } else {
            TalleresDao::insertLikeProducto($id_curso, $_SESSION['id_registrado']);
            // echo 'nooouuu '.$clave;
        }
    }

    public function uploadComprobante()
    {

        $documento = new \stdClass();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $marca_ = '';
            $usuario = $_POST["user_"];
            $numero_dosis = $_POST['numero_dosis'];
            foreach ($_POST['checkbox_marcas'] as $selected) {
                $marca_ = $selected . "/ ";
            }
            $marca = $marca_;
            $file = $_FILES["file_"];

            $pdf = $this->generateRandomString();

            move_uploaded_file($file["tmp_name"], "comprobante_vacunacion/" . $pdf . '.pdf');

            $documento->_url = $pdf . '.pdf';
            $documento->_user = $usuario;
            $documento->_numero_dosis = $numero_dosis;
            $documento->_marca_dosis = $marca;

            $id = TalleresDao::insert($documento);

            if ($id) {
                echo 'success';
            } else {
                echo 'fail';
            }
        } else {
            echo 'fail REQUEST';
        }
    }

    function generateRandomString($length = 10)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
}
