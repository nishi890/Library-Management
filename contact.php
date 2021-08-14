<?php
include"navbar.php";
include"connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
        contact us
        </title>
        <style type="text/css">
        section
        {
margin-top:-100px;
        }
        </style>
    </head> 
    <body>
     <section>
     <div class="img_contact">
         
         <form  action="" method="POST">
        
         <div class="box3">
             <div class="ro">
             <input class="form-control" type="name" name="name" required="" placeholder="Enter Your Name"><br><br>
             <input class="form-control" type="email" name="email" required="" placeholder="Enter Your Email"><br><br>
             <input class="form-control" type="number" name="phone" required="" placeholder="Enter Your Phone"><br>
             </div>
             <div class="lo">
           
             <textarea class="form-control" type="message" name="message" placeholder="Enter Your Message" cols="50px"
              rows="9px"></textarea>
             
             </div>
             <div class="btn">
           <input class="btn btn-default" name="submit3" type="submit" value="Send Message" style="color: black; width: 170px;
              height: 35px;">
            
        </div>
          </form> 
        
          </div>
          
</div>
</div>
     </section><br>
     <footer>
     <p style="color:white;text-align:center;font-size:20px">   <span class="glyphicon glyphicon-tag"> Address : Khulsi,
         Chittagong </span><br><span class="glyphicon glyphicon-envelope"> Email : online @gmail.com</span>

       
           
         </p>
     </footer>
     <?php
     if(isset($_POST['submit3']))
     {
         mysqli_query($db,"INSERT INTO `contact` VALUES('$_POST[name]','$_POST[email]','$_POST[phone]','$_POST[message]');");
     }
     ?>
    </body>
    </html>
    
