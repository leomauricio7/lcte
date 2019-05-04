<?php
$subject = $_REQUEST['subject'] . ' Suporte - Licitação Ceará-Mirim'; // Subject of your email
$to = 'contato@marcelolimawebdesign.com.br';  //Recipient's E-mail

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "From: " . $_REQUEST['email'] . "\r\n"; // Sender's E-mail
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$message .= 'Nome: ' . $_REQUEST['nome'] . "<br>";
$message .= 'Assunto: ' . $_REQUEST['assunto'] . "<br>";
$message .= 'Mensagem: <br>' . $_REQUEST['msg'];

if (@mail($to, $subject, $message, $headers))
{
	// Transfer the value 'sent' to ajax function for showing success message.
	echo 'sent';
}
else
{
	// Transfer the value 'failed' to ajax function for showing error message.
	echo 'failed';
}
?>