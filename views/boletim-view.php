<?php

if (isset($_COOKIE['checkIn'])) {
  $valorCookie = json_decode($_COOKIE['checkIn'], true); // Converte a string JSON de volta para um array

  // Acesse os valores do array
  $lotacao = $valorCookie['lotacao'];
  $veiculo = $valorCookie['veiculo'];
  $usuario = $valorCookie['usuario'];
  $destinoCheckIn = $valorCookie['destino'];
  $dataCheckIn = $valorCookie['data-checkIn'];
  $horarioCheckIn = $valorCookie['horario-checkIn'];
  $odometroCheckIn = $valorCookie['odometro-checkIn'];
  $observacaoCheckIn = $valorCookie['observacao-checkIn'];
}

if (isset($_COOKIE['checkOut'])) {
  $valorCookie = json_decode($_COOKIE['checkOut'], true); // Converte a string JSON de volta para um array

  // Acesse os valores do array
  $dataCheckOut = $valorCookie['data-checkOut'];
  $horarioCheckOut = $valorCookie['horario-checkOut'];
  $odometroCheckOut = $valorCookie['odometro-checkOut'];
  $observacaoCheckOut = $valorCookie['observacao-checkOut'];
}
?>

<div id="Boletim" class="tabs" style="display:none">
  <div class="container-form">
    <form action="controllers/boletim.php" method="POST">
      <h2>Boletim</h2>
      <h3>Check-in <span>*</span></h3>
      <?php

      if (isset($_COOKIE['checkIn'])) {
      ?>
        <div>
          <label for="login-boletim" class="lbl">Usuário:</label>
          <input type="text" name="login-boletim" id="login-boletim" value="<?php echo htmlspecialchars($usuario); ?>" required readonly>
        </div>
        <div class="data-horario-boletim">
          <div class="data-horario-checkin-boletim">
            <div>
              <label for="data-checkin-boletim" class="lbl">Data:</label>
              <input type="date" name="data-checkin-boletim" id="data-checkin-boletim" value="<?php echo htmlspecialchars($dataCheckIn); ?>" required readonly>
            </div>
            <div>
              <label for="horario-checkin-boletim" class="lbl">Horário:</label>
              <input type="time" name="horario-checkin-boletim" id="horario-checkin-boletim" placeholder="00:00" maxlength="5" minlength="5" value="<?php echo htmlspecialchars($horarioCheckIn); ?>" required readonly>
            </div>
          </div>
        </div>

        <div class="select-checkin-boletim">
          <div style="display: none;">
            <label for="id-lotacao-boletim" class="lbl">Lotação:</label>
            <input name="id-lotacao-boletim" id="id-lotacao-boletim" value="<?php echo htmlspecialchars($lotacao); ?>" required readonly>
          </div>

          <div>
            <label for="lotacao-boletim" class="lbl">Lotação:</label>
            <?php
            $query = "SELECT * FROM lotacao WHERE status = 'ativo' AND id = '$lotacao'";

            $lotacaoSigla = mysqli_query($conexao, $query);

            if ($lotacaoSigla && mysqli_num_rows($lotacaoSigla) > 0) {
              $lotacao = mysqli_fetch_assoc($lotacaoSigla);
              $siglaLotacao = htmlspecialchars($lotacao['sigla']);
            } else {
              $siglaLotacao = 'Não encontrado';
            }
            ?>
            <input name="lotacao-boletim" id="lotacao-boletim" value="<?php echo $siglaLotacao; ?>" required readonly>
          </div>

          <div style="display: none;">
            <label for="id-veiculo-boletim" class="lbl">Veículo:</label>
            <input name="id-veiculo-boletim" id="id-veiculo-boletim" value="<?php echo htmlspecialchars($veiculo); ?>" required readonly>
          </div>
          <div>
            <label for="veiculo-boletim" class="lbl">Veículo:</label>
            <?php
            $query = "SELECT * FROM frota WHERE status = 'ativo' AND id = '$veiculo'";

            $veiculoModelo = mysqli_query($conexao, $query);

            if ($veiculoModelo && mysqli_num_rows($veiculoModelo) > 0) {
              $veiculo = mysqli_fetch_assoc($veiculoModelo);
              $modeloVeiculo = htmlspecialchars($veiculo['modelo']);
              $placaVeiculo = htmlspecialchars($veiculo['placa']);
            } else {
              $modeloVeiculo = 'Não encontrado';
            }
            ?>
            <input name="veiculo-boletim" id="veiculo-boletim" value="<?php echo $modeloVeiculo . '/' . $placaVeiculo; ?>" required readonly>
          </div>
        </div>

        <div class="odometro-destino-checkin-boletim">
          <div>
            <label for="km-checkin-boletim" class="lbl">Odômetro:</label>
            <input type="number" name="km-checkin-boletim" id="km-checkin-boletim" placeholder="KM" value="<?php echo htmlspecialchars($odometroCheckIn); ?>" required readonly>
          </div>
          <div>
            <label for="destino-boletim" class="lbl">Destino:</label>
            <input type="text" name="destino-boletim" id="destino-boletim" value="<?php echo htmlspecialchars($destinoCheckIn); ?>" required readonly>
          </div>
        </div>
        <div>
          <label for="observacao-checkin-boletim" class="lbl">Observação check-in:</label>
          <input type="text" name="observacao-checkin-boletim" id="observacao-checkin-boletim" value="<?php echo htmlspecialchars($observacaoCheckIn); ?>" readonly>
        </div>

      <?php

      } else {
        echo '<p style="color:red;">Faça o check-in</p>';
      }
      ?>
      <h3>Check-out <span>*</span></h3>
      <?php

      if (isset($_COOKIE['checkOut'])) {
      ?>
        <div class="checkout-boletim">
          <div class="data-horario-km-boletim">
            <div>
              <label for="data-checkout-boletim" class="lbl">Data:</label>
              <input type="date" name="data-checkout-boletim" id="data-checkout-boletim" value="<?php echo htmlspecialchars($dataCheckOut); ?>" required readonly>
            </div>
            <div>
              <label for="horario-checkout-boletim" class="lbl">Horário: </label>
              <input type="time" name="horario-checkout-boletim" id="horario-checkout-boletim" placeholder="00:00" maxlength="5" minlength="5" value="<?php echo htmlspecialchars($horarioCheckOut); ?>" required readonly>
            </div>
            <div>
              <label for="km-checkout-boletim" class="lbl">Odômetro:</label>
              <input type="number" name="km-checkout-boletim" id="km-checkout-boletim" placeholder="KM" value="<?php echo htmlspecialchars($odometroCheckOut); ?>" required readonly>
            </div>
          </div>
          <div>
            <label for="observacao-checkout-boletim" class="lbl">Observação check-out:</label>
            <input type="text" name="observacao-checkout-boletim" id="observacao-checkout-boletim" value="<?php echo htmlspecialchars($observacaoCheckOut); ?>" readonly>
          </div>
        </div>

      <?php

      } else {
        echo '<p style="color:red;">Faça o check-Out</p>';
      }
      ?>


      <?php

      if (isset($_COOKIE['checkIn']) && isset($_COOKIE['checkOut'])) {

      ?>
        <button type="submit" class="botao-enviar" id="enviar-boletim" name="enviar-boletim">Enviar</button>
      <?php
      }
      ?>

    </form>
  </div>
