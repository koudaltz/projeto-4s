<?php 
  session_start();

  require '../database/conexao.php';

  if(isset($_POST['enviar-boletim'])) {

    // Validando e formatando a data

    $login = mysqli_real_escape_string($conexao, trim($_POST['login-boletim']));
    $lotacao = mysqli_real_escape_string($conexao, trim($_POST['id-lotacao-boletim']));
    $veiculo = mysqli_real_escape_string($conexao, trim($_POST['id-veiculo-boletim']));
    $destino = mysqli_real_escape_string($conexao, trim($_POST['destino-boletim']));

    $dataCheckIn = mysqli_real_escape_string($conexao, trim($_POST['data-checkin-boletim']));
    $dataCheckOut = mysqli_real_escape_string($conexao, trim($_POST['data-checkout-boletim']));

    $horarioCheckIn = mysqli_real_escape_string($conexao, trim($_POST['horario-checkin-boletim']));
    $horarioCheckOut = mysqli_real_escape_string($conexao, trim($_POST['horario-checkout-boletim']));
    
    $kmCheckIn = mysqli_real_escape_string($conexao, trim($_POST['km-checkin-boletim']));
    $kmCheckOut = mysqli_real_escape_string($conexao, trim($_POST['km-checkout-boletim']));
  
    $observacaoCheckIn = mysqli_real_escape_string($conexao, trim($_POST['observacao-checkin-boletim']));
    $observacaoCheckOut = mysqli_real_escape_string($conexao, trim($_POST['observacao-checkout-boletim']));

    $query = "INSERT INTO boletim 
      (
        id_lotacao, 
        id_frota, 
        login, 
        destino, 
        data_de_checkin, 
        data_de_checkout, 
        horario_de_checkin, 
        horario_de_checkout, 
        km_inicial, 
        km_final, 
        observacoes_iniciais, 
        observacoes_finais 
      ) 
      VALUES 
      (
        $lotacao,
        $veiculo,
        '$login',
        '$destino',
        '$dataCheckIn',
        '$dataCheckOut',
        '$horarioCheckIn',
        '$horarioCheckOut',
        $kmCheckIn,
        $kmCheckOut,
        '$observacaoCheckIn',
        '$observacaoCheckOut'
      )";
      // echo $query;

      $caminho = "/";
      setcookie('checkIn', '', 1, $caminho);
      setcookie('checkOut', '', 1, $caminho);
      
      mysqli_query($conexao, $query);
    if(mysqli_affected_rows($conexao) > 0) {
      $_SESSION['mensagem_sucesso'] = "Boletim criado com sucesso!";

      header("Location: ../index.php");
      exit();
    } else {
      $_SESSION['mensagem_erro'] = "Falha ao criar boletim!";

      header("Location: ../index.php");
      exit();
    }
  }
?>