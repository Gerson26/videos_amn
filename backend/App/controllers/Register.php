<?php

namespace App\controllers;

defined("APPPATH") or die("Access denied");
require_once dirname(__DIR__) . '/../public/librerias/fpdf/fpdf.php';

use \Core\View;
use \Core\MasterDom;
use \App\models\Register as RegisterDao;
use \App\models\Login as LoginDao;
use \App\models\Home as HomeDao;

class Register
{

    public function index()
    {
        $extraHeader = <<<html
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/logos/logo_amc.png">
        <link rel="icon" type="image/vnd.microsoft.icon" href="../../../assets/img/logos/logo_amc.png">
        <title>
            Registro - LXI Semana Quirúrgica Nacional
        </title>
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
         <!-- Nucleo Icons -->
         <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
         <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
         <!-- Font Awesome Icons -->
         <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
         <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
         <!-- CSS Files -->
        <link id="pagestyle" href="../../../assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="../../../assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <link rel="stylesheet" href="/css/alertify/alertify.core.css" />
        <link rel="stylesheet" href="/css/alertify/alertify.default.css" id="toggleCSS" />
        
        

html;
        $extraFooter = <<<html
     
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
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
        window.addEventListener("keypress", function(event){
            if (event.keyCode == 13){
                event.preventDefault();
            }
        }, false);
        
          window.onload = function() {
          var myInput = document.getElementById('confirm_email');
          var myInput_conf = document.getElementById('confirm_email_iva');
          myInput.onpaste = function(e) {
            e.preventDefault();
          }
          myInput_conf.onpaste = function(e) {
            e.preventDefault();
          }
          
          myInput.oncopy = function(e) {
            e.preventDefault();
          }
          myInput_conf.oncopy = function(e) {
            e.preventDefault();
          }
        }
        
        $('#email').on('keypress', function() {
            var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
            if(!re) {
                $('#error').show();
                 document.getElementById('confirm_email').disabled = true;
                 
            } else {
                $('#error').hide();
                document.getElementById('confirm_email').disabled = false;
                
            }
        })
        
        
        $('#confirm_email').on('keypress', function() {
            document.getElementById('email').disabled = true;
            var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
            if(!re) {
                $('#error_confirm').show();
            } else {
                $('#error_confirm').hide();
            }
        })
        
         $("#confirm_email").on("keyup", function() 
        {
    	    var email_uno = document.getElementById('email').value;
            var email_dos = document.getElementById('confirm_email').value;

            console.log($(this).val());

                  
            if(email_uno == email_dos)
            {
                // document.getElementById('confirm_email').disabled = true;
                $("#confirm_email").attr('readonly', true);
                $("#btn_next_1").removeAttr('disabled');
                document.getElementById('title').disabled = false;
                document.getElementById('apellidop').disabled = false;
                document.getElementById('apellidom').disabled = false;
                document.getElementById('telephone').disabled = false;
                document.getElementById('nationality').disabled = false;
                document.getElementById('state').disabled = false;
                document.getElementById('nombre').disabled = false;
                document.getElementById('especialidades').disabled = false;
                document.getElementById('categorias').disabled = false;
                document.getElementById('modalidad').disabled = false;
                document.getElementById('organizacion').disabled = false;
                document.getElementById('escuela').disabled = false;
                document.getElementById('puesto').disabled = false;
                document.getElementById('pais_organizacion').disabled = false;
                document.getElementById('txt_especialidad').disabled = false;
                document.getElementById("email_validado").value = email_uno;

                console.log(document.getElementById('nombre'));

            }
        });
     
        $('#email_receipt_iva').on('keypress', function() {
            var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
            if(!re) {
                $('#error_email_send').show();
            } else {
                $('#error_email_send').hide();
            }
        })
        $('#confirm_email_iva').on('keypress', function() {
            var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
            if(!re) {
                $('#error_email_send_confirm').show();
            } else {
                $('#error_email_send_confirm').hide();
            }
        })      
        
        function actualizaEdos() {
        var pais = $('#nationality').val();
        $.ajax({
          url: '/Register/ObtenerEstado',
          type: 'POST',
          dataType: 'json',
          data: {pais:pais},
    
        })
        .done(function(json) {
            if(json.success)
            {
                $("#state").html(json.html);
            }
        })
        .fail(function() 
        {
          alert("Ocurrio un error al actualizar el estado intenta de nuevo");
        })
      }
        
        $(document).ready(function(){
                
                $('input[type="checkbox"]').on('change', function() 
                {
                    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
                    $('#ModalPayOne').show();
                });
                
                $.validator.addMethod("checkUserName",function(value, element) {
                  var response = false;
                    $.ajax({
                        type:"POST",
                        async: false,
                        url: "/Login/isUserValidate",
                        data: {usuario: $("#usuario").val()},
                        success: function(data) {
                            if(data=="true"){
                                $('#btnEntrar').attr("disabled", false);
                                response = true;
                            }else{
                                $('#btnEntrar').attr("disabled", true);
                            }
                        }
                    });

                    return response;
                },"El usuario no es correcto");
            });
      </script>
      <script>
          $(document).ready(function(){
            $('#email_receipt_iva').on('keypress', function() {
                var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
                if(!re) {
                    $('#error_email_send').show();
                } else {
                    $('#error_email_send').hide();
                }
            })
          });
      </script>
      
html;

        $especialidades = '';
        foreach (RegisterDao::getAllEspecialidades() as $key => $value) {
            $especialidades .= <<<html
           
        <option value="{$value['id_especialidad']}">{$value['nombre']}</option>
html;
        }


        $modalidad = '';
        foreach (RegisterDao::getAllModalidades() as $key => $value) {
            $modalidad .= <<<html
           
        <option value="{$value['id_modalidad']}">{$value['nombre']}</option>
html;
        }

        $cfdi = '';
        foreach (RegisterDao::getCfdi() as $key => $value) {
            // $cfdi = ($value['id_pais'] == $userData['id_pais']) ? 'selected' : '';  
            $cfdi .= <<<html
                    <option value="{$value['id_uso_cfdi']}">{$value['clave_uso_cfdi']} - {$value['descripcion_uso_cfdi']}</option>
html;
        }

        $remigenFiscal = '';
        foreach (RegisterDao::getRegimenFiscal() as $key => $value) {
            // $cfdi = ($value['id_pais'] == $userData['id_pais']) ? 'selected' : '';  
            $remigenFiscal .= <<<html
                    <option value="{$value['id_regimen_fiscal']}">{$value['descripcion_regimen_fiscal']}</option>
html;
        }

        $clave = $this->generateRandomStrings();


        View::set('usoCfdi', $cfdi);
        View::set('remigenFiscal', $remigenFiscal);
        View::set('header', $extraHeader);
        View::set('footer', $extraFooter);
        View::set('idCountry', $this->getCountry());
        View::set('especialidades', $especialidades);
        View::set('modalidad', $modalidad);
        View::set('clave' ,$clave);
        View::render("Register");
    }

