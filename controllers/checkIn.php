<?php 
  session_start();

  require '../database/conexao.php';

  if(isset($_POST['enviar-checkIn'])) {
    // $usuario = mysqli_real_escape_string($conexao, trim($_POST['login-checkIn']));
    // $data = mysqli_real_escape_string($conexao, trim($_POST['data-checkIn'])); // esta campo deve ser date
    // $horario = mysqli_real_escape_string($conexao, trim($_POST['horario-checkIn']));
    // $lotacao = mysqli_real_escape_string($conexao, trim($_POST['lotacao-checkIn'])); // esta campo deve ser int
    // $veiculo = mysqli_real_escape_string($conexao, trim($_POST['veiculo-checkIn'])); // esta campo deve ser int
    // $odometro = mysqli_real_escape_string($conexao, trim($_POST['km-checkIn'])); // esta campo deve ser int
    // $destino = mysqli_real_escape_string($conexao, trim($_POST['destino-checkIn']));
    // $observacao = mysqli_real_escape_string($conexao, trim($_POST['observacao-checkIn']));

    $usuario = mysqli_real_escape_string($conexao, trim($_POST['login-checkIn']));
    // Validando e formatando a data
    $data = trim($_POST['data-checkIn']);
    if (DateTime::createFromFormat('Y-m-d', $data) !== false) {
        $data = mysqli_real_escape_string($conexao, $data);
    } else {
        $data = null; 
    }
    
    $horario = mysqli_real_escape_string($conexao, trim($_POST['horario-checkIn']));
    
    $lotacao = trim($_POST['lotacao-checkIn']);
    if (filter_var($lotacao, FILTER_VALIDATE_INT) !== false) {
        $lotacao = mysqli_real_escape_string($conexao, $lotacao);
    } else {
        $lotacao = null; 
    }
    
    $veiculo = trim($_POST['veiculo-checkIn']);
    if (filter_var($veiculo, FILTER_VALIDATE_INT) !== false) {
        $veiculo = mysqli_real_escape_string($conexao, $veiculo);
    } else {
        $veiculo = null; 
    }
    
    $odometro = trim($_POST['km-checkIn']);
    if (filter_var($odometro, FILTER_VALIDATE_INT) !== false) {
        $odometro = mysqli_real_escape_string($conexao, $odometro);
    } else {
        
        $odometro = null; 
    }

    $destino = mysqli_real_escape_string($conexao, trim($_POST['destino-checkIn']));
    $observacao = mysqli_real_escape_string($conexao, trim($_POST['observacao-checkIn']));

    // $query = "INSERT INTO boletim 
    //   (
        
    //     id_lotacao, 
    //     id_frota, 
    //     login, 
    //     destino, 
    //     data_de_checkin, 
    //     data_de_checkout, 
    //     horario_de_checkin, 
    //     horario_de_checkout, 
    //     km_inicial, 
    //     km_final, 
    //     observacoes_iniciais, 
    //     observacoes_finais, 
    //     observacoes_gerenciais
    //   ) 
    //   VALUES 
    //   (
        
    //     $lotacao,
    //     $veiculo,
    //     '$usuario',
    //     '$destino',
    //     '$data',
    //     '2024-08-21',
    //     '$horario',
    //     '00:00',
    //     $odometro,
    //     0000,
    //     '$observacao',
    //     'a',
    //     'a'
    //   )";

    // echo $query; exit;
    // mysqli_query($conexao, $query);
    // setcookie('checkIn', $lotacao, $veiculo, $usuario, $destino, $data, $horario, $observacao,  time() + (86400 * 30), "/");

    $nomeCookie = 'checkIn';
    $valorCookie = json_encode(array(
      'lotacao' => $lotacao,
      'veiculo' => $veiculo,
      'usuario' => $usuario,
      'destino' => $destino,
      'data-checkIn' => $data,
      'horario-checkIn' => $horario,
      'odometro-checkIn' => $odometro,
      'observacao-checkIn' => $observacao
    )); // Convertendo o array para uma string JSON

    $tempoExpiracao = time() + (86400 * 30); // 30 dias a partir de agora
    $caminho = "/"; // Disponível em todo o domínio
    $dominio = ""; // O domínio padrão
    $seguro = false; // Não usar apenas conexões seguras
    $httponly = true; // Acesso apenas via HTTP

    // Definindo o cookie
    $cookieCriado = setcookie($nomeCookie, $valorCookie, $tempoExpiracao, $caminho, $dominio, $seguro, $httponly);
    
    
    if($cookieCriado) {
      $_SESSION['mensagem_sucesso'] = "Check-In criado com sucesso!";

      header("Location: ../index.php");
      exit();
    } else {
      $_SESSION['mensagem_erro'] = "Falha ao criar Check-In!";

      header("Location: ../index.php");
      exit();
    }
  }
?>