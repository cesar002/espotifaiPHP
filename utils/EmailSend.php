<?php
namespace utils;

class EmailSend {

    public static function sendEmailToken($email, $token){

         $to = $email;
         $subject = "Confirmación de cuenta";
         $text = "
            <html>
             <body>
               <h1><strong>¡ya casi estas adentro!!</strong></h1>
                <br>
                 <p>por favor para concluir tu registro ingrese a la siguiente pagína:</p>
                <p><a href='http://localhost/espotifai/routes/verificarRegistro.php?token=$token'>Aquí</a></p>
				<br>
                 <p>si usted no recuerda haberse registrado ignore este mensaje</p>
                 <p><small>atte. staff de espotifai</small></p>
             </body>
            </html>
         ";

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $head  = 'MIME-Version: 1.0' . "\r\n";
        $head .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $head .= 'From: espotifai' . "\r\n" .
                 'Reply-To: webmaster@example.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

         mail($to,$subject,$text,$head);
         
    }


    public static function sendEmailRecuperarPass($email, $token){
        $to = $email;
         $subject = "Recuperación de contraseña";
         $text = "
            <html>
             <body>
               <h1><strong>Recuperacion de contraseña</strong></h1>
                <br>
                 <p>por favor, entre al siguiente link para generar una nueva contraseña para su cuenta</p>
                <p><a href='http://localhost/espotifai/routes/RecuperarContraseña.php?token=$token'>Aquí</a></p>
				<br>
                 <p>si usted no recuerda haberse registrado ignore este mensaje</p>
                 <p><small>atte. staff de espotifai</small></p>
             </body>
            </html>
         ";

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $head  = 'MIME-Version: 1.0' . "\r\n";
        $head .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $head .= 'From: espotifai' . "\r\n" .
                 'Reply-To: webmaster@example.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

         mail($to,$subject,$text,$head);
    }


}