    public function UpdateData()
    {

        $email = $_POST['confirm_email'];
        $prefijo = $_POST['title'];
        $nombre = $_POST['nombre'];
        $apellidop = $_POST['apellidop'];
        $apellidom = $_POST['apellidom'];
        $telephone = $_POST['telephone'];
        // $categorias = $_POST['categorias'];
        // $especialidades = $_POST['especialidades'];
        $nationality = $_POST['nationality'];
        $state = $_POST['state'];

        $documento = new \stdClass();

        $documento->_email = $email;
        $documento->_prefijo = $prefijo;
        $documento->_nombre = $nombre;
        $documento->_apellidop = $apellidop;
        $documento->_apellidom = $apellidom;

        $documento->_telephone = $telephone;
        $documento->_nationality = $nationality;
        $documento->_state = $state;

        $id = RegisterDao::updateBecado($documento);

        if ($id) {
            echo "success";
        } else {
            echo "fail";
        }
    }


    public function addRegistrado(){  
        
        if($_POST["especialidades"] == null || $_POST["especialidades"] == 'null'){
            $especialidad = 0;
        }else{
            $especialidad = $_POST["especialidades"];
        }
       
        $email = $_POST["email_validado"];
        $prefijo = $_POST["title"];
        $nombre = trim($_POST["nombre"]);
        $apellidop = trim($_POST["apellidop"]);
        $apellidom = trim($_POST["apellidom"]);
        $telefono = $_POST["telephone"];
        $modalidad = $_POST["modalidad"];
        $categoria = $_POST["categorias"];
        $pais = $_POST["nationality"];
        $estado = $_POST["state"];
        $organizacion = $_POST["organizacion"];
        $escuela = $_POST["escuela"];
        $txt_especialidad = $_POST['txt_especialidad'];
        // $puesto = $_POST["puesto"];
        // $pais_organizacion = $_POST["pais_organizacion"];

        $documento = new \stdClass();

        $documento->_email = $email;
        $documento->_prefijo = $prefijo;
        $documento->_nombre = $nombre;
        $documento->_apellidop = $apellidop;
        $documento->_apellidom = $apellidom;
        $documento->_nombreconstancia = $nombre.' '.$apellidop.' '.$apellidom;
        $documento->_telephone = $telefono;
        $documento->_modalidad = $modalidad;        
        $documento->_categoria = $categoria;
        $documento->_especialidad = $especialidad;
        $documento->_pais = $pais;
        $documento->_estado = $estado;
        $documento->_organizacion = $organizacion;
        $documento->_escuela = $escuela;
        $documento->_txt_especialidad = $txt_especialidad;
        // $documento->_puesto = $puesto;
        // $documento->_pais_organizacion = $pais_organizacion;

        $id = RegisterDao::insertNewUser($documento);
        if($id){

            $user_data = RegisterDao::getUserData($email);
            $msg = [
                'nombre' => $nombre.' '.$apellidop.' '.$apellidom,
                'email' => $email
            ];

            $mailer = new Mailer();
            $mailer->mailer($msg);

            $data = [
                'status' => 'success',
                'registrado' => $user_data
            ];
            
        }else{

            $data = [
                'status' => 'fail'
            ];
            
        }

        echo json_encode($data);
        

    }

    public function getProductInscripcion(){

        $productoInscripcion = RegisterDao::getProductInscripcion();

        if($productoInscripcion){
            $data = [
                'status' => 'success',
                'producto' => $productoInscripcion
            ];
        }else{
            $data = [
                'status' => 'error'
            ];
        }

        
     
        echo json_encode($data);
    }

    public function passTwo()
    {
        $extraHeader = <<<html
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/logos/logo_amc.png">
        <link rel="icon" type="image/vnd.microsoft.icon" href="../../../assets/img/logos/logo_amc.png">
        <title>
            Registro - LXI Semana Quirúrgica Nacional
        </title>
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
         <!-- Nucleo Icons -->
         <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
         <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
         <!-- Font Awesome Icons -->
         <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
         <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
         <!-- CSS Files -->
        <link id="pagestyle" href="../../../assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="../../../assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <link rel="stylesheet" href="/css/alertify/alertify.core.css" />
        <link rel="stylesheet" href="/css/alertify/alertify.default.css" id="toggleCSS" />
        
        

html;
        $extraFooter = <<<html
     
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
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

html;


        $email = $_POST['confirm_email'];
        $prefijo = $_POST['title'];
        $nombre = $_POST['nombre'];
        $apellidop = $_POST['apellidop'];
        $apellidom = $_POST['apellidom'];
        $telephone = $_POST['telephone'];
        $categorias = $_POST['categorias'];
        $especialidades = $_POST['especialidades'];
        $nationality = $_POST['nationality'];
        $state = $_POST['state'];

        $data = [
            'email' => $email,
            'title' => $prefijo,
            'nombre' => $nombre,
            'apellidop' => $apellidop,
            'apellidom' => $apellidom,
            'telephone' => $telephone,
            'categorias' => $categorias,
            'especialidades' => $especialidades,
            'nationality' => $nationality,
            'state' => $state
        ];

        View::set('dataUser', $data);
        View::set('header', $extraHeader);
        View::set('footer', $extraFooter);
        View::render('RegisterTwo');
    }

