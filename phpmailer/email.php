<?php

// O padrão para o $mail->SMTPDebug = ? é 0, depuração desativada.
// O 1 exibe mensagens retornadas pelo cliente.
// O 2 exibe mensagens do cliente e do servidor.
// O 3 exibe mensagens do cliente, servidor e status da conexão.
// O 4 exibe todas as mensagens, incluindo detalhes da comunicação.

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
    
// Capturamos o valor dos dados enviados no formulário e atribuímos as variáveis $assunto e $mensagem;
    if (isset($_POST['assunto']) && !empty($_POST['assunto'])) {    
        $assunto = $_POST['assunto'];
    }
    if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
              $mensagem = $_POST['mensagem'];
    }
     
// Instanciamos a classe PHPMailer para setar seus atributos e utilizar seus métodos;
    $mail = new PHPMailer;

    $mail->SMTPDebug = 2;
     
// Definimos o protocolo que será utilizado, nesse caso, o SMTP;
    $mail->isSMTP();

// Definimos o endereço para o servidor de e-mails do Gmail;
    $mail->Host = 'smtp.gmail.com';

// Habilitamos a autenticação SMTP;
    $mail->SMTPAuth = true;

// Definimos a criptografia a ser usada, conforme recomendado pelo Gmail;
    $mail->SMTPSecure = 'tls';

// É preciso informar os dados de uma conta de e-mail ativa para concluir o envio;
    $mail->Username = 'andregehgoncalvesz@gmail.com';
    $mail->Password = 'oibabaca123';

// Para autenticar via SSL precisamos informar a porta 587, conforme recomendado pelo Gmail;
    $mail->Port = 587;
     
// Informamos o e-mail de destinatário e remetente, respectivamente;
    $mail->setFrom('andregehgoncalvesz@gmail.com', 'Andre Goncalves');
    $mail->addAddress('andreegoncalvess@gmail.com');
     
// Indicamos o uso do HTML no conteúdo do e-mail;
    $mail->isHTML(true);
     
// Informamos o assunto para a mensagem;
    $mail->Subject = $assunto;

// Definimos o conteúdo do e-mail e aplicamos a função nl2br() para que o conteúdo insira as quebras de linhas adicionadas ao texto;
    $mail->Body    = nl2br($mensagem);

// Texto opcional para clientes que não suportem HTML ou desativaram o mesmo.
    $mail->AltBody = nl2br(strip_tags($mensagem));
     
// Adicionamos uma condição que verifica o retorno da função send, responsável por disparar o e-mail. Informamos o erro que foi retornado pela propriedade $mail->ErrorInfo, se o envio falhar;
    if(!$mail->send()) {
    echo 'Não foi possível enviar a mensagem.<br>';
    echo 'Erro: ' . $mail->ErrorInfo;
} 

// Caso a função retorne verdadeiro, é impressa uma mensagem de sucesso.
    else {
        header('Location: index.php?enviado');
    }


// os endereços do remetente e destinatário podem ser capturados de uma fonte de dados.
?>