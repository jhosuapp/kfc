const L = () => {
  const e = document.querySelector("#hamburger");
  e.addEventListener("click", () => {
    e.parentElement.classList.toggle("active"), e.classList.toggle("active"), document.body.classList.toggle("scroll-remove");
  });
}, f = () => {
  const e = document.querySelector("#open-modal"), t = document.querySelector("#modal-instructions"), o = document.querySelectorAll(".modal--close-event");
  e == null || e.addEventListener("click", () => {
    t.classList.add("active");
  }), o.forEach((s) => {
    s.addEventListener("click", (r) => {
      var c;
      (c = r.target.closest(".modal")) == null || c.classList.remove("active");
    });
  });
}, p = () => {
  const e = document.querySelector("#file"), t = ["jpg", "png", "webp", "jpeg"], o = 1e6, s = document.querySelector("#error-file"), r = document.querySelector("#render-image"), c = document.querySelector("#remove-image"), l = document.querySelector("#file-loaded"), u = document.querySelector(".general-prev-image"), i = (n, a) => {
    var d;
    s.classList.add("active"), u.classList.add("hidden"), s.textContent = n, e.value = "", l.textContent = "Cargar factura", (d = a.target.closest("form")) == null || d.classList.remove("validate-file");
  };
  e == null || e.addEventListener("change", function(n) {
    var m;
    const a = e.files[0];
    l.textContent = `Se ha cargado el archivo ${a.name}`, r.src = "";
    const d = a == null ? void 0 : a.name.split("."), g = d == null ? void 0 : d.pop();
    t.includes(g) ? a.size >= o ? i(`El peso no puede ser mayor a ${o / o}MB`, n) : (r.src = URL.createObjectURL(a), s.classList.remove("active"), c.classList.add("active"), u.classList.remove("hidden"), (m = n.target.closest("form")) == null || m.classList.add("validate-file")) : i("Las extensiones permitidas son: jpg, png, webp y jpeg", n);
  }), c == null || c.addEventListener("click", (n) => {
    var a;
    r.src = "", e.value = "", c.classList.remove("active"), u.classList.add("hidden"), l.textContent = "Cargar factura", (a = n.target.closest("form")) == null || a.classList.remove("validate-file");
  });
}, v = (e, t, o) => {
  e == null || e.addEventListener("keyup", (s) => {
    const r = s.target.value, c = s.target.closest("form");
    r.length > 5 ? (c.classList.add(o), t.classList.remove("active")) : c.classList.remove(o);
  });
}, y = () => {
  const e = document.querySelector("#form-login"), t = document.querySelector("#form-bill"), o = document.querySelector("#username"), s = document.querySelector("#error-document");
  v(o, s, "validate");
  const r = document.querySelector("#text_codigo"), c = document.querySelector("#error-code");
  v(r, c, "validate-code");
  const l = document.querySelector("#error-file-empty");
  document.querySelector("#file").addEventListener("change", () => {
    l.classList.remove("active");
  }), e == null || e.addEventListener("submit", (i) => {
    e.classList.contains("validate") || (s.classList.add("active"), i.preventDefault());
  }), t == null || t.addEventListener("submit", (i) => {
    !t.classList.contains("validate-file") && l.classList.add("active"), !t.classList.contains("validate-code") && c.classList.add("active"), t.classList.contains("validate-file") && t.classList.contains("validate-code") || i.preventDefault();
  });
}, S = () => {
  const e = document.querySelector("#userdocu"), t = document.querySelector("#red_user_login"), o = document.querySelector("#password");
  e == null || e.addEventListener("keyup", (s) => {
    t.value = s.target.value, o.value = s.target.value;
  });
}, q = () => {
  S();
};
window.addEventListener("load", () => {
  L(), f(), y(), q(), p();
});
//# sourceMappingURL=mainscript.js.map
