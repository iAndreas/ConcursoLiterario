<?php header("Content-type: text/html; charset=utf-8"); ?>

<?php
date_default_timezone_set('Etc/UTC');
$email = $_GET['email'];
$matricula = md5($_GET['matricula']);
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
    // if (isset($_POST['destinatario']) && !empty($_POST['destinatario'])) {    
    //     $destinatario = $_POST['destinatario'];
    // }
    // if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
    //           $mensagem = $_POST['mensagem'];
    // }
     
// Instanciamos a classe PHPMailer para setar seus atributos e utilizar seus métodos;
    $mail = new PHPMailer;

// Charset UTF-8 para acentos e cedilha;
    $mail->CharSet = 'UTF-8';

// Definimos o debug como 2 para exibir mensagens do cliente e do servidor;
    $mail->SMTPDebug = 2;

// Definimos a língua do email enviado.
    $mail->setLanguage('pt_br', '/vendor/phpmailer/language/');
     
// Definimos o protocolo que será utilizado, nesse caso, o SMTP;
    $mail->isSMTP();

// Definimos o endereço para o servidor de e-mails do Gmail;
    $mail->Host = gethostbyname('ssl://smtp.gmail.com');

// Habilitamos a autenticação SMTP;
    $mail->SMTPAuth = true;

// Definimos a criptografia a ser usada, conforme recomendado pelo Gmail;
    $mail->SMTPSecure = 'ssl';

// É preciso informar os dados de uma conta de e-mail ativa para concluir o envio;
    $mail->Username = 'equipelitterae@gmail.com';
    $mail->Password = 'litterae123';

// Para autenticar via SSL precisamos informar a porta 587, conforme recomendado pelo Gmail;
    $mail->Port = 465;
     
// Informamos o e-mail de destinatário e remetente, respectivamente;
    $mail->setFrom('equipelitterae@gmail.com', 'Equipe Litterae');
    $mail->addAddress($email);
     
// Indicamos o uso do HTML no conteúdo do e-mail;
    $mail->isHTML(true);
     
// Informamos o assunto para a mensagem;
    $mail->Subject = "Seu cadastro no Litterae está quase completo!";
// Definimos o conteúdo do e-mail e aplicamos a função nl2br() para que o conteúdo insira as quebras de linhas adicionadas ao texto;
    $mail->Body = "<h1>Obrigado por se cadastrar no Litterae!</h1><br>Para confirmar seu cadastro, <a href='localhost/Litterae/cadAluno.php?mt=$matricula'>clique aqui</a>, caso você já tenha se cadastrado, apenas ignore esta mensagem.";

// Texto opcional para clientes que não suportem HTML ou desativaram o mesmo.
    $mail->AltBody = nl2br(strip_tags("Obrigado por se cadastrar no Litterae! Para confirmar seu cadastro, clique no link localhost/Litterae/cadAluno.php?mt=$matricula, caso você já tenha se cadastrado, apenas ignore esta mensagem."));
     
// Adicionamos uma condição que verifica o retorno da função send, responsável por disparar o e-mail. Informamos o erro que foi retornado pela propriedade $mail->ErrorInfo, se o envio falhar;
    if(!$mail->send()) {
    echo 'Não foi possível enviar a mensagem.<br>';
    echo 'Erro: ' . $mail->ErrorInfo;
} 

// Caso a função retorne verdadeiro, é impressa uma mensagem de sucesso.
    else {
        echo "<script>window.location.assign('../indexLogin.php?sucesso=preC')</script>";
    }


// os endereços do remetente e destinatário podem ser capturados de uma fonte de dados.
?>