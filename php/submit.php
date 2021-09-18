<?php

$Name=$_POST['Name'];
$id=$_POST['id'];
$CGPA=$_POST['CGPA'];
$dob=$_POST['dob'];
$m=$_POST['m'];
$gender=$_POST['gender'];

$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="trydb";
$conn=new mysqli($host,$dbUsername,$dbPassword,$dbName);
if($conn->connect_error){
    die('Connection Failed');
}
else{
    $stmt=$conn->prepare("insert into studentinfo(Name,ID,CGPA,DOB,Maritual,Gender) values (?,?,?,?,?,?)");
    $stmt->bind_param("sidsss",$Name,$id,$CGPA,$dob,$m,$gender);
    $stmt->execute();
    echo "Registration Successful";
    $stmt->close();
    $conn->close();

}

