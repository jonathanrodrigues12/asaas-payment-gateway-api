<?php
include  'functions/cobranca.php';
/*
  customer required string Identificador único do cliente no ASAAS
  billingType required enum Forma de pagamento BOLETO, CREDIT_CARD
  value required number Valor da cobrança
  dueDate required string Data de vencimento da cobrança
  description string Descrição da cobrança
  externalReference string Campo livre para busca
  installmentCount number Número de parcelas (somente no caso de cobrança parcelada)
  installmentValue number Valor de cada parcela (somente no caso de cobrança parcelada)
  discount_value number Valor percentual ou fixo de desconto a ser aplicado sobre o valor da cobrança
  dueDateLimitDays number Dias antes do vencimento para aplicar desconto. Ex: 0 = até o vencimento, 1 = até um dia antes, 2 = até dois dias antes, e assim por diante
  type  number or percent  tipo de desconto valor ou percentual
  interest_percent percentual de juros ao mês sobre o valor da cobrança para pagamento após o vencimento
  fine_percent Percentual de multa sobre o valor da cobrança para pagamento após o vencimento
  postalService boolean Define se a cobrança será enviada via Correios
*/

$customer          = $_POST["customer"];
$billingType       = $_POST["billingType"];
$value             = $_POST["value"];
$dueDate           = $_POST["dueDate"];
$description       = $_POST["description"];
$externalReference = $_POST["externalReference"];
$installmentCount  = $_POST["installmentCount"];
$installmentValue  = $_POST["installmentValue"];
$discount_value    = $_POST["discount_value"];
$dueDateLimitDays  = $_POST["dueDateLimitDays"];
$type              = $_POST["type"];
$interest_percent  = $_POST["interest_percent"];
$fine_percent      = $_POST["fine_percent"];
$postalService     = $_POST["postalService"];

print GeraCobranca($customer,$billingType,$value,$dueDate,$description,$externalReference,$installmentCount,$installmentValue,$discount_value,$dueDateLimitDays,$type,$interest_percent,$fine_percent,$postalService);



?>
