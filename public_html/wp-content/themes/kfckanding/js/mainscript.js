document.addEventListener("DOMContentLoaded", function(event) {
    console.log("inicio")
    function modalCodigo() {
        console.log("empieza funcion")
        let modalcode = document.getElementById("modal")
        modalcode.classList.add('active')
    }
    function cerramodal(){
        let modalcode = document.getElementById("modal")
        modalcode.classList.remove('active')
    }
    
    document.getElementById("openmodalpedido").addEventListener("click",modalCodigo);
    document.getElementById("closemodal").addEventListener("click",cerramodal);

    
});