    public function passThree()
    {

        $extraHeader = <<<html
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/logos/logo_amc.png">
        <link rel="icon" type="image/vnd.microsoft.icon" href="../../../assets/img/logos/logo_amc.png">
        <title>
            Registro - LXI Semana Quirúrgica Nacional
        </title>
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
         <!-- Nucleo Icons -->
         <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
         <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
         <!-- Font Awesome Icons -->
         <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
         <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
         <!-- CSS Files -->
        <link id="pagestyle" href="../../../assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="../../../assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <link rel="stylesheet" href="/css/alertify/alertify.core.css" />
        <link rel="stylesheet" href="/css/alertify/alertify.default.css" id="toggleCSS" />
        
        

html;
        $extraFooter = <<<html
     
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
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

          <script>
          $(document).ready(function(){
            $('#email_receipt_iva').on('keypress', function() {
                var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
                if(!re) {
                    $('#error_email_send').show();
                } else {
                    $('#error_email_send').hide();
                }
            })
          });
          </script>
          

html;

        //Acarrear los datoss 
        $data = unserialize($_POST['dataUser']);

        if ($data['especialidades'] == null) {
            $data['especialidades'] = '';
        }

        $date = date('Y-m-d');
        $str_nombre = str_split($data['nombre']);
        $str_apellidop = str_split($data['apellidop']);
        $str_apellidom = str_split($data['apellidom']);

        $fecha = explode('-', $date);

        $referencia = $str_nombre[0] . $str_nombre[1] . $str_apellidop[0] . $str_apellidop[1] . $fecha[0] . $fecha[1] . $fecha[2];

        $monto_congreso = RegisterDao::getMontoPago($data['categorias'])['costo'];


        $documento = new \stdClass();

        $documento->_email = $data['email'];
        $documento->_prefijo = $data['title'];
        $documento->_nombre = $data['nombre'];;
        $documento->_apellidop = $data['apellidop'];
        $documento->_apellidom = $data['apellidom'];
        $documento->_telephone = $data['telephone'];
        $documento->_referencia = $referencia;
        $documento->_categorias = $data['categorias'];
        $documento->_especialidades = $data['especialidades'];
        $documento->_nationality = $data['nationality'];
        $documento->_state = $data['state'];
        $documento->_monto_congreso = $monto_congreso;

        $existe_user = RegisterDao::getUser($data['email']);


        if ($existe_user) {
            //Actualizar
            $id = RegisterDao::UpdateUser($documento);
        } else {
            $id = RegisterDao::insertNewUser($documento);
        }



        View::set('dataUser', $data);
        View::set('header', $extraHeader);
        View::set('footer', $extraFooter);
        View::render('RegisterThree');
    }

    public function updateFiscalData()
    {
        $business_name_iva = $_POST['business_name_iva'];
        $code_iva = $_POST['code_iva'];
        // $payment_method_iva = $_POST['payment_method_iva'];
        $email_receipt_iva = $_POST['email_receipt_iva'];
        $email = $_POST['email-update'];
        $cp = $_POST['cp_fac'];
        $regimen_fiscal = $_POST['regimen_fiscal'];
        $cfdi = $_POST['cfdi'];


        $documento = new \stdClass();

        $documento->_business_name_iva = $business_name_iva;
        $documento->_code_iva = $code_iva;
        // $documento->_payment_method_iva = $payment_method_iva;
        $documento->_email_receipt_iva = $email_receipt_iva;
        $documento->_email = $email;
        $documento->_cp = $cp;
        $documento->_regimen_fiscal = $regimen_fiscal;
        $documento->_cfdi = $cfdi;


        $update_fiscal_data = RegisterDao::updateFiscalData($documento);

        // echo $business_name_iva;
        // echo $code_iva;
        // echo $payment_method_iva;
        // echo $email_receipt_iva;
        // echo $data['email'];

        if ($update_fiscal_data) {
            echo "success";
        } else {
            echo "fail";
        }
    }

