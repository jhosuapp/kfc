const Modal = ()=>{
    const openModal = document.querySelector('#open-modal');
    const modalIntructions = document.querySelector('#modal-instructions');
    const closeModal = document.querySelectorAll('.modal--close-event');

    openModal?.addEventListener('click', ()=>{
        modalIntructions.classList.add('active');
    });

    closeModal.forEach((data)=>{
        data.addEventListener('click', (e)=>{
            e.target.closest('.modal')?.classList.remove('active');
        });
    });
}

export { Modal }