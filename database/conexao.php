<?php

 define('HOST', 'projetosm4.mysql.database.azure.com');
 define('USUARIO', 'koudaltz');
 define('SENHA', 'Daniel@1234');
 define('DB', ' ');

 $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Conexão falhou!');
// ?>
