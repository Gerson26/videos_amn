<?php
echo $header;
?>

<body>
    <?php
    $data_user = base64_decode($_GET['d']);
    $data = json_decode($data_user, TRUE);


    ?>
    <main class="main-content main-content-bg mt-0">
        <section>
            <nav class="navbar navbar-expand-lg  blur blur-rounded top-0  z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 ">
                        <img src="/assets/img/logos/logo_amc.png" height="40" alt="">
                        <!-- <img src="/assets/img/logos/waddn.png" style="width: 40px; height: 40px; margin-left: 5px; margin-right: 5px;"> -->
                        ACADEMIA MEXICANA DE CIRUGÍA
                    </a>

                    <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
                        <ul class="navbar-nav navbar-nav-hover mx-auto">
                        </ul>
                        <ul class="navbar-nav d-lg-block d-none">
                            <li class="nav-item">
                                <a href="/Inicio/" class="btn btn-sm  bg-gradient-info  btn-round mb-0 me-1" onclick="smoothToPricing('pricing-soft-ui')">INICIAR SESIÓN</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 col-lg-10 col-md-12 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-7">
                                <div class="container-fluid py-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="multisteps-form">
                                                <!--progress bar-->
                                                <div class="row" id="card_progress">
                                                    <div class="col-12 col-lg-12 mx-auto my-4">
                                                        <div class="multisteps-form__progress">
                                                            <button class="multisteps-form__progress-btn js-active" title="User Info" disabled>
                                                                <span>Información de usuario</span>
                                                            </button>
                                                            <button class="multisteps-form__progress-btn" title="Others" disabled>Otros</button>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--form panels-->
                                                <div class="row">
                                                    <div class="col-12 col-lg-12 m-auto">
                                                        <form class="multisteps-form__form" id="add" method="POST">
                                                            <!--single form panel-->
                                                            <div id="card_one" class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" id="card_one" data-animation="FadeIn">
                                                                <h5 class="font-weight-bolder mb-0">INFORMACIÓN PERSONAL</h5>
                                                                <p class="mb-0 text-sm">Completa el siguiente formulario para crear tu cuenta. Los campos marcados con un * son obligatorios.
                                                                    Escribe tu nombre(s) y apellido(s) como deseas que se lea en tu constancia.</p>
                                                                <div class="multisteps-form__content">
                                                                    <br>
                                                                    <p class="mb-0 text-sm">Para crear su cuenta del Congreso, proporcione una dirección de correo electrónico válida.</p>

                                                                    <div class="row mt-3">
                                                                        <div class="col-12 col-sm-6">
                                                                            <label>Correo Electrónico*</label>
                                                                            <input type="hidden" id="codigo_beca" name="codigo_beca" value="<?= $data['codigo_beca'] ?>">
                                                                            <input type="hidden" id="codigo_socio" name="codigo_socio" value="<?= $data['socio'] ?>">
                                                                            <input type="hidden" id="email_register" name="email_register" value="<?= $data['usuario'] ?>">
                                                                            <input type="hidden" id="id_categoria" name="id_categoria" value="<?= $data['id_categoria'] ?>">
                                                                            <input class="multisteps-form__input form-control all_input" type="email" id="email" name="email" placeholder="eg. user@domain.com" autocomplete="no" value="<?= $data['usuario'] ?>" readonly>
                                                                            <span class="mb-0 text-sm" id="error" style="display:none;color:red;">Correo incorrecto</span>
                                                                        </div>
                                                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                                            <label>Confirma tu Correo Electrónico *</label>
                                                                            <input class="multisteps-form__input form-control all_input all_email" type="email" id="confirm_email" name="confirm_email" placeholder="eg. user@domain.com" disabled autocomplete="no" value="<?= $data['usuario'] ?>">
                                                                            <span class="mb-0 text-sm" id="error_confirm" style="display:none;color:red;"><label style="color:red;"> El correo no coincide *</label></span>
                                                                        </div>
                                                                        <input type="hidden" id="email_validado" name="email_validado">

                                                                        <p class="mb-0 text-sm">Todas las notificaciones incluyendo las facuras e información general del evento, solo serán enviadas a este correo electrónico.</p>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-12 col-sm-2">
                                                                            <label>Prefijo *</label>
                                                                            <select class="multisteps-form__select form-control all_input_select" name="title" id="title" required disabled>
                                                                                <option value="Dr.">Dr.</option>
                                                                                <option value="Dra.">Dra.</option>
                                                                                <option value="Sr.">Sr.</option>
                                                                                <option value="Sra.">Sra.</option>
                                                                                <option value="Sra.">Lic.</option>
                                                                                <option value="Sra.">Estudiante</option>
                                                                                <option value="Sra.">Enf.</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-12 col-sm-5">
                                                                            <label>Nombre *</label>
                                                                            <input class="multisteps-form__input form-control all_input" type="text" id="nombre" name="nombre" maxlength="15" placeholder="eg. Christopher" required disabled value="<?= $data['nombre'] ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>

                                                                        <div class="col-12 col-sm-5">
                                                                            <label>Primer apellido *</label>
                                                                            <input class="multisteps-form__input form-control all_input" type="text" id="apellidop" name="apellidop" maxlength="15" placeholder="eg. Jones" disabled value="<?= $data['apellidop'] ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>

                                                                    </div>
                                                                    <div class="row mt-3">

                                                                        <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                                                                            <label>Segundo apellido</label>
                                                                            <input class="multisteps-form__input form-control" type="text" id="apellidom" name="apellidom" maxlength="15" placeholder="eg. Wilson" disabled value="<?= $data['apellidom'] ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>

                                                                        <div class="col-12 col-sm-4">
                                                                            <label>Teléfono</label>
                                                                            <input class="multisteps-form__input form-control" type="text" id="telephone" name="telephone" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="ej. (555) 555-1234" autocomplete="no" value="<?= $data['telefono'] ?>" disabled>
                                                                        </div>

                                                                        <div class="col-12 col-sm-4">
                                                                            <label>Modalidad</label>
                                                                            <select class="multisteps-form__select form-control all_input_select" name="modalidad" id="modalidad" disabled>
                                                                                <option value="" disabled selected>Selecciona una Opción</option>

                                                                                <?= $modalidad ?>

                                                                            </select>
                                                                        </div>

                                                                    </div>

                                                                    <div class="row mt-3">


                                                                        <div class="col-12 col-sm-4" id="cont-categoria">

                                                                            <label>Categoria *</label>
                                                                            <select class="multisteps-form__select form-control all_input_select" name="categorias" id="categorias" disabled>
                                                                                <option value="" disabled selected>Selecciona una Opción</option>
                                                                            </select>

                                                                        </div>

                                                                        <div class="col-12 col-sm-4" id="cont-especialidad-text" style="display: none;">

                                                                            <label id="label-especialidades">Especialidad (Especifique) *</label>
                                                                            <input type="text" class="form-control" id="txt_especialidad" name="txt_especialidad">

                                                                        </div>

                                                                        <div class="col-12 col-sm-4" id="cont-especialidades">

                                                                            <label id="label-especialidades">Especialidades *</label>
                                                                            <select class="multisteps-form__select form-control all_input_select" name="especialidades" id="especialidades" disabled>
                                                                                <option value="" disabled selected>Selecciona una Opción</option>

                                                                                <?= $especialidades ?>

                                                                            </select>

                                                                        </div>


                                                                        <div class="col-12 col-sm-4">
                                                                            <label>País *</label>
                                                                            <select class="multisteps-form__select form-control all_input_select" name="nationality" id="nationality" onchange="actualizaEdos();" disabled>
                                                                                <option value="" disabled selected>Selecciona una Opción</option>
                                                                                <option value="156">México</option>
                                                                                <?php echo $idCountry; ?>
                                                                            </select>
                                                                        </div>


                                                                    </div>
                                                                    <div class="row mt-3">

                                                                        <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                                                                            <label>Estado *</label>
                                                                            <select class="multisteps-form__select form-control all_input_select" name="state" id="state" disabled>

                                                                            </select>
                                                                        </div>


                                                                    </div>

                                                                    <div class="row mt-3">

                                                                        <div class="col-12 col-sm-4 mt-3 mt-sm-0" id="cont-organizacion" style="display: none;">
                                                                            <label>Organización</label>
                                                                            <input type="text" class="form-control" id="organizacion" name="organizacion" disabled>
                                                                        </div>

                                                                        <div class="col-12 col-sm-4 mt-3 mt-sm-0" id="cont-escuela" style="display: none;">
                                                                            <label>Escuela</label>
                                                                            <input type="text" class="form-control" id="escuela" name="escuela" disabled>
                                                                        </div>

                                                                        <!-- <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                                                                            <label>Puesto</label>
                                                                            <input type="text" class="form-control" id="puesto" name="puesto" disabled>
                                                                        </div> -->

                                                                        <!-- <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                                                                            <label>País Organización</label>
                                                                            <select class="multisteps-form__select form-control all_input_select" name="pais_organizacion" id="pais_organizacion" disabled>
                                                                                <option value="" disabled selected>Selecciona una Opción</option>
                                                                                <option value="156">Mexico</option>
                                                                                <?php //echo $idCountry; 
                                                                                ?>
                                                                            </select>

                                                                        </div> -->


                                                                    </div>


                                                                    <div class="button-row d-flex mt-4">
                                                                        <button class="btn bg-gradient-dark ms-auto mb-0" id="btn_next_1" type="submit" title="Next" disabled>Siguiente</button>
                                                                        <!-- <button class="btn bg-gradient-dark ms-auto mb-0" id="btn_next_update" type="button" title="Next" style="display:none;" disabled>Actualizar</button> -->
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <form role="form" class="text-start" id="login" action="/Login/crearSessionRegister" method="POST" class="form-horizontal" style="display: none;">
            <label style="font-weight:bold;">Correo electrónico</label>
            <div class="mb-1">
                <input type="email" name="email_login" id="email_login" class="form-control" placeholder="usuario@grupolahe.com" aria-label="Email">
            </div>



            <div class="text-center">
                <button type="submit" id="btnEntrar" class="btn bg-gradient-info w-100 mt-1 mb-0"><b style="color: #FFFFFF">ENTRAR</b></button>
            </div>

        </form>



        <footer class="footer pt-12">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="" class="font-weight-bold" target="www.grupolahe.com">Creative GRUPO LAHE</a>.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="#" class="nav-link pe-0 text-muted">privacy policies</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <?php echo $footer; ?>
    </main>


    <div class="modal fade" id="modal-pagar-inscripcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal-pagar-inscripcion" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Pagar Inscripción
                    </h5>

                    <!-- <span type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal" aria-label="Close">
                        X
                    </span> -->
                </div>
                <div class="modal-body">
                    <form class="form_compra" method="POST" action="">
                        <div class="row">
                            <div class="col-12">
                                <div style="display:flex; justify-content:center;">
                                    <!-- <img src="/caratulas/{$datos['caratula']}" style="width:60%; border-radius: 10px;" alt="" /> -->
                                </div>

                                <b>
                                    <p class="text-center mt-3" id="name_producto_text"></p>
                                </b>

                                <b>
                                    <p class="text-center" style="color: #2B932B;" id="precio_producto_text"></p>
                                </b>
                                <input type="hidden" value="" name="email_modal" id="email_modal">
                                <input type="hidden" value="" name="costo" id="costo" />
                                <input type="hidden" value="" name="tipo_moneda" id="tipo_moneda" />
                                <input type="hidden" value="" name="id_producto" id="id_producto" />
                                <input type="hidden" value="" name="nombre_curso" id="nombre_curso" />
                                <input type="hidden" id="tipo_pago" name="tipo_pago" />
                                <input type="hidden" id="clave" name="clave" value="<?= $clave ?>">
                                <input type="hidden" id="id_registrado" name="id_registrado">
                                <br>
                                

                                <input type='hidden' id='business' name='business' value='acameci@amc.org.mx'>
                                <input type='hidden' id='item_name' name='item_name'>
                                <input type='hidden' id='item_number' name='item_number' value="<?= $clave ?>">
                                <input type='hidden' id='amount' name='amount' value='<?= $total ?>'>
                                <input type='hidden' id='currency_code' name='currency_code' value='MXN'>
                                <input type='hidden' id='notify_url' name='notify_url' value=''>
                                <input type='hidden' id='return' name='return' value=''>
                                <input type="hidden" id="cmd" name="cmd" value="_xclick">
                                <input type="hidden" id="order" name="order" value="<?= $clave ?>">
                                <input name='upload' type='hidden' value='1' />    
                                <!-- <input name="shopping_url" type="hidden" value="https://congreso.amc.org.mx/" />           -->

                                <div class="row d-flex justify-content-center">
                                    <div class="col-12">
                                        <label>Elige tu método de pago *</label>
                                        <select class="multisteps-form__select form-control all_input_second_select metodo_pago" name="metodo_pago" required>
                                            <option value="" disabled selected>Selecciona una Opción</option>
                                            <option value="Transferencia">Transferencia</option>
                                            <option value="Paypal">Paypal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center mt-3">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary btn_comprar" style="width: 100%;" name="btn_tipo_pago">Comprar</button>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--FACTURACIONNNNNNNNNNNN-->

    <div class="modal  fade" id="modal-facturacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal-facturacion">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Ingresa tus datos de facturación
                    </h5>

                    <span type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal" aria-label="Close">
                        X
                    </span>
                </div>
                <div class="modal-body">
                    <form id="update" class="form_update" method="POST" action="" target="_blank">
                        <div class="row">
                            <div class="col-12">
                                <div style="display:flex; justify-content:center;">
                                    <!-- <img src="/caratulas/{$datos['caratula']}" style="width:60%; border-radius: 10px;" alt="" /> -->
                                </div>

                                <br>

                                <div class="multisteps-form__content">
                                    <div class="row mt-0">
                                        <div class="row mt-1">
                                            <div class="col-12 col-sm-12 mt-2">
                                                <label>Razón Social *</label>
                                                <input required class="multisteps-form__input form-control" type="text" id="business_name_iva" name="business_name_iva" placeholder="eg. Christopher Prior Jones" maxlength="100">
                                            </div>
                                            <br>
                                            <div class="col-12 col-sm-12 mt-2">
                                                <label>RFC *</label>
                                                <input required class="multisteps-form__input form-control" type="text" id="code_iva" name="code_iva" placeholder="eg. CPJ41250AS" maxlength="13" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                            </div>
                                            <br>
                                            <!-- <div class="col-12 col-sm-4 mt-1 mt-sm-0">
                                                <label>Método de Pago *</label>
                                                <select class="multisteps-form__select form-control all_input_select" name="payment_method_iva" id="payment_method_iva">
                                                    <option value="" disabled selected>Selecciona una Opción</option>
                                                    <option value="ELECTRONIC TRANSFER">ELECTRONIC TRANSFER</option>
                                                    <option value="CREDIT OR DEBIT CARD">CREDIT OR DEBIT CARD</option>
                                                </select>
                                            </div> -->

                                            <div class="col-12 col-sm-12 mt-2">
                                                <label>Correo Electrónico facturación * </label>
                                                <input required class="multisteps-form__input form-control" type="text" id="email_receipt_iva" name="email_receipt_iva" placeholder="eg. user@domain.com">
                                                <span class="mb-0 text-sm" id="error_email_send" style="display:none;color:red;">Correo electrónico incorrecto</span>
                                            </div>

                                            <div class="col-12 col-sm-12 mt-2">
                                                <label>CP * </label>
                                                <input required class="multisteps-form__input form-control" type="text" id="cp_fac" name="cp_fac" placeholder="">

                                            </div>

                                            <div class="col-12 col-sm-12 mt-2">
                                                <label>CFDI * </label>
                                                <select required class="multisteps-form__select form-control all_input_select" name="cfdi" id="cfdi">
                                                    <option value="">Selecciona una opción</option>
                                                    <?= $usoCfdi ?>

                                                </select>

                                            </div>

                                            <div class="col-12 col-sm-12 mt-2">
                                                <label>RÉGIMEN FISCAL * </label>
                                                <select required class="multisteps-form__select form-control all_input_select" name="regimen_fiscal" id="regimen_fiscal">
                                                    <option value="">Selecciona una opción</option>
                                                    <?= $remigenFiscal ?>
                                                </select>
                                                <input type="hidden" value="" name="email-update" id="email-update">
                                            </div>
                                        </div>
                                        <!-- <div class="row text-center mt-1">
                                            <div class="col-10 mx-auto">
                                                <p class="mb-0 text-sm">Una vez que el pago haya sido identificado, usted recibirá su factura 
                                                    dentro de las 48 horas posteriores. Para reportar retrasos, favor de enviar un correo con su 
                                                    comprobante de pago adjunto a secretario@hepatologia.org.mx. recuerde que la expedición de 
                                                    facturas solo podrá realizarse en el mes correspondiente al pago.</p>
                                            </div>
                                        </div> -->
                                        <br>
                                        <div class="button-row d-flex mt-1">
                                            <button class="btn bg-gradient-success ms-auto mb-0" type="button" id='btn_next'>Siguiente</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

<script>
    $(document).ready(function() {

        var precios = [];
        // getDataInscripcion(200);


        function getDataInscripcion(costo = null, id_registrado = null) {
            $.ajax({
                url: "/Register/getProductInscripcion",
                type: "POST",
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    console.log("Procesando....");


                },
                success: function(respuesta) {
                    console.log(respuesta);

                    if (respuesta.status == 'success') {

                        precios.push({
                            'id_product': respuesta.producto.id_producto,
                            'precio': costo,
                            'cantidad': 1
                        });

                        $("#name_producto_text").html(respuesta.producto.nombre);
                        $("#tipo_moneda").val(respuesta.producto.tipo_moneda);
                        $("#id_producto").val(respuesta.producto.id_producto);
                        $("#nombre_curso").val(respuesta.producto.nombre);
                        $("#costo").val(costo);
                        $("#precio_producto_text").html('$ ' + costo);
                        $("#id_registrado").val(id_registrado);
                        $(".btn_comprar").attr('data-id', respuesta.producto.id_producto);


                        $("#item_name").val(respuesta.producto.nombre);
                        $("#amount").val(costo);

                        var urlRegresoPaypal = 'https://congreso.amc.org.mx/OrdenPagoRegistro/PagoExistoso/?productos=' + JSON.stringify(precios) + '&id_reg=' + id_registrado;

                        $("#return").val(urlRegresoPaypal);

                        $("#modal-pagar-inscripcion").modal('show');

                    }

                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });
        }

        function getDataFacturacion(email, costo = null) {
            console.log("facturación registrada en el correo:");
            console.log(email);
            $("#modal-facturacion").modal('show');


            $("#btn_next").on("click", function(event) {

                event.preventDefault();
                $("#email-update").val(email);
                console.log("datos a actualizar: ");

                var formData = new FormData(document.getElementById("update"));
                for (var value of formData.values()) {
                    console.log(value);
                }
                $.ajax({
                    url: "/Register/updateFiscalData",
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        console.log("Procesando....");
                    },
                    success: function(respuesta) {
                        console.log(respuesta);

                        if (respuesta == 'success') {
                            $("#modal-facturacion").attr("hidden", true);
                            enviarcorreo(email);
                            
                            Swal.fire({
                                icon: 'success',
                                title: '',
                                text: '¡Se guardaron sus datos fiscales correctamente!',
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                allowOutsideClick: false,
                            }).
                            then((value) => {
                                // window.location.replace("/Login/");
                                Swal.fire({
                                    title: '¿Deseas pagar inscripción?',
                                    text: "",
                                    icon: 'warning',
                                    closeOnClickOutside: false,
                                    closeOnEsc: false,
                                    allowOutsideClick: false,
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Si',
                                    cancelButtonText: 'No, despues!',
                                }).then((result) => {
                                    //pagar
                                    if (result.isConfirmed) {
                                        getDataInscripcion(costo);
                                    } else {
                                        //redireccionar al home
                                        $("#btnEntrar").click();

                                    }
                                })

                            });
                        }

                    },
                    error: function(respuesta) {
                        console.log(respuesta);
                    }

                });
            });
        }

        function enviarcorreo(email) {
            $.ajax({
                    type: 'POST',
                    url: '/Mailer/mailerFacturacion',
                    data: {
                        email: email
                    }
                })
                .done(function(r) {
                    // alert("Se ha enviado el correo correctamente");
                    // mensaje.html(r);
                });
        }

        // alert($("#socio").val());
        // if($("#codigo_socio").val() != ''){
        //     $("#cont-especialidades").show();
        // }

        // || $("#socio").val() != 1
        //codigo de beca
        // if ($("#codigo_beca").val() == '' || $("#codigo_beca").val() == 0 || $("#socio").val() == '2') {

        // if ($("#codigo_beca").val() == '' && $("#codigo_socio").val() == 2) {
        //     $("#btn_next_1").show();
        //     $("#add").attr('action', '/Register/passTwo');
        //     $("#cont-especialidades").hide();

        // }else if($("#codigo_beca").val() == '' && $("#codigo_socio").val() == 1){
        //     $("#add").attr('action', '/Register/UpdateData');
        //     $("#btn_next_update").show();
        //     $("#cont-categoria").hide();
        //     $("#cont-especialidades").show();
        // }
        // else if($("#codigo_beca").val() == ''){
        //     $("#btn_next_1").show();
        //     $("#add").attr('action', '/Register/passTwo');
        //     $("#cont-especialidades").hide();
        // }
        // else{
        //     $("#add").attr('action', '/Register/UpdateData');
        //     $("#btn_next_update").show();
        //     $("#cont-categoria").hide();
        //     $("#cont-especialidades").show();
        //     // $("#especialidades").css('display','none');
        //     // $("#label-especialidades").css('display','none');
        // }


        $("#add").on("submit", function(event) {
            event.preventDefault();
            $("#btn_next_1").attr('disabled', 'disabled');
            var formData = new FormData(document.getElementById("add"));
            for (var value of formData.values()) {
                console.log(value);
            }

            $.ajax({
                url: "/Register/addRegistrado",
                type: "POST",
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    console.log("Procesando....");


                },
                success: function(respuesta) {
                    console.log(respuesta);
                    console.log(respuesta.registrado.costo)
                    if (respuesta.status == 'success') {
                        // Swal.fire("¡Se guardaron sus datos correctamente!", "", "success").
                        Swal.fire({
                                title: '',
                                text: "¡Se guardaron sus datos correctamente!",
                                icon: 'success',
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                allowOutsideClick: false
                            }).
                        then((value) => {
                            // window.location.replace("/Login/");
                            Swal.fire({
                                title: '¿Deseas agregar datos de facturación?',
                                text: "",
                                icon: 'warning',
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                allowOutsideClick: false,
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Si',
                                cancelButtonText: 'No, despues!',
                            }).then((result) => {
                                //pagar
                                if (result.isConfirmed) {
                                    getDataFacturacion(respuesta.registrado.email, respuesta.registrado.costo);
                                } else {
                                    // window.location.replace("/Login/");
                                    Swal.fire({
                                        title: '¿Deseas pagar inscripción?',
                                        text: "",
                                        icon: 'warning',
                                        closeOnClickOutside: false,
                                        closeOnEsc: false,
                                        allowOutsideClick: false,
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Si',
                                        cancelButtonText: 'No, despues!',
                                    }).then((result) => {
                                        //pagar
                                        if (result.isConfirmed) {
                                            getDataInscripcion(respuesta.registrado.costo,respuesta.registrado.id_registrado);
                                        } else {
                                            //redireccionar al home
                                            $("#btnEntrar").click();

                                        }
                                    });
                                }
                            })

                        });
                    } else {
                        Swal.fire("¡Ups. Hubo un error al guardar sus datos.!", "Contacte a soporte", "warning").
                        then((value) => {
                            // window.location.replace("/Login/")
                        });
                    }
                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });
        });

        $('.metodo_pago').on('change', function(e) {
            var tipo = $(this).val();

            if (tipo == 'Paypal') {
                // $(".form_compra").attr('action','/OrdenPago/PagarPaypal');https://www.paypal.com/es/cgi-bin/webscr
                $(".form_compra").attr('action', 'https://www.paypal.com/es/cgi-bin/webscr');
                $(".form_compra").removeAttr('target', '_blank');
                $(".btn_comprar").val('Paypal');
                $("#tipo_pago").val('Paypal');
            } else if (tipo == 'Transferencia') {
                $(".form_compra").attr('action', '/OrdenPagoRegistro/ordenPago');
                $(".form_compra").attr('target', '_blank');
                $(".btn_comprar").val('Transferencia');
                $("#tipo_pago").val('Transferencia');

            }

        });

        $(".btn_comprar").on("click", function(e) {
            e.preventDefault();
            var tipo = $(this).val();
            var dataId = $(this).attr('data-id');

            if (tipo == 'Transferencia') {
                Swal.fire({
                    title: '¿Quieres comprar el congreso?',
                    text: "Una vez que confirmes se emitirá tu orden de pago.",
                    icon: 'warning',
                    showCancelButton: true,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    allowOutsideClick: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Comprar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest(".form_compra").submit();

                        setTimeout(function() {
                            $("#btnEntrar").click();
                        }, 1000);
                    }

                })

            } else if (tipo == 'Paypal') {
                Swal.fire({
                    title: '¿Quieres comprar el congreso?',
                    text: "Una vez que confirmes se enviara a PayPal.",
                    icon: 'warning',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Comprar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        var formData = $(".form_compra").serialize();

                        $.ajax({
                            url: "/OrdenPagoRegistro/PagarPaypal",
                            type: "POST",
                            data: formData,
                            beforeSend: function() {
                                console.log("Procesando....");
                            },
                            success: function(respuesta) {
                                
                                console.log(respuesta);

                                if(respuesta == 'success'){
                                    $(".form_compra").submit();
                                    
                                }else{
                                    Swal.fire('error','Hubo un errro al cobrar','Contacte a soporte');
                                }
                                
   
                            },
                            error: function(respuesta) {
                                console.log(respuesta);
                            }

                        });

                        


                    }
                })
            } else {

                Swal.fire(
                    "Debes seleccionar un método de pago.",
                    '',
                    'info'
                );

            }


        });




        $("#btn_next_update").on("click", function() {

            var formData = new FormData(document.getElementById("add"));
            for (var value of formData.values()) {
                console.log(value);
            }

            $.ajax({
                url: "/Register/UpdateData",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    console.log("Procesando....");


                },
                success: function(respuesta) {
                    console.log(respuesta);
                    if (respuesta == 'success') {
                        Swal.fire("¡Se actualizaron tus datos correctamente!", "", "success").
                        then((value) => {
                            window.location.replace("/Login/");
                        });
                    } else {
                        Swal.fire("¡Usted No Actualizo Nada!", "", "warning").
                        then((value) => {
                            window.location.replace("/Login/")
                        });
                    }
                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });

        });

        $("#email").on("blur", function() {
            $(this).attr('readonly', 'readonly');

        });

        $("#confirm_email").on("blur", function() {
            $("#email_modal").val($(this).val());
            $("#email_login").val($(this).val());
            $("#email_validado").val($(this).val());
        });

        if ($("#email_register").val() == '') {
            let email = localStorage.getItem("email");

            $("#email").val(email);
            if ($("#email").val() != '') {
                $("#confirm_email").removeAttr('disabled');
            } else {
                $("#email").removeAttr('readonly');
            }

            mostrarCategorias();

        } else {
            var email_uno = document.getElementById('email').value;
            var email_dos = document.getElementById('confirm_email').value;
            var id_categoria = $("#id_categoria").val();
            document.getElementById("btn_next_1").disabled = false;
            document.getElementById("btn_next_update").disabled = false;

            if (email_uno == email_dos) {
                document.getElementById('confirm_email').disabled = false;
                document.getElementById('title').disabled = false;
                document.getElementById('apellidop').disabled = false;
                document.getElementById('apellidom').disabled = false;
                document.getElementById('telephone').disabled = false;
                document.getElementById('nationality').disabled = false;
                document.getElementById('state').disabled = false;
                document.getElementById('nombre').disabled = false;
                document.getElementById('categorias').disabled = false;
                document.getElementById('especialidades').disabled = false;
                document.getElementById("email_validado").value = email_uno;

            }

            mostrarCategoriaByUser(id_categoria);

            console.log($("#categorias option:selected").val());

            if (id_categoria == 2) {
                $("#cont-especialidades").show();
            } else {
                $("#cont-especialidades").hide();
            }

        }

        $("#categorias").on("change", function() {
            id_categoria = $(this).val();

            //Especialista y residente
            if (id_categoria == 2 || id_categoria == 5) {
                $("#cont-especialidades").show();
            } else {
                $("#cont-especialidades").hide();
            }

            //Estudiante
            if (id_categoria == 8) {
                $("#cont-escuela").show()
                $("#cont-organizacion").hide()
            } else {
                $("#cont-escuela").hide()
                $("#cont-organizacion").show()
            }

            //Profesional de la salud
            if (id_categoria == 4) {
                $("#cont-especialidad-text").show();
                $("#cont-especialidades").hide();
            } else {
                $("#cont-especialidad-text").hide();
            }
        });




        // $("#linea_principal").on("change", function() {
        //     var linea_principal = $(this).val();

        function mostrarCategorias() {

            $.ajax({
                url: "/Register/getCategorias",
                type: "POST",
                data: {

                },
                dataType: "json",
                beforeSend: function() {
                    console.log("Procesando....");
                    $('#categorias')
                        .find('option')
                        .remove()
                        .end();

                },
                success: function(respuesta) {
                    console.log(respuesta);

                    $('#categorias')
                        .append($('<option>', {
                                value: ''
                            })
                            .text('Selecciona una opción'));


                    $.each(respuesta, function(key, value) {
                        //console.log(key);

                        console.log(value);
                        $('#categorias')
                            .append($('<option>', {
                                    value: value.id_categoria
                                })
                                .text(value.categoria));

                    });

                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });

        }




        function mostrarCategoriaByUser(id_categoria) {

            $.ajax({
                url: "/Register/getCategorias",
                type: "POST",
                data: {

                },
                dataType: "json",
                beforeSend: function() {
                    console.log("Procesando....");
                    $('#categorias')
                        .find('option')
                        .remove()
                        .end();

                },
                success: function(respuesta) {
                    console.log(respuesta);

                    $('#categorias')
                        .append($('<option>', {
                                value: ''
                            })
                            .text('Selecciona una opción'));


                    $.each(respuesta, function(key, value) {
                        //console.log(key);
                        var selectedCategoria = value.id_categoria == id_categoria ? 'selected' : '';
                        console.log(value);
                        $('#categorias')
                            .append('<option value="' + value.id_categoria + '" ' + selectedCategoria + '>' + value.categoria + '</option>');
                    });

                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });

        }


    });
</script>