<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Bank System</title>
<style>
  body{
    background-image: url('https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');
    background-repeat: no-repeat;
    background-size: cover;
    margin-top: 0px;
    margin-left: 0px;
    margin-right: 0px;
  }
.button {
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
    margin-left: 14px;
    color: white;
    font-size: 50px;
    font-variant: small-caps;
    margin-top: -140px;
    padding-left: 16px;
    
}
    .button:hover {background-color: #1844aa}
    
    .button:active {
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
  color: white;
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
 .header {
    margin-left: -2px;
    color: white;
    font-size: 50px;
    font-variant: small-caps;
    margin-top: -140px;
    padding-left: 24px;
}
header a{
  text-decoration: none;
}
.tablediv{
  float: center;
  padding: 8px;
  margin:5px;
  width:70%; 
 margin-left:15%; 
margin-right:15%;
overflow-x:auto;
}
table{
  
  font-family:'Trebuchet MS',sans-serif;
  font-weight:bold;
  
  
  background: #f9fafcc0;
  width: 85%;  
  border:2px solid black;
  margin-left: auto;
  margin-right: auto;
  border-collapse: collapse;

}
th{
  padding: 20px 10px;
  text-align: center;
  font-weight: 500;
  font-size: 20px;
  border: 2px solid black;
  color: rgb(1, 29, 104);
  text-transform: uppercase;
  border-collapse: collapse;
}
td{
  padding: 15px;
  text-align: center;
  vertical-align:middle;
  font-weight: bold;
  border: 2px solid black;
  font-size: 18px;
  color: black;
  border-collapse: collapse;
  
}
@media screen and (max-width: 800px){
    
  body{
  background-size:cover;
  background-position: right;
  

}
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
<header> 
 <div class="topnav">
    <div class="topnav-right">
        <a href="index.html"  >Home</a>
        <a  href="View.php">View Customers</a>
        <a class="active" href="transc.php">View Transactions</a>
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

<div class="tablediv"> 
<br><br>
<table>
<tr>
<th>Sender Name</th>
<th>Sender A/c No.</th>
<th>Recipient Name</th>
<th>Recipient A/c No.</th>
<th>Amount</th>
<th>Date & Time</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "qxp");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM transfer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<form method ='post' action = 'OneCustomer.php'>";
    echo "<td>" . $row["s_name"]. "</td><td>" . $row["s_acc_no"] . "</td><td>" . $row["r_name"]. "</td><td>" . $row["r_acc_no"] . "</td><td>" . $row["amount"] . "</td><td>" . $row["date_time"] . "</td>";
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

