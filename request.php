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
  font-family: "Lato", sans-serif;
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
    <div style="color: black">
    <?php
    echo "<img class='img-circle profile_img' height=100 width=100 src='image/".$_SESSION['pic']."'>";
    echo "Welcome   ".$_SESSION['login_user'];
    ?>
    </div>
  </div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
 
  <a href="book.php">Books</a>
  <a href="request.php">request</a>
  
 
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
  <?php   
   if (isset($_SESSION['login_user']))
         {
         $q=mysqli_query($db,"SELECT * FROM `issue_book` where username='$_SESSION[login_user]' ;");

         if(mysqli_num_rows($q)==0)
         {
            echo "<br><br>";
            echo "<h2>";
             echo "There's no Book Reqest Pending";
             echo "</h2>";
         }
         else
         {
            echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #673ab754;'>";
				//Table header
				echo "<th>"; echo "Title";	echo "</th>";
				echo "<th>"; echo "Approve_Status";  echo "</th>";
				echo "<th>"; echo "Issue_date";  echo "</th>";
				echo "<th>"; echo "return_date";  echo "</th>";
				
			
			echo "</tr>";	
         while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['Title']; echo "</td>";
				echo "<td>"; echo $row['approve']; echo "</td>";
				echo "<td>"; echo $row['issue']; echo "</td>";
				echo "<td>"; echo $row['return']; echo "</td>";
			

				echo "</tr>";
			}
		echo "</table>";
         }
         
     }
    else{
        echo"</br></br></br>";
        echo"<h2>";
        echo"Please Login first to see the request.";
        echo"</h2>";
    }



     ?>
    </body>
</html>