const m = () => {
  const e = document.querySelector("#hamburger");
  e.addEventListener("click", () => {
    e.parentElement.classList.toggle("active"), e.classList.toggle("active"), document.body.classList.toggle("scroll-remove");
  });
}, u = () => {
  const e = document.querySelector("#open-modal"), r = document.querySelector("#modal-instructions"), s = document.querySelectorAll(".modal--close-event");
  e == null || e.addEventListener("click", () => {
    r.classList.add("active");
  }), s.forEach((c) => {
    c.addEventListener("click", (n) => {
      var o;
      (o = n.target.closest(".modal")) == null || o.classList.remove("active");
    });
  });
}, g = () => {
  const e = document.querySelector("#file"), r = ["jpg", "png", "webp", "jpeg"], s = 1e6, c = document.querySelector("#render-error p"), n = document.querySelector("#render-image"), o = document.querySelector("#remove-image"), d = document.querySelector("#file-loaded"), l = (t) => {
    c.classList.add("active"), c.textContent = t, e.value = "";
  };
  e == null || e.addEventListener("change", function() {
    const t = e.files[0];
    d.textContent = `Se ha cargado el archivo ${t.name}`, console.log(t), n.src = "";
    const a = t == null ? void 0 : t.name.split("."), i = a == null ? void 0 : a.pop();
    r.includes(i) ? t.size >= s ? l(`El peso no puede ser mayor a ${s / s}MB`) : (n.src = URL.createObjectURL(t), c.classList.remove("active"), o.classList.add("active"), getMsgErrorGeneral.classList.add("hidden")) : l("Las extensiones permitidas son: jpg, png, webp y jpeg");
  }), o == null || o.addEventListener("click", () => {
    n.src = "", dropZone.value = "", o.classList.remove("active");
  });
};
window.addEventListener("load", () => {
  m(), u(), g();
});
//# sourceMappingURL=mainscript.js.map
