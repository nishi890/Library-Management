<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Library Management
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    </head>
    <style type="text/css">
    nav{
        float: right;
        word-spacing: 30px;
        padding: 32px;
        border: 1px;
      
    }
    nav li{
        display: inline-block;
        line-height: 30px;
        
        
    }
</style>
    <body>
        <div class="wrapper">
           <header>
            <div class="logo">
                <img src="lol.jpg">
                <h1 style="color: white;font-size: 20px;">Online Library System</h1>
             </div>

             <?php
            if(isset($_SESSION['login_admin']))
             {
                 ?>
                   <nav>
                     <ul>
                          <li><a href="index.php">Home</a></li>
                          <li><a href="ad_book.php">Book</a></li>
                          <li><a href="feedback.php">Feedback</a></li>
                          <li><a href="ad_login.php">LOGOUT</a></li>
                  
                     </ul>
                </nav>
         <?php
                }                    
                else
                {
                    ?> 
                 <nav>
                      <ul>
                         <li><a href="index.php">Home</a></li>
                         <li><a href="ad_book.php">Book</a></li>
                         <li><a href="feedback.php">Feedback</a></li>
                         <li><a href="admin_login.php">Admin_login</a></li>
                      </ul>
                 </nav>
         <?php
         } 
               
               ?>        
                      
 </header>
        <section>
            <div class="sec_img">
            <br><br><br>
           <div class="box">
            <h1 style="text-align: center;color: white; font-size: 37px; font-family: cursive;"><br>Welcome To Our Library</h1>
           </div>
        </div>
        </section>
        <footer>
        <p style="color:white;text-align:center;font-size:18px">   <span class="glyphicon glyphicon-earphone"> phone: 018********
         </span><br><span class="glyphicon glyphicon-envelope"> Email : online @gmail.com</span>
             </p>
        </footer>
         </div>
    </body>
</html>
      