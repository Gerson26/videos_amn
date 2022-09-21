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
                                    <input type="hidden" id="evaluacion_inicial" name="evaluacion_inicial" value="<?php echo $info_user['evaluacion_inicial'] ?>">
                                    <input type="hidden" id="evaluacion_final" name="evaluacion_final" value="<?php echo $info_user['evaluacion_final'] ?>">
                                    <input type="hidden" id="datos" name="datos" value="<?php echo $info_user['datos'] ?>">
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

        <div class="row">
            <div class="col">

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
                                            <span class="text-lg text-center text-dark opacity-8">Progreso General <span id="porcentaje_general"><?php echo $porcentaje_general; ?> %</span> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-block">

                            <progress id="barra_progreso_general" max="<?php echo $secs_totales_general; ?>" value="<?php echo $secs_total_transmissions_minutes * 60; ?>"></progress>

                        </div>
                        <div class="row m-auto">
                            <div class="col-12" id="btn-examen">
                                <?php echo $btn_encuesta; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show position-relative active height-350 border-radius-lg" id="transmision_1" role="tabpanel" aria-labelledby="transmision_1">
                <div class="row mt-4">
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-12 m-auto text-center">
                                        <!-- <img alt="Image placeholder" style="width: 100%" src="https://images.unsplash.com/photo-1552581234-26160f608093?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2100&q=80" class="img-fluid border-radius-lg shadow-lg"> -->
                                        <input type="text" readonly hidden id="secs_t1" value="<?php echo $secs_t1['segundos']; ?>">
                                        <input type="text" readonly hidden id="status_t1" value="<?php echo $transmision_1['status']; ?>">
                                        <input type="text" readonly hidden id="duracion_t1" value="<?php echo $transmision_1['duracion']; ?>">
                                        <span type="text" name="time_watch_1" id="time_watch_1"></span>
                                        <section id="iframe_1_section">
                                            <iframe class="frame-transmision" src="<?php echo $transmision_1['url']; ?>" frameborder="0"></iframe>
                                        </section>

                                        <img id="img-stanby-1" class="frame-transmision" src="/assets/img/stand_by.jpg" alt="" style="display: none;">
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
                                <div class="mb-1" style="display: none;">
                                    <div id="cont_chat_1" class="text-scroll">
                                        <?php echo $chat_transmision_1; ?>
                                    </div>

                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0">
                                            <img alt="Image placeholder" class="avatar rounded-circle me-3" src="../../../img/users_musa/<?php echo $info_user['avatar_img']; ?>">

                                        </div>
                                        <div class="flex-grow-1 my-auto">

                                            <form class="align-items-center" id="form_chat" method="post">
                                                <input type="hidden" name="id_tipo" id="id_tipo" value="<?= $transmision_1['id_transmision']; ?>">
                                                <input type="hidden" name="sala" id="sala" value="1">
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
                    <div class="col-12 col-lg-4">

                        <div class="card" style="display: none;">
                            <div class="card blur shadow-blur max-height-vh-70">
                                <div class="card-header shadow-lg">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="d-flex align-items-center">
                                                <!--img alt="Image" src="assets/img/bruce-mars.jpg" class="avatar"-->
                                                <div class="ms-3">
                                                    <div class="d-flex align-items-center">
                                                        <img alt="Image" src="../../../img/users_musa/<?php echo $info_user['avatar_img']; ?>" class="avatar">
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
                                                <input type="hidden" name="salapre" id="salapre" value="1">

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
                                    <div class="col-12" id="btn-next-video">
                                        <a href="" id="btn_ante_vid" style="display: none;" class="btn btn-primary">Regresar al video anterior</a>
                                        <a href="" id="btn_next_vid" style="display: none;" class="btn btn-primary">Ir al siguiente video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->

                    </div>
                </div>
            </div>

            <!-- <div class="tab-pane fade position-relative height-350 border-radius-lg" id="transmision_2" role="tabpanel" aria-labelledby="transmision_2">
                <div class="row mt-4">
                    <div class="col-10 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-12 m-auto text-center">
                                        
                                        <input type="text" readonly hidden id="secs_t2" value="<?php echo $secs_t2['segundos']; ?>">
                                        <input type="text" readonly hidden id="status_t2" value="<?php echo $transmision_2['status']; ?>">
                                        <input type="text" readonly hidden id="duracion_t2" value="<?php echo $transmision_2['duracion']; ?>">
                                        <span type="text" name="time_watch_2" id="time_watch_2"></span>
                                        <section id="iframe_2_section">
                                            <iframe class="frame-transmision" src="<?php echo $transmision_2['url']; ?>" frameborder="0"></iframe>
                                        </section>

                                        <img id="img-stanby-2" class="frame-transmision" hidden src="/assets/img/stand_by.jpg" alt="">
                                    </div>
                                </div>
                                <div class="row align-items-center px-2 mt-4 mb-2">
                                  

                                    <hr class="horizontal dark my-3">
                                </div>
                               
                                <div class="mb-1">
                                    <div id="cont_chat_2" class="text-scroll">
                                        <?php echo $chat_transmision_2; ?>
                                    </div>

                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0">
                                            <img alt="Image placeholder" class="avatar rounded-circle me-3" src="../../../img/users_musa/<?php echo $info_user['avatar_img']; ?>">
                                        </div>
                                        <div class="flex-grow-1 my-auto">
                                            <form class="align-items-center" id="form_chat" method="post">
                                                <input type="hidden" name="id_tipo" id="id_tipo" value="<?= $transmision_2['id_transmision']; ?>">
                                                <input type="hidden" name="sala" id="sala" value="2">
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
                                              
                                                <div class="ms-3">
                                                    <div class="d-flex align-items-center">
                                                        <img alt="Image" src="../../../img/users_musa/<?php echo $info_user['avatar_img']; ?>" class="avatar">
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
                                    <form class="align-items-center" id="form_pregunta" autocomplete="nope" action="" method="POST" onsubmit="return false;" accept-charset="utf-8">
                                        <div class="d-flex">
                                            <div class="input-group" style="display: none;">
                                                <input type="hidden" name="id_tipopre" id="id_tipopre" value="<?= $transmision_1['id_transmision']; ?>">
                                                <input type="hidden" name="salapre" id="salapre" value="2">

                                            </div>
                                            <div class="input-group">
                                                <input type="text" name="txt_pregunta" id="txt_pregunta" class="form-control" placeholder="Escribe tu pregunta al ponente aquí." aria-label="Message example input" onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>

                                            <button class="btn bg-gradient-success mb-0 ms-2" onclick="savePregunta()">
                                                <i class="ni ni-send"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div class="card mt-3">
                                
                                <div class="card blur shadow-blur max-height-vh-70">

                                    <div class="card-header shadow-lg">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class=" text-center">
                                                 
                                                    <div class="ms-0 text-center">
                                                        
                                                        <span class="text-lg text-center text-dark opacity-8">Progreso <span id="porcentaje_2"><?php echo $porcentaje_t2; ?> %</span> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-block">

                                        <progress id="barra_progreso_2" max="<?php echo $secs_totales_t2; ?>" value="<?php echo $secs_t2['minutos'] * 60; ?>"></progress>
                                        <input type="text" name="" id="id_trasmision_2" readonly value="<?php echo $secs_t2['id_transmision']; ?>">

                                    </div>
                                    <div class="row m-auto">
                                        <div class="col-12" id="btn-examen">
                                            <?php echo $btn_encuesta; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          

                        </div>

                    </div>
                </div>
            </div> -->
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
    <input type="text" readonly hidden id="id_registrado" value="<?= $id_registrado ?>">

    <?php echo $footer; ?>
