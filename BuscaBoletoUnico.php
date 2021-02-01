<?php
include  'functions/cobranca.php';
/*
  id_pay  Sting  Identificador único da cobrança no Asaas
  Os status possíveis de uma cobrança são os seguintes:
  PENDING - Aguardando pagamento
  RECEIVED - Recebida (saldo já creditado na conta)
  CONFIRMED - Pagamento confirmado (saldo ainda não creditado)
  OVERDUE - VencidaREFUNDED - Estornada
  RECEIVED_IN_CASH - Recebida em dinheiro (não gera saldo na conta)
  REFUND_REQUESTED - Estorno Solicitado
  CHARGEBACK_REQUESTED - Recebido chargeback
  CHARGEBACK_DISPUTE - Em disputa de chargeback (caso sejam apresentados documentos para contestação)
  AWAITING_CHARGEBACK_REVERSAL - Disputa vencida, aguardando repasse da adquirente
  DUNNING_REQUESTED - Em processo de recuperaçãoDUNNING_RECEIVED - Recuperada
  AWAITING_RISK_ANALYSIS - Pagamento em análise
*/

$id_pay  = $_POST["id_pay"];
print BoletoUnico($id_pay);



?>
