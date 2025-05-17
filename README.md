# Asaas Payment Gateway API

**Autor:** Jonathan Rodrigues

## 📖 Visão Geral

Esta biblioteca em PHP facilita a integração com o sistema de pagamentos [Asaas](https://www.asaas.com/), permitindo operações como cadastro de clientes, geração de cobranças, liquidação de boletos e tratamento de webhooks.

## 🚀 Funcionalidades

- **Gestão de Clientes:** Criar, atualizar, buscar e listar clientes.
- **Cobranças:** Gerar, consultar e remover cobranças.
- **Pagamentos:** Liquidar cobranças e cancelar boletos parcelados.
- **Webhooks:** Receber notificações em tempo real via webhook.

## 🛠️ Requisitos

- PHP 5.5 ou superior
- Extensão cURL habilitada
- Chave da API Asaas (disponível no painel da sua conta)

## 📦 Instalação

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/jonathanrodrigues12/asaas-payment-gateway-api.git
   ```

2. **Configure sua chave da API Asaas:**

   - Localize o arquivo ou trecho onde a chave da API é usada nas funções.
   - Substitua pela sua chave pessoal do Asaas.

## 📁 Estrutura de Pastas

```
asaas-payment-gateway-api/
├── functions/
│   ├── AtualizaCliente.php
│   ├── BuscaBoletoUnico.php
│   ├── BuscaClienteUnico.php
│   ├── GeraBoleto.php
│   ├── InsereCliente.php
│   ├── LiquidarBoleto.php
│   ├── ListaCliente.php
│   ├── RemoveBoleto.php
│   ├── RemoveBoletosParcelados.php
├── exemplosretornos.php
├── webhook_retorno.php
├── README.md
```

## 🧪 Exemplos de Uso

### 1. Inserir um novo cliente

```php
require_once 'functions/InsereCliente.php';

$dadosCliente = [
    'name' => 'João da Silva',
    'email' => 'joao@email.com',
    'cpfCnpj' => '12345678900',
    'phone' => '11999999999',
    'address' => 'Rua Exemplo, 123',
    'postalCode' => '12345678',
    'province' => 'São Paulo',
    'externalReference' => 'REF123'
];

$resposta = insertCustomer($dadosCliente);
print_r($resposta);
```

### 2. Gerar um boleto

```php
require_once 'functions/GeraBoleto.php';

$dadosBoleto = [
    'customer' => 'cus_000005123456',
    'billingType' => 'BOLETO',
    'dueDate' => '2025-06-30',
    'value' => 150.00,
    'description' => 'Mensalidade'
];

$resposta = generateInvoice($dadosBoleto);
print_r($resposta);
```

### 3. Tratar Webhook de retorno

```php
require_once 'webhook_retorno.php';

$payload = file_get_contents('php://input');
$headers = getallheaders();

handleWebhook($payload, $headers);
```

## 📌 Observações

- Verifique se o servidor tem permissão para realizar requisições externas via cURL.
- Sempre sanitize e valide os dados de entrada para evitar vulnerabilidades.
- Para mais informações, consulte a [documentação oficial da API Asaas](https://docs.asaas.com/).

## 🤝 Contribuições

Contribuições são bem-vindas! Faça um fork, crie sua branch e envie um pull request com melhorias ou correções.

## 📄 Licença

Este projeto está licenciado sob os termos da [Licença MIT](LICENSE).