</main>



<!-- Modal examen diagnostico-->
<div class="modal fade" id="examenDiagnostico" tabindex="-1" role="dialog" aria-labelledby="examenDiagnosticoLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="examenDiagnosticoLabel">Examen Diagnostico</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <form id="form_enviar_respuestas">

                <div class="modal-body">
                    <div class="row">
                        <?php echo $preguntas ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" style="display: none;">Cerrar</button>
                    <button type="submit" class="btn bg-gradient-primary" id="btn_save_evaluacion">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal examen -->
<div class="modal fade" id="examenOriginal" tabindex="-1" role="dialog" aria-labelledby="examenOriginalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="examenOriginalLabel">Examen Original</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <form id="form_enviar_respuestas_2">

                <div class="modal-body">
                    <div class="row">
                        <?php echo $preguntas_2 ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" id="btn_cerrar_modal_exam_ori" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn bg-gradient-primary" id="btn_save_evaluacion_2">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://player.vimeo.com/api/player.js"></script>

<script>
    // //obtener el sigueinte video
    // let id_video = $('#id_trasmision_1').val();
    // getNextVideo(id_video);

    function getNextVideo(id_video) {

        let id_video_siguiente = parseInt(id_video) + 1;
        let id_video_anterior = parseInt(id_video) - 1;


        console.log("id del video siguinete " + id_video_siguiente);
        console.log("este es el id del video" + id_video);
        console.log("id video decremento" + id_video_anterior);

        $.ajax({
            url: "/Transmission/getVideo",
            type: "POST",
            data: {
                id_video_anterior,
                id_video_siguiente
            },
            dataType: 'json',
            beforeSend: function() {
                console.log("Procesando....");

            },
            success: function(respuesta) {

                console.log(respuesta);

                $('#btn_ante_vid').css('display', 'inline-block');
                $('#btn_next_vid').css('display', 'inline-block');

                if (respuesta.video.length == 2) {
                    console.log("si hay  video");
                    $('#btn_ante_vid').attr('href', '/transmission/video/' + respuesta.video[0].id_transmision);
                    $('#btn_next_vid').attr('href', '/transmission/video/' + respuesta.video[1].id_transmision);

                } else {
                    console.log("ya no hay mas videos para mostrar");

                    //boton video anterior
                    if (id_video == 1) {

                        $('#btn_ante_vid').css('display', 'none');
                        $('#btn_next_vid').attr('href', '/transmission/video/' + respuesta.video[0].id_transmision);
                    }
                    //boton siguiente video
                    if (id_video == 4) {
                        $('#btn_next_vid').css('display', 'none');
                        $('#btn_ante_vid').attr('href', '/transmission/video/' + respuesta.video[0].id_transmision);
                    }
                }

            },
            error: function(respuesta) {
                console.log(respuesta);
            }

        });
    }



    intervalo1();
    // intervalo2();

    function intervalo1() {
        intervalo = setInterval(chats, 60000, 1, 1);
    }

    // function intervalo2() {
    //     intervalo = setInterval(chats, 60000, 2, 2);
    // }

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

        // function actualizarProgresoConFecha(transmision, segundos) {
        //     $.ajax({
        //         url: "/Transmission/updateProgressWithDate",
        //         type: "POST",
        //         data: {
        //             transmision,
        //             segundos
        //         },
        //         beforeSend: function() {
        //             console.log("Procesando....");
        //         },
        //         success: function(respuesta) {

        //             console.log(respuesta);

        //         },
        //         error: function(respuesta) {
        //             console.log(respuesta);
        //         }
        //     });
        // }

        let status_1 = $('#status_t1').val();
        // let status_2 = $('#status_t2').val();


        // Esconder el iframe y mostrar la imagen si la transmision no está activa
        if (status_1 == 1) {
            $('#iframe_1_section').css('display', 'block');
            $('#img-stanby-1').css('display', 'none');
        } else {
            $('#iframe_1_section').css('display', 'none');
            $('#img-stanby-1').css('display', 'block');
        }

        // if (status_2 == 2) {
        //     $('#iframe_2_section').attr('hidden', false);
        //     $('#img-stanby-2').attr('hidden', true);
        // } else {
        //     $('#iframe_2_section').attr('hidden', true);
        //     $('#img-stanby-2').attr('hidden', false);
        // }

        var intervalo;
        // var intervalo_2;
        let tiempo;


        let inicio = $('#barra_progreso_1').val();
        let duracion = $('#barra_progreso_1').attr('max');
        let porcentaje_num = (inicio * 100) / parseInt(duracion);
        let increment = 1;

        // let inicio_2 = $('#barra_progreso_2').val();
        // let duracion_2 = $('#barra_progreso_2').attr('max');
        // let porcentaje_num_2 = (inicio_2 * 100) / parseInt(duracion_2);
        // let increment_2 = 1;

        let inicio_general = $('#barra_progreso_general').val();
        let duracion_general = $('#barra_progreso_general').attr('max');
        let porcentaje_num_general = (inicio_general * 100) / parseInt(duracion_general);
        let increment_general = 1;



        let tiempo_total = 0;
        let tiempo_total_2 = 0;
        let tiempo_total_general = 0;

        var evaluacion_final = $("#evaluacion_final").val();
        // countTime(1);
        function countTime(status) {
            if (status == 1) {

                intervalo = setInterval(function() {
                    tiempo_total++;


                    if (inicio < duracion) {
                        inicio += increment;
                        inicio_general += increment_general; //incremento general
                    }

                    if (tiempo_total % 60 == 0) {
                        console.log('Ejecutamos Ajax');

                        actualizarProgreso($('#id_trasmision_1').val(), (inicio / 60));

                    }

                    if (porcentaje_num_general >= 90 && evaluacion_final == 0) {
                        $('#btn-examen').html('<button type="button" id="btn_examen_original" class="btn btn-primary" style="background-color: orangered!important;" data-bs-toggle="modal" data-bs-target="#examenOriginal">Examen</button>');
                    }

                    if (porcentaje_num >= 90) {
                        //obtener el sigueinte video
                        let id_vid = $('#id_trasmision_1').val();
                        getNextVideo(id_vid);
                    }

                    $('#barra_progreso_1').val(inicio);
                    porcentaje_num = (inicio * 100) / parseInt(duracion);
                    $('#porcentaje_1').html(porcentaje_num.toFixed(0) + ' %');

                    //barra porcentaje general
                    $('#barra_progreso_general').val(inicio_general);
                    porcentaje_num_general = (inicio_general * 100) / parseInt(duracion_general);
                    $('#porcentaje_general').html(porcentaje_num_general.toFixed(0) + ' %');

                }, 1000);
            } else {
                clearInterval(intervalo);
            }

        }

        if (porcentaje_num_general >= 90 && evaluacion_final == 0) {
            $('#btn-examen').html('<button type="button" id="btn_examen_original" class="btn btn-primary" style="background-color: orangered!important;" data-bs-toggle="modal" data-bs-target="#examenOriginal">Examen</button>');
        }

        if (porcentaje_num >= 90) {
            //obtener el sigueinte video
            let id_vid = $('#id_trasmision_1').val();
            getNextVideo(id_vid);
        }

        if ($("#datos").val() == 0) {
            //actualizar datos
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Antes de comenzar te invitamos a verificar tus datos',
                closeOnClickOutside: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                buttons: false
            }).then((value) => {
                window.location.replace("/account/");
            });
        } else {
            //solo se activa en el segundo video
            if($("#id_trasmision_1").val() == 2){
                var evaluacion_inicial = $("#evaluacion_inicial").val();
                verificarExamenDiagnostico(evaluacion_inicial);
            }
            
        }

        function verificarExamenDiagnostico(status_examen) {
            if (status_examen == 1) {
                // ya se contesto la evaluacion
                // countTime();

            } else {
                // alert("aun no sale el modal");
                Swal.fire({
                    icon: 'info',
                    title: 'Bienvenido',
                    text: 'Deberá contestar un examen diagnistico',
                    closeOnClickOutside: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    buttons: false
                }).then((value) => {
                    $("#examenDiagnostico").modal('show');
                });


            }
        }

        $("#form_enviar_respuestas").on("submit", function(event) {
            event.preventDefault(event);
            var formData = new FormData(document.getElementById("form_enviar_respuestas"));

            Swal.fire({
                title: '¿Estas seguro de tus respuestas?',
                text: "¡No podrás contestarlo de nuevo!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: "/Transmission/saveExamen",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            event.preventDefault();
                            console.log("Procesando....");
                            // alert('Se está borrando');
                        },
                        success: function(respuesta) {
                            console.log(respuesta);
                            if (respuesta == "success") {
                                Swal.fire('Se ha guardado su examen diganostico correctamente', '', 'success')
                                $('#examenDiagnostico').modal('toggle');
                                countTime();
                            } else {
                                Swal.fire('Hubo un error al guardar su información', 'ontacte a soporte', 'error')

                            }

                        },
                        error: function(respuesta) {
                            console.log(respuesta);

                        }
                    });
                }
            })

        });


        $("#form_enviar_respuestas_2").on("submit", function(event) {
            event.preventDefault(event);
            var formData = new FormData(document.getElementById("form_enviar_respuestas_2"));

            Swal.fire({
                title: '¿Estas seguro de tus respuestas?',
                text: "¡No podrás contestarlo de nuevo!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!'
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        url: "/Transmission/saveExamenOriginal",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            event.preventDefault();
                            console.log("Procesando....");
                            // alert('Se está borrando');
                        },
                        success: function(respuesta) {
                            console.log(respuesta);
                            if (respuesta == "success") {
                                Swal.fire('Se ha guardado su examen correctamente', '', 'success')
                                $('#examenOriginal').modal('toggle');
                                $('#btn-examen').css('display', 'none');

                            } else {
                                Swal.fire('Hubo un error al guardar su información', 'ontacte a soporte', 'error')

                            }

                        },
                        error: function(respuesta) {
                            console.log(respuesta);

                        }
                    });

                }
            })


        });



        // function countTime2() {
        //     intervalo_2 = setInterval(function() {
        //         tiempo_total_2++;


        //         if (inicio_2 < duracion_2) {
        //             inicio_2 += increment_2;

        //         }

        //         if (tiempo_total_2 % 60 == 0) {
        //             console.log('Ejecutamos Ajax');

        //             actualizarProgreso($('#id_trasmision_2').val(), (inicio_2 / 60));

        //         }

        //         // if (porcentaje_num >= 79) {
        //         //     $('#btn-examen').html('<button type="button" class="btn btn-primary" style="background-color: orangered!important;" data-toggle="modal" data-target="#encuesta">Examen</button>');
        //         // }

        //         $('#barra_progreso_2').val(inicio_2);
        //         porcentaje_num_2 = (inicio_2 * 100) / parseInt(duracion_2);
        //         $('#porcentaje_2').html(porcentaje_num_2.toFixed(0) + ' %');


        //     }, 1000);


        // }



        // let identificadorIntervaloDeTiempo;

        // function repetirCadaSegundo() {
        //     identificadorIntervaloDeTiempo = setInterval(mandarMensaje, 1000);
        // }

        // function mandarMensaje() {
        //     console.log("Ha pasado 1 segundo.");
        // }

        var iframe = document.querySelector('iframe');
        var player = new Vimeo.Player(iframe);

        var play = 0;

        player.on('pause', function() {
            console.log('paused the video!');
            countTime(2);
            play = 0;
        });


        player.on('play', function() {
            console.log('played the video!');

            if (play == 0) {
                play = 1;
                countTime(1);

            } else {
                console.log("ya está en play");
            }
        });


    });
