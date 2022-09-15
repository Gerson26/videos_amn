<title>
    Transmisión
</title>
<?php echo $header; ?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-2">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-3 text-dark" href="javascript:;">
                            <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                                                <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="/Home/">Inicio</a></li>
                    <li class="breadcrumb-item text-sm">Transmisión</li>
                </ol>
            </nav>

            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group"></div>
                </div>

                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="/Home/" class="nav-link text-body font-weight-bold mx-lg-4 mx-0 px-0">
                            <i class="fa fa-home me-sm-0"></i>
                            <span class="d-sm-inline d-none">Inicio</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="/Login/cerrarSession" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-power-off me-sm-1"></i>
                            <span class="d-sm-inline d-none">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card card-body" id="profile">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-sm-auto col-4">
                            <div class="avatar avatar-xl position-relative">
                                <img src="/assets/img/logos/logo_amc.png">
                            </div>
                        </div>
                        <div class="col-sm-auto col-8 my-auto">
                            <div class="h-100">
                                <h5 class="mb-1 font-weight-bolder" id="nombre_transmision">
                                    <?php echo $transmision_1['nombre']; ?>
                                </h5>

                                <input type="text" id="nombre_t1" value="<?php echo $transmision_1['nombre']; ?>" readonly hidden>
                                <input type="text" id="nombre_t2" value="<?php echo $transmision_2['nombre']; ?>" readonly hidden>
                                <p class="mb-0 font-weight-bold text-sm">

                                </p>
                            </div>
                        </div>

                        <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                            <div class="form-check form-switch ms-2">
                                <div class="row text-center">
                                    <div class="col-lg-12 col-md-12 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                                        <div class="nav-wrapper position-relative end-0">
                                            <!-- <ul class="nav nav-pills nav-fill p-1 bg-transparent-yellow" role="tablist">
                                                <li class="nav-item transmisiones px-3" data-transmision="1">
                                                    <a class="nav-link mb-0 px-0 py-1 active" href="#transmision_1" data-bs-toggle="tab" role="tab" aria-selected="true">
                                                        <span class="fa fa-video"></span>
                                                        <span class="ms-1">Sala 1</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item transmisiones px-3" data-transmision="2">
                                                    <a class="nav-link mb-0 px-0 py-1" href="#transmision_2" data-bs-toggle="tab" role="tab" aria-selected="false">
                                                        <span class="fa fa-video"></span>
                                                        <span class="ms-1">Sala 2</span>
                                                    </a>
                                                </li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-10 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12 m-auto text-center">
                                <!-- <img alt="Image placeholder" style="width: 100%" src="https://images.unsplash.com/photo-1552581234-26160f608093?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2100&q=80" class="img-fluid border-radius-lg shadow-lg"> -->
                                <input type="hidden" readonly  id="secs_t1" value="<?php echo $secs_t1['segundos']; ?>">
                                <input type="hidden" readonly  id="status_t1" value="<?php echo $transmision_1['status']; ?>">
                                <input type="hidden" readonly  id="duracion_t1" value="<?php echo $transmision_1['duracion']; ?>">
                               
                                <span type="text" name="time_watch_1" id="time_watch_1"></span>
                                <section id="iframe_1_section">
                                    <iframe class="frame-transmision" src="<?php echo $transmision_1['url']; ?>" frameborder="0"></iframe>
                                </section>

                                <img id="img-stanby-1" class="frame-transmision" style="display: none;" src="/assets/img/stand_by.jpg" alt="">
                            </div>
                        </div>
                        <div class="row align-items-center px-2 mt-4 mb-2">
                            <!-- <div class="col-sm-6">
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center">
                                                <i class="ni ni-like-2 me-1 cursor-pointer"></i>
                                                <span class="text-sm me-3 ">150</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="ni ni-chat-round me-1 cursor-pointer"></i>
                                                <span class="text-sm me-3">36</span>
                                            </div>
                                        </div>
                                     </div> -->

                            <hr class="horizontal dark my-3">
                        </div>
                        <!-- Comments -->
                        <div class="mb-1">
                            <div id="cont_chat_<?=$transmision_1['sala']?>" class="text-scroll">
                                <?php echo $chat_transmision_1; ?>
                            </div>

                            <div class="d-flex mt-4">
                                <div class="flex-shrink-0">
                                    <img alt="Image placeholder" class="avatar rounded-circle me-3" src="<?php echo $info_user['avatar_img'] != '' ? '../../../img/users_musa/'.$info_user['avatar_img'] : '../../../img/users_musa/form.jpg'; ?>">
                                </div>
                                <div class="flex-grow-1 my-auto">

                                    <form class="align-items-center" id="form_chat" method="post">
                                        <input type="hidden" name="id_tipo" id="id_tipo" value="<?= $transmision_1['id_transmision']; ?>">
                                        <input type="hidden" id="sala" name="sala" value="<?=$transmision_1['sala']?>">
                                        
                                        <div class="d-flex">
                                            <div class="input-group">
                                                <input type="text" name="txt_chat" id="txt_chat" class="form-control" placeholder="Escribe un comentario para todos los asistentes." aria-label="Message example input" onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                            <button class="btn bg-gradient-primary mb-0 ms-2" onclick="saveChat()">
                                                <i class="ni ni-send"></i>
                                            </button>
                                        </div>
                                    </form>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-11 col-lg-4">

                <div class="card">
                    <div class="card blur shadow-blur max-height-vh-70">
                        <div class="card-header shadow-lg">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="d-flex align-items-center">
                                        <!--img alt="Image" src="assets/img/bruce-mars.jpg" class="avatar"-->
                                        <div class="ms-3">
                                            <div class="d-flex align-items-center">
                                                <img alt="Image" src="<?php echo $info_user['avatar_img'] != '' ? '../../../img/users_musa/'.$info_user['avatar_img'] : '../../../img/users_musa/form.jpg'?>" class="avatar">
                                                <div class="ms-3">
                                                    <h6 class="mb-0 d-block"><?php echo $info_user['prefijo'] . ' ' . $info_user['nombre']; ?></h6>
                                                    <span class="text-sm text-dark opacity-8">Tus Preguntas al Ponente</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer d-block">
                            <form class="align-items-center" autocomplete="nope" id="form_pregunta" method="post" onsubmit="return false;" accept-charset="utf-8">
                                <div class="d-flex">
                                    <div class="input-group" style="display: none;">
                                        <input type="hidden" name="id_tipopre" id="id_tipopre" value="<?= $transmision_1['id_transmision']; ?>">
                                        <input type="hidden" name="salapre" id="salapre" value="<?= $salapre; ?>">

                                    </div>

                                    <div class="input-group">

                                        <input type="text" name="txt_pregunta" id="txt_pregunta" class="form-control" placeholder="Escribe tu pregunta al ponente aquí." aria-label="Message example input" onfocus="focused(this)" onfocusout="defocused(this)">
                                    </div>


                                    <div class="input-group" style="display: none;">
                                        <input class="form-control" style="visibility: hidden" type="hidden" name="registrado" id="registrado" value="90323" onfocus="focused(this)" onfocusout="defocused(this)">

                                    </div>
                                    <button class="btn bg-gradient-success mb-0 ms-2" onclick="savePregunta()">
                                        <i class="ni ni-send"></i>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


                <div class="card mt-3">
                    <!---->
                    <div class="card blur shadow-blur max-height-vh-70">

                        <div class="card-header shadow-lg">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class=" text-center">
                                        <!-- <img alt="Image" src="../../../assets/img/bruce-mars.jpg" class="avatar"> -->
                                        <div class="ms-0 text-center">
                                            <!-- <h6 class="mb-0 d-block"><?php echo $info_user['prefijo'] . ' ' . $info_user['nombre']; ?></h6> -->
                                            <span class="text-lg text-center text-dark opacity-8">Progreso <span id="porcentaje_1"><?php echo $porcentaje_t1; ?> %</span> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-block">

                            <progress id="barra_progreso_1" max="<?php echo $secs_totales_t1; ?>" value="<?php echo $secs_t1['minutos'] * 60; ?>"></progress>
                            <input type="hidden" name="" id="id_trasmision_1" readonly value="<?php echo $secs_t1['id_transmision']; ?>">
                        </div>
                        <div class="row m-auto">
                            <div class="col-12" id="btn-examen">
                                <?php echo $btn_encuesta; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!---->

            </div>
        </div>




    </div>
    </div>

    <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.grupolahe.com" class="font-weight-bold" target="_blank">Grupo LAHE</a>
                        for a better web.
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>

    <?php echo $footer; ?>
