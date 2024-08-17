const g = () => {
  const e = document.querySelector("#hamburger");
  e.addEventListener("click", () => {
    e.parentElement.classList.toggle("active"), e.classList.toggle("active"), document.body.classList.toggle("scroll-remove");
  });
}, L = () => {
  const e = document.querySelector("#open-modal"), o = document.querySelector("#modal-instructions"), r = document.querySelectorAll(".modal--close-event");
  e == null || e.addEventListener("click", () => {
    o.classList.add("active");
  }), r.forEach((c) => {
    c.addEventListener("click", (a) => {
      var t;
      (t = a.target.closest(".modal")) == null || t.classList.remove("active");
    });
  });
}, f = () => {
  const e = document.querySelector("#file"), o = ["jpg", "png", "webp", "jpeg"], r = 1e6, c = document.querySelector("#error-file"), a = document.querySelector("#render-image"), t = document.querySelector("#remove-image"), d = document.querySelector("#file-loaded"), l = document.querySelector(".general-prev-image"), m = (n, s) => {
    var i;
    c.classList.add("active"), l.classList.add("hidden"), c.textContent = n, e.value = "", d.textContent = "Cargar factura", (i = s.target.closest("form")) == null || i.classList.remove("validate-file");
  };
  e == null || e.addEventListener("change", function(n) {
    var u;
    const s = e.files[0];
    d.textContent = `Se ha cargado el archivo ${s.name}`, a.src = "";
    const i = s == null ? void 0 : s.name.split("."), v = i == null ? void 0 : i.pop();
    o.includes(v) ? s.size >= r ? m(`El peso no puede ser mayor a ${r / r}MB`, n) : (a.src = URL.createObjectURL(s), c.classList.remove("active"), t.classList.add("active"), l.classList.remove("hidden"), (u = n.target.closest("form")) == null || u.classList.add("validate-file")) : m("Las extensiones permitidas son: jpg, png, webp y jpeg", n);
  }), t == null || t.addEventListener("click", (n) => {
    var s;
    a.src = "", e.value = "", t.classList.remove("active"), l.classList.add("hidden"), d.textContent = "Cargar factura", (s = n.target.closest("form")) == null || s.classList.remove("validate-file");
  });
}, y = () => {
  const e = document.querySelector("#form-login"), o = document.querySelector("#form-bill"), r = document.querySelector("#modal-register"), c = document.querySelector("#username"), a = document.querySelector("#error-document");
  c == null || c.addEventListener("keyup", (t) => {
    const d = t.target.value, l = t.target.closest("form");
    d.length > 5 ? (l.classList.add("validate"), a.classList.remove("active")) : l.classList.remove("validate");
  }), e == null || e.addEventListener("submit", (t) => {
    e.classList.contains("validate") || (a.classList.add("active"), t.preventDefault());
  }), o == null || o.addEventListener("submit", (t) => {
    t.preventDefault(), r.classList.add("active");
  });
};
window.addEventListener("load", () => {
  g(), L(), y(), f();
});
//# sourceMappingURL=mainscript.js.map
