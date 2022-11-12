<?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"qxp");
if(!$con){
    die("Connection failed");

}
$_SESSION['user']=$_POST['user'];
$_SESSION['sender']=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">    
<title>Online Bank System</title>
<style>
 body{
    
    background-size: cover;
    margin-top: 0px;
    margin-left: 0px;
    margin-right: 0px;
  }
 .header {
    margin-left: 14px;
    color: white;
    font-size: 50px;
    font-variant: small-caps;
    margin-top: -140px;
    padding-left: 16px;
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

body{
  background-image:url('https://images.unsplash.com/photo-1571715268998-d6e79bed5fc9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=872&q=80');
  width:auto;
  height:100%;
  background-size:cover;

}
button {
  border: 2px solid #2b67f8;
  background-color: white;
  color:#2b67f8;
  padding:0.35em 1.2em;
  border:0.1em solid #2b67f8;
  margin:0 0.3em 0.3em 0;
  margin-left:50px;
  font-size: 20px;
  font-weight:300;
  cursor: pointer;
  display:inline-block;
  text-align:center;
  min-width:150px;
  border-radius: 5px;
  font-family:'Trebuchet MS',sans-serif;
}
button:hover{
color:peachpuff;
background-color:#2b67f8;
}
.hidden {
   display: none;
   background:linear-gradient(
      rgba(255, 255, 255, 0.6),
      rgba(255, 255, 255, 0.5));
      padding:10px;
}

h3{
  font-family:'Trebuchet MS',sans-serif;
  font-size:25px;
  color:#2b67f8;
}

.user_details{
  font-size:20px;
  color:black;
  font-weight:bold;
  width:100%;  
  height:auto;
  margin-left:0%;
  text-align: left;
  padding-left: 1rem;
}


.container{

  margin: auto;

  width: 60%;
  background-color: rgba(129, 120, 120, 0.50);
  
}

.flex-direction{
  flex-direction:row;
}


.textbox{
  height: 20px;
  background-color: white);
  color:black;
  font-size: 15px;
  font-family:'Trebuchet MS',sans-serif;
  font-weight:bold;
}
.img{
  margin-top: -15rem;
    padding-left: 25rem;
}
@media screen and (max-width: 800px){
.flex-direction{
  flex-direction:column;

}    

.user_details{ 
  float:center; 
  top:0px;
  margin-left:50%;
  
  
  }
  .trans {
    padding-right: 140rem;
    float: left;
}
    
button{
  display:block;
  margin:0.4em auto;
  display:flex;
  justify-content: center;
}  
  }
 
</style>

<script type='text/JavaScript'>
function toggleTable() {

  document.getElementById("myTable").classList.toggle("hidden");

}

</script>
</head>
<body>
<header> 
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


<div class="container flex-direction">
<div class="center">  
  <div class="user_details"style="padding-left:100px;)">
    
    <!-- Senders Deatils -->
    <h3>Customer's Details</h3>
        <?php
        if (isset($_SESSION['user']))
        {
          $user=$_SESSION['user'];
          $result=mysqli_query($con,"SELECT * FROM customer WHERE Name='$user'");
          while($row=mysqli_fetch_array($result))
          {
            echo "<p><b>User ID &nbsp&nbsp&nbsp&nbsp:</b> ".$row['UserID']."</p>";
            echo "<p name='sender'><b>Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:  ".$row['Name']."</p>";
            echo "<p><b>Email ID</b>&nbsp&nbsp: ".$row['Email']."</p>";
            echo "<p><b>A/C No.</b>&nbsp&nbsp&nbsp&nbsp: ".$row['Acc_Number']."</p>";
            echo "<p><b>IFSC</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: ".$row['IFSC']."</p>";
            echo "<p><b class='font-weight-bold'>Balance</b>&nbsp&nbsp&nbsp&nbsp:<b>&nbsp&#8377;</b> ".$row['Balance']."</p>";
          }         
        }
      ?>
       </div>
</div>       
</div>

<div class="trans"style="padding-right:0rem; padding-left:750px;margin-top: -19.5rem;text-decoration: bold;">
<form action="transfer.php" method="POST">
<!-- Make Transcation -->
                    <h3>Make a Transaction</h3>
                    <b>To</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp
                <select name="reciever" id="dropdown" class="textbox" required>
                    <option>Select Recipient</option>
                <?php
                $db = mysqli_connect("localhost", "root", "", "qxp");
                $res = mysqli_query($db, "SELECT * FROM customer WHERE name!='$user'");
                while($row = mysqli_fetch_array($res)) {
                    echo("<option> "."  ".$row['Name']."</option>");
                }
                ?>
                </select>
                <br><br>
                   <b> From</b>&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp&nbsp&nbsp <span style="font-size:1.2em;"><input id="myinput" name="sender" class="textbox" disabled type="text" value='<?php echo "$user";?>'></input></span>
                    <br><br>
                    
                
                        <b >Amount :&nbsp&#8377;&nbsp</b>
                        <input name="amount" type="number" min="100" class="textbox" required >
                        <br><br>
                        <a href="index.html"><button id="transfer"  name="transfer">Transfer</button></a>                        
                        </form>
  </div>
    
<br>

</body>
</html>
