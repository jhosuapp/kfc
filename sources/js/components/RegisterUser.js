const RegisterUser = () =>{
    const formLogin = document.querySelector('#form-login');
    const formBill = document.querySelector('#form-bill');
    const modalRegister = document.querySelector('#modal-register');

    formLogin?.addEventListener('submit', (e)=>{
        e.preventDefault();

        formBill.classList.remove('hidden');
        formLogin.classList.add('hidden');
    });

    formBill?.addEventListener('submit', (e)=>{
        e.preventDefault();
        modalRegister.classList.add('active');
    });
}

export { RegisterUser }