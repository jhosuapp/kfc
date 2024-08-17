const File = ()=>{
    const getDropZone = document.querySelector('#file');
    const allowExtensions = ['jpg', 'png', 'webp', 'jpeg'];
    const allowSize = 1000000;
    const getMsgError = document.querySelector('#error-file');
    const image = document.querySelector('#render-image');
    const getRemoveImage = document.querySelector('#remove-image');
    const fileLoaded = document.querySelector('#file-loaded');
    const prevImage = document.querySelector('.general-prev-image');

    const reUseError = (msg, e)=>{
        getMsgError.classList.add('active');
        prevImage.classList.add('hidden');
        getMsgError.textContent = msg;
        getDropZone.value = '';
        fileLoaded.textContent = 'Cargar factura';
        e.target.closest('form')?.classList.remove('validate-file');
    }
    
    getDropZone?.addEventListener('change', function(e){
        //Get file
        const getFile = getDropZone.files[0];
        fileLoaded.textContent = `Se ha cargado el archivo ${getFile.name}`;
        //Reset src image
        image.src = '';
        
        //Validate extensiones asset
        const splitExtension = getFile?.name.split('.');
        const getExtension =  splitExtension?.pop();
        if(allowExtensions.includes(getExtension)){
            //Validate size asset
            if(getFile.size >= allowSize){
                reUseError(`El peso no puede ser mayor a ${allowSize / allowSize}MB`, e);
            }else{
                //Render preview asset
                image.src = URL.createObjectURL(getFile);
                getMsgError.classList.remove('active');
                getRemoveImage.classList.add('active');
                prevImage.classList.remove('hidden');
                e.target.closest('form')?.classList.add('validate-file');
            }
        }else{
            reUseError('Las extensiones permitidas son: jpg, png, webp y jpeg', e);
        }
    });

    //Remove image
    getRemoveImage?.addEventListener('click', (e)=>{
        image.src = '';
        getDropZone.value = '';
        getRemoveImage.classList.remove('active');
        prevImage.classList.add('hidden');
        fileLoaded.textContent = 'Cargar factura';
        e.target.closest('form')?.classList.remove('validate-file');
    });
}

export { File }