</script>

<script>
    // var iframe = document.querySelector('iframe');
    // var player = new Vimeo.Player(iframe);

    // player.on('pause', function() {
    //     console.log('paused the video!');
    // });


    // player.on('play', function() {
    //     console.log('played the video!');
    //     countTime();
    // });
</script>

<script type="text/javascript">
    var timestamp = '<?= time(); ?>';
    let id_registrado = $('#id_registrado').val();

    function updateTime() {
        timestamp++;
        var fechas = Date(timestamp);
        var fecha = new Date(fechas);
        let hour = parseInt(fecha.getHours());
        let minutes = parseInt(fecha.getMinutes());
        let seconds = parseInt(fecha.getSeconds());
        let total = "" + hour + ":" + minutes + ":" + seconds + "";

        console.log(total);
        // console.log(id_registrado);
        // if(total == "17:33:40"){
        //     // console.log("ES IGUAL A LA HORA");
        //     $.ajax({
        //             url: "/Transmission/checkPreCongress",
        //             type: "POST",
        //             data: {
        //                 id_registrado
        //             },
        //             beforeSend: function() {
        //                 console.log("Procesando....");
        //                 // console.log(id_registrado);
        //             },
        //             success: function(respuesta) {
        //                 console.log(respuesta);
        //                 return;
        //             },
        //             error: function(respuesta) {
        //                 console.log(respuesta);
        //                 $('#iframe_1_section').attr('hidden', true);
        //                 alert("No compraste el precongreso");
        //                 window.location.replace("/Home/");
        //                 // window.location.reload();
        //             }
        //     });
        // }else

        if (total > "09:32:10") {
            // console.log("PASO LA HORA");
            var asd = $.ajax({
                url: "/Transmission/checkPreCongress",
                type: "POST",
                data: {
                    id_registrado
                },
                beforeSend: function() {
                    // console.log("Procesando....");
                    // console.log(id_registrado);
                },
                success: function(respuesta) {
                    console.log(respuesta);
                    if (respuesta == "success") {
                        return "LISTO";
                    } else {
                        $('#iframe_1_section').attr('hidden', true);
                        alert("No compraste el precongreso");
                        window.location.replace("/Home/");
                        // window.location.reload();
                    }
                },
                error: function(respuesta) {
                    console.log(respuesta);
                }
            });
        } else {
            setTimeout(updateTime, 10000);
        }
    }

    $(function() {
        //   setTimeout(updateTime, 1000);
    });
</script>