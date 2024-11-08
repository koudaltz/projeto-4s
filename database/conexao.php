<?php

define('HOST', 'projetosm4.mysql.database.azure.com');
define('USUARIO', 'koudaltz');
define('SENHA', 'Daniel123@');
define('DB', 'gerenciamento_frota');
define('PORT', 3306);

$conexao = mysqli_init();
mysqli_ssl_set($conexao, NULL, NULL, NULL, NULL, NULL);
mysqli_real_connect($conexao, HOST, USUARIO, SENHA, DB, PORT, NULL, MYSQLI_CLIENT_SSL);

if (mysqli_connect_errno($conexao)) {
    die('Falha na conexão: ' . mysqli_connect_error());
}

echo 'Conexão bem-sucedida!';

mysqli_close($conexao);

?>
