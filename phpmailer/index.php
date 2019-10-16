<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'insirahost.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'teste@dominio.com';                     // SMTP username
    $mail->Password   = 'senhadoemail';                               // SMTP password
    $mail->SMTPSecure = "PHPMailer::ENCRYPTION_STARTTLS";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('teste@dominio.com', 'Desenvolvedor');
    $mail->addAddress('contato@dominio.com', 'Usuário');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Attachments (ARQUIVOS PARA SEREM ENVIADOS CASO NECESSÁRIO
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Assunto';
    $mail->Body    = 'Mensagem do e-mail <b>com tags html!</b>';
    $mail->AltBody = 'Mensagem do e-mail para navegadores sem suporte a emails html';

    $mail->send();
    echo 'Mensagem enviada';
} catch (Exception $e) {
    echo "Mensagem não enviada, erro: {$mail->ErrorInfo}";
}