const g = () => {
  const e = document.querySelector("#hamburger");
  e.addEventListener("click", () => {
    e.parentElement.classList.toggle("active"), e.classList.toggle("active"), document.body.classList.toggle("scroll-remove");
  });
}, f = () => {
  const e = document.querySelector("#open-modal"), s = document.querySelector("#modal-instructions"), a = document.querySelectorAll(".modal--close-event");
  e == null || e.addEventListener("click", () => {
    s.classList.add("active");
  }), a.forEach((c) => {
    c.addEventListener("click", (r) => {
      var t;
      (t = r.target.closest(".modal")) == null || t.classList.remove("active");
    });
  });
}, p = () => {
  const e = document.querySelector("#file"), s = ["jpg", "png", "webp", "jpeg"], a = 1e6, c = document.querySelector("#error-file"), r = document.querySelector("#render-image"), t = document.querySelector("#remove-image"), i = document.querySelector("#file-loaded"), u = document.querySelector(".general-prev-image"), l = (n, o) => {
    var d;
    c.classList.add("active"), u.classList.add("hidden"), c.textContent = n, e.value = "", i.textContent = "Cargar factura", (d = o.target.closest("form")) == null || d.classList.remove("validate-file");
  };
  e == null || e.addEventListener("change", function(n) {
    var m;
    const o = e.files[0];
    i.textContent = `Se ha cargado el archivo ${o.name}`, r.src = "";
    const d = o == null ? void 0 : o.name.split("."), L = d == null ? void 0 : d.pop();
    s.includes(L) ? o.size >= a ? l(`El peso no puede ser mayor a ${a / a}MB`, n) : (r.src = URL.createObjectURL(o), c.classList.remove("active"), t.classList.add("active"), u.classList.remove("hidden"), (m = n.target.closest("form")) == null || m.classList.add("validate-file")) : l("Las extensiones permitidas son: jpg, png, webp y jpeg", n);
  }), t == null || t.addEventListener("click", (n) => {
    var o;
    r.src = "", e.value = "", t.classList.remove("active"), u.classList.add("hidden"), i.textContent = "Cargar factura", (o = n.target.closest("form")) == null || o.classList.remove("validate-file");
  });
}, v = (e, s, a) => {
  e == null || e.addEventListener("keyup", (c) => {
    const r = c.target.value, t = c.target.closest("form");
    r.length > 5 ? (t.classList.add(a), s.classList.remove("active")) : t.classList.remove(a);
  });
}, y = () => {
  const e = document.querySelector("#form-login"), s = document.querySelector("#form-bill"), a = document.querySelector("#username"), c = document.querySelector("#error-document");
  v(a, c, "validate");
  const r = document.querySelector("#text_codigo"), t = document.querySelector("#error-code");
  v(r, t, "validate-code");
  const i = document.querySelector("#error-file-empty");
  document.querySelector("#file").addEventListener("change", () => {
    i.classList.remove("active");
  }), e == null || e.addEventListener("submit", (l) => {
    e.classList.contains("validate") || (c.classList.add("active"), l.preventDefault());
  }), s == null || s.addEventListener("submit", (l) => {
    !s.classList.contains("validate-file") && i.classList.add("active"), !s.classList.contains("validate-code") && t.classList.add("active"), s.classList.contains("validate-file") && s.classList.contains("validate-code") || l.preventDefault();
  });
};
window.addEventListener("load", () => {
  g(), f(), y(), p();
});
//# sourceMappingURL=mainscript.js.map