    public function passFinalize_()
    {

        //Acarrear los datos
        $data = unserialize($_POST['dataUser']);

        $monto_congreso = RegisterDao::getMontoPago($data['categorias'])['costo'];


        if ($data['especialidades'] == null) {
            $data['especialidades'] = '';
        }


        $date = date('Y-m-d');
        $str_nombre = str_split($data['nombre']);
        $str_apellidop = str_split($data['apellidop']);
        $str_apellidom = str_split($data['apellidom']);

        $fecha = explode('-', $date);

        $referencia = $str_nombre[0] . $str_nombre[1] . $str_apellidop[0] . $str_apellidop[1] . $fecha[0] . $fecha[1] . $fecha[2];

        $documento = new \stdClass();

        $documento->_email = $data['email'];
        $documento->_prefijo = $data['title'];
        $documento->_nombre = $data['nombre'];
        $documento->_apellidop = $data['apellidop'];
        $documento->_apellidom = $data['apellidom'];
        $documento->_telephone = $data['telephone'];
        $documento->_referencia = $referencia;
        $documento->_categorias = $data['categorias'];
        $documento->_especialidades = $data['especialidades'];
        $documento->_nationality = $data['nationality'];
        $documento->_state = $data['state'];
        $documento->_monto_congreso = $monto_congreso;

        $existe_user = RegisterDao::getUser($data['email']);

        if ($existe_user) {
            //Actualizar
            $id = RegisterDao::UpdateUser($documento);
        } else {
            $id = RegisterDao::insertNewUser($documento);
        }



        $header = <<<html
        <!DOCTYPE html>
        <html lang="es">
        
          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/logos/logo_amc.png">
            <link rel="icon" type="image/png" href="../../../assets/img/logos/logo_amc.png">
            <title>
               AMH - GRUPO LAHE
            </title>
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

            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="icon" type="image/png" href="../../assets/img/favicon.png">

            <!--     Fonts and icons     -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
            <!-- Nucleo Icons -->
            <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
            <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
            <!-- Font Awesome Icons -->
            <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
            <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
            <!-- CSS Files -->
            <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />

            <link rel="stylesheet" href="/css/alertify/alertify.default.css" id="toggleCSS" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
              
            <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
            
            <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

           <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

           <script charset="UTF-8" src="//web.webpushs.com/js/push/9d0c1476424f10b1c5e277f542d790b8_1.js" async></script>
           
            <!-- TEMPLATE VIEJO-->

            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
            <!-- Nucleo Icons -->
            <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
            <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
            <!-- Font Awesome Icons -->
            <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
            <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
            <!-- CSS Files -->
            <link id="pagestyle" href="../../../assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <link href="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <style>
            .select2-container--default .select2-selection--single {
            height: 38px!important;
            border-radius: 8px!important;
            
            }
            .select2-container {
              width: 100%!important;
              
          }
           
            </style>
        </head>
html;

        $data_user = HomeDao::getDataUser($data['email']);

        $productos_pendientes_comprados = HomeDao::getProductosPendComprados($data_user['user_id']);
        $checks = '';
        $checked = '';
        $total_productos = 0;
        $total_pago = 0;
        $check_disabled = '';
        $array_precios = [];
        $array_productos = [];

        // // $clave = HomeDao::getProductosPendCompradosClave($data_user['user_id'])[0]['clave'];

        // $clave = HomeDao::getLastQrPendientePago($data_user['user_id'])['clave'];


        // if($clave != ""){
        //     // $src_qr = '/qrs/'.$productos_pendientes_comprados[0]['clave'].'.png';
        //     $src_qr = '/qrs/'.$clave.'.png';           
        //     // $btn_block = 'style = "display:none"';
        //     // $check_disabled = 'disabled';
        // }else{
        //     $src_qr = '';
        //     $btn_block = '';

        // }   



        foreach ($productos_pendientes_comprados as $key => $value) {
            $disabled = '';
            $checked = '';
            $pend_validar = '';

            if ($value['es_congreso'] == 1 && $value['clave_socio'] == "") {
                $precio = $value['amout_due'];
            } elseif ($value['es_congreso'] == 1 && $value['clave_socio'] != "") {
                $precio = $value['amout_due'];
            } else if ($value['es_servicio'] == 1 && $value['clave_socio'] == "") {
                $precio = $value['precio_publico'];
            } else if ($value['es_servicio'] == 1 && $value['clave_socio'] != "") {
                $precio = $value['precio_publico'];
            } else if ($value['es_curso'] == 1  && $value['clave_socio'] == "") {
                $precio = $value['precio_publico'];
            } else if ($value['es_curso'] == 1  && $value['clave_socio'] != "") {
                $precio = $value['precio_publico'];
            }

            $count_producto = HomeDao::getCountProductos($data_user['user_id'], $value['id_producto'])[0];



            if ($value['estatus_compra'] == 1) {
                $disabled = 'disabled';
                $checked = 'checked';
                $pend_validar = 'Pagado y validado por AMH';
                // $btn_imp = '';
                // $productos_pendientes_comprados[0]['clave'].'" target="blank_">Imprimir Formato de Pago</a>';
                // $ocultar = 'display:none;';

            } else if ($value['estatus_compra'] == null) {
                $pend_validar = 'Pendiente de Pagar';
                // $btn_imp = '<a class="btn btn-primary" href="/Home/print/'.$productos_pendientes_comprados[0]['clave'].'" target="blank_">Imprimir Formato de Pago</a>';
                // $ocultar = '';
                // $disabled = 'disabled';
                $checked = 'checked';
                $total_productos += $count_producto['numero_productos'];
                $total_pago += $count_producto['numero_productos'] * $precio;
                array_push($array_precios, ['id_product' => $value['id_producto'], 'precio' => $precio, 'cantidad' => $count_producto['numero_productos']]);
                array_push($array_productos, ['id_product' => $value['id_producto'], 'precio' => $precio, 'cantidad' => $count_producto['numero_productos'], 'nombre_producto' => $value['nombre_producto']]);
            }

            if ($value['max_compra'] <= 1) {
                $numero_productos = '<input type="number" id="numero_articulos' . $value['id_producto'] . '" name="numero_articulos" value="' . $value['max_compra'] . '" style="border:none;" readonly>';
            } else {
                $numero_productos = '<select class="form-control select_numero_articulos" id="numero_articulos' . $value['id_producto'] . '" name="numero_articulos" data-id-producto="' . $value['id_producto'] . '" data-precio="' . $precio . '" data-nombre-producto="' . $value['nombre_producto'] . '" ' . $disabled . '>';
                for ($i = 1; $i <= $value['max_compra']; $i++) {
                    $numero_productos .= '<option value="' . $i . '">' . $i . '</option>';
                }
                $numero_productos .= '</select>';
            }


            $checks .= <<<html

            <div class="row">
                <div class="col-md-8">
                    <div class="form-check">
                        <input class="form-check-input checks_product" type="checkbox" value="{$value['id_producto']}" id="check_curso_{$value['id_producto']}" name="checks_cursos[]" {$disabled} {$checked} data-precio="{$precio}" data-nombre-producto="{$value['nombre_producto']}">
                        <label class="form-check-label" for="check_curso_{$value['id_producto']}">
                            {$value['nombre_producto']} <span style="font-size: 13px; text-decoration: underline; color: green;">{$pend_validar}</span>
                        </label>
                    </div>
                </div>
                
                <div class="col-md-2">
                    {$precio} - {$value['tipo_moneda']}
                </div>

                <div class="col-md-2">
                    {$numero_productos}
                </div>
            </div>

            <hr>
html;
            $numero_productos = '';
        }
        $clave = $this->generateRandomString();

        $productos_no_comprados = HomeDao::getProductosNoComprados($data_user['user_id']);


        foreach ($productos_no_comprados as $key => $value) {


            // if($data_user['amout_due'] != null || $data_user['amout_due'] != ''){

            // if($value['es_congreso'] == 1){
            //     $precio = $data_user['amout_due'];
            // }else if($value['es_servicio'] == 1){
            //     $precio = $value['precio_publico'];
            // }else if($value['es_curso'] == 1){
            //     $precio = $value['precio_publico'];
            // }
            // }else{
            //     $precio = $value['precio_publico'];
            // }


            if ($value['es_congreso'] == 1 && $value['clave_socio'] == "") {
                $precio = $value['amout_due'];
            } elseif ($value['es_congreso'] == 1 && $value['clave_socio'] != "") {
                $precio = 0;
                $checked = 'checked';
            } else if ($value['es_servicio'] == 1 && $value['clave_socio'] == "") {
                $precio = $value['precio_publico'];
            } else if ($value['es_servicio'] == 1 && $value['clave_socio'] != "") {
                $precio = 0;
                $precio = $value['precio_publico'];
            } else if ($value['es_curso'] == 1  && $value['clave_socio'] == "") {
                $precio = $value['precio_publico'];
            } else if ($value['es_curso'] == 1  && $value['clave_socio'] != "") {
                $precio = 0;
                $precio = $value['precio_publico'];
            }

            if ($value['max_compra'] <= 1) {
                $numero_productos = '<input type="number" id="numero_articulos' . $value['id_producto'] . '" name="numero_articulos" value="' . $value['max_compra'] . '" style="border:none;" readonly>';
            } else {
                $numero_productos = '<select class="form-control select_numero_articulos" id="numero_articulos' . $value['id_producto'] . '" name="numero_articulos" data-id-producto="' . $value['id_producto'] . '"  data-precio="' . $precio . '" data-nombre-producto="' . $value['nombre_producto'] . '">';
                for ($i = 1; $i <= $value['max_compra']; $i++) {
                    $numero_productos .= '<option value="' . $i . '">' . $i . '</option>';
                }
                $numero_productos .= '</select>';
            }


            $checks .= <<<html

            <div class="row">
                 <div class="col-md-8">
                     <div class="form-check">
                         <input class="form-check-input checks_product" type="checkbox" value="{$value['id_producto']}" id="check_curso_{$value['id_producto']}" name="checks_cursos[]" data-precio="{$precio}" data-nombre-producto="{$value['nombre_producto']}" {$check_disabled}>
                         <label class="form-check-label" for="check_curso_{$value['id_producto']}">
                             {$value['nombre_producto']}
                         </label>
                     </div>
                 </div>
               
                 <div class="col-md-2">
                     {$precio} - {$value['tipo_moneda']}
                 </div>

                 <div class="col-md-2">
                        {$numero_productos}
                 </div>

             </div>

             <hr>
html;

            $numero_productos = '';
        }

        $tipo_cambio = HomeDao::getTipoCambio();

        // $total_mx = intval($total_pago) * floatval($tipo_cambio['tipo_cambio']);
        $total_mx = intval($total_pago);


        View::set('header', $header);
        View::set('datos', $data_user);
        View::set('clave', $clave);
        View::set('checks', $checks);
        // View::set('src_qr',$src_qr); 
        // View::set('btn_block',$btn_block); 
        View::set('total_productos', $total_productos);
        View::set('total_pago', $total_pago);
        View::set('total_pago_mx', $total_mx);
        // View::set('btn_imp',$btn_imp); 
        // View::set('ocultar',$ocultar);
        View::set('tipo_cambio', $tipo_cambio['tipo_cambio']);
        View::set('array_precios', $array_precios);
        View::set('array_productos', $array_productos);
        View::render("buy_products");
    }

