<div id="Check-Out" class="tabs" style="display:none">
  <div class="container-form">
    <form action="controllers/checkOut.php" method="POST">
      <h2>Check-Out</h2>

      <?php

      if (isset($_COOKIE['checkIn'])) {
      ?>
        <div class="data-horario-checkIn">
          <div>
            <label for="data-checkOut" class="lbl">Data<span>*</span></label>
            <input type="date" name="data-checkOut" id="data-checkOut" required>
          </div>
          <div>
            <label for="horario-checkIn" class="lbl">Horário <span>*</span></label>
            <input type="time" name="horario-checkOut" id="horario-checkOut" placeholder="00:00" maxlength="5" minlength="5" required>
          </div>
          <div>
            <label for="km-checkOut" class="lbl">Odômetro<span>*</span></label>
            <input type="number" name="km-checkOut" id="km-checkOut" placeholder="KM" required>
          </div>
        </div>
        <div>
          <label for="observacao-checkOut" class="lbl">Observação Final</label>
          <input type="text" name="observacao-checkOut" id="observacao-checkOut">
        </div>
        <button type="submit" class="botao-enviar" id="enviar-checkOut" name="enviar-checkOut">Enviar</button>
      <?php

      } else {
        echo '<p style="color:red;">Faça o check-in</p>';
      }
      ?>

    </form>
  </div>
</div>

<style>
  #data-checkOut,
  #horario-checkOut,
  #km-checkOut {
    width: 128px;
  }

  @media screen and (max-width: 420px) {

    #observacao-checkOut {
      width: 320px;
    }

    #km-checkout {
      width: 127px;
    }

    #horario-checkOut,
    #km-checkOut {
      width: 87px;
    }
  }
</style>