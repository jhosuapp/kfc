const useValues = ()=>{
    const inputDocument = document.querySelector('#userdocu');
    const inputUserName = document.querySelector('#red_user_login');
    const inputPassword = document.querySelector('#password');

    inputDocument?.addEventListener('keyup', (e)=>{
        inputUserName.value = e.target.value;
        inputPassword.value = e.target.value;
    });
}

const useValidateCheckbox = ()=>{
    const checkbox = document.querySelectorAll('input[type="checkbox"]');

    checkbox.forEach((item)=>{
        item.addEventListener('click', (e)=>{
            const parent = e.target.closest('.block');
            const error = parent.querySelector('.msg-error');

            if(item.checked){
                item.classList.add('validate-input');
                error.classList.remove('active');
            }else{
                item.classList.remove('validate-input');
                error.classList.add('active');
            }
        });
    });
}

const getTokenCaptcha = ()=>{
    grecaptcha.ready(function() {
        grecaptcha.execute('6Lc4eysqAAAAAD7EwL4gsNfLQZrmmuGOmY82nZwC', {action: 'submit'}).then(function(token) {
            document.getElementById('recaptchaResponse').value = token;
        });
    });
}

const useValidateInputs = () => {
    const inputs = document.querySelectorAll('#red_registration_form .block input');

    inputs.forEach((input)=>{
        input.addEventListener('keyup', (e)=>{
            const value = e.target.value;
            const parent = e.target.closest('.block');
            const error = parent.querySelector('.msg-error');

            if(value.length > 5){
                error.classList.remove('active');
                input.classList.add('validate-input');
            }else{
                input.classList.remove('validate-input');
            }

        });
    });
}

const RegisterUser = ()=>{
    const formRegister = document.querySelector('#red_registration_form');
    const inputs = document.querySelectorAll('#red_registration_form .block input');
    //Use values && validate checkbox && validate inputs
    useValues();
    useValidateCheckbox();
    useValidateInputs();
    getTokenCaptcha();
    
    formRegister?.addEventListener('submit', (e)=>{
        const validate = document.querySelectorAll('#red_registration_form .block .validate-input');
        inputs.forEach((input)=>{
            const parent = input.closest('.block');
            const errorMsg = parent.querySelector('.msg-error');

            if(input.classList.contains('validate-input')){
                errorMsg && errorMsg.classList.remove('active');
            }else{
                errorMsg && errorMsg.classList.add('active');
            }
        });
        //Send form
        if(validate.length == (inputs.length - 3)){
        }else{
            e.preventDefault();
        }
    });
}

export { RegisterUser }