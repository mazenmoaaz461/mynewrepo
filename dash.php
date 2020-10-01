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
                           Employees List
                       </div>
                       <table class="table table-border">
                           <tr>
                               <th>ID</th>
                               <th>Name</th>
                               <th>Details</th>
                               <th>Edit</th>
                               <th>Delete</th>
                           </tr>
                           <?php
                           $sql="SELECT * from employees";
                $result= mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    //output data of each row
                    while ($employee =  mysqli_fetch_assoc($result))
                        {
                        ?>
                           <tr>
                               <td><?php echo $employee['e_id'];?></td>
                               <td><?php echo $employee['e_name'];?></td>
                               <td><a href="single_employee.php?e_id=<?php echo $employee['e_id']; ?> "class="btn btn-block btn-xs btn-info">Details</a></td>
                               <td><a href="single_employee_edit.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-block btn-xs btn-warning">Edit</a></td>
                               <td><a href="delete_employee.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-block btn-xs btn-danger">Delete</a></td>
                           </tr>
                           <?php 
                           
                           
                        }
                }
            
            else
                {
                echo '0 Results';
                }
               
                           ?>
                       </table>
                   </div>
               </div>
           </div>
       </div> 
       <!-- main content -->
      
       <script src="htttps://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="htttps://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
