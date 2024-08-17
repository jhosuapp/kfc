const RegisterUser = () =>{
    const formLogin = document.querySelector('#form-login');
    const formBill = document.querySelector('#form-bill');
    const modalRegister = document.querySelector('#modal-register');
    const inputDocumentNumber = document.querySelector('#username');
    const msgErrorDocumentNumber = document.querySelector('#error-document');

    inputDocumentNumber?.addEventListener('keyup', (e)=>{
        const value = e.target.value;
        const parent = e.target.closest('form');

        if(value.length > 5){
            parent.classList.add('validate');
            msgErrorDocumentNumber.classList.remove('active');
        }else{
            parent.classList.remove('validate');
        }
    });

    formLogin?.addEventListener('submit', (e)=>{
        if(formLogin.classList.contains('validate')){

        }else{
            msgErrorDocumentNumber.classList.add('active');
            e.preventDefault();
        }
    });

    formBill?.addEventListener('submit', (e)=>{
        e.preventDefault();
        modalRegister.classList.add('active');
    });
}

export { RegisterUser }