
let library = [];

function Book(id, title, author, pages, read){
    this.id = id;
    this.title = title;
    this.author = author;
    this.pages = pages;
    this.read = read;
    this.userid = userid.textContent;//() => userid != null ? userid.textContent : 0 ;
    this.addbook = function () {
        if (this.read){
            this.read = "Read";
        }
        else{
            this.read = "Not Read";
        }
        library.push(this);
    }
}

//adding a new book to the library

let submit = document.querySelector(".submit-button");
let author = document.getElementById("author");
let title = document.getElementById("title");
let pages = document.getElementById("pages");
let readstatus = document.getElementById("readstatus");
let signup = document.querySelector(".signup");
const userid = document.querySelector(".userid");
const signuptext = document.querySelector(".text.fromsignup");

//function to retrieve all the books and push to library for display when user logs in
if(userid != null){
    if ((Number(userid.innerText) != 0) && !isNaN(Number(userid.innerText))){
        retrievebook(Number(userid.innerText),library);
    }
}

//test
newbook1 = new Book((new Date()).getTime(), "The Example", "Mr Sample ", 1000, true);
//test
displaybooks(library);

submit.addEventListener("click", addanewbook);


