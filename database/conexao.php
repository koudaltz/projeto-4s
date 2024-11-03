<?php

define('HOST', '127.0.0.1');
define('USUARIO', 'adtra');
define('SENHA', 'adtra');
define('DB', 'gerenciamento_frota');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Conexão falhou!');
?>
