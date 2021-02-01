<?php
  include 'config.php';
    /*
    PENDING - Aguardando pagamentoRECEIVED - Recebida (saldo já creditado na conta)
    CONFIRMED - Pagamento confirmado (saldo ainda não creditado)
    OVERDUE - Vencida
    REFUNDED - Estornada
    RECEIVED_IN_CASH - Recebida em dinheiro (não gera saldo na conta)
    REFUND_REQUESTED - Estorno Solicitado
    CHARGEBACK_REQUESTED - Recebido chargeback
    CHARGEBACK_DISPUTE - Em disputa de chargeback (caso sejam apresentados documentos para contestação)
    AWAITING_CHARGEBACK_REVERSAL - Disputa vencida, aguardando repasse da adquirente
    DUNNING_REQUESTED - Em processo de recuperação
    DUNNING_RECEIVED - Recuperada
    AWAITING_RISK_ANALYSIS - Pagamento em análise
    */
    function GeraCobranca($customer,$value,$dueDate,$description,$externalReference,$installmentCount,$installmentValue,$discount_value,$dueDateLimitDays,$type,$interest_percent,$fine_percent,$postalService){
      /*fixed    string Valor fixo <> PERCENTAGE string Valor percentual*/
      $desconto = array("value"                => $discount_value,
                        "dueDateLimitDays"     => $dueDateLimitDays,
                        "type"                 => $type);

      /*Percentual de juros ao mês sobre o valor da cobrança para pagamento após o vencimento*/
      $juros = array("value" => $interest_percent);

      /*Percentual de multa sobre o valor da cobrança para pagamento após o venciment0*/
      $juros_apos_vencimento =  array("value"=> $fine_percent);

      $post = array("customer"          => $customer,
                    "billingType"       => "BOLETO",
                    "value"             => $value,
                    "dueDate"           => $dueDate,
                    "description"       => $description,
                    "externalReference" => $externalReference,
                    "installmentCount"  => $installmentCount,
                    "installmentValue"  => $installmentValue,
                    "discount"          => $desconto,
                    "interest"          => $juros,
                    "fine"              => $juros_apos_vencimento,
                    "postalService"     => $postalService);
      $post = json_encode($post);
      $ch = curl_init();
      curl_setopt($ch,CURLOPT_URL,"$url/payments");
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

function RemoveBoleto($id_pay){
  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,"$url/payments/$id_pay");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","access_token:$token"));
  $response = curl_exec($ch);
  curl_close($ch);
  $response = trim($response);
  return $response;
}
function LiquidarBoleto($id_pay,$paymentDate,$value,$notifyCustomer){
  $post = array("paymentDate"    => $paymentDate,
                "value"          => $value,
                "notifyCustomer" => $notifyCustomer);
  $post = json_encode($post);
  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,"$url/payments/$id_pay/receiveInCash");
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



  function BoletoUnico($id_pay){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,"$url/payments/$id_pay");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","access_token:$token"));
    $response = curl_exec($ch);
    curl_close($ch);
    $response = trim($response);
    return $response;
  }

  function ListarCobrancas($token,$tipo,$atributo){
    switch ($tipo) {
      case 'idCliente':
      $linkbase = "$url/payments?customer=$atributo";
      break;
      case 'formaPagamento':
      $linkbase = "$url/payments?billingType=$atributo";
      break;
      case 'status':
      $linkbase = "$url/payments?status=$atributo";
      break;
      case 'idExterno':
      $linkbase = "$url/payments?externalReference=$atributo";
      break;
    }
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,"$linkbase");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","access_token:$token"));
    $response = curl_exec($ch);
    curl_close($ch);
    $response = trim($response);
    return $response;
  }



  function RemoveBoletosParcelados($token,$installments) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$url/installments/$installments");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","access_token:$token"));
    $response = curl_exec($ch);
    curl_close($ch);
    $response = trim($response);
    return $response;
  }



?>
