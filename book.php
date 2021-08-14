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
  font-family: "Lato", sans-serif;
  background-image: url("contact.jpg");
  color: white;
}
.container{
  background-color: #111;
  opacity: .8;
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
  document.body.style.backgroundColor="black";
}
</script>
<div class="container">
    <div class="srch">
        <form class="navbar-form" method="post" name="form1">
            <input class="form-control" type="text" name="search"
			 placeholder="Search Books.." required="">
            <button style="background-color: skyblue;" type="submit" name="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span>
            </button>
        </form>
    </div>
	<div class="srch">
        <form class="navbar-form" method="post" name="form1">
            <input class="form-control" type="text" name="Title" placeholder="enter Books  Title.." required="">
            <button style="background-color: skyblue;" type="submit" name="submit1" class="btn btn-default">Request
            </button>
        </form>
    </div>

	<h2>List Of Books</h2>
	<?php
      
      
      if (isset($_POST['submit']))
         {
         $q=mysqli_query($db,"SELECT * FROM `books` where Title like '%$_POST[search]%' ");

         if(mysqli_num_rows($q)==0)
         {
             echo "SORRY! No Book Found";
         }
         else
         {
            echo "<table class='table table-bordered ' >";
			echo "<tr style='background-color: #673ab754;'>";
				//Table header
				echo "<th>"; echo "ISBN";	echo "</th>";
				echo "<th>"; echo "Title";  echo "</th>";
				echo "<th>"; echo "Author";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Publication";  echo "</th>";
			
			echo "</tr>";	
         while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['ISBN']; echo "</td>";
				echo "<td>"; echo $row['Title']; echo "</td>";
				echo "<td>"; echo $row['Author']; echo "</td>";
				echo "<td>"; echo $row['Edition']; echo "</td>";
				echo "<td>"; echo $row['Publication']; echo "</td>";
			

				echo "</tr>";
			}
		echo "</table>";
         }
         
     }
     else
     {
        $res=mysqli_query($db,"SELECT * FROM books ORDER BY books.`Title` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: skyblue;'>";
				//Table header
				echo "<th>"; echo "ISBN";	echo "</th>";
				echo "<th>"; echo "Title";  echo "</th>";
				echo "<th>"; echo "Author";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Publication";  echo "</th>";
			
			echo "</tr>";	
         while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['ISBN']; echo "</td>";
				echo "<td>"; echo $row['Title']; echo "</td>";
				echo "<td>"; echo $row['Author']; echo "</td>";
				echo "<td>"; echo $row['Edition']; echo "</td>";
				echo "<td>"; echo $row['Publication']; echo "</td>";
			

				echo "</tr>";
			}
		echo "</table>";
	 }
	 if(isset($_POST['submit1']))
	 {
		 if(isset($_SESSION['login_user']))
		 {
       mysqli_query( $db,"INSERT INTO `issue_book` Values('$_SESSION[login_user]','$_POST[Title]','','','');");
       ?>
			 <script type="text/javascript">
			window.location="request.php"
       </script>
			 <?php
		 }
		 else
		 {
			 ?>
			 <script type="text/javascript">
			 alert("You Need login to Request a book");
       </script>
			 <?php
		 }
	 }
?>
  </div>     
</body>
</html>