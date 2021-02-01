<?php
include  'functions/cliente.php';
/*
name required string Nome do cliente
cpfCnpj required string CPF ou CNPJ do cliente
email string Email do cliente
phone string Fone fixo
mobilePhone string Fone celular
address string Logradouro
addressNumber string Número do endereço
complement string Complemento do endereço
province string Bairro
postalCode string CEP do endereço
externalReference string Identificador do cliente no seu sistema
notificationDisabled boolean true para desabilitar o envio de notificações de cobranca
additionalEmails string Emails adicionais para envio de notificações de cobrança separados por ","
municipalInscription string Inscrição municipal do cliente
stateInscription string Inscrição estadual do cliente
*/

$id_cliente            = $_POST["id_cliente"];
$name                  = $_POST["name"];
$email                 = $_POST["email"];
$phone                 = $_POST["phone"];
$mobilePhone           = $_POST["mobilePhone"];
$cpfCnpj               = $_POST["cpfCnpj"];
$postalCode            = $_POST["postalCode"];
$address               = $_POST["address"];
$province              = $_POST["province"];
$addressNumber         = $_POST["addressNumber"];
$complement            = $_POST["complement"];
$externalReference     = $_POST["externalReference"];
$notificationDisabled  = $_POST["notificationDisabled"];
$additionalEmails      = $_POST["additionalEmails"];
$municipalInscription  = $_POST["municipalInscription"];
$stateInscription      = $_POST["stateInscription"];

print AtualizaCliente($id_cliente,$name,$email,$phone,$mobilePhone,$cpfCnpj,$postalCode,$address,$addressNumber,$complement,$province,$externalReference,$notificationDisabled,$additionalEmails,$municipalInscription,$stateInscription);



?>
