<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

require 'vendor/autoload.php';

if(isset($_POST['enviar'])){

$mail = new PHPMailer(true);

try {
    //Configurações do servidor 
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'mail.brzparticipacoes.com.br';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'contato@brzparticipacoes.com.br';                     
    $mail->Password   = 'Brz2022@@';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         

    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->Port       = 465;           

    //variáveis do form
    $nome = $_POST['name'];
    $assunto = $POST['subject'];
    $mensagem = $POST['message'];
    $from = $_POST['email'];
    $to = 'contato@brzparticipacoes.com.br';

    
    $mail->setFrom($from,$nome);
    $mail->addAddress($to,$_POST['name'], 'BRZ Participações');
    $mail->addReplyTo('contato@brzparticipacoes.com.br', 'Contato BRZ');
    $mail->isHTML(true);
    $mail->Subject = 'Orçamento Consultoria';

    
    $body = "Nome: ".$nome."\r\n".
            "Assunto: ".$assunto."\r\n".
            "Mensagem: ".$mensagem."\r\n".
    $mail->Body    = $body;

    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //Lista de copia e copia oculta
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Anexos (imagens, videos, etc...)
    // $mail->addAttachment('/var/tmp/file.tar.gz');         
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    $mail->send();
    echo '<div class="alert alert-success text-center" role="alert">Mensagem enviada com sucesso!</div>';
    } catch (Exception $e) {
        echo '<div class="alert alert-success text-center" role="alert">Erro ao enviar o e-mail, recarregue a página e tente novamente. Se o problema persistir, favor entrar em contato via whatsapp.</div>';
    }

} else {
    echo "Erro ao enviar e-mail, acesso não foi feito via formulário";
};