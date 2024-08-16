const hamburger = ()=>{
    const hamburger = document.querySelector('#hamburger');

    hamburger.addEventListener('click', ()=>{
        hamburger.parentElement.classList.toggle('active');
        hamburger.classList.toggle('active');
        document.body.classList.toggle('scroll-remove');
    });
}

export { hamburger }