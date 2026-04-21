const btn = document.getElementById("hamburger-btn");
const nav = document.getElementById("nav-links");
if (btn && nav) {
  btn.addEventListener("click", function () {
    const open = nav.classList.toggle("nav-open");
    btn.classList.toggle("is-active", open);
    btn.setAttribute("aria-expanded", open);
  });
  nav.querySelectorAll("div").forEach(function (link) {
    link.addEventListener("click", function () {
      nav.classList.remove("nav-open");
      btn.classList.remove("is-active");
      btn.setAttribute("aria-expanded", false);
    });
  });
}

var swiper = new Swiper(".mySwiper", {
  loop: true,
  autoplay: { delay: 5000, disableOnInteraction: false },
  pagination: { el: ".swiper-pagination", clickable: true },
  navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
});

// Flip card funcionalidade

const flipCards = document.querySelectorAll(".flip-card");

flipCards.forEach((card) => {
  card.addEventListener("click", function () {
    this.classList.toggle("is-flipped");
  });
});
