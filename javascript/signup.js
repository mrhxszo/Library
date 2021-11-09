const fullname = document.getElementById("fullname");
const username = document.getElementById("signup-username");
const email = document.getElementById("email");
const password = document.getElementById("signup-password");
const repassword = document.getElementById("repassword");
const signupbtn = document.getElementById("signup");
const signupclosebtn = document.querySelector(".closebtn.fromsignup");
const signupwindow = document.querySelector(".signup-form");

signupbtn.addEventListener("click", registeruser);
signupclosebtn.addEventListener('click', signupcloseModal);

function signupcloseModal(){
    signupwindow.style.display = 'none';
}
