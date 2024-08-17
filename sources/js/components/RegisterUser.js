const useValues = ()=>{
    const inputDocument = document.querySelector('#userdocu');
    const inputUserName = document.querySelector('#red_user_login');
    const inputPassword = document.querySelector('#password');

    inputDocument?.addEventListener('keyup', (e)=>{
        inputUserName.value = e.target.value;
        inputPassword.value = e.target.value;
    });
}

const RegisterUser = ()=>{
    useValues();
}

export { RegisterUser }