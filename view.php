<!DOCTYPE html>
<html>
<title>Online Bank System</title> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  body{
    margin-top: 0px;
    margin-left: 0px;
    margin-right: 0px;
  }
.button1 {
      background-color: #2b67f8; 
      border-radius: 29px;
    border-bottom-color:red;
      color: white;
      padding: 10px 25px;
      text-align: center;
      text-decoration:none;
      display: inline-block;
      font-size: 20px;
    }
     .header {
    margin-left: -2px;
    color: white;
    font-size: 50px;
    font-variant: small-caps;
    margin-top: -140px;
    padding-left: 24px;
    
}

    .button1:hover {background-color: #1844aa}
    
    .button1:active {
      background-color: #1844aa;
      box-shadow: 0 5px #666;
      transform: translateY(4px);
    }
            
    .topnav {
  overflow: hidden;
 
}
.btnstyle{
  padding-left: 7rem;
  padding-top: 34px;
}


.topnav {
  overflow: hidden;
  background-color: black;
  height: 80px;
  margin-top: 0px;
}

.topnav a {
  float: left;
  color: rgb(211,217,233);
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #2b67f8;
  color: white;
}



.topnav-right {
  float: right;
  font-family: Arial, sans-serif;
  margin-top: 16px;
}
body{
  background-image:url('https://images.unsplash.com/photo-1500627965408-b5f2c8793f17?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80');
  width:auto;
  height:100%;
  background-size:cover;
}

.button {
  display: inline-block;
  border-radius: 4px;
  background-color:green;
  border: none;
  color: white;
  text-align: center;
  font-size: 15px;
  font-family:'Trebuchet MS';
  padding: 10px;
  width: 50%;
  margin: 5px;
}
.button:hover{
  background-color: white;
  color: black;
}


.tablediv{
  align: center;
  padding: 8px;
  margin:5px;
  width:70%; 
  /*margin-left:15%; 
  margin-right:15%;*/
  border:2px solid white;
  padding-left:-20rem;
}

.img{
     height: 19rem;
     padding-left: 59rem;
     margin-top: -474px;
     position: absolute;
    }

table{
  
  font-family:'Trebuchet MS',sans-serif;
  font-weight:bold;
  
  
  background: #f9fafcc0;
  width: 50%;  
  border:2px solid black;
  margin-left: auto;
  margin-right: auto;
  border-collapse: collapse;
  
  
}
th{
  padding: 10px 10px;
  text-align: center;
  font-weight: 500;
  font-size: 20px;
  border: 2px solid black;
  color: rgb(1, 29, 104);
  text-transform: uppercase;
  border-collapse: collapse;
}
td{

  text-align: center;
  vertical-align:middle;
  font-weight: bold;
  border: 2px solid black;
  font-size: 18px;
  color: black;
  border-collapse: collapse;
}
@media screen and (max-width: 800px){
    div.tablediv{
        width:100%; 
        margin-left:0%; 
        margin-right:0%;
        padding:0px;
        margin:0px;
        }
     table{
         padding:0px;
         margin:0px;
     } 
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
}
</style>
</head>
<body>
   
   <div class="topnav">
    <div class="topnav-right">
        <a href="index.html"  >Home</a>
        <a class="active" href="View.php">View Customers</a>
        <a href="transc.php">View Transactions</a>
  </div>
</div>

<div class="header">
<h5 style="padding-right: 1rem;margin-top: 75px">ECO BANK</h5>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<div style="float: center">
<table class="center">
<tr>
<th >Name</th>
<th>Account Number</th>
<th> Money</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "qxp");

// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name, acc_number FROM customer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

// output data of each row

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<form method ='post' action = 'OneCustomer.php'>";
    echo "<td>" . $row["name"]. "</td><td>" . $row["acc_number"] . "</td>";
    echo "<td ><a href='OneCustomer.php'><button class='button' type='submit' ' name='user'  id='users1' value= '{$row['name']}' ><span>Transfer</span></button></a></td>";
    echo "</tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>

</table>
</div>
</body>
</html>
