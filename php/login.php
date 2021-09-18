<?php

$Name=$_POST['Name'];
$id=$_POST['id'];
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="trydb";
$conn=new mysqli($host,$dbUsername,$dbPassword,$dbName);
if($conn->connect_error){
    die('Connection Failed');
}
else{
    $stmt=$conn->prepare("select * from studentinfo where id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0){
        $data=$stmt_result->fetch_assoc();
        if($data['Name']===$Name){
            echo "<h2>Login Successful</h2>";

        }else{
            echo "<h2>Invalid Id or PAssword </h2>";
        }

    }else{
        echo "<h2>Invalid Id or PAssword </h2>";
    }
    $stmt->close();
    $conn->close();
}
?>