<?php
  include  'functions/cliente.php';
  /*
    name  Filtrar por nome  String
    email  Filtrar por email  String
    cpfCnpj  Filtrar por CPF ou CNPJ  String
    externalReference  Filtrar pelo Identificar do seu sistema  String
    offset  Elemento inicial da lista  Number  limit  Número de elementos da lista (max: 100)  Number
  */
  $tipo  = $_POST['tipo'];
  $dados = $_POST['busca'];

  print listaClientes($tipo,$dados);



?>
