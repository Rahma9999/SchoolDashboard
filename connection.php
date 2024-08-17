<?php
$host = 'localhost';
$user = 'root';
$dbname = 'school';
$pass = '';

try{
$con = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);
//$con = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
// echo "successfully";
}
catch(PDOException $e){
    echo "faild" . $e->getMessage();
}
///////////////////Data Base//////////////////
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['address'])){
        $address = $_POST['address'];
    }
    if(isset($_POST['add'])){
        //$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES (:fname, :lname, :email)";
        $sql = "INSERT INTO students VALUES (:id, :name, :address)";
        $stmt = $con->prepare($sql);
        $stmt->execute(array(
            ':id'=> $id,
            ':name'=>$name,
            ':address'=>$address,
        ));
        header("location: index.php");
    }
    if(isset($_POST['delete'])){
        $sql = "DELETE FROM students WHERE name = :name AND id = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute(array(
            ':id' => $id,
            ':name' => $name
        ));
        header("location: index.php");
    }
}