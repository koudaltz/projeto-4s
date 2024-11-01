<div id="Check-In" class="tabs" style="display:block">

  <div class="container-form">
    <form action="controllers/checkIn.php" method="POST">
      <h2>Check-In</h2>
      <div class="mensagem">
        <?php include('./components/mensagem.php'); ?>
      </div>
      <div>
        <label for="login-checkIn" class="lbl">Usuário<span>*</span></label>
        <input type="text" name="login-checkIn" id="login-checkIn" placeholder="Nome do usuário" required>
      </div>

      <div class="data-horario-checkIn">
        <div>
          <label for="data-checkIn" class="lbl">Data<span>*</span></label>
          <input type="date" name="data-checkIn" id="data-checkIn" class="data-horario" required>
        </div>
        <div>
          <label for="horario-checkIn" class="lbl">Horário <span>*</span></label>
          <input type="time" name="horario-checkIn" id="horario-checkIn" class="data-horario" placeholder="00:00" maxlength="5" minlength="5" required>
        </div>
      </div>

      <div class="select-checkIn">
        <div>
          <label for="lotacao-checkIn" class="lbl">Lotação<span>*</span></label>
          <select name="lotacao-checkIn" id="lotacao-checkIn" required>

            <?php
            $query = "SELECT * FROM lotacao WHERE status = 'ativo'";

            // echo $query; exit;
            $lotacoes = mysqli_query($conexao, $query);
            if (mysqli_num_rows($lotacoes) > 0) {

              foreach ($lotacoes as $lotacao) {
            ?>


                <option value="<?= $lotacao['id'] ?>"><?= $lotacao['sigla'] ?></option>


            <?php
              }
            } else {
              echo '<option >Nenhum valor encontrado</option>';
            }
            ?>
          </select>
        </div>

        <div>
          <label for="veiculo-checkIn" class="lbl">Veículo<span>*</span></label>
          <select name="veiculo-checkIn" id="veiculo-checkIn" required>
            <?php
            $query = "SELECT * FROM frota WHERE status = 'ativo'";

            $frotas = mysqli_query($conexao, $query);
            // echo $frotas; exit;
            if (mysqli_num_rows($frotas) > 0) {

              foreach ($frotas as $frota) {
            ?>
                <option value="<?= $frota['id'] ?>"><?= $frota['modelo'] ?> / <?= $frota['placa'] ?> </option>
            <?php
              }
            } else {
              echo '<option >Nenhum valor encontrado</option>';
            }
            ?>
          </select>
        </div>

      </div>
      <div class="km-destino">
        <div>
          <label for="km-checkIn" class="lbl">Odômetro<span>*</span></label>
          <input type="number" name="km-checkIn" id="km-checkIn" placeholder="KM" required>
        </div>
        <div>
          <label for="destino-checkIn" class="lbl">Destino<span>*</span></label>
          <input type="text" name="destino-checkIn" id="destino-checkIn" required>
        </div>
      </div>
      <div>
        <label for="observacao-checkIn" class="lbl">Observação</label>
        <input type="text" name="observacao-checkIn" id="observacao-checkIn">
      </div>
      <button type="submit" class="botao-enviar" id="enviar-checkIn" name="enviar-checkIn">Enviar</button>
    </form>
  </div>
</div>

<style>
  @media screen and (max-width: 420px) {
    body {
      overflow: scroll;
    }

    #login-checkIn,
    #observacao-checkIn {
      width: 320px;
    }

    #horario-checkIn,
    #data-checkIn,
    #lotacao-checkIn,
    #veiculo-checkIn {
      width: 155px;
    }

    #km-checkIn {
      width: 60px;
    }

    #destino-checkIn {
      width: 220px;
    }

  }
</style>