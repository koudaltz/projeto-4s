<?php

define('HOST', 'projetosm4.mysql.database.azure.com');
define('USUARIO', 'koudaltz');
define('SENHA', 'Daniel123@');
define('DB', 'gerenciamento_frota');
define('PORT', 3306);

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Conexão falhou!');
// echo 'Conexão bem-sucedida!';

// mysqli_close($conexao);

?>
