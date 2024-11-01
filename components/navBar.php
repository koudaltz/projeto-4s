<nav class="menu-container" role="navigation">
  <div class="img"></div>

  <button class="nav-button menu-pc tablink" id="checkin" onclick="openTab(event, 'Check-In')">Check-In</button>
  <button class="nav-button menu-pc tablink" id="checkout" onclick="openTab(event, 'Check-Out')">Check-Out</button>
  <button class="nav-button menu-pc tablink" id="boletim" onclick="openTab(event, 'Boletim')">Boletim</button>


  <div class="icone-mobile">
    <button class="botao-mobile">
      <svg class="hamburger" style="display:block;" xmlns="http://www.w3.org/2000/svg" height="50" width="48" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
        <path fill="#ffffff" d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
      </svg>
      <svg class="xis" style="display:none;" xmlns="http://www.w3.org/2000/svg" height="50" width="48" viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
        <path fill="#ffffff" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
      </svg>
    </button>
  </div>

</nav>
<div class="menu-mobile" style="display:none">
  <button class="nav-button menu-mob tablink" id="checkin" onclick="openTab(event, 'Check-In'); fechaMenu()">Check-In</button>
  <button class="nav-button menu-mob tablink" id="checkout" onclick="openTab(event, 'Check-Out'); fechaMenu()">Check-Out</button>
  <button class="nav-button menu-mob tablink" id="boletim" onclick="openTab(event, 'Boletim'); fechaMenu()">Boletim</button>
</div>

<script>
  const botaoMobile = document.querySelector('.botao-mobile');
  const xis = document.querySelector('.xis');
  const hamburger = document.querySelector('.hamburger');
  const menuMobile = document.querySelector('.menu-mobile');
  // const botaoNav = document.querySelector('.menu-mob');

  function tamanhoTela() {

    if (window.innerWidth >= 599) {
      botaoMobile.classList.remove('active');
      menuMobile.style.display = 'none';
    } else {
      hamburger.style.display = 'block';
      xis.style.display = 'none';
    }

  }

  function fechaMenu() {
    if (botaoMobile.classList.contains('active')) {
      botaoMobile.classList.remove('active');

      hamburger.style.display = 'block';
      xis.style.display = 'none';
      menuMobile.classList.add('fadeOut');
      setTimeout(() => {
        menuMobile.style.display = 'none';
      }, "100");
    }
  }

  botaoMobile.addEventListener('click', () => {

    if (hamburger.style.display == 'block') {
      hamburger.style.display = 'none';
      xis.style.display = 'block';
    } else {
      hamburger.style.display = 'block';
      xis.style.display = 'none';
    }

    if (botaoMobile.classList.contains('active')) {

      botaoMobile.classList.remove('active');
      menuMobile.classList.remove('fadeIn');
      setTimeout(() => {
        menuMobile.style.display = 'none';
      }, "100");
      menuMobile.classList.add('fadeOut');
    } else {

      botaoMobile.classList.add('active');
      menuMobile.classList.add('fadeIn');
      menuMobile.classList.remove('fadeOut');
      menuMobile.style.display = 'flex';
    }
  })

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
  }
</script>

<style>
  .icone-mobile {
    display: none;
  }

  @media screen and (max-width: 500px) {
    .menu-pc {
      display: none;
    }

    .icone-mobile {
      display: block;
    }

    .menu-container {
      justify-content: space-between;
      padding: 0 20px;
    }

    .botao-mobile {
      background-color: transparent;
      border: none;
      cursor: pointer;
    }
  }
</style>