    public function passFinalize()
    {

        $user_email = $_GET['e'];
        $user_email = base64_decode($user_email);



        $data_user = HomeDao::getDataUser($user_email);


        $header = <<<html
        <!DOCTYPE html>
        <html lang="es">
        
          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/logos/logo_amc.png">
            <link rel="icon" type="image/png" href="../../../assets/img/logos/logo_amc.png">
            <title>
               AMH - GRUPO LAHE
            </title>
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

            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="icon" type="image/png" href="../../assets/img/favicon.png">

            <!--     Fonts and icons     -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
            <!-- Nucleo Icons -->
            <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
            <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
            <!-- Font Awesome Icons -->
            <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
            <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
            <!-- CSS Files -->
            <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />

            <link rel="stylesheet" href="/css/alertify/alertify.default.css" id="toggleCSS" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
              
            <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
            
            <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

           <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

           <script charset="UTF-8" src="//web.webpushs.com/js/push/9d0c1476424f10b1c5e277f542d790b8_1.js" async></script>
           
            <!-- TEMPLATE VIEJO-->

            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
            <!-- Nucleo Icons -->
            <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
            <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
            <!-- Font Awesome Icons -->
            <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
            <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
            <!-- CSS Files -->
            <link id="pagestyle" href="../../../assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <link href="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <style>
            .select2-container--default .select2-selection--single {
            height: 38px!important;
            border-radius: 8px!important;
            
            }
            .select2-container {
              width: 100%!important;
              
          }
           
            </style>
        </head>
html;




        $productos_pendientes_comprados = HomeDao::getProductosPendComprados($data_user['user_id']);
        $checks = '';
        $checked = '';
        $total_productos = 0;
        $total_pago = 0;
        $check_disabled = '';
        $array_precios = [];
        $array_productos = [];

        // // $clave = HomeDao::getProductosPendCompradosClave($data_user['user_id'])[0]['clave'];

        // $clave = HomeDao::getLastQrPendientePago($data_user['user_id'])['clave'];


        // if($clave != ""){
        //     // $src_qr = '/qrs/'.$productos_pendientes_comprados[0]['clave'].'.png';
        //     $src_qr = '/qrs/'.$clave.'.png';           
        //     // $btn_block = 'style = "display:none"';
        //     // $check_disabled = 'disabled';
        // }else{
        //     $src_qr = '';
        //     $btn_block = '';

        // }   


        // if(count($productos_pendientes_comprados) > 0){
        foreach ($productos_pendientes_comprados as $key => $value) {
            $disabled = '';
            $checked = '';
            $pend_validar = '';

            if ($value['es_congreso'] == 1 && $value['clave_socio'] == "") {
                $precio = $value['amout_due'];
            } elseif ($value['es_congreso'] == 1 && $value['clave_socio'] != "") {
                $precio = $value['amout_due'];
            } else if ($value['es_servicio'] == 1 && $value['clave_socio'] == "") {
                $precio = $value['precio_publico'];
            } else if ($value['es_servicio'] == 1 && $value['clave_socio'] != "") {
                $precio = $value['precio_publico'];
            } else if ($value['es_curso'] == 1  && $value['clave_socio'] == "") {
                $precio = $value['precio_publico'];
            } else if ($value['es_curso'] == 1  && $value['clave_socio'] != "") {
                $precio = $value['precio_publico'];
            }

            $count_producto = HomeDao::getCountProductos($data_user['user_id'], $value['id_producto'])[0];



            if ($value['estatus_compra'] == 1) {
                $disabled = 'disabled';
                $checked = 'checked';
                $pend_validar = 'Pagado y validado por AMH';
                // $btn_imp = '';
                // $productos_pendientes_comprados[0]['clave'].'" target="blank_">Imprimir Formato de Pago</a>';
                // $ocultar = 'display:none;';

            } else if ($value['estatus_compra'] == null) {
                $pend_validar = 'Pendiente de Pagar';
                // $btn_imp = '<a class="btn btn-primary" href="/Home/print/'.$productos_pendientes_comprados[0]['clave'].'" target="blank_">Imprimir Formato de Pago</a>';
                // $ocultar = '';
                // $disabled = 'disabled';
                $checked = 'checked';
                $total_productos += $count_producto['numero_productos'];
                $total_pago += $count_producto['numero_productos'] * $precio;
                array_push($array_precios, ['id_product' => $value['id_producto'], 'precio' => $precio, 'cantidad' => $count_producto['numero_productos']]);
                array_push($array_productos, ['id_product' => $value['id_producto'], 'precio' => $precio, 'cantidad' => $count_producto['numero_productos'], 'nombre_producto' => $value['nombre_producto']]);
            }

            if ($value['max_compra'] <= 1) {
                $numero_productos = '<input type="number" id="numero_articulos' . $value['id_producto'] . '" name="numero_articulos" value="' . $value['max_compra'] . '" style="border:none;" readonly>';
            } else {
                $numero_productos = '<select class="form-control select_numero_articulos" id="numero_articulos' . $value['id_producto'] . '" name="numero_articulos" data-id-producto="' . $value['id_producto'] . '" data-precio="' . $precio . '" data-nombre-producto="' . $value['nombre_producto'] . '" ' . $disabled . '>';
                for ($i = 1; $i <= $value['max_compra']; $i++) {
                    $numero_productos .= '<option value="' . $i . '">' . $i . '</option>';
                }
                $numero_productos .= '</select>';
            }

            $checks .= <<<html

        <div class="row">
            <div class="col-md-8">
                <div class="form-check">
                    <input class="form-check-input checks_product" type="checkbox" value="{$value['id_producto']}" id="check_curso_{$value['id_producto']}" name="checks_cursos[]" {$disabled} {$checked} data-precio="{$precio}" data-nombre-producto="{$value['nombre_producto']}">
                    <label class="form-check-label" for="check_curso_{$value['id_producto']}">
                        {$value['nombre_producto']} <span style="font-size: 13px; text-decoration: underline; color: green;">{$pend_validar}</span>
                    </label>
                </div>
            </div>

            <div class="col-md-2">
                {$precio} - {$value['tipo_moneda']}
            </div>

            <div class="col-md-2">
                {$numero_productos}
            </div>
        </div>

        <hr>
html;

            $numero_productos = '';
        }
        // }
        $clave = $this->generateRandomString();

        $productos_no_comprados = HomeDao::getProductosNoComprados($data_user['user_id']);

        foreach ($productos_no_comprados as $key => $value) {


            // if($data_user['amout_due'] != null || $data_user['amout_due'] != ''){

            // if($value['es_congreso'] == 1){
            //     $precio = $data_user['amout_due'];
            // }else if($value['es_servicio'] == 1){
            //     $precio = $value['precio_publico'];
            // }else if($value['es_curso'] == 1){
            //     $precio = $value['precio_publico'];
            // }
            // }else{
            //     $precio = $value['precio_publico'];
            // }

            if ($value['es_congreso'] == 1 && $value['clave_socio'] == "") {
                $precio = $value['amout_due'];
            } elseif ($value['es_congreso'] == 1 && $value['clave_socio'] != "") {
                $precio = 0;
            } else if ($value['es_servicio'] == 1 && $value['clave_socio'] == "") {
                $precio = $value['precio_publico'];
            } else if ($value['es_servicio'] == 1 && $value['clave_socio'] != "") {
                $precio = 0;
                $precio = $value['precio_publico'];
            } else if ($value['es_curso'] == 1  && $value['clave_socio'] == "") {
                $precio = $value['precio_publico'];
            } else if ($value['es_curso'] == 1  && $value['clave_socio'] != "") {
                $precio = 0;
                $precio = $value['precio_publico'];
            }

            if ($value['max_compra'] <= 1) {
                $numero_productos = '<input type="number" id="numero_articulos' . $value['id_producto'] . '" name="numero_articulos" value="' . $value['max_compra'] . '" style="border:none;" readonly>';
            } else {
                $numero_productos = '<select class="form-control select_numero_articulos" id="numero_articulos' . $value['id_producto'] . '" name="numero_articulos" data-id-producto="' . $value['id_producto'] . '"  data-precio="' . $precio . '" data-nombre-producto="' . $value['nombre_producto'] . '">';
                for ($i = 1; $i <= $value['max_compra']; $i++) {
                    $numero_productos .= '<option value="' . $i . '">' . $i . '</option>';
                }
                $numero_productos .= '</select>';
            }

            $checks .= <<<html

            <div class="row">
                 <div class="col-md-8">
                     <div class="form-check">
                         <input class="form-check-input checks_product" type="checkbox" value="{$value['id_producto']}" id="check_curso_{$value['id_producto']}" name="checks_cursos[]" data-precio="{$precio}" data-nombre-producto="{$value['nombre_producto']}" {$check_disabled}>
                         <label class="form-check-label" for="check_curso_{$value['id_producto']}">
                             {$value['nombre_producto']}
                         </label>
                     </div>
                 </div>
               
                 <div class="col-md-2">
                     {$precio} - {$value['tipo_moneda']}
                 </div>

                 <div class="col-md-2">
                        {$numero_productos}
                 </div>

             </div>

             <hr>
html;

            $numero_productos = '';
        }

        $tipo_cambio = HomeDao::getTipoCambio();

        // $total_mx = intval($total_pago) * floatval($tipo_cambio['tipo_cambio']);
        $total_mx = intval($total_pago);


        View::set('header', $header);
        View::set('datos', $data_user);
        View::set('clave', $clave);
        View::set('checks', $checks);
        // View::set('src_qr',$src_qr); 
        // View::set('btn_block',$btn_block); 
        View::set('total_productos', $total_productos);
        View::set('total_pago', $total_pago);
        View::set('total_pago_mx', $total_mx);
        // View::set('btn_imp',$btn_imp); 
        // View::set('ocultar',$ocultar);
        View::set('tipo_cambio', $tipo_cambio['tipo_cambio']);
        View::set('array_precios', $array_precios);
        View::set('array_productos', $array_productos);
        View::render("buy_products");
    }


