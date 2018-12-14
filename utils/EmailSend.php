<?php
namespace utils;

class EmailSend {

    public static function sendEmailToken($email, $token){

         $to = $email;
         $subject = "Confirmación de cuenta";
         $text = "
            <html>
             <body>
               <h1><strong>¡ya casi estas adentro!!</strong><h1>
                <br>
                 <p>por favor para concluir tu registro ingrese a la siguiente pagína:</p>
                <p><a href='http://localhost/espotifai/routes/verificarRegistro.php?token=$token'>Aquí</a></p>
				<br>
                 <p>si usted no recuerda haberse registrado ignore este mensaje</p>
                 <p><small>atte. staff de espotifai</small></p>
             </body>
            </html>
         ";
         $head = 'From: espotifai' . "\r\n" .
                 'Reply-To: webmaster@example.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

         mail($to,$subject,$text,$head);
         
    }

}