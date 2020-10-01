<?php
require 'conn.php';
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-lg-push-4 col-md-push-4">
                    <div class="panel panel-default" style="margin-top:  50px;">
                        <div class="panel-heading">Login</div>
                        <div class="panel-body">
        <form action="" method="POST">       
        <div class="form-group">
        <input type="text" class="form-control input-sm" name="u_name" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control input-sm" name="u_pass" placeholder="Password" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success btn-sm" name="u_login" value="Login">
            <a href="register.php" class="btn btn-info btn-sm">Register</a>
        </div>
        </form>
        </div>
            </div>
                </div>
                    </div>
        </div>
            <?php
            if (isset($_POST['u_login'])) {
                $u_name=$_POST['u_name'];
                $u_pass=md5($_POST['u_pass']);
                
                /* echo $u_name;
                echo '<br>';
                echo $u_pass;
                
                 * *>
                 */
                $sql="SELECT * from users where u_name='$u_name'";
                $result= mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    //output data of each row
                    while ($user =  mysqli_fetch_assoc($result))
                        {
                        //echo "id: ".$row["id"]." - Name: ".$row["firstname"]. " ". $row['lastname'] . "<br>";
                        if ($u_name==$user['u_name'] && $u_pass==$user['u_pass'])
                            
                            {
                            $_SESSION['u_name']=$u_name;
                            
                            header('Location: dash.php');
                            /* echo $u_name;
                echo '<br>';
                echo $u_pass;*/
                        }
                        else
                            {
                            echo "<script>alert('Invalid username or password');</script>";
                            }
                       
                        
                        }
                }
            
            else
                {
                echo '0 Results';
                }
               } 
            ?>
        <!-- Login -->
        <script> src="https://code.jquery.com/jquery-1.12.4.min.js"</script>
        <script> src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"</script>
        </body>
</html>
