<?php
 include "navbar.php";
 include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title> Admin Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    .srch
    {
    padding-left: 950px;
    }
  	body
     {
    background-color: white;     
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
   
    <div style="color: white">
   
      </div>
  </div>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="ad_book.php">Books</a>   
 <a href="add.php">Add Books</a>
  <a href="request.php">request</a>
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
<!---search----------------->
    <div class="srch">
        <form class="navbar-form" method="POST" name="form1">
        <input class="form-control" type="text" name="search"
			   placeholder="Search Books.." required="">
            <button style="background-color: orange;" type="submit" name="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span>
            </button>
        </form>
        <form class="navbar-form" method="POST" name="form1">
        <input class="form-control" type="text" name="title"
			   placeholder="enter Book title.." required="">
            <button style= "background-color: orange;" type="submit" name="submit1" class="btn btn-default">
           Delete
            </button>
        </form>
       
    </div>

<h2>List Of Books</h2>
	<?php
      
      if(isset($_POST['submit']))
         {
           $q = mysqli_query($db,"SELECT * FROM `books` where Title like '%$_POST[search]%' ");
           if(mysqli_num_rows($q)==0)
           {
             echo "SORRY! No Book Found";
           }
         else
         {
      echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: yellow;'>";
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
        $res = mysqli_query($db,"SELECT * FROM `books` ORDER BY `books` .`Title` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: orange;'>";
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
 
  ?>

 </div>
</body>
</html>
