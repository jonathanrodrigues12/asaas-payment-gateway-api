<?php
include 'config.php';
function novoCliente($name,$email,$phone,$mobilePhone,$cpfCnpj,$postalCode,$address,$addressNumber,$complement,$province,$externalReference,$notificationDisabled,$additionalEmails,$municipalInscription,$stateInscription){
  $post = array("name"                 => $name,
                "email"                => $email,
                "phone"                => $phone,
                "mobilePhone"          => $mobilePhone,
                "cpfCnpj"              => $cpfCnpj,
                "postalCode"           => $postalCode,
                "address"              => $address,
                "addressNumber"        => $addressNumber,
                "complement"           => $complement,
                "province"             => $province,
                "externalReference"    => $externalReference,
                "notificationDisabled" => $notificationDisabled,
                "additionalEmails"     => $additionalEmails,
                "municipalInscription" => $municipalInscription,
                "stateInscription"     => $stateInscription);
  $post = json_encode($post);

  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,"$url/customers");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","access_token:$token"));
  $response = curl_exec($ch);
  curl_close($ch);
  return $response;
}

function clienteUnico($id_cliente_asaas){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "$url/customers/id$id_cliente_asaas");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","access_token:$token"));
  $response = curl_exec($ch);
  curl_close($ch);
  $response = trim($response);
  return $response;
}

function listaClientes($tipo,$atributos){
  switch (trim($tipo)) {
    case 'name':
    $link = "$url/customers?name=$atributos";
    break;
    case "email":
    $link = "$url/customers?email=$atributos";
    break;
    case "cpfCnpj":
    $link = "$url/customers?cpfCnpj=$atributos";
    break;
    case "externalReference":
    $link = "$url/customers?externalReference=$atributos";
    break;
  }
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "$link");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","access_token:$token"));
  $response = curl_exec($ch);
  curl_close($ch);
  return $response;
}

function AtualizaCliente($id_cliente,$name,$email,$phone,$mobilePhone,$cpfCnpj,$postalCode,$address,$addressNumber,$complement,$province,$externalReference,$notificationDisabled,$additionalEmails,$municipalInscription,$stateInscription){
  $post = array("name"                 => $name,
                "email"                => $email,
                "phone"                => $phone,
                "mobilePhone"          => $mobilePhone,
                "cpfCnpj"              => $cpfCnpj,
                "postalCode"           => $postalCode,
                "address"              => $address,
                "addressNumber"        => $addressNumber,
                "complement"           => $complement,
                "province"             => $province,
                "externalReference"    => $externalReference,
                "notificationDisabled" => $notificationDisabled,
                "additionalEmails"     => $additionalEmails,
                "municipalInscription" => $municipalInscription,
                "stateInscription"     => $stateInscription);
  $post = json_encode($post);
  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,"$url/customers/$id_cliente");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","access_token:$token"));
  $response = curl_exec($ch);
  curl_close($ch);
  $response = trim($response);
  return $response;
}

?>
