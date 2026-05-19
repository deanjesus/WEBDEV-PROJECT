const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

/* MOBILE MENU */

menuBtn.addEventListener("click", () => {
  navLinks.classList.toggle("open");

  const isOpen = navLinks.classList.contains("open");

  menuBtnIcon.setAttribute(
    "class",
    isOpen ? "ri-close-line" : "ri-menu-line"
  );
});

navLinks.addEventListener("click", () => {
  navLinks.classList.remove("open");

  menuBtnIcon.setAttribute("class", "ri-menu-line");
});

/* SCROLL REVEAL */

const scrollRevealOption = {
  origin: "bottom",
  distance: "50px",
  duration: 1000,
};

if (document.querySelector(".header__image img")) {
  ScrollReveal().reveal(".header__image img", {
    ...scrollRevealOption,
    origin: "right",
  });

  ScrollReveal().reveal(".header__content h1", {
    ...scrollRevealOption,
    delay: 500,
  });

  ScrollReveal().reveal(".header__content p", {
    ...scrollRevealOption,
    delay: 1000,
  });

  ScrollReveal().reveal(".header__btns", {
    ...scrollRevealOption,
    delay: 1500,
  });
}

if (document.querySelector(".arrival__card")) {
  ScrollReveal().reveal(".arrival__card", {
    ...scrollRevealOption,
    interval: 300,
  });
}

if (document.querySelector(".sale__image img")) {
  ScrollReveal().reveal(".sale__image img", {
    ...scrollRevealOption,
    origin: "left",
  });

  ScrollReveal().reveal(".sale__content h2", {
    ...scrollRevealOption,
    delay: 500,
  });

  ScrollReveal().reveal(".sale__content p", {
    ...scrollRevealOption,
    delay: 1000,
  });

  ScrollReveal().reveal(".sale__content h4", {
    ...scrollRevealOption,
    delay: 1200,
  });

  ScrollReveal().reveal(".sale__btn", {
    ...scrollRevealOption,
    delay: 1500,
  });
}

/* BANNER AUTO SCROLL */

const banner = document.querySelector(".banner__container");

if (banner) {
  const bannerContent = Array.from(banner.children);

  bannerContent.forEach((item) => {
    const duplicateNode = item.cloneNode(true);

    duplicateNode.setAttribute("aria-hidden", true);

    banner.appendChild(duplicateNode);
  });
}

/* AUTH MODAL */

const authBtn = document.getElementById("auth-btn");
const authModal = document.getElementById("auth-modal");

const closeAuth = document.getElementById("close-auth");

const loginTab = document.getElementById("login-tab");
const signupTab = document.getElementById("signup-tab");

const loginForm = document.getElementById("login-form");
const signupForm = document.getElementById("signup-form");

/* OPEN MODAL */

if (authBtn && authModal) {
  authBtn.addEventListener("click", () => {
    authModal.classList.add("show");
  });
}

/* CLOSE MODAL */

if (closeAuth && authModal) {
  closeAuth.addEventListener("click", () => {
    authModal.classList.remove("show");
  });
}

/* CLOSE WHEN CLICK OUTSIDE */

if (authModal) {
  authModal.addEventListener("click", (e) => {
    if (e.target === authModal) {
      authModal.classList.remove("show");
    }
  });
}

/* LOGIN TAB */

if (loginTab && signupTab && loginForm && signupForm) {
  loginTab.addEventListener("click", () => {
    loginTab.classList.add("active");
    signupTab.classList.remove("active");

    loginForm.classList.add("active");
    signupForm.classList.remove("active");
  });

  signupTab.addEventListener("click", () => {
    signupTab.classList.add("active");
    loginTab.classList.remove("active");

    signupForm.classList.add("active");
    loginForm.classList.remove("active");
  });
}