</main>


<script>
    intervalo1();
   

    function intervalo1() {
        intervalo = setInterval(chats, 60000, $("#id_tipo").val(), $("#sala").val());
    }

   

    function chats(id_tipo, sala) {

        console.log(id_tipo);
        console.log("sala " + sala);

        $.ajax({
            url: "/Transmission/getChatById",
            type: "POST",
            data: {
                id_tipo,
                sala
            },
            dataType: 'json',
            beforeSend: function() {
                console.log("Procesando....");
                $("#cont_chat_" + sala).empty();

            },
            success: function(respuesta) {

                console.log(respuesta);
                // var numero_noti = 0;

                $.each(respuesta, function(index, el) {

                    //console.log(el.title);
                    var nombre_completo = el.nombre + ' ' + el.apellidop + ' ' + el.apellidom;

                    $("#cont_chat_" + el.sala).append(
                        `<div class="d-flex mt-3">
                            <div class="flex-shrink-0">
                                <img alt="Image placeholder" class="avatar rounded-circle" src="../../../img/users_musa/${el.avatar_img}">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="h5 mt-0">${nombre_completo}</h6>
                                <p class="text-sm">${el.chat}</p>
                                
                            </div>
                        </div>`
                    );
                });



            },
            error: function(respuesta) {
                console.log(respuesta);
            }

        });
    }

    function saveChat() {
        //event.preventDefault(event);
        var formData = new FormData(document.getElementById("form_chat"));

        var id_tipo = formData.get('id_tipo');
        var sala = formData.get('sala');


        console.log(id_tipo);
        console.log(sala);


        for (var value of formData.values()) {
            console.log(value);
        }

        $.ajax({
            url: "/Transmission/saveChat",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                event.preventDefault();
                document.getElementById("txt_chat").value = "";
                console.log("Procesando....");
                // alert('Se está borrando');
            },
            success: function(respuesta) {
                console.log(respuesta);
                chats(id_tipo, sala);

            },
            error: function(respuesta) {
                console.log(respuesta);

            }
        });
    }



    function savePregunta() {
        //event.preventDefault(event);
        var formData = new FormData(document.getElementById("form_pregunta"));

        var id_tipopre = formData.get('id_tipopre');
        var salapre = formData.get('salapre');

        $.ajax({
            url: "/Transmission/savePregunta",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                event.preventDefault();
                document.getElementById("txt_pregunta").value = "";
                console.log("Procesando....");
                // alert('Se está borrando');
            },
            success: function(respuesta) {
                console.log(respuesta);
                if (respuesta == "success") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Su preguntaha sido enviada correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }



            },
            error: function(respuesta) {
                console.log(respuesta);

            }
        });
    }

    $(document).ready(function() {

        function actualizarProgreso(transmision, segundos) {
            $.ajax({
                url: "/Transmission/updateProgress",
                type: "POST",
                data: {
                    transmision,
                    segundos
                },
                beforeSend: function() {
                    console.log("Procesando....");
                },
                success: function(respuesta) {

                    console.log(respuesta);

                },
                error: function(respuesta) {
                    console.log(respuesta);
                }
            });
        }

        function actualizarProgresoConFecha(transmision, segundos) {
            $.ajax({
                url: "/Transmission/updateProgressWithDate",
                type: "POST",
                data: {
                    transmision,
                    segundos
                },
                beforeSend: function() {
                    console.log("Procesando....");
                },
                success: function(respuesta) {

                    console.log(respuesta);

                },
                error: function(respuesta) {
                    console.log(respuesta);
                }
            });
        }

        let status_1 = $('#status_t1').val();
      

        // let tiempo_1 = $('#duracion_t1').val();
        // let duracion_1 = (parseInt(tiempo_1.substr(0, tiempo_1.indexOf(':'))) * 3600) + (parseInt(tiempo_1.substr(tiempo_1.length - 5, 2)) * 60) + (parseInt(tiempo_1.substr(tiempo_1.length - 2, 2)));

        // let tiempo_2 = $('#duracion_t2').val();
        // let duracion_2 = (parseInt(tiempo_2.substr(0, tiempo_2.indexOf(':'))) * 3600) + (parseInt(tiempo_2.substr(tiempo_2.length - 5, 2)) * 60) + (parseInt(tiempo_2.substr(tiempo_2.length - 2, 2)));

        // Esconder el iframe y mostrar la imagen si la transmision no está activa
        if (status_1 == 2) {
            $('#iframe_1_section').css("display", "none");
            $('#img-stanby-1').css("display", "block");
        } else {
            $('#iframe_1_section').css("display", "block");
            $('#img-stanby-1').css("display", "none");
        }

       

        var intervalo;
        
        let tiempo;


        let inicio = $('#barra_progreso_1').val();
        // let progreso_min = inicio / 60;
        let duracion = $('#barra_progreso_1').attr('max');
        let porcentaje_num = (inicio * 100) / parseInt(duracion);
        let increment = 1;

      
        let tiempo_total = 0;
        

        function countTime() {
            intervalo = setInterval(function() {
                tiempo_total++;


                if (inicio < duracion) {
                    inicio += increment;

                }

                if (tiempo_total % 60 == 0) {
                    console.log('Ejecutamos Ajax');

                    actualizarProgreso($('#id_trasmision_1').val(), (inicio / 60));

                }

                // if (porcentaje_num >= 79) {
                //     $('#btn-examen').html('<button type="button" class="btn btn-primary" style="background-color: orangered!important;" data-toggle="modal" data-target="#encuesta">Examen</button>');
                // }

                $('#barra_progreso_1').val(inicio);
                porcentaje_num = (inicio * 100) / parseInt(duracion);
                $('#porcentaje_1').html(porcentaje_num.toFixed(0) + ' %');


            }, 1000);


        }

        countTime();
       

        let t1 = $('#transmision_1').html();


        // $('.transmisiones').on('click', function() {

        //     let t_current = $(this).attr('data-transmision');

        //     if (t_current == 1) {
        //         $('#nombre_transmision').html($('#nombre_t1').val());
        //         $('#transmision_1').empty();
        //         $('#transmision_2').empty();
        //         $('#transmision_1').html(t1);
        //         increment_2 = 0;
        //         transmision_actual = 1;
        //         if (status_1 == 2) {
        //             if (duracion_1 >= inicio + 1 && transmision_actual == 2) {
        //                 increment_1 = 1;
        //             } else {
        //                 increment_1 = 0;
        //             }
        //         } else {
        //             increment = 0;
        //         }
        //     }

        //     if (t_current == 2) {
        //         $('#nombre_transmision').html($('#nombre_t2').val());
        //         $('#transmision_1').empty();
        //         $('#transmision_2').empty();
        //         $('#transmision_2').html(t2);
        //         increment = 0;
        //         transmision_actual = 2;
        //         if (status_2 == 2) {
        //             if (duracion_2 >= inicio_2 + 1 && transmision_actual == 2) {
        //                 increment_2 = 1;
        //             } else {
        //                 increment_2 = 0;
        //             }
        //         } else {
        //             increment_2 = 0;
        //         }
        //     }
        // });

        let identificadorIntervaloDeTiempo;

        function repetirCadaSegundo() {
            identificadorIntervaloDeTiempo = setInterval(mandarMensaje, 1000);
        }

        function mandarMensaje() {
            console.log("Ha pasado 1 segundo.");
        }


    });
</script>