    function generateRandomString($length = 10)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    function generateRandomStrings($length = 6)
    {
        return substr(str_shuffle("0123456789"), 0, $length);
    }

    public function generaterQr()
    {
        date_default_timezone_set('America/Mexico_City');

        $bandera = false;
        $total = 0;


        // $clave = $this->generateRandomString();
        $clave = $_POST['clave'];
        $email = $_POST['usuario'];
        $tipo_pago = $_POST['metodo_pago'];

        $datos = json_decode($_POST['array'], true);

        $datos_user = RegisterDao::getDataUser($email);
        // $metodo_pago = $_POST['metodo_pago'];

        // var_dump($datos_user);

        // exit;

        $id_registrado = intval($datos_user[0]['id_registrado']);
        // $id_registrado = $_SESSION['id_registrado'];
        $reference = $datos_user['referencia'];
        // $tipo_pago = $metodo_pago;
        $fecha =  date("Y-m-d");

    
        
        foreach ($datos as $key => $value) {


            for ($i = 1; $i <= $value['cantidad']; $i++) {
                $documento = new \stdClass();

                $id_producto = $value['id_product'];
                $monto = $value['precio'];


                $documento->_id_producto = $id_producto;
                $documento->_id_registrado = $id_registrado;
                $documento->_reference = $reference;
                $documento->_fecha = $fecha;
                $documento->_monto = $monto;
                $documento->_tipo_pago = $tipo_pago;
                $documento->_clave = $clave;

                if ($id_producto == 1 && $monto == 0) {
                    //pendiente pago correcto
                    $status = 1;

                    $data = new \stdClass();
                    $data->_id_registrado = $id_registrado;
                    $data->_id_producto = $id_producto;

                    $existe_asigna = RegisterDao::getProductosAsignaProducto($id_registrado, $id_producto);
                    if (!$existe_asigna) {
                        $insert_asigna = RegisterDao::insertAsignaProducto($id_registrado, $id_producto);
                    }
                } else {
                    $status = 0;
                }
                $documento->_status = $status;

                $existe_pendiente = RegisterDao::getProductosPendientesPago($id_registrado, $id_producto);

                if ($existe_pendiente) {
                    $bandera = true;
                } else {
                    $id = RegisterDao::inserPendientePago($documento);
                }

                if ($id) {
                    $bandera = true;
                }

                // echo 'Se inserta '.$i. 'veces' .' la cantidad '.$value['cantidad'];
                // echo "<br>";
            }
            $total += $monto;
        }

        if ($bandera) {
            $res = [
                'status' => 'success',
                'code' => $clave

            ];

            if (isset($_POST['enviar_email'])) {

                $msg = [
                    'nombre' => $datos_user['nombre'] . ' ' . $datos_user['apellidop'] . ' ' . $datos_user['apellidom'],
                    'metodo_pago' => $tipo_pago,
                    'referencia' => $reference,
                    'importe_pagar' => $total,
                    'fecha_limite_pago' => $fecha,
                    'email' => $email
                ];

                $mailer = new Mailer();
                // $mailer->mailerPago($msg);
            }
        } else {
            $res = [
                'status' => 'fail',
                'code' => $clave
            ];
        }




        echo json_encode($res);
    }


