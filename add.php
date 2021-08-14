<?php
 include "navbar.php";
 include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    .srch{
padding-left: 950px;
    }
	body {
  background-image: url(add.jpg);
  font-family: "Lato", sans-serif;
}
.book{
    width: 400px;
    margin: 0px auto;
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
    echo " ".$_SESSION['login_user'];
    ?>
    </div>
  </div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
 
  
  <a href="request.php">request</a>
  
 
</div>

<div id="main">
 
  <span style="font-size:30px;cursor:pointer;color:White;  "onclick="openNav()">&#9776; open</span>
<div class="container" style="text-align:center ;">
    <h2 style="color:#111;text-align:center"><b>Add New Books</b></h2>
    <form class="book" action="" method="POST" >
      
        <input type="text" name="ISBN" class="form-control" placeholder="ISBN" required=""><br>
        <input type="text" name="Title" class="form-control" placeholder="Title" required=""><br>
        <input type="text" name="Author" class="form-control" placeholder="Authors" required=""><br>
        <input type="text" name="Edition" class="form-control" placeholder="Edition" required=""><br>
        <input type="text" name="Publication" class="form-control" placeholder="Publication" required=""><br>
      <button class="btn btn-defaut" type="submit" name="submit">ADD</button>
    </form>
</div>
<?php 
 if(isset($_POST['submit']))
 {
     if(isset($_session['login_user']))
     {
         mysqli_query($db,"INSERT INTO books VALUES('$_POST[ISBN]','$_POST[Title]','$_POST[Author]',
         '$_POST[Edition]','$_POST[publication]');");
     ?>
     <script type="text/javascript">
     alert ("Book Added Successfully");
    </script>
     <?php
    }
    else{
        ?>
         <script type="text/javascript">
     alert ("You Need to Login First");
    </script>
    <?php
    }
}

?>
</div>
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
</bpdy>
</html>