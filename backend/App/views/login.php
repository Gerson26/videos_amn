<?php
echo $header;
?>

<body class="">

    <main class="main-content main-content-bg mt-0">
        <section>



            <nav class="navbar navbar-expand-lg  blur blur-rounded top-0  z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                    <img src="/assets/img/logos/logo_amc.png" height="40" alt=""> &nbsp;&nbsp;
                    <!--<img src="/assets/img/logos/wadd.png" style="width: 40px; height: 40px; margin-left: 5px; margin-right: 5px;">-->&nbsp;&nbsp;
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 ">
                        ACADEMIA MEXICANA DE CIRUGÍA
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 " id="navigation">

                        <ul class="navbar-nav d-lg-block">
                            <li class="nav-item">
                                <button type="button" id="btn_miembro" class="btn bg-gradient-entrar w-100 mt-1 mb-0"><b style="color: white;">SOY MIEMBRO AMC</b></button>
                            </li>
                        </ul>
                        <!-- <ul class="navbar-nav text-center mt-3 mb-2 d-block d-lg-none">
                            <li class="nav-item">
                                <button type="button" class="btn btn-sm bg-gradient-info btn-round mb-0 me-1" data-toggle="modal" data-target="#doc_programa"><b style="color: #ffffff">Programa</b></button>
                                <a href="#" class="flag-cont" onclick="smoothToPricing('pricing-soft-ui')">
                                    <img id="flag" src="/assets/img/united-k.png">
                                </a>
                            </li>
                        </ul>  -->
                    </div>
                </div>
            </nav>



            <div class="page-header min-vh-75" style="height: 90%;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-7">
                                <div class="card-header pb-0 text-start">
                                    <h5 style="color:#1B8586;" class="font-weight-bolder text-center">Academia Mexicana de Cirugía 2022</h5>
                                    <hr>
                                    <h4 style="color: #a19a9a;" class="font-weight-bolder text-center">"LXI Semana Quirúrgica Nacional"</h4>
                                    <div id="counter" class="group text-center mt-4">
                                        <!-- <span><em>days</em></span> 
                                        <span><em>hours</em></span>
                                        <span><em>minutes</em></span>
                                        <span><em>seconds</em></span>  -->
                                        <div class="row mt-4">
                                            <!-- <div class="col-3 text-lg"><h3><span id="days"></span></h3></div>
                                            <div class="col-3 text-lg"><h3><span id="hours"></span></h3></div>
                                            <div class="col-3 text-lg"><h3><span id="minutes"></span></h3></div>
                                            <div class="col-3 text-lg"><h3><span id="seconds"></span></h3></div> -->
                                        </div>
                                        <div class="row">
                                            <!-- <div class="col-3">Días</div>
                                            <div class="col-3">Horas</div>
                                            <div class="col-3">Minutos</div>
                                            <div class="col-3">Segundos</div> -->
                                        </div>
                                    </div>
                                    <p class="mb-0 mt-5" id="titulo_miembro">Ingrese su correo electrónico para iniciar sesión o registrarse.</p>
                                </div>
                                <!-- Button trigger modal -->
                                <div class="card-body">
                                    <form role="form" class="text-start" id="login" action="/Login/crearSession" method="POST" class="form-horizontal">
                                        <label style="font-weight:bold;">Correo electrónico</label>
                                        <div class="mb-1">
                                            <input type="email" name="usuario" id="usuario" class="form-control" placeholder="usuario@grupolahe.com" aria-label="Email">
                                        </div>

                                        <!-- <div class="mb-1 text-center">
                                            <img src="/assets/img/logos/seroquel.png" height="100" alt="">
                                        </div>-->
                                        &nbsp;&nbsp;

                                        <div class="text-center">
                                            <button type="button" id="btnEntrar" class="btn bg-gradient-entrar w-100 mt-1 mb-0"><b style="color: #FFFFFF;">ENTRAR</b></button>
                                        </div>

                                        <div class="text-center">
                                            <a href="/Register/" id="btn_register" type="button" class="btn bg-gradient-registrar w-100 mt-4 mb-0 font-weight-bold"><b style="color: white;">¡QUIERO REGISTRARME!</b></a>
                                        </div>
                                    </form>
                                    <!-- <button type="button" style="background: #1B8586; color: #ffffff;" id="btn_modal_add" class="btn mb-0 mt-3 w-100" data-toggle="modal" data-target="#Modal_Add" disabled="">REGISTRARSE</button> -->
                                    <!-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-2 text-sm mx-auto">
                                            ¿Olvido su contraseña?
                                            <a href="/Register/" class="text-info text-dark font-weight-bold">De clic aquí.</a>
                                        </p>
                                        <p class="mb-1 text-sm mx-auto text-center">
                                            Para crear su cuenta de acceso proporcione su cuenta de correo electrónico y de clic en el siguiente botón.
                                        </p>
                                        <div class="text-center">
                                            <a href="/Register/" type="button" class="btn bg-gradient-warning w-100 mt-4 mb-0 font-weight-bold"><b style="color: white">¡QUIERO REGISTRARME!</b></a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n9">

                                <!-- <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('/assets/img/curved-images/curved9.jpg')"></div>-->
                                <video autoplay muted loop>
                                    <source class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" src="/assets/vid/video_amc.mp4" type="video/mp4">
                                </video>

                            </div>

                            <!--<div class="count-particles" hidden>
                                <span class="js-count-particles">--</span> particles
                            </div>
                            <div ></div>-->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="fixed-bottom space-wa">
            <div class="m-3">
                <a href="https://api.whatsapp.com/send?phone=525547272900&text=Buen%20d%C3%ADa" target="_blank">
                    <span class="fa fa-whatsapp px-1 py-3-3 icon-wa bg-gradient-success"></span>
                </a>
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal" id="doc_programa" role="dialog" aria-labelledby="doc_programaLabel" aria-hidden="true">
        <div class="modal-dialog modal-size-2" role="document" style="max-width: 590px;">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-center" id="doc_programaLabel">Programa</h5>
                    <button type="button" class="btn bg-gradient-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <iframe src="https://www.flipbookpdf.net/web/site/481d28c4f8e8bc288524792304e2adcdc0ccdfb2FBP19835591.pdf.html" frameborder="0" style="width: -webkit-fill-available;
    max-width: -webkit-fill-available; height:700px;"></iframe> -->
                </div>
                <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
            </div>
        </div>
    </div>


    <!-- Moodal Add Register -->
    <div class="modal fade" id="Modal_Add" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Crear Cuenta
                    </h5>

                    <span type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal" aria-label="Close">
                        X
                    </span>
                </div>
                <div class="modal-body">
                    <!-- <p style="font-size: 16px">USTED NO ESTÁ REGISTRADO.</p> -->
                    <p style="font-size: 12px">A continuación ingrese los datos del usuario.</p>
                    <hr>
                    <form method="POST" enctype="multipart/form-data" id="form_datos">
                        <div class="form-group row">
                            <div class="form-group col-md-4">
                                <label class="control-label col-md-12 col-sm-1 col-xs-12" for="nombre">Nombre <span class="required">*</span></label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" require>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label col-md-12 col-sm-1 col-xs-12" for="apellidop">Apellido Paterno <span class="required">*</span></label>
                                <input type="text" class="form-control" id="apellidop" name="apellidop" placeholder="Apellido Paterno" require>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label col-md-12 col-sm-1 col-xs-12" for="apellidom">Apellido Materno <span class="required">*</span></label>
                                <input type="text" class="form-control" id="apellidom" name="apellidom" placeholder="Apellido Materno" require>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label col-md-12 col-sm-1 col-xs-12" for="email">Email <span class="required">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" require>
                                <span id="msg_email" style="font-size: 0.75rem; font-weight: 700;margin-bottom: 0.5rem;"></span>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label col-md-12 col-sm-1 col-xs-12" for="prefijo">Tipo <span class="required">*</span></label>
                                <select class="multisteps-form__select form-control all_input_select" name="identificador" id="identificador" readonly>
                                    <option value="2" selected>Compra</option>

                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label col-md-12 col-sm-1 col-xs-12" for="prefijo">Prefijo <span class="required">*</span></label>
                                <select class="multisteps-form__select form-control all_input_select" name="prefijo" id="prefijo" required>
                                    <option value="" selected>Selecciona una Opción</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Dra.">Dra.</option>
                                    <option value="Sr.">Sr.</option>
                                    <option value="Sra.">Sra.</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label col-md-12 col-sm-1 col-xs-12" for="especialidad">Especialidad <span class="required">*</span></label>
                                <select class="multisteps-form__select form-control all_input_select" name="especialidad" id="especialidad" required>
                                    <option value="" selected>Selecciona una Opción</option>
                                    <?= $optionEspecialidad ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label col-md-12 col-sm-1 col-xs-12" for="telefono">Telefono <span class="required">*</span></label>
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" require>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label col-md-12 col-sm-1 col-xs-12" for="pais">País <span class="required">*</span></label>
                                <select class="multisteps-form__select form-control all_input_select" name="pais" id="pais" required>
                                    <option value="" selected>Selecciona una Opción</option>
                                    <?= $optionPais ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label col-md-12 col-sm-1 col-xs-12" for="estado">Estado <span class="required">*</span></label>
                                <select class="multisteps-form__select form-control all_input_select" name="estado" id="estado" required disabled>
                                    <option value="" selected>Selecciona una Opción</option>

                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn bg-gradient-success" id="btn_upload" name="btn_upload">Aceptar</button>
                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- end modal add_register-->

    <!-- Modal -->
    <div class="modal fade" id="modal_amc_update" tabindex="-1" role="dialog" aria-labelledby="modal_amc_updateTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifica tus datos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <form id="form_update_member">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <input type="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" class="form-control" id="email_amc" name="email_amc" required>
                                    <span id="txt_error_email" style="color: red; margin-left: 5px;"></span>
                                    <input type="hidden" id="email_amc_validar" name="email_amc_validar">
                                    <input type="hidden" id="id_registrado_amc" name="id_registrado_amc">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="prefijo_amc" class="col-form-label">Prefijo:</label>
                                    <select class="form-control" id="prefijo_amc" name="prefijo_amc">
                                        <option value="">Seleccione una opción</option>
                                        <option value="Acad. Dr.">Acad. Dr.</option>
                                        <option value="Acad. Dra.">Acad. Dra.</option>
                                    </select>
                                    <span id="txt_error_prefijo" style="color: red; margin-left: 5px;"></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre" class="col-form-label">Nombre(s):</label>
                                    <input type="nombre" class="form-control" id="nombre_amc" name="nombre_amc">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="apellidop" class="col-form-label">Apellido Paterno:</label>
                                    <input type="apellidop" class="form-control" id="apellidop_amc" name="apellidop_amc">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="apellidom" class="col-form-label">Apellido Materno:</label>
                                    <input type="apellidom" class="form-control" id="apellidom_amc" name="apellidom_amc">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" id="btn_form_member" class="btn bg-gradient-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <script>
        $(document).ready(function() {

            $("#email_amc").on("keyup", function() {
                var email = $(this).val();
                var email_validar = $("#email_amc_validar").val();

                var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                //Se muestra un texto a modo de ejemplo, luego va a ser un icono
                if (emailRegex.test(email)) {

                    $("#txt_error_email").html("");
                    $.ajax({
                        url: "/Login/searchEmail",
                        type: "POST",
                        data: {
                            email
                        },
                        dataType: "json",
                        beforeSend: function() {


                        },
                        success: function(respuesta) {
                            console.log(respuesta);

                            if (respuesta) {
                                if (respuesta.email != email_validar) {
                                    console.log("Este correo ya existe")
                                    $("#txt_error_email").html("Este correo ya se encuentra registrado");
                                    $("#btn_form_member").prop('disabled',true);
                                } else {
                                    $("#txt_error_email").html("");
                                    $("#btn_form_member").prop('disabled',false);
                                }
                            } else {
                                console.log("prosigue a cambiar")
                                $("#txt_error_email").html("");
                                $("#btn_form_member").prop('disabled',false);
                            }


                        },
                        error: function(respuesta) {
                            console.log(respuesta);
                        }

                    });
                } else {
                    $("#txt_error_email").html("Ingrese un correo Valido");
                    $("#btn_form_member").prop('disabled',true);
                }
            });


            $("#btn_miembro").on("click", function() {
                // alert("funciona");
                $("#titulo_miembro").text('Si eres miembro AMC Ingresa tu correo Electrónico').css('color','red');
                $("#btn_register").addClass('d-none');
                $("#usuario").focus();
            });


            $("#btn_form_member").on('click',function(e){
                e.preventDefault();

                if($("#prefijo_amc").val() == ''){
                    $("#txt_error_prefijo").html("Seleccione una opción");
                }else{
                    $("#txt_error_prefijo").html("");
                    $("#form_update_member").submit();
                }
            })

            $("#form_update_member").on("submit", function(event) {
                event.preventDefault();


                var formData = $(this).serialize();
                console.log(formData);

                $.ajax({
                    url: "/Login/updateDataMember",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    // cache: false,
                    // contentType: false,
                    processData: false,
                    beforeSend: function() {
                        console.log("Procesando....");
                    },
                    success: function(respuesta) {
                        console.log(respuesta);

                        if(respuesta.status == 'success'){
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: 'Se verificaron sus datos correctamente.'
                            })
                            // alert($("#email_amc").val());
                            $("#usuario").val($("#email_amc").val());

                            setTimeout(function(){
                                $("#login").submit();
                            },2000)
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Ooops!!!',
                                text: 'Parece que hubo un error, contacte a soporte.'
                            })
                        }


                    },
                    error: function(respuesta) {
                        console.log(respuesta);
                    }

                });
            });

            $("#pais").on("change", function() {
                console.log('hola');
                var pais = $(this).val();
                console.log(pais);
                $.ajax({
                    url: "/Login/getEstadoPais",
                    type: "POST",
                    data: {
                        pais
                    },
                    dataType: "json",
                    beforeSend: function() {
                        console.log("Procesando....");
                        $('#estado')
                            .find('option')
                            .remove()
                            .end();

                    },
                    success: function(respuesta) {
                        console.log(respuesta);

                        $('#estado').removeAttr('disabled');

                        $('#estado')
                            .append($('<option>', {
                                    value: ''
                                })
                                .text('Selecciona una opción'));

                        $.each(respuesta, function(key, value) {
                            //console.log(key);
                            console.log(value);
                            $('#estado')
                                .append($('<option>', {
                                        value: value.id_estado
                                    })
                                    .text(value.estado));
                        });

                    },
                    error: function(respuesta) {
                        console.log(respuesta);
                    }

                });
            });

            $("#form_datos").on("submit", function(event) {
                event.preventDefault();
                var formData = new FormData(document.getElementById("form_datos"));

                // for (var value of formData.values()) {
                //     console.log(value);
                // }
                $.ajax({
                    url: "/Login/saveData",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        console.log("Procesando....");
                        // alert('Se está borrando');

                    },
                    success: function(respuesta) {
                        console.log(respuesta);

                        if (respuesta == 'success') {
                            Swal.fire("¡Se creo el usuario correctamente!", "", "success").
                            then((value) => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire("¡Hubo un error al crear el usuario!", "", "warning").
                            then((value) => {
                                window.location.reload();
                            });
                        }
                    },
                    error: function(respuesta) {
                        console.log(respuesta);
                        // alert('Error');
                        Swal.fire("¡Hubo un error al crear el usuario!", "", "warning").
                        then((value) => {
                            window.location.reload();
                        });
                    }
                });
            });
        });
        ////===========Funcion JS para el contador==========////
        //===
        // VARIABLES
        //===
        const DATE_TARGET = new Date('05/17/2022 8:00 AM');
        // DOM for render
        const SPAN_DAYS = document.querySelector('span#days');
        const SPAN_HOURS = document.querySelector('span#hours');
        const SPAN_MINUTES = document.querySelector('span#minutes');
        const SPAN_SECONDS = document.querySelector('span#seconds');
        // Milliseconds for the calculations
        const MILLISECONDS_OF_A_SECOND = 1000;
        const MILLISECONDS_OF_A_MINUTE = MILLISECONDS_OF_A_SECOND * 60;
        const MILLISECONDS_OF_A_HOUR = MILLISECONDS_OF_A_MINUTE * 60;
        const MILLISECONDS_OF_A_DAY = MILLISECONDS_OF_A_HOUR * 24

        //===
        // FUNCTIONS
        //===

        /**
         * Method that updates the countdown and the sample
         */
        function updateCountdown() {
            // Calcs
            const NOW = new Date()
            const DURATION = DATE_TARGET - NOW;
            const REMAINING_DAYS = Math.floor(DURATION / MILLISECONDS_OF_A_DAY);
            const REMAINING_HOURS = Math.floor((DURATION % MILLISECONDS_OF_A_DAY) / MILLISECONDS_OF_A_HOUR);
            const REMAINING_MINUTES = Math.floor((DURATION % MILLISECONDS_OF_A_HOUR) / MILLISECONDS_OF_A_MINUTE);
            const REMAINING_SECONDS = Math.floor((DURATION % MILLISECONDS_OF_A_MINUTE) / MILLISECONDS_OF_A_SECOND);
            // Thanks Pablo Monteserín (https://pablomonteserin.com/cuenta-regresiva/)

            // Render
            SPAN_DAYS.textContent = REMAINING_DAYS;
            SPAN_HOURS.textContent = REMAINING_HOURS;
            SPAN_MINUTES.textContent = REMAINING_MINUTES;
            SPAN_SECONDS.textContent = REMAINING_SECONDS;
        }

        //===
        // INIT
        //===
        updateCountdown();
        // Refresh every second
        setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);




        /// -------- CODIGO PARTICULAS ----------///
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 109,
                    "density": {
                        "enable": true,
                        "value_area": 710
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 31.6,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 140,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });


        /* ---- stats.js config ---- */

        var count_particles, stats, update;
        stats = new Stats;
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.display = 'none';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.body.appendChild(stats.domElement);
        count_particles = document.querySelector('.js-count-particles');
        update = function() {
            stats.begin();
            stats.end();
            if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
            }
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
    </script>

</body>

<?php echo $footer; ?>