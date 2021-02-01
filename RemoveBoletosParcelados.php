<?php
include  'functions/cobranca.php';
/*
  installments string Identificado do parcelamento
*/

$installments   = $_POST["installments"];
print RemoveBoletosParcelados($installments);



?>