</div>

<style>
  h3 {
    color: #2C3D7F;
  }

  body {
    overflow: scroll;
  }

  .checkout-boletim {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .data-horario-km-boletim,
  .odometro-destino-checkin-boletim,
  .data-horario-checkin-boletim,
  .select-checkin-boletim {
    display: flex;
    gap: 10px;
  }

  #data-checkin-boletim,
  #horario-checkin-boletim,
  #lotacao-boletim,
  #veiculo-boletim {
    width: 195px;
  }

  #km-checkin-boletim {
    width: 100px;
  }

  #destino-boletim {
    width: 292px;
  }



  #data-checkout-boletim,
  #horario-checkout-boletim,
  #km-checkout-boletim {
    width: 127px;
  }

  @media screen and (max-width: 420px) {
    body {
      overflow: scroll;
    }

    #login-boletim,
    #observacao-checkin-boletim,
    #observacao-checkout-boletim {
      width: 320px;
    }

    #data-checkin-boletim,
    #horario-checkin-boletim {
      width: 155px;
    }

    #lotacao-boletim {
      width: 100px;
    }

    #veiculo-boletim {
      width: 210px;
    }

    #km-checkin-boletim {
      width: 60px;
    }

    #destino-boletim {
      width: 220px;
    }

    #km-checkout-boletim {
      width: 127px;
    }

    #horario-checkout-boletim,
    #km-checkout-boletim {
      width: 87px;
    }
  }

  /* @media screen and (max-width: 340px) { */
  /* body {
      overflow: scroll;
    }

    .data-horario-km-boletim,
    .odometro-destino-checkin-boletim {
      flex-direction: column;
    }

    #data-checkin-boletim,
    #horario-checkin-boletim {
      width: 120px;
    }

    #lotacao-boletim {
      width: 70px;
    }

    #veiculo-boletim {
      width: 170px;
    }


    #km-checkin-boletim,
    #destino-boletim,
    #observacao-checkin-boletim,
    #data-checkout-boletim,
    #horario-checkout-boletim,
    #km-checkout-boletim,
    #observacao-checkout-boletim,
    #login-boletim {
      width: 250px;
    } */

  /* } */
</style>