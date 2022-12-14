<?php

namespace App\controllers;

defined("APPPATH") or die("Access denied");
require dirname(__DIR__) . '/../public/librerias/PHPMailer/Exception.php';
require dirname(__DIR__) . '/../public/librerias/PHPMailer/PHPMailer.php';
require dirname(__DIR__) . '/../public/librerias/PHPMailer/SMTP.php';

use \Core\MasterDom;
use \Core\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use \App\models\Register as RegisterDao;


class Mailer
{


    public function mailer($msg)
    {
        $mail = new PHPMailer(true);
        $datos = RegisterDao::getUserByEmail($msg['email']);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'academiamxncirugia@gmail.com';         //SMTP username
            $mail->Password   = 'apucpnpfnxnqgmwj';                     //SMTP password
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAutoTLS = false;                                 //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($msg['email'], 'AMC 2022 Registro');
            $mail->addAddress($msg['email'], 'a');                      //Add a recipient


            $html = '     
    <!DOCTYPE html>
        <html lang="en">

        <!-- Define Charset -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Responsive Meta Tag -->
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">

        <title>Email Template</title>

        <!-- Responsive and Valid Styles -->
        <style type="text/css">
            body {
                width: 100%;
                background-color: #FFF;
                margin: 0;
                padding: 0;
                -webkit-font-smoothing: antialiased;
                font-family: arial;
            }

            html {
                width: 100%;
            }
            .container{
                width: 80%;
                padding: 20px;
                margin: 0 auto;
                
            }

            img{
                width: 100%;
            }

        
        </style>

        </head>

        <body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
                    
            <div class="container">
                <img src="https://congreso.amc.org.mx/img/cintillo_amc.jpg" alt="img">
                <br>
                <p style="text-align:center;"><b>??Gracias por completar su formulario de registro!</b></p>
                <p>
                    Estimado: <b>'.$msg['nombre'].'</b> 
                </p>
                <p>
                    <b>Imprima este formato para su dep??sito en cualquier banco</b>
                </p>
                <p>
                    <b>a) Bancomer</b>
                </p>
                <p>
                    <b>b) Academia Mexicana de Cirug??a</b>
                </p>
                <p>
                    <b>c) Clave: 0121 8000 1669 56 25 40</b>
                </p>
                <p>
                    <b>d) Cuenta: 01 66 95 62 54</b>
                </p>

                <p>
                    <b>Importe a pagar:</b> $'.$datos['costo'].' MXN
                </p>
                
                <p style="text-align:justify;">
                <b>AVISO IMPORTANTE:</b> Incluya la referencia proporcionada por este sistema 
                en el campo "Concepto de pago" seg??n las instrucciones anteriores. La referencia 
                de pago debe ingresarse en may??sculas. No agregue espacios entre los nombres 
                ni incluya ning??n otro signo de puntuaci??n, ya que esto puede afectar la 
                confirmaci??n de su transferencia bancaria.
                </p>

                <p style="text-align:justify;">
                <b>Recuerde que su lugar en el congreso no se confirmar?? hasta que se 
                reciba el pago completo y se le haya enviado un correo electr??nico de confirmaci??n. 
                Las reservas incompletas se cancelar??n despu??s de la fecha l??mite de pago 
                indicada anteriormente.</b>
                </p>

                <p style="text-align:justify;">
                <b>Si tiene alguna consulta o no recibe su c??digo de confirmaci??n dentro de los 
                dos d??as h??biles posteriores a la realizaci??n de su pago, subir su comprobante 
                en el siguiente enlace o env??e su recibo bancario por correo electr??nico 
                <a href="mailto: amec@amc.org.mx" style="color: #0055AA;">amec@amc.org.mx</a></b>
                </p>

                <p style="text-align:center;">
                <b><a href="https://congreso.amc.org.mx/Login/" target="_blank" style="color: #0055AA;">
                https://congreso.amc.org.mx/Login/</a></b>
                </p>
                
            </div>
            
                
        </body>

</html>';

            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Preregistro a AMC';
            $mail->Body    = $html;
            $mail->CharSet = 'UTF-8';

            $mail->send();
           // echo 'El mensaje ha sido enviado';
            
        } catch (Exception $e) {
            //echo "No se pudo enviar el email: {$mail->ErrorInfo}";
        }
    }

    public function mailerFacturacion()
    {
        $mail = new PHPMailer(true);
        $email = $_POST['email'];
        $msg = RegisterDao::getUserByEmail($email);
        $fac = RegisterDao::getDatosFacturacionByEmail($email);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'academiamxncirugia@gmail.com';         //SMTP username
            $mail->Password   = 'apucpnpfnxnqgmwj';                     //SMTP password
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAutoTLS = false;                                 //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($msg['email'], 'AMC 2022 Datos de Facturaci??n');
            $mail->addAddress($msg['email'], 'a');     //Add a recipient


            $html = '     
    <!DOCTYPE html>
        <html lang="en">

        <!-- Define Charset -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Responsive Meta Tag -->
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">

        <title>Email Template</title>

        <!-- Responsive and Valid Styles -->
        <style type="text/css">
            body {
                width: 100%;
                background-color: #FFF;
                margin: 0;
                padding: 0;
                -webkit-font-smoothing: antialiased;
                font-family: arial;
            }

            html {
                width: 100%;
            }
            .container{
                width: 80%;
                padding: 20px;
                margin: 0 auto;
                
            }

            img{
                width: 100%;
            }

        
        </style>

        </head>

        <body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
                    
            <div class="container">
                <img src="https://congreso.amc.org.mx/img/cintillo_amc.jpg" alt="img">
                <br>
                <p>
                    Hola '.$msg['nombre'].' 
                </p>
                <p>
                    Usted a registrado los siguientes datos de facturaci??n con el correo electr??nico 
                    '.$msg['email'].' en la p??gina de preregistro de la <b>ACADEMIA MEXICANA DE CIRUG??A 2022</b>. 
                    Si no fue usted ignore este mensaje.
                </p>

                <p>
                    <b>Raz??n Social: </b>'.$msg['razon_social'].'
                </p>
                <p>
                    <b>RFC: </b>'.$msg['rfc'].'
                </p>
                <p>
                    <b>Email de facturaci??n: </b>'.$msg['email_fac'].'
                </p>
                <p>
                    <b>CP Fiscal: </b>'.$msg['cp_fiscal'].'
                </p>
                <p>
                    <b>CFDI: </b>'.$fac['descripcion_uso_cfdi'].'
                </p>
                <p>
                    <b>R??gimen Fiscal: </b>'.$fac['descripcion_regimen_fiscal'].'
                </p>
                
                <p>
                    Con su cuenta de correo puede iniciar sesi??n en la plataforma 
                    <b><a href="https://congreso.amc.org.mx/Login/" target="_blank" style="color: #0055AA;">
                    https://congreso.amc.org.mx/Login/</a></b>
                </p>
                
            </div>
            
                
        </body>

</html>';

            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Datos de Facturaci??n AMC 2022';
            $mail->Body    = $html;
            $mail->CharSet = 'UTF-8';

            $mail->send();
           // echo 'El mensaje ha sido enviado';
            
        } catch (Exception $e) {
            //echo "No se pudo enviar el email: {$mail->ErrorInfo}";
        }
    }

    // public function mailerPago($msg)
    // {
    //     $mail = new PHPMailer(true);
        
    //     $fecha_limite = date("d-m-Y",strtotime($msg['fecha_limite_pago']."+ 5 days"));
        

    //     try {
    //         //Server settings
    //         $mail->SMTPDebug = 0;                      //Enable verbose debug output
    //         $mail->isSMTP();                                            //Send using SMTP
    //         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    //         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //         $mail->Username   = 'congresoamh2022@gmail.com';                     //SMTP username
    //         $mail->Password   = 'qjawdupyevbeqbtw';                               //SMTP password
    //         $mail->SMTPSecure = 'ssl';
    //         $mail->SMTPAutoTLS = false;            //Enable implicit TLS encryption
    //         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //         //Recipients
    //         $mail->setFrom($msg['email'], 'AMH 2022 Registro');
    //         $mail->addAddress($msg['email'], 'a');     //Add a recipient

           


    //         $html = '     
    //         <!DOCTYPE html>
    //         <html lang="en">
    
    //         <!-- Define Charset -->
    //         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    //         <!-- Responsive Meta Tag -->
    //         <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    
    //         <title>Email Template</title>
    
    //         <!-- Responsive and Valid Styles -->
    //         <style type="text/css">
    //             body {
    //                 width: 100%;
    //                 background-color: #FFF;
    //                 margin: 0;
    //                 padding: 0;
    //                 -webkit-font-smoothing: antialiased;
    //                 font-family: arial;
    //             }
    
    //             html {
    //                 width: 100%;
    //             }
    //             .container{
    //                 width: 80%;
    //                 padding: 20px;
    //                 margin: 0 auto;
                    
    //             }
    
    //             img{
    //                 width: 100%;
    //             }
    
            
    //         </style>
    
    //         </head>
    
    //         <body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
                        
    //             <div class="container">
    //                 <img src="https://registro.foromcom/img/musa-01.png" alt="">
    //                 <br>
    //                 <p>
    //                     ??Gracias por completar su formulario de registro!
    //                 </p>
    //                 <p>
    //                     <b>Estimado :</b>'.$msg['nombre'].'
    //                 </p>
    //                 <p>
    //                    <b>M??todo de pago:</b>'.$msg['metodo_pago'].' 
    //                 </p>
                    
    //                 <p>
    //                     <b>Imprima este formato para su dep??sito en cualquier banco.</b>
    //                 </p>
    
    //                 <p>
    //                     a) N??mero de cuenta: XXXXXXXXX
    //                     <br>
    //                     b)	Banco: XXXXXX
    //                     <br>
    //                     c)	Nombre:
    //                 </p>
    //                 <p>
    //                     <b>Referencia:</b> '.$msg['referencia'].'
    //                     <br>
    //                     <b>Importe a pagar:</b> $ '.$msg['importe_pagar'].' MXN
    //                     <br>
    //                     <b>Fecha l??mite de pago:</b> '.$fecha_limite.' 
                        
    //                 </p>
                    
    //                 <p>
    //                     Recuerde que su lugar en el congreso no se confirmar?? hasta que se reciba el pago completo y se le haya enviado un correo electr??nico de confirmaci??n. Las reservas incompletas se cancelar??n despu??s de la fecha l??mite de pago indicada anteriormente.
    //                 </p>
    
    //                 <p>
    //                     Si tiene alguna consulta o no recibe su c??digo de confirmaci??n dentro de los dos d??as h??biles posteriores a la realizaci??n de su pago, env??e su recibo bancario por correo electr??nico a 
    //                 </p>
                    
    //             </div>
                
                    
    //         </body>
    
    // </html>';

    //         // $message = "<img src='https://convencionasofarma2022.mx/img/img_email.jpeg'/>";
    //         // $message .= "<h5>??Thank you for submitting your pre-registration form!</h5>";
    //         // $message .= "<h5>" . $msg['code'] . "</h5><br>";

    //         //Content
    //         $mail->isHTML(true);                                  //Set email format to HTML
    //         $mail->Subject = 'Preregistro AMH';
    //         $mail->Body    = $html;
    //         $mail->CharSet = 'UTF-8';

    //         $mail->send();
    //        // echo 'El mensaje ha sido enviado';
            
    //     } catch (Exception $e) {
    //         //echo "No se pudo enviar el email: {$mail->ErrorInfo}";
    //     }
    // }


    public function mailerRegister($msg)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'mujersalud2022@gmail.com';                     //SMTP username
            $mail->Password   = 'grupolahe664';                               //SMTP password
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAutoTLS = false;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($msg['email'], 'MUSA 2022 Registro');
            $mail->addAddress($msg['email'], 'a');     //Add a recipient

            $html = '     
            <!DOCTYPE html>
                <html lang="en">
        
                <!-- Define Charset -->
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
                <!-- Responsive Meta Tag -->
                <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
        
                <title>Email Template</title>
        
                <!-- Responsive and Valid Styles -->
                <style type="text/css">
                    body {
                        width: 100%;
                        background-color: #FFF;
                        margin: 0;
                        padding: 0;
                        -webkit-font-smoothing: antialiased;
                        font-family: arial;
                    }
        
                    html {
                        width: 100%;
                    }
                    .container{
                        width: 80%;
                        padding: 20px;
                        margin: 0 auto;
                        
                    }
        
                    img{
                        width: 100%;
                    }
        
                
                </style>
        
                </head>
        
                <body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
                    
                    <div class="container">
                    <img src="https://registro.foromusa.com/img/musa-01.png" alt="">
                        <p style="text-align: center !important;">
                            Estimado, ' . $msg['name'] . ' : 
                            <strong>??Su registro a MUSA fue exitoso! </strong>
                        </p>
                    </div>
                    
                        
                </body>
        
        </html>';
        

            // $message = "<img src='https://convencionasofarma2022.mx/img/img_email.jpeg'/>";
            // $message .= "<h2>Estimado " . $msg['nombre'] . "</h2><br>";
            // $message .= "<h5>Se ha generado tu registro exitosamente</h5><br>";


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Registro';
            $mail->Body    = $html;
            $mail->CharSet = 'UTF-8';


            $mail->send();
            // echo 'El mensaje ha sido enviado';
        } catch (Exception $e) {
            // echo "No se pudo enviar el email: {$mail->ErrorInfo}";
        }
    }
}
