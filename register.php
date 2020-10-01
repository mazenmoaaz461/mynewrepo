<?php 
require 'conn.php';
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
        <input type="email" class="form-control input-sm" name="u_email" placeholder="Email" required>
        </div>
        <div class="form-group">
        <input type="text" class="form-control input-sm" name="u_name" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control input-sm" name="u_pass" placeholder="Password" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success btn-sm" name="u_reg" value="Register">
            <a href="index.php" class="btn btn-info btn-sm">Login</a>
        </div>
        </form>
        </div>
            </div>
                </div>
                    </div>
            </div>
            <?php
            if (isset($_POST['u_reg'])) {
                $u_email=$_POST['u_email'];
                $u_name=$_POST['u_name'];
                $u_pass=md5($_POST['u_pass']);
            
                $sql="insert into users (u_email,u_name,u_pass) values('$u_email','$u_name','$u_pass')";
                
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Registered successfully!');</script>";
                }
                else
                    {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
            }
            ?>
        <!-- Login -->
         <script> src="https://code.jquery.com/jquery-1.12.4.min.js"</script>
        <script> src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"</script>
        </body>
</html>
