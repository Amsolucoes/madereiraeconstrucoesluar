<?php

$Nome       = $_POST["nome"];   // Pega o valor do campo Nome
$Fone       = $_POST["telefone"];   // Pega o valor do campo Telefone
$Email      = $_POST["email"];  // Pega o valor do campo Email
$Itens      = $_POST["itens"]; //Pega o valor do campo item
$Itens2     = $_POST["itens2"];
$Itens3     = $_POST["itens3"];
$Itens4     = $_POST["itens4"];
$Qtd1     = $_POST["qtd1"];
$Qtd2     = $_POST["qtd2"];
$Qtd3     = $_POST["qtd3"];
$Qtd4     = $_POST["qtd4"];

$Vai        = "Nome: $Nome\n\n E-mail: $Email\n\n Telefone: $Fone\n\n Item1: $Itens Quantidade: $Qtd1\n Item2: $Itens2 Quantidade: $Qtd2\nItem3: $Itens3 Quantidade: $Qtd3\nItem4: $Itens4 Quantidade: $Qtd4\n";
 
// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("class/class.phpmailer.php");
 
// Inicia a classe PHPMailer
$mail = new PHPMailer();
 
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
 
try {
     $mail->Host = 'smtp.mail.yahoo.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
     $mail->SMTPSecure = 'ssl';
     $mail->Mailer = "smtp";
     $mail->Port       = 587; //  Usar 587 porta SMTP
     $mail->Username = 'jai1000son'; // Usuário do servidor SMTP (endereço de email)
     $mail->Password = 'MADEIREIRAluar3914'; // Senha do servidor SMTP (senha do email usado)
     $mail->IsHTML(true);
    
 
     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom('jai1000son@yahoo.com.br', 'Madeireira e Construcoes Luar'); //Seu e-mail
     $mail->AddReplyTo('jai1000son@yahoo.com.br', 'Madeireira e Construcoes Luar'); //Seu e-mail
     $mail->Subject = 'Proposta de cliente enviando do site';//Assunto do e-mail
 
 
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress('jai1000son@yahoo.com.br', 'Teste Locaweb');
 
     //Campos abaixo são opcionais 
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
 
 
     //Define o corpo do email
     $mail->MsgHTML (nl2br($Vai)); 
 
     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     //$mail->MsgHTML(file_get_contents('arquivo.html'));
 
     $mail->Send();
     echo "Mensagem enviada com sucesso!!</p>\n";
 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer


}
?>