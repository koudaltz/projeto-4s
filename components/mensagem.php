<?php
if (isset($_SESSION['mensagem_sucesso'])):
?>
  <div>
    <p style="color: green;"><?php echo $_SESSION['mensagem_sucesso']; ?></p>
  </div>
<?php
endif;
?>

<?php
if (isset($_SESSION['mensagem_erro'])):
?>
  <div>
    <p style="color: green;"><?php echo $_SESSION['mensagem_erro']; ?></p>
  </div>
<?php
endif;
?>