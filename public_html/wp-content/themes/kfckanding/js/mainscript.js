const g = () => {
  const e = document.querySelector("#hamburger");
  e.addEventListener("click", () => {
    e.parentElement.classList.toggle("active"), e.classList.toggle("active"), document.body.classList.toggle("scroll-remove");
  });
}, p = () => {
  const e = document.querySelector("#open-modal"), t = document.querySelector("#modal-instructions"), c = document.querySelectorAll(".modal--close-event");
  e == null || e.addEventListener("click", () => {
    t.classList.add("active");
  }), c.forEach((s) => {
    s.addEventListener("click", (o) => {
      var a;
      (a = o.target.closest(".modal")) == null || a.classList.remove("active");
    });
  });
}, f = () => {
  const e = document.querySelector("#file"), t = ["jpg", "png", "webp", "jpeg"], c = 5e6, s = document.querySelector("#error-file"), o = document.querySelector("#render-image"), a = document.querySelector("#remove-image"), r = document.querySelector("#file-loaded"), n = document.querySelector(".general-prev-image"), d = (i, l) => {
    var u;
    s.classList.add("active"), n.classList.add("hidden"), s.textContent = i, e.value = "", e.classList.add("validate-input"), r.textContent = "Cargar factura", r.classList.remove("file-is-loaded"), (u = l.target.closest("form")) == null || u.classList.remove("validate-file");
  };
  e == null || e.addEventListener("change", function(i) {
    var v;
    const l = e.files[0];
    r.textContent = `Se ha cargado el archivo ${l.name}`, o.src = "";
    const u = l == null ? void 0 : l.name.split("."), L = u == null ? void 0 : u.pop();
    t.includes(L) ? l.size >= c ? d("El peso no puede ser mayor a 5MB", i) : (o.src = URL.createObjectURL(l), s.classList.remove("active"), n.classList.remove("hidden"), a.classList.add("active"), e.classList.add("validate-input"), r.classList.add("file-is-loaded"), (v = i.target.closest("form")) == null || v.classList.add("validate-file")) : d("Las extensiones permitidas son: jpg, png, webp y jpeg", i);
  }), a == null || a.addEventListener("click", (i) => {
    var l;
    o.src = "", e.value = "", a.classList.remove("active"), e.classList.remove("validate-input"), n.classList.add("hidden"), r.textContent = "Cargar factura", r.classList.remove("file-is-loaded"), (l = i.target.closest("form")) == null || l.classList.remove("validate-file");
  });
}, m = (e, t, c) => {
  e == null || e.addEventListener("keyup", (s) => {
    const o = s.target.value, a = s.target.closest("form");
    o.length > 5 ? (a.classList.add(c), t.classList.remove("active")) : a.classList.remove(c);
  });
}, y = () => {
  const e = document.querySelector("#form-login"), t = document.querySelector("#form-bill"), c = document.querySelector("#username"), s = document.querySelector("#error-document");
  m(c, s, "validate");
  const o = document.querySelector("#text_codigo"), a = document.querySelector("#error-code");
  m(o, a, "validate-code");
  const r = document.querySelector("#error-file-empty"), n = document.querySelector("#file");
  n == null || n.addEventListener("change", () => {
    r.classList.remove("active");
  }), e == null || e.addEventListener("submit", (d) => {
    e.classList.contains("validate") || (s.classList.add("active"), d.preventDefault());
  }), t == null || t.addEventListener("submit", (d) => {
    !t.classList.contains("validate-file") && r.classList.add("active"), !t.classList.contains("validate-code") && a.classList.add("active"), t.classList.contains("validate-file") && t.classList.contains("validate-code") || d.preventDefault();
  });
}, S = () => {
  const e = document.querySelector("#userdocu"), t = document.querySelector("#red_user_login"), c = document.querySelector("#password");
  e == null || e.addEventListener("keyup", (s) => {
    t.value = s.target.value, c.value = s.target.value;
  });
}, q = () => {
  document.querySelectorAll('input[type="checkbox"]').forEach((t) => {
    t.addEventListener("click", (c) => {
      const o = c.target.closest(".block").querySelector(".msg-error");
      t.checked ? (t.classList.add("validate-input"), o.classList.remove("active")) : (t.classList.remove("validate-input"), o.classList.add("active"));
    });
  });
}, E = () => {
  document.querySelectorAll("#red_registration_form .block input").forEach((t) => {
    t.addEventListener("keyup", (c) => {
      const s = c.target.value, a = c.target.closest(".block").querySelector(".msg-error");
      s.length > 5 ? (a.classList.remove("active"), t.classList.add("validate-input")) : t.classList.remove("validate-input");
    });
  });
}, b = () => {
  const e = document.querySelector("#red_registration_form"), t = document.querySelectorAll("#red_registration_form .block input");
  S(), q(), E(), e == null || e.addEventListener("submit", (c) => {
    const s = document.querySelectorAll("#red_registration_form .block .validate-input");
    t.forEach((o) => {
      const r = o.closest(".block").querySelector(".msg-error");
      o.classList.contains("validate-input") ? r && r.classList.remove("active") : r && r.classList.add("active");
    }), s.length == t.length - 2 ? console.log("bien") : c.preventDefault();
  });
};
window.addEventListener("load", () => {
  g(), p(), y(), b(), f();
});
//# sourceMappingURL=mainscript.js.map