    public function ticketAll($clave = null, $id_curso = null)
    {
        date_default_timezone_set('America/Mexico_City');

        $usuario = $_POST['email_usuario'];
        $datos_user = RegisterDao::getUser($usuario)[0];


        $metodo_pago = $_POST['metodo_pago'];


        $user_id = $datos_user['id_registrado'];
        $clave = $_POST['clave'];


        $productos = RegisterDao::getProductosPendientesPagoByUser($user_id,$clave);

        foreach ($productos as $key => $value) {

            if($value['es_congreso'] == 1){
                $valor = 0;
                $precio = 0;
                $porcentaje_beca = intval($value['porcentaje_beca']);

                    if($porcentaje_beca < 100){
                        $valor = ($porcentaje_beca * $value['costo']) / 100;
                        $precio = $value['costo'] - $valor;
                        
                    }else{
                        $precio = $value['costo'];
                    }
            }else if($value['es_curso']){
                // $getCosto = HomeDao::getCostoCursosByCategoria($user_id['id_registrado'],$value['id_producto']);
                // $precio = $getCosto['costo'];
                $precio = $value['monto'];
            }

            // $documento = new \stdClass();  

            $nombre_curso = $value['nombre'];
            $id_producto = $value['id_producto'];
            $user_id = $datos_user['user_id'];
            $reference = $datos_user['referencia'];
            $fecha =  date("Y-m-d");
            // $monto = $value['precio_publico'];
            $monto = $precio;
            $tipo_pago = $metodo_pago;
            $status = 0;


        }

        
        $nombre_completo = $datos_user['nombre'] . " " . $datos_user['apellidop'] . " " . $datos_user['apellidom'];


        $pdf = new \FPDF($orientation = 'P', $unit = 'mm', $format = 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 8);    //Letra Arial, negrita (Bold), tam. 20
        $pdf->setY(1);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Image('constancias/plantillas/orden.jpeg', 0, 0, 210, 300);
        // $pdf->SetFont('Arial', 'B', 25);
        // $pdf->Multicell(133, 80, $clave_ticket, 0, 'C');

        $espace = 141;
        $total = array();
        foreach ($productos as $key => $value) {

            $folio = $value['clave'];
            if($value['es_congreso'] == 1){
                $valor = 0;
                $precio = 0;
                $porcentaje_beca = intval($value['porcentaje_beca']);

                    if($porcentaje_beca < 100){
                        $valor = ($porcentaje_beca * $value['costo']) / 100;
                        $precio = $value['costo'] - $valor;
                        
                    }else{
                        $precio = $value['costo'];
                    }
            }else if($value['es_curso']){
                // $getCosto = HomeDao::getCostoCursosByCategoria($user_id['id_registrado'],$value['id_producto']);
                // $precio = $getCosto['costo'];
                $precio = $value['monto'];
            }

            array_push($total, $precio);

            //Nombre Curso
            $pdf->SetXY(30, $espace);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Multicell(100, 4, utf8_decode($value['nombre']), 0, 'C');

            //Costo
            $pdf->SetXY(122, $espace);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Multicell(100, 4, '$ ' . $precio . ' ' . $value['tipo_moneda'], 0, 'C');

            $espace = $espace + 7;
        }

        //folio
        $pdf->SetXY(92, 60.5);
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Multicell(100, 10, $folio.'-'.$datos_user['id_registrado'], 0, 'C');

        //fecha
        $pdf->SetXY(90, 70.5);
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Multicell(100, 10, $fecha, 0, 'C');

        //nombre
        $pdf->SetXY(90, 80);
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Multicell(100, 10, utf8_decode($nombre_completo), 0, 'C');



        //total
        $pdf->SetXY(122, 200);
        $pdf->SetFont('Arial', 'B', 8);  
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Multicell(100, 10, 'TOTAL : '.number_format(array_sum($total),2), 0, 'C');

        $pdf->Output();
        // $pdf->Output('F','constancias/'.$clave.$id_curso.'.pdf');
    }

    

