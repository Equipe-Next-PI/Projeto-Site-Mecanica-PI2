/* ============================================================
   SCRIPT GERAL DA OFICINA NEXT
   ============================================================ */

// 1. Menu Hamburger (Apenas se o botão existir)
const btn = document.getElementById("hamburger-btn");
const nav = document.getElementById("nav-links");

if (btn && nav) {
  btn.addEventListener("click", function () {
    const open = nav.classList.toggle("nav-open");
    btn.classList.toggle("is-active", open);
    btn.setAttribute("aria-expanded", open);
  });
  
  nav.querySelectorAll("a").forEach(function (link) {
    link.addEventListener("click", function () {
      nav.classList.remove("nav-open");
      btn.classList.remove("is-active");
      btn.setAttribute("aria-expanded", false);
    });
  });
}

// 2. Swiper / Slider Principal (Apenas se a classe .mySwiper existir)
if (document.querySelector('.mySwiper')) {
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        autoplay: { delay: 5000, disableOnInteraction: false },
        pagination: { el: ".swiper-pagination", clickable: true },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    });
}

// 3. Efeito Flip Card dos Serviços (querySelectorAll não dá erro se estiver vazio)
const flipCards = document.querySelectorAll('.flip-card');
flipCards.forEach(card => {
  card.addEventListener('click', function() {
    this.classList.toggle('is-flipped');
  });
});

// 4. Animação da Tela de Login / Registro (Apenas se os botões existirem)
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

if (signUpButton && signInButton && container) {
    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
}