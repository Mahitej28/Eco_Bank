<!DOCTYPE html>
<html lang="en">
<head>
<title>ECO BANK</title>
<meta name="viewport" content="width=device-width, initial-scale=1">    
<link rel="stylesheet" href="bootstrap.min.css">
<style>
body{
  background-color:#2b67f8;
}
</style>
</head>
<body>
	<script src="jquery.min.js" type="text/javascript"></script>
	<script src="popper.min.js" type="text/javascript"></script>
	<script src="sweetalert.min.js" type="text/javascript"></script>
</body>
</html>

<?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"qxp");
if(!$con){
    die("Connection failed");
} 


$flag=false;

if (isset($_POST['transfer']))
{
$sender=$_SESSION['sender'];
$receiver=$_POST["reciever"];
$amount=$_POST["amount"];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Bank System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">    
<link rel="stylesheet" href="bootstrap.min.css">
<style>
body{
  background-color:white;
}
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
  
}

@media screen and (max-width: 400px) {
  .topnav.responsive {position: relative;}
}

<?php

$sql = "SELECT Balance FROM customer WHERE name='$sender'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 if($amount>$row["Balance"] or $row["Balance"]-$amount<100){
    echo "<script>swal( 'Transaction Denied','Insufficient Balance!','error' ).then(function() { window. location = 'view.php'; });;</script>";
   
 }
else{
    $sql = "UPDATE `customer` SET Balance=(Balance-$amount) WHERE Name='$sender'";
    

if ($con->query($sql) === TRUE) {
  $flag=true;
} else {
  echo "Error in updating record: " . $conn->error;
}
 }
 
  }
} else {
  echo "0 results";
} 

if($flag==true){
$sql = "UPDATE `customer` SET Balance=(Balance+$amount) WHERE name='$receiver'";

if ($con->query($sql) === TRUE) {
  $flag=true;  
  
} else {
  echo "Error in updating record: " . $con->error;
}
}
if($flag==true){
    $sql = "SELECT * from customer where name='$sender'";
    $result = $con-> query($sql);
    while($row = $result->fetch_assoc())
     {
         $s_acc=$row['Acc_Number'];
 }
 $sql = "SELECT * from customer where name='$receiver'";
 $result = $con-> query($sql);
while($row = $result->fetch_assoc())
  {
      $r_acc=$row['Acc_Number'];
}        
$sql = "INSERT INTO `transfer`(s_name,s_acc_no,r_name,r_acc_no,amount) VALUES ('$sender','$s_acc','$receiver','$r_acc','$amount')";
if ($con->query($sql) === TRUE) {
} else 
{
  echo "Error updating record: " . $con->error;
}
}

if($flag==true){
echo "<script>swal('Money sent', 'Your transaction was successful','success').then(function() { window. location = 'View.php'; });;</script>";
}
elseif($flag==false)
{
    echo "<script>
        $('#text2').show()
     </script>";
}
?>

  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
  .user_details{
  font-size:20px;
  color:black;
  font-weight:bold;
  width: 20%;  
  height:auto;
  margin: auto;
  margin-left:auto;
  margin-right:auto;
  text-align: left;
  
}

}
</style>
</head>
<body>
	<script src="jquery.min.js" type="text/javascript"></script>
	<script src="popper.min.js" type="text/javascript"></script>
	<script src="sweetalert.min.js" type="text/javascript"></script>

  
 <h1 align='center'>Transaction Successfull !!</h1>

  
<div class="user_details">

<div style="float: center">
<table class="center">
<?php
        if (isset($_SESSION['user']))
        {
          $user=$_SESSION['user'];
          $result=mysqli_query($con,"SELECT * FROM customer WHERE Name='$user'");
          while($row=mysqli_fetch_array($result))
          {
            
            echo "<form method ='post' action = 'transfer.php'>";
            echo "<tr><td><p><b>User ID&nbsp&nbsp&nbsp&nbsp <td>:&nbsp&nbsp&nbsp&nbsp&nbsp</td></b> </td><td>".$row['UserID']."</td></tr></p>";
            echo "<tr><td><p name='sender'><b>Name<td>:</td>  </td><td>".$row['Name']."</td></tr></p>";
            echo "<tr><td><p><b>Email ID</b><td>:</td> </td><td>".$row['Email']."</td></tr></p>";
            echo "<tr><td><p><b>A/C No.</b><td>:</td> </td><td>".$row['Acc_Number']."</td></tr></p>";
            echo "<tr><td><p><b>IFSC</b><td>:</td> </td><td>".$row['IFSC']."</td></tr></p>";
             
          }         
        }
        $result1=mysqli_query($con,"SELECT * FROM customer WHERE Name='$receiver'");
        while($row=mysqli_fetch_array($result1))
        {
          echo "<tr><td><p><b>Receiver<td>:&nbsp&nbsp&nbsp&nbsp&nbsp</td></b></td><td>".$row['Name']."</td></tr></p>";
        }
        echo "</table>";
      ?>

<p align="center">
      <input type="button" onclick="location.href='transc.php';" value="View Transactions" />
</p>


</body>
</html>
