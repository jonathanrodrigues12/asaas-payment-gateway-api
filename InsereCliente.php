<?php
include  'functions/cliente.php';
  /*
  Caso você envie o postalCode do cliente, não é necessário enviar os atributos city,
  province e address, pois o ASAAS preencherá estas informações automaticamente com
  base no CEP que você informou.
  token - TOKEN GERADO PELO ASAAS
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
  groupName string Nome do grupo ao qual o cliente pertence
  */

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
  $externalReference     =$_POST["externalReference"];
  $notificationDisabled  =$_POST["notificationDisabled"];
  $additionalEmails      =$_POST["additionalEmails"];
  $municipalInscription  = $_POST["municipalInscription"];
  $stateInscription      = $_POST["stateInscription"];

  print  novoCliente($name,$email,$phone,$mobilePhone,$cpfCnpj,$postalCode,$address,$addressNumber,$complement,$province,$externalReference,$notificationDisabled,$additionalEmails,$municipalInscription,$stateInscription);



?>
