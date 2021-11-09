<?php
function databaseentry($conn){
    // $library = file_get_contents('C:\Users\user\Desktop\firstproject\Library\php\a.json');
    // $library = json_decode($library, true);

    $library = json_decode(file_get_contents("php://input"), true);
   

    $success = [];
    $error = [];

    foreach ($library as &$book) {
    
    $id = $book["id"];
    $title = $book["title"];
    $author = $book["author"];
    $pages = $book["pages"];
    $readstatus = $book["read"];
    $userid = $book["userid"];
    
    if(!($userid == 0)){
        if (!duplicate($conn, $id, $error)){

            $sql = "INSERT INTO book(id, title, author, pages, readstatus, userid)
                VALUES ('$id','$title','$author','$pages','$readstatus','$userid');";

            if (mysqli_query($conn, $sql)) {
                array_push($success , "New record created successfully");
            } else {
            array_push($error, mysqli_error($conn));
            }
        }
    }
       
    }
    mysqli_close($conn);
    $merge = array_merge($success, $error);
    echo json_encode($merge);
    // print_r(json_encode($merge));
}


function duplicate($conn, $id, $error){
    $sql = "SELECT  id
            FROM book
            WHERE id = '$id';";
    $query = mysqli_query($conn, $sql);
    if (!mysqli_query($conn, $sql)) {
        array_push($error, mysqli_error($conn));
        print_r($error);
    }
    if (mysqli_num_rows($query) > 0) {
        array_push($error, "Book Already exists");
        return true;
    }

}

function findbook($conn, $library){
    
    $userid = json_decode(file_get_contents("php://input"), true);

    $sql = "SELECT  *
            FROM book
            WHERE userid = '$userid';";
    $query = mysqli_query($conn, $sql);

    While($row = mysqli_fetch_assoc($query) ){
        array_push($library, $row);
    }
    
    echo json_encode($library);
    exit();
    }