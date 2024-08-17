const useValdidation = (listener, error, cls)=>{
    listener?.addEventListener('keyup', (e)=>{
        const value = e.target.value;
        const parent = e.target.closest('form');

        if(value.length > 5){
            parent.classList.add(cls);
            error.classList.remove('active');
        }else{
            parent.classList.remove(cls);
        }
    });
}


const RegisterUser = () =>{
    const formLogin = document.querySelector('#form-login');
    const formBill = document.querySelector('#form-bill');
    //Document number
    const inputDocumentNumber = document.querySelector('#username');
    const msgErrorDocumentNumber = document.querySelector('#error-document');
    useValdidation(inputDocumentNumber, msgErrorDocumentNumber, 'validate');
    //Code
    const inputCode = document.querySelector('#text_codigo');
    const msgErrorCode = document.querySelector('#error-code');
    useValdidation(inputCode, msgErrorCode, 'validate-code');
    //File
    const msgErrorFile = document.querySelector('#error-file-empty');
    const inputFile = document.querySelector('#file');
    inputFile.addEventListener('change', ()=>{
        msgErrorFile.classList.remove('active')
    });

    formLogin?.addEventListener('submit', (e)=>{
        if(formLogin.classList.contains('validate')){

        }else{
            msgErrorDocumentNumber.classList.add('active');
            e.preventDefault();
        }
    });

    formBill?.addEventListener('submit', (e)=>{
        //Msg error's
        !formBill.classList.contains('validate-file') && msgErrorFile.classList.add('active');
        !formBill.classList.contains('validate-code') && msgErrorCode.classList.add('active');
        //Validate errors
        if(formBill.classList.contains('validate-file') && formBill.classList.contains('validate-code')){
            
        }else{
            e.preventDefault();
        }
    });
}

export { RegisterUser }