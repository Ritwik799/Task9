<?php include "db.php"; ?>
<?php

function createRows(){
if(isset($_POST["submit"])){
global $connection;

$username = $_POST["username"];
$password = $_POST["password"];

$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);

$password = md5($str);




$query = "INSERT INTO users(username,password) VALUES ('$username', '$password')";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query FAILED" . mysqli_error());
    } else{
        echo "Record Created";
    }
}
}

function readRows(){
    global $connection;
    $query = "SELECT * FROM users";   // select all from user
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query FAILED' . mysqli_error());
    }

    //  while($row = mysqli_fetch_row($result)) {
while($row = mysqli_fetch_assoc($result)) {
       
      print_r($row);
      
    }
}

function showAllData() {
    global $connection;

$query = "SELECT * FROM users";   // select all from user
$result = mysqli_query($connection, $query);
if(!$result){
    die('Query FAILED' . mysqli_error());
}

while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}


function UpdateTable(){
    if(isset($_POST['submit'])) {
    global $connection;
    
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];
            
        $query = "UPDATE users SET username = '$username', password = '$password' WHERE id = $id";
            
            $result = mysqli_query($connection, $query);
            if(!$result) {
            
                die("QUERY FAILED" . mysqli_error($connection));
                } else{
                    echo "Record Update";
                }
            }
    
            }
        

function deleteRows(){
    if(isset($_POST['submit'])) {
global $connection;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
        
    $query = "DELETE FROM users WHERE id = $id";
        
        $result = mysqli_query($connection, $query);
        if(!$result) {
        
            die("QUERY FAILED" . mysqli_error($connection));
            } else{
                echo "Record Deleted";
            }
        }

    }
    
 ?>

