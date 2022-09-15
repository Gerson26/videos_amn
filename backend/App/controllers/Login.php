<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use App\models\Login as LoginDao;
use App\models\Usuarios as UsuariosDao;
use App\models\Talleres as TalleresDao;

class Login{

    public function index() {
        
    $extraHeader = <<<html
        <!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
           <link rel="icon" type="image/vnd.microsoft.icon" href="../../../assets/img/logos/logo_amc.png">
            <!--title>
               Home - AMC
            </title-->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
            <!-- Nucleo Icons -->
            <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
            <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
            <!-- Font Awesome Icons -->
            <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
            <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
            <!-- CSS Files -->
            <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
            <!-- TEMPLATE VIEJO-->
            <link rel="stylesheet" href="/css/alertify/alertify.core.css" />
            <link rel="stylesheet" href="/css/alertify/alertify.default.css" id="toggleCSS" />
            <link id="pagestyle" href="/assets/css/style.css" rel="stylesheet" />


           <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
            
           <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
           
           <style>
           .image-upload>input {
                display: none;
            }
            #lbl-image{
                cursor: pointer;
            }
           </style>
            <!-- TEMPLATE VIEJO-->
        </head>

        
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/vnd.microsoft.icon" href="../../../assets/img/logos/logo_amc.png">
        <title>
           Login - LXI Semana Quirúrgica Nacional
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <link rel="stylesheet" href="/css/alertify/alertify.core.css" />
        <link rel="stylesheet" href="/css/alertify/alertify.default.css" id="toggleCSS" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/assets/css/flags.css" id="toggleCSS" />
            
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
        <!-- stats.js lib --> 
        <script src="https://threejs.org/examples/js/libs/stats.min.js"></script>
        <script src="/assets/js/jquery.countdown.min/jquery.countdown.min.js"></script>
        <script src="/assets/js/main/main.js"></script>
html;
        $extraFooter = <<<html

        <footer class="footer pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-8 mx-auto text-center mt-0">
                        <!--p class="mb-0 text-secondary">
                            Copyright © <script>
                                document.write(new Date().getFullYear())
                            </script> Grupo LAHE.
                        </p-->
                    </div>
                </div>
            </div>
        </footer>

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

        <script src="/assets/js/jquery.countdown.min/jquery.countdown.min.js"></script>
        <script src="/assets/js/main/main.js"></script>
        
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
        <!-- VIEJO FIN -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/validate/jquery.validate.js"></script>
        <script src="/js/alertify/alertify.min.js"></script>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
       <!--   Core JS Files   -->
          <script src="../../../assets/js/core/popper.min.js"></script>
          <script src="../../../assets/js/core/bootstrap.min.js"></script>
          <script src="../../../assets/js/plugins/perfect-scrollbar.min.js"></script>
          <script src="../../../assets/js/plugins/smooth-scrollbar.min.js"></script>
          <script src="../../../assets/js/plugins/multistep-form.js"></script>
         
          <!-- Kanban scripts -->
          <script src="../../../assets/js/plugins/dragula/dragula.min.js"></script>
          <script src="../../../assets/js/plugins/jkanban/jkanban.js"></script>
          <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
              var options = {
                damping: '0.5'
              }
              Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
          </script>
          <!-- Github buttons -->
          <script async defer src="https://buttons.github.io/buttons.js"></script>
          <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        
        <script src="/js/jquery.min.js"></script>
        
        
        <script src="/js/validate/jquery.validate.js"></script>
        <script src="/js/alertify/alertify.min.js"></script>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <!-- Kanban scripts -->
        <script src="/assets/js/plugins/dragula/dragula.min.js"></script>
        <script src="/assets/js/plugins/jkanban/jkanban.js"></script>
        <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
          var options = {
            damping: '0.5'
          }
          Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>

      

