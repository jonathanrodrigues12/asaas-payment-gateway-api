<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, asaas-access-token");
header("Content-Type: application/json; charset=UTF-8");

$method = trim($_SERVER['REQUEST_METHOD']);


switch ($method)
{
    case 'GET':
        http_response_code(404);
        echo json_encode(Array( "API" => "Imóveis Andrade - Asaas WebHook 1.0" ));
        exit;
    break;
    case 'POST':
        $dados  = json_decode(file_get_contents("php://input"), true);
        $event      = $dados['event'];
        $payment    = $dados['payment'];
        switch ($event)
        {
          case "PAYMENT_CREATED":
          echo "PAYMENT_CREATED";
          http_response_code(200);
          break;
          case "PAYMENT_UPDATED":
              // Alteração no vencimento ou valor de cobrança existente
          break;
          case "PAYMENT_CONFIRMED":
          // Cobrança confirmada (somente para cartão de crédito)
          //break;

          case "PAYMENT_RECEIVED":    // Cobrança recebida.
          case "PAYMENT_OVERDUE":     // Cobrança vencida
          case "PAYMENT_DELETED":     // Cobrança removida
          /* SUA NECESSIDADE DE ATAUALIZAÇAO DO WEBHOOK*/

          break;

          case "PAYMENT_REFUNDED":
              // Cobrança estornada (cartão de crédito)
          break;
          case "PAYMENT_CHARGEBACK_REQUESTED":
              // Recebido chargeback
          break;
          case "PAYMENT_CHARGEBACK_DISPUTE":
              // Em disputa de chargeback (caso sejam apresentados documentos para contestação)
          break;
          case "PAYMENT_AWAITING_CHARGEBACK_REVERSAL":
              // Disputa vencida, aguardando repasse da adquirente
          break;
    }
    break;
}
http_response_code(200);



?>
