<?php
include  'functions/cobranca.php';
/*
  id_pay string Identificador unico do Boleto
  paymentDate string data do pagamento
  value  string valor pago
  notifyCustomer Boolean envia notificacao para o cliente
*/

$id_pay         = $_POST["id_pay"];
$paymentDate    = $_POST["paymentDate"];
$value          = $_POST["VALUE"];
$notifyCustomer = $_POST["notifyCustomer"];
print LiquidarBoleto($id_pay,$paymentDate,$value,$notifyCustomer);



?>