        <script>
            $(document).ready(function(){
                localStorage.clear();
               
                $.validator.addMethod("checkUserName",function(value, element) {
                    var response = false;
                      $.ajax({
                          type:"POST",
                          async: false,
                          url: "/Inicio/isUserValidate",
                          data: {usuario: $("#usuario").val()},
                          success: function(data) {
                              console.log(data);
                              if(data=="true"){
                                  $('#btnEntrar').attr("disabled", false);
                                  response = true;                                
                                  
                              }else{
                                  $('#btnEntrar').attr("disabled", true);
                                  //$('#btn_modal_add').attr("disabled",false);
                                  //$('#Modal_Add').modal('show');
                                  window.location.replace("/Register/");
                                  localStorage.setItem("email",$("#usuario").val());
                              }
                          }
                      });
  
                      return response;
                },"Este usuario no esta registrado");

                function getDataUser(email){                
                    $.ajax({
                        type:"POST",
                        url: "/Login/getDataUser",
                        data: {email},
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            console.log(data.miembro_amc);
                            console.log(data.datos);

                            if(data.miembro_amc == 1 && data.datos == 0){
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Miembro AMC',
                                    text: 'Parece que usted es miembro AMC, deberá revisar su información',
                                    closeOnClickOutside: false,
                                    closeOnEsc: false,
                                    allowOutsideClick: false,
                                  }).then(() => {

                                    $("#id_registrado_amc").val(data.id_registrado);
                                    $("#email_amc").val(data.email);
                                    $("#email_amc_validar").val(data.email);
                                    $("#nombre_amc").val(data.nombre);
                                    $("#apellidop_amc").val(data.apellidop);
                                    $("#apellidom_amc").val(data.apellidom);
                                    $('#modal_amc_update').modal('show');
                                    
                                  })
                               
                            }else{
                                 $("#login").submit(); //descometar cuando termine
                            }
                            
                        }
                    });
                }

                $("#login").validate({
                   rules:{
                        usuario:{
                            required: true,
                            checkUserName: true
                        },
                        password:{
                            required: true,
                        }
                    },
                    messages:{
                        usuario:{
                            required: "Este campo es requerido",
                        },
                        password:{
                            required: "Este campo es requerido",
                        }
                    }
                });

                

                $("#btnEntrar").click(function(){
                    $.ajax({
                        type: "POST",
                        url: "/Login/verificarUsuario",
                        data: $("#login").serialize(),
                        dataType: 'json',
                        success: function(response){
                            console.log(response);
                            console.log(response.nombre);
                            if(response!=""){
                                var usuario = response;
                                if(usuario.nombre!=""){
                                    $("#login").append('<input type="hidden" name="autentication" id="autentication" value="OK"/>');
                                    $("#login").append('<input type="hidden" name="nombre" id="nombre" value="'+usuario.nombre+'"/>');
                                    getDataUser($("#usuario").val());
                                    // $("#login").submit();

                            }else{
                                alertify.alert("Error de autenticación <br> El usuario o contraseña es incorrecta");
                            }
                            }else{
                                alertify.alert("Error de autenticación <br> El usuario o contraseña es incorrecta");
                            }
                        }
                    });
                });

                $("#login").on("submit",function(event){
                    // event.preventDefault();
                });

            });
        </script>

        
html;

        $especialidades = LoginDao::getAllEspecialidades();
        $optionEspecialidad = '';

        foreach($especialidades as $key => $value){
            $optionEspecialidad .= <<<html
                <option value="{$value['nombre']}">{$value['nombre']}</option>
html;
        }

        $paises = LoginDao::getPais();
        $optionPais = '';
        foreach($paises as $key => $value){
            $optionPais .= <<<html
                    <option value="{$value['id_pais']}">{$value['pais']}</option>
html;
        }


        

//         $optionState = '';
//         foreach(LoginDao::getStateByCountry($value['id_pais']) as $key => $value){
            
