

function addanewbook() {
  newbook = new Book((new Date()).getTime(), title.value, author.value, pages.value, readstatus.checked);
  newbook.addbook();
  closeModal();
  displaybooks(library);
  uploadlibrary();
}

function displaybooks(library){
    let bookshelf = document.querySelector(".bookshelf");
    let books = document.querySelectorAll(".book");

    if(!(books.length == 0)){
        books.forEach((book) => book.remove());
    }

    library.forEach((book, index) => displaybook(book, bookshelf, index));
    let removes = document.querySelectorAll(`.remove`);
    removes.forEach((remove) => remove.addEventListener("click",removebook));

}

function displaybook(book, bookshelf, index){
    let newbook = document.createElement("div");
    newbook.innerHTML = `<p style="color:rgb(65, 2, 4);font-size:15px;">Author</p>${book.author}
                        <p style="color:rgb(65, 2, 4);font-size:15px;">Title</p>${book.title}
                        <p style="color:rgb(65, 2, 4);font-size:15px;">Pages</p>${book.pages}
                        <p style="color:rgb(65, 2, 4);font-size:15px;" >${book.read}</p>
                        <button class="remove">Remove</button>`
    newbook.classList.add(`book`);
    newbook.setAttribute("id",`${index}`);
    bookshelf.appendChild(newbook);
}

 function removebook(e) {
    let newbook = document.getElementById(`${e.target.parentNode.id}`);
    newbook.remove();
    // console.log(library[Number(e.target.parentNode.id)]['id']);
    
    if ((Number(userid.innerText) != 0) && !isNaN(Number(userid.innerText))){
        removebookfromdatabase(library[Number(e.target.parentNode.id)]['id']);
  }

  console.log(library.splice(Number(e.target.parentNode.id), 1));
    
}

function removebookfromdatabase(id){
  fetch('https://github.com/mrhxszo/Library/tree/main/php/includes/deletebook.php', {
    method: 'POST', // or 'PUT'
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(id),
  })
  .then(response => response.json())
  .then(id => {
    console.log(id);
  })
  .catch((error) => {
    console.error('Error:', error);
  });
}

function uploadlibrary() {
    fetch('https://github.com/mrhxszo/Library/tree/main/php/main.php', {
      method: 'POST', // or 'PUT'
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(library),
    })
    .then(response => response.json())
    .then(library => {
      console.log('Success:', library);
    })
    .catch((error) => {
      console.error('Error:', error);
    });
  }
  
  function checklogin() {
    logininfo = {"username" : document.getElementById("username").value,
    "password" : document.getElementById("password").value};

    fetch('https://github.com/mrhxszo/Library/tree/main/php/Users/login.inc.php', {
      method: 'POST', // or 'PUT'
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(logininfo),
    })
    .then(response => response.json())
    .then(logininfo => {
      console.log('Success:', logininfo);
    })
    .catch((error) => {
      console.error('Error:', error);
    });
  }


  function registeruser(){
    signupinfo = {"fullname": fullname.value,
    "username" : username.value,
    "email" : email.value,
    "password" : password.value,
    "repassword": repassword.value};

    fetch('https://github.com/mrhxszo/Library/tree/main/php/Users/signup.inc.php', {
      method: 'POST', // or 'PUT'
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(signupinfo),
    })
    .then(response => response.json())
    .then(signupinfo => {
      console.log(signupinfo);
      if(signupinfo["201"] == "created"){
        signupwindow.style.display = 'block';
      }
      else{
        signuptext.textContent = `${signupinfo["error"]}`;
        console.log(signuptext);
      }
      
    })
    .catch((error) => {
      console.error('Error:', error);
    });

      

  }


  function retrievebook(userid, library) {
    fetch('https://github.com/mrhxszo/Library/tree/main/php/includes/retrievebook.php', {
      method: 'POST', // or 'PUT'
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(userid),
    })
    .then(response => response.json())
    .then(books => {
         books.forEach(element => {
        library.push(new Book(element["id"],element["title"], element["author"], element["pages"], element["readstatus"]));   
      });
    displaybooks(library);
    })
    .catch((error) => {
      console.error('Error:', error);
    });
  }
