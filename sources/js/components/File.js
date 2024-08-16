const File = ()=>{
    const getDropZone = document.querySelector('#file');
    const allowExtensions = ['jpg', 'png', 'webp', 'jpeg'];
    const allowSize = 1000000;
    const getMsgError = document.querySelector('#render-error p');
    const image = document.querySelector('#render-image');
    const getRemoveImage = document.querySelector('#remove-image');
    const fileLoaded = document.querySelector('#file-loaded');

    const reUseError = (msg)=>{
        getMsgError.classList.add('active');
        getMsgError.textContent = msg;
        getDropZone.value = '';
    }
    
    getDropZone?.addEventListener('change', function(){
        //Get file
        const getFile = getDropZone.files[0];
        fileLoaded.textContent = `Se ha cargado el archivo ${getFile.name}`;
        console.log(getFile);
        //Reset src image
        image.src = '';
        
        //Validate extensiones asset
        const splitExtension = getFile?.name.split('.');
        const getExtension =  splitExtension?.pop();
        if(allowExtensions.includes(getExtension)){
            //Validate size asset
            if(getFile.size >= allowSize){
                reUseError(`El peso no puede ser mayor a ${allowSize / allowSize}MB`);
            }else{
                //Render preview asset
                image.src = URL.createObjectURL(getFile);
                getMsgError.classList.remove('active');
                getRemoveImage.classList.add('active');
                getMsgErrorGeneral.classList.add('hidden');
            }
        }else{
            reUseError('Las extensiones permitidas son: jpg, png, webp y jpeg');
        }
    });

    //Remove image
    getRemoveImage?.addEventListener('click', ()=>{
        image.src = '';
        dropZone.value = '';
        getRemoveImage.classList.remove('active');
    });
}

export { File }