<?php
 include "navbar.php";
 include "connection.php";
?>
<!DOCTYPE>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    .srch{
padding-left: 950px;
    }
	body {
    background-image: url("1.jpg");
  font-family: "Lato", sans-serif;
}
.container{
  background-color: black;
  
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
    <body>
    <div id="mysidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closerNav()">&times;</a>
    <div style="color: white">
    <?php
    echo "<img class='img-circle profile_img' height=100 width=100 src='image/".$_SESSION['pic']."'>";
    echo "Welcome   ".$_SESSION['login_user'];
    ?>
    </div>
  </div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
 
  <a href="book.php">Books</a>
  <a href="Request.php">request</a>
   <a href="issue_info">Issue Information</a>
 
</div>

<div id="main">
 
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor="rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor="white";
}
</script>
</div>
<div class="container">
<div>
    <h2 style="text-align: center;background-color:orange"> Approve request</h2>
    <form class="approve " action="" method="POST"><br>
        <input class="form-control" type="text" name="approve" style=" text-align:center;" placeholder="Yes or Not" required="">
  <br> <br>
    <input class="form-control" type="text" name="Issue" style=" text-align:center;" placeholder="Issue date yyyy-mm-dd" required="" ><br><br>
    <input class="form-control" type="text" name="Return" style=" text-align:center;"  placeholder="Return date yyyy-mm-dd" required="" ><br><br>
    <button class="form-control" style="background-color: orange;" type="submit" name="submit" class="btn btn-default">
         Approve
    </form>
</div>
<?php
if(isset($_POST['submit']))
{
mysqli_query($db,"UPDATE `issue_book` SET approve= '$_POST[approve]',Issue='$_POST[issue]', Return='$_POST[return]' WHERE
username=' $_SESSION[user_name]' and Title='$_SESSION[Title]';");
?>
<script type="text/javascript">
alert( "update Successfully.");
window.location="request.php"
</script>
<?php
}
?>
</div>
    </body>
    </html>