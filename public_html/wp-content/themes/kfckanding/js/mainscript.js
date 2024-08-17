const u = () => {
  const e = document.querySelector("#hamburger");
  e.addEventListener("click", () => {
    e.parentElement.classList.toggle("active"), e.classList.toggle("active"), document.body.classList.toggle("scroll-remove");
  });
}, m = () => {
  const e = document.querySelector("#open-modal"), r = document.querySelector("#modal-instructions"), n = document.querySelectorAll(".modal--close-event");
  e == null || e.addEventListener("click", () => {
    r.classList.add("active");
  }), n.forEach((s) => {
    s.addEventListener("click", (o) => {
      var t;
      (t = o.target.closest(".modal")) == null || t.classList.remove("active");
    });
  });
}, v = () => {
  const e = document.querySelector("#file"), r = ["jpg", "png", "webp", "jpeg"], n = 1e6, s = document.querySelector("#render-error p"), o = document.querySelector("#render-image"), t = document.querySelector("#remove-image"), l = document.querySelector("#file-loaded"), a = (c) => {
    s.classList.add("active"), s.textContent = c, e.value = "";
  };
  e == null || e.addEventListener("change", function() {
    const c = e.files[0];
    l.textContent = `Se ha cargado el archivo ${c.name}`, console.log(c), o.src = "";
    const d = c == null ? void 0 : c.name.split("."), i = d == null ? void 0 : d.pop();
    r.includes(i) ? c.size >= n ? a(`El peso no puede ser mayor a ${n / n}MB`) : (o.src = URL.createObjectURL(c), s.classList.remove("active"), t.classList.add("active"), getMsgErrorGeneral.classList.add("hidden")) : a("Las extensiones permitidas son: jpg, png, webp y jpeg");
  }), t == null || t.addEventListener("click", () => {
    o.src = "", dropZone.value = "", t.classList.remove("active");
  });
}, g = () => {
  const e = document.querySelector("#form-login"), r = document.querySelector("#form-bill"), n = document.querySelector("#modal-register"), s = document.querySelector("#username"), o = document.querySelector("#error-document");
  s == null || s.addEventListener("keyup", (t) => {
    const l = t.target.value, a = t.target.closest("form");
    l.length > 5 ? (a.classList.add("validate"), o.classList.remove("active")) : a.classList.remove("validate");
  }), e == null || e.addEventListener("submit", (t) => {
    e.classList.contains("validate") || (o.classList.add("active"), t.preventDefault());
  }), r == null || r.addEventListener("submit", (t) => {
    t.preventDefault(), n.classList.add("active");
  });
};
window.addEventListener("load", () => {
  u(), m(), g(), v();
});
//# sourceMappingURL=mainscript.js.map
