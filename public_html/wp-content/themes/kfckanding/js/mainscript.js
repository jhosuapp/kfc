const t = () => {
  const e = document.querySelector("#hamburger");
  e.addEventListener("click", () => {
    e.parentElement.classList.toggle("active"), e.classList.toggle("active"), document.body.classList.toggle("scroll-remove");
  });
};
window.addEventListener("load", () => {
  t();
});
//# sourceMappingURL=mainscript.js.map
