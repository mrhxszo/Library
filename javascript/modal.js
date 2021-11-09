//get modal element
let modal = document.querySelector(".modal-window");
let modalbtn = document.querySelector(".add");
let closebtn = document.querySelector(".closebtn");

modalbtn.addEventListener('click', openModal);
closebtn.addEventListener('click', closeModal);

function openModal(){
    modal.style.display = 'block';
}

function closeModal(){
    modal.style.display = 'none';
}
