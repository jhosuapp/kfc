const m = () => {
  const e = document.querySelector("#hamburger");
  e.addEventListener("click", () => {
    e.parentElement.classList.toggle("active"), e.classList.toggle("active"), document.body.classList.toggle("scroll-remove");
  });
}, u = () => {
  const e = document.querySelector("#open-modal"), n = document.querySelector("#modal-instructions"), c = document.querySelectorAll(".modal--close-event");
  e == null || e.addEventListener("click", () => {
    n.classList.add("active");
  }), c.forEach((t) => {
    t.addEventListener("click", (r) => {
      var o;
      (o = r.target.closest(".modal")) == null || o.classList.remove("active");
    });
  });
}, g = () => {
  const e = document.querySelector("#file"), n = ["jpg", "png", "webp", "jpeg"], c = 1e6, t = document.querySelector("#render-error p"), r = document.querySelector("#render-image"), o = document.querySelector("#remove-image"), d = document.querySelector("#file-loaded"), l = (s) => {
    t.classList.add("active"), t.textContent = s, e.value = "";
  };
  e == null || e.addEventListener("change", function() {
    const s = e.files[0];
    d.textContent = `Se ha cargado el archivo ${s.name}`, console.log(s), r.src = "";
    const a = s == null ? void 0 : s.name.split("."), i = a == null ? void 0 : a.pop();
    n.includes(i) ? s.size >= c ? l(`El peso no puede ser mayor a ${c / c}MB`) : (r.src = URL.createObjectURL(s), t.classList.remove("active"), o.classList.add("active"), getMsgErrorGeneral.classList.add("hidden")) : l("Las extensiones permitidas son: jpg, png, webp y jpeg");
  }), o == null || o.addEventListener("click", () => {
    r.src = "", dropZone.value = "", o.classList.remove("active");
  });
}, v = () => {
  const e = document.querySelector("#form-login"), n = document.querySelector("#form-bill"), c = document.querySelector("#modal-register");
  e.addEventListener("submit", (t) => {
    t.preventDefault(), n.classList.remove("hidden"), e.classList.add("hidden");
  }), n.addEventListener("submit", (t) => {
    t.preventDefault(), c.classList.add("active");
  });
};
window.addEventListener("load", () => {
  m(), u(), v(), g();
});
//# sourceMappingURL=mainscript.js.map