    public function getCategorias()
    {

        $posiciones = LoginDao::getCategorias();

        echo json_encode($posiciones);
    }



    public function getCountry()
    {
        $country = '';
        foreach (RegisterDao::getCountryAll() as $key => $value) {
            $country .= <<<html
           
        <option value="{$value['id_pais']}">{$value['pais']}</option>
html;
        }
        return $country;
    }

    public function ObtenerEstado()
    {
        $pais = $_POST['pais'];

        if ($pais != 156) {
            $estados = RegisterDao::getState($pais);
            $html = "";
            foreach ($estados as $estado) {
                $html .= '<option value="' . $estado['id_estado'] . '">' . $estado['estado'] . '</option>';
            }
        } else {
            $html = "";
            $html .= '
                <option value="" disabled selected>Selecciona una Opción</option>
                <option value="2537">Aguascalientes</option>
                <option value="2538">Baja California</option>
                <option value="2539">Baja California Sur</option>
                <option value="2540">Campeche</option>
                <option value="2541">Chiapas</option>
                <option value="2542">Chihuahua</option>
                <option value="2543">Coahuila de Zaragoza</option>
                <option value="2544">Colima</option>
                <option value="2545">Ciudad de Mexico</option>
                <option value="2546">Durango</option>
                <option value="2547">Guanajuato</option>
                <option value="2548">guerrero</option>
                <option value="2549">Hidalgo</option>
                <option value="2550">Jalisco</option>
                <option value="2551">Estado de Mexico</option>
                <option value="2552">Michoacan de Ocampo</option>
                <option value="2553">Morelos</option>
                <option value="2554">Nayarit</option>
                <option value="2555">Nuevo Leon</option>
                <option value="2556">Oaxaca</option>
                <option value="2557">Puebla</option>
                <option value="2558">Queretaro de Artiaga</option>
                <option value="2559">Quinta Roo</option>
                <option value="2560">San Lusi Potosi</option>
                <option value="2561">Sonora</option>
                <option value="2562">Tabasco</option>
                <option value="2563">Tamaulipas</option>
                <option value="2564">Tlaxcala</option>
                <option value="2565">Veracruz-Llave</option>
                <option value="2566">Yucatan</option>
                <option value="2567">Zacatecas</option>
                ';
        }


        $respuesta = new respuesta();
        $respuesta->success = true;
        $respuesta->html = $html;

        echo json_encode($respuesta);
    }

    
}
class respuesta
{
    public $success;
    public $html;
}