//             $selectedEstado = ($value['id_estado'] == $value['id_estado']) ? 'selected' : '';  
//             $optionState .= <<<html
//                     <option value="{$value['id_estado']}" $selectedEstado>{$value['estado']}</option>
// html;
//         }
       

        View::set('header',$extraHeader);
        View::set('footer',$extraFooter);
        View::set('optionEspecialidad', $optionEspecialidad);
        View::set('optionPais', $optionPais);
        // View::set('optionState', $optionState);
        View::render("login");
    }

    public function getEstadoPais(){
        $pais = $_POST['pais'];

        if (isset($pais)) {
            $Paises = LoginDao::getStateByCountry($pais);

            echo json_encode($Paises);
        }
    }

    public function searchEmail(){
        $email = $_POST['email'];

        if (isset($email)) {
            $emails = LoginDao::getEmail($email);

            echo json_encode($emails);
        }
    }

    public function saveData()
    {
        $data = new \stdClass();            
        $data->_nombre = MasterDom::getData('nombre');
        $data->_apellidop = MasterDom::getData('apellidop');
        $data->_apellidom = MasterDom::getData('apellidom');
        $data->_email = MasterDom::getData('email');
        $data->_prefijo = MasterDom::getData('prefijo');
        $data->_especialidad = MasterDom::getData('especialidad');
        $data->_telefono = MasterDom::getData('telefono');
        $data->_pais = MasterDom::getData('pais');
        $data->_estado = MasterDom::getData('estado');
        $data->_identificador = MasterDom::getData('estado');
        // $data->_utilerias_administrador_id = $_SESSION['utilerias_administradores_id'];

        $id = LoginDao::insert($data);
        if ($id >= 1) {
            echo "success";
            // $this->alerta($id,'add');
            //header('Location: /PickUp');
        } else {
            echo "error";
            // header('Location: /PickUp');
            //var_dump($id);
        }
    }

    public function cerrarSession(){
        session_start();
        // unset($_SESSION);
        // session_unset();
        session_destroy();
        header("Location: /Inicio/");
    }

    public function verificarUsuario(){
        $usuario = new \stdClass();
        $usuario->_usuario = MasterDom::getData("usuario");
        // $usuario->_password = MD5(MasterDom::getData("password"));
        $usuario->_password = MasterDom::getData("password");
        // var_dump($usuario);
        $user = LoginDao::getUserRAById($usuario);
        // 

        if (count($user)>=1) {
            $user['name_user'] = utf8_encode($user['nombre']);
            echo json_encode($user);
        }
    }

    public function isUserValidate(){
        echo (count(LoginDao::getUserByEmail($_POST['usuario']))>=1)? 'true' : 'false';
    }

    public function crearSession(){
        $usuario = new \stdClass();
        $usuario->_usuario = MasterDom::getData("usuario");
        // $usuario->_password = MD5(MasterDom::getData("password"));
        $usuario->_password = MasterDom::getData("password");
        $user = LoginDao::getUserRAById($usuario);
    
        // if($user['status'] == 0){
        //     //entrar a actualizar datos 
        //     $user = json_encode($user);

         

        //     header("location: /Register/?d=".base64_encode($user));
            
        // }else{
            session_start();
            $_SESSION['usuario'] = $user['email'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['id_registrado'] = $user['id_registrado'];
            $_SESSION['clave_socio'] = $user['clave_socio'];

            header("location: /Home/");
           
        // }
        
        
    }

    public function crearSessionRegister(){
        $usuario = new \stdClass();
        $usuario->_usuario =$_POST['email_login'];
        // $usuario->_password = MD5(MasterDom::getData("password"));
        $usuario->_password = MasterDom::getData("password");
        $user = LoginDao::getUserRAById($usuario);
    
        // if($user['status'] == 0){
        //     //entrar a actualizar datos 
        //     $user = json_encode($user);

         

        //     header("location: /Register/?d=".base64_encode($user));
            
        // }else{
            session_start();
            $_SESSION['usuario'] = $user['email'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['id_registrado'] = $user['id_registrado'];
            $_SESSION['clave_socio'] = $user['clave_socio'];

            header("location: /Home/");
           
        // }
        
        
    }

    public function crearSessionFinalize(){
        $usuario = new \stdClass();
        $usuario->_usuario = $_POST['usuario'];
    
        $user = LoginDao::getUserRAById($usuario);
        
        session_start();
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['user_id'] = $user['user_id'];

        // var_dump($usuario);
        // echo "<br>";
        // var_dump($_SESSION);
        // exit;

        header("location: /Home/");
        // echo "Hola";
    }


    public function getDataUser(){
        $email = $_POST['email'];
        $usuario = new \stdClass();
        $usuario->_usuario =$email;

        $user = LoginDao::getUserRAById($usuario);

        echo json_encode($user);
    }

    public function updateDataMember(){

        $id_registrado = $_POST['id_registrado_amc'];
        $email = $_POST['email_amc'];
        $nombre = $_POST['nombre_amc'];
        $apellidop = $_POST['apellidop_amc'];
        $apellidom = $_POST['apellidom_amc'];
        $prefijo = $_POST['prefijo_amc'];

        $documento = new \stdClass();

        $documento->_id_registrado = $id_registrado;
        $documento->_email = $email;
        $documento->_nombre = $nombre;
        $documento->_apellidop = $apellidop;
        $documento->_apellidom = $apellidom;
        $documento->_prefijo = $prefijo;



        $id = LoginDao::updateMember($documento);

        if($id){
            //meter todos los productos en pendiente pago
            $getProductos = LoginDao::getProductos();
            $clave = $this->generateRandomString();
            $fecha =  date("Y-m-d");
            

            foreach($getProductos as $key => $value){

                $documento1 = new \stdClass();
                $documento1->_id_producto = $value['id_producto'];
                $documento1->_id_registrado = $id_registrado;
                $documento1->_reference = '';
                $documento1->_clave = $clave;
                $documento1->_fecha = $fecha;
                $documento1->_monto = 0;
                $documento1->_tipo_pago = 'Miembro AMC';
                $documento1->_status = 1;

                $existe = TalleresDao::getProductosPendientesPago($id_registrado,$value['id_producto']);

                if(!$existe){
                    $id_pendiente = TalleresDao::inserPendientePago($documento1);

                    if($id_pendiente){
                        $data = new \stdClass();
                        $data->_id_registrado = $id_registrado;
                        $data->_id_producto = $value['id_producto'];    
            
                        $insertAsiganProducto = TalleresDao::insertAsignaProducto($data);
            
                        if($insertAsiganProducto){
                            $flag = true;
                        }else{
                            $flag = false;
                        }
                    }
                }               

                else{
                    $flag = false;
                }
            }
            
        }else{
            $flag = false;
        }


        if($flag){
            $data = [
                'status' => 'success'
            ];
        }else{
            $data = [
                'status' => 'error'
            ];
        }
         
        echo json_encode($data);

    }

    function generateRandomString($length = 6)
    {
        return substr(str_shuffle("0123456789"), 0, $length);
    }

    
}