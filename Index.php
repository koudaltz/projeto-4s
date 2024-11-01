<?php
require './database/conexao.php';
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Monda:wght@400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <title>Gerenciamento de frota</title>
  <style>
    @media screen and (max-width: 540px) {
      header>h1 {
        font-size: 2rem;
      }
    }

    @media screen and (max-width: 360px) {
      header>h1 {
        font-size: 1.7rem;
      }
    }
  </style>
</head>

<body onresize="tamanhoTela()">

  <?php include('./components/navBar.php'); ?>
  <header>
    <h1>Gerenciamento De Frota</h1>
  </header>
  <?php include('./views/checkin-view.php'); ?>
  <?php include('./views/checkout-view.php'); ?>
  <?php include('./views/boletim-view.php'); ?>

  <script>
    function openTab(event, tabName) {
      let i;
      let tabs = document.getElementsByClassName("tabs");
      for (i = 0; i < tabs.length; i++) {
        tabs[i].style.display = "none";
      }
      document.getElementById(tabName).style.display = "block";

      // // Remove a classe 'active' de todos os botões
      // let tablinks = document.getElementsByClassName("tablink");
      // for (i = 0; i < tablinks.length; i++) {
      //     tablinks[i].classList.remove("active");
      // }

      // // Adiciona a classe 'active' ao botão clicado
      // event.currentTarget.classList.add("active");

      // Oculta a mensagem de alerta
      if (document.querySelector('.mensagem')) {

        document.querySelector('.mensagem').style.display = "none";
      }

      // 

    }
  </script>
</body>

</html>