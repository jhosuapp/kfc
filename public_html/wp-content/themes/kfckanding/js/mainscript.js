const u = () => {
  const e = document.querySelector("#hamburger");
  e.addEventListener("click", () => {
    e.parentElement.classList.toggle("active"), e.classList.toggle("active"), document.body.classList.toggle("scroll-remove");
  });
}, m = () => {
  const e = document.querySelector("#open-modal"), o = document.querySelector("#modal-instructions"), n = document.querySelectorAll(".modal--close-event");
  e == null || e.addEventListener("click", () => {
    o.classList.add("active");
  }), n.forEach((t) => {
    t.addEventListener("click", (r) => {
      var c;
      (c = r.target.closest(".modal")) == null || c.classList.remove("active");
    });
  });
}, v = () => {
  const e = document.querySelector("#file"), o = ["jpg", "png", "webp", "jpeg"], n = 1e6, t = document.querySelector("#render-error p"), r = document.querySelector("#render-image"), c = document.querySelector("#remove-image"), d = document.querySelector("#file-loaded"), l = (s) => {
    t.classList.add("active"), t.textContent = s, e.value = "";
  };
  e == null || e.addEventListener("change", function() {
    const s = e.files[0];
    d.textContent = `Se ha cargado el archivo ${s.name}`, console.log(s), r.src = "";
    const a = s == null ? void 0 : s.name.split("."), i = a == null ? void 0 : a.pop();
    o.includes(i) ? s.size >= n ? l(`El peso no puede ser mayor a ${n / n}MB`) : (r.src = URL.createObjectURL(s), t.classList.remove("active"), c.classList.add("active"), getMsgErrorGeneral.classList.add("hidden")) : l("Las extensiones permitidas son: jpg, png, webp y jpeg");
  }), c == null || c.addEventListener("click", () => {
    r.src = "", dropZone.value = "", c.classList.remove("active");
  });
}, g = () => {
  const e = document.querySelector("#form-login"), o = document.querySelector("#form-bill"), n = document.querySelector("#modal-register");
  e == null || e.addEventListener("submit", (t) => {
    t.preventDefault(), o.classList.remove("hidden"), e.classList.add("hidden");
  }), o == null || o.addEventListener("submit", (t) => {
    t.preventDefault(), n.classList.add("active");
  });
};
window.addEventListener("load", () => {
  u(), m(), g(), v();
});
//# sourceMappingURL=mainscript.js.map
