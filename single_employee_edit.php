<?php
require 'conn.php';
session_start();

if (!$_SESSION['u_name']) {
    header('Location:index.php');
}
?>

<html lang="en">
    <head>
        <title>Welcome</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head> 
    <body>
       <!-- <p><a href="logout.php">Log Out</a></p>
        <h3>Welcome*<?php /* echo $_SESSION['u_name']; */ ?> </h3>
       -->
       
       <!-- nav -->
      <?php 
     
      require 'nav.php';
      
      ?>
       <!-- nav -->
      
       <!-- main content -->
       <div class="container">
           <div class="row">
               <div class="col-lg-3 col-md-3">
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           Employees
                       </div>
                       <ul class="list-group">
                           <li class="list-group-item">
                               <a href="add_new_employee.php">Add New Employee</a>
                           </li>
                            <li class="list-group-item">
                                <a href="dash.php">View All Employees</a>
                           </li>
                       </ul>
                   </div> 
               </div>
               <div class="col-lg-9 col-md-9">
                   <div class="panel panel-default">
                       <div class="panel panel-heading">
                          Add Employee
                       </div>
                       <div class="panel-body">
                           <form action="" method="POST">
                                <?php
                   $id= $_GET['e_id'];
                           $sql="SELECT * from employees where e_id='$id'";
                $result= mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    //output data of each row
                    while ($employee =  mysqli_fetch_assoc($result))
                        {
                        ?>
                               
                               <div class="form-group">
                                   <input type="text" class="form-control input-sm" name="e_name" placeholder="Employee Name" value="<?php echo $employee['e_name']; ?> " required>
                               </div>
                                 <div class="form-group">
                                     <input type="text" class="form-control input-sm" name="e_email" placeholder="Employee Email" value="<?php echo $employee['e_email']; ?> " required>
                               </div>
                                 <div class="form-group">
                                     <input type="tel" class="form-control input-sm" name="e_phone" placeholder="Employee Phone Number" value="<?php echo $employee['e_phone']; ?> " required>
                               </div>
                               <div class="form-group">
                                   <input type="submit" class="btn btn-sm btn-success" value="Update employee" name="e_update">
                               </div>
                             <?php 
                           
                           
                        }
                }
            
            else
                {
                echo '0 Results';
                }
               
                           ?>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div> 
       <!-- main content -->
      <?php
     if (isset($_POST['e_update'])) {
         $e_name=$_POST['e_name'];
         $e_email=$_POST['e_email'];
         $e_phone=$_POST['e_phone'];
         $sql="update employees set e_name='$e_name',e_email='$e_email',e_phone='$e_phone' where e_id='$id'";
     
         if (mysqli_query($conn, $sql)) {
             header('Location:dash.php');
         }
         else
             {
             echo "ERROR Updating Record: ".mysqli_error($conn);
             }
     }
      ?>
       
       <script src="htttps://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="htttps://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
