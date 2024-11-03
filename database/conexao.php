<?php

 define('HOST', 'projetosm4.database.windows.net');
 define('USUARIO', 'koudaltz');
 define('SENHA', 'Daniel@1234');
 define('DB', 'gerenciamento_frota');

 $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Conexão falhou!');
// ?>
