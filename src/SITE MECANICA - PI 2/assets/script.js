const btn = document.getElementById('hamburger-btn');
const nav = document.getElementById('nav-links');
if (btn && nav) {
    btn.addEventListener('click', function () {
        const open = nav.classList.toggle('nav-open');
        btn.classList.toggle('is-active', open);
        btn.setAttribute('aria-expanded', open);
    });
    nav.querySelectorAll('div').forEach(function (link) {
        link.addEventListener('click', function () {
            nav.classList.remove('nav-open');
            btn.classList.remove('is-active');
            btn.setAttribute('aria-expanded', false);
        });
    });
}
