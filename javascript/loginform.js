//get login element
let loginwindow = document.querySelector(".login-form");
let loginbtn = document.querySelector(".login");
let loginclosebtn = document.querySelector(".closebtn.fromlogin");
let loginsubmit = document.getElementById('login');
const signuplogin = document.querySelector(".login.fromsignup");

if(signuplogin){
    signuplogin.addEventListener('click', loginopenModal);
}

loginbtn.addEventListener('click', loginopenModal);
loginclosebtn.addEventListener('click', logincloseModal);
loginsubmit.addEventListener('click', checklogin);

function loginopenModal(){
    loginwindow.style.display = 'block';
}

function logincloseModal(){
    loginwindow.style.display = 'none';
}


