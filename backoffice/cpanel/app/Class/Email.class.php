<?php
class Email{

    public static function sendMailAntigo($array){
        $userEdi = utf8_decode($array['edital']);
        $userEmpresa = utf8_decode($array['empresa']);
        $userCNPJ = $array['cnpj'];
        $userEndereco = utf8_decode($array['endereco']);
        $userResp = utf8_decode($array['nome']);
        $userEmail = $array['email'];
        $userFone1 = $array['phonefixo'];
        $userFone2 = $array['phonecel'];

        $destinatario = "cpl.cearamirim@gmail.com";
        $formato = "\nContent-type: text/html\n";
        $msg = null;

        $msg .= "<h3><b>Protocolo de Retirada de Edital | LCT-e - V 1.0.1</b></h3><br>";
        $msg .= "Edital: <b>$userEdi</b><br>";
        $msg .= "<br>";
        $msg .= "Nome da Empresa: <b>$userEmpresa</b><br>";
        $msg .= "CNPJ: <b>$userCNPJ</b><br>";
        $msg .= "Endereco: <b>$userEndereco</b><br>";
        $msg .= "Responsavel: <b>$userResp</b><br>";
        $msg .= "E-mail: <b>$userEmail</b><br>";
        $msg .= "Telefone: <b>$userFone1</b><br>";
        $msg .= "Celular: <b>$userFone2</b> ";

        if(mail("$destinatario", "Protocolo de Retirada de Edital", "$msg", "from: " . $userEmail . $formato)){
            return true;
        }else{
            return false;
        }
    }

    public static function sendMailAntigoFaleCPL($array){

        $subject = 'Suporte - Licitação Ceará-Mirim'; // Subject of your email
        $to = 'contato@marcelolimawebdesign.com.br';  //Recipient's E-mail
        $headers = null;
        $message = null;
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= "From: " . $array['email']. "\r\n"; // Sender's E-mail
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        $message .= 'Nome: ' . $array['nome'] . "<br>";
        $message .= 'Assunto: ' . $array['assunto'] . "<br>";
        $message .= 'Mensagem: <br>' . $array['msg'];

        if (mail($to, $subject, $message, $headers)){
            return true;
        }else{
            return false;
        }
    }
    
}

?>