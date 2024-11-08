<?php

define('HOST', 'projetosm4.mysql.database.azure.com');
define('PORT', '3306');
define('USUARIO', 'koudaltz');
define('SENHA', 'Daniel123@');
define('DB', 'gerenciamento_frota');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Conexão falhou!');
?>
