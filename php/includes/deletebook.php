<?php
include("dbhconnection.inc.php");
include("functions.inc.php");

$bookid = json_decode(file_get_contents("php://input"), true);

// $sql = "SELECT * FROM book WHERE id = '$bookid';";

// $query = mysqli_query($conn, $sql);

// if($query){
//     echo json_encode(mysqli_fetch_assoc($query));
// }
// else{
//     echo json_encode(mysqli_error($conn));
// }




$sql = "DELETE FROM book WHERE id = '$bookid';";

mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)>0){
    echo json_encode(["Deleted" => $bookid]);
}
else{
    echo json_encode(mysqli_error($conn));
}

?>