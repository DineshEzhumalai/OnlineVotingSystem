<?php
    include('./header.php'); 
    include('./db_connect.php');
    $sql = "SELECT * FROM `publish`";
    $Sql_query = mysqli_query($conn,$sql);
    $All_courses = mysqli_fetch_all($Sql_query,MYSQLI_ASSOC);
?>

<style>
 .switch { 
   position : relative ;
   display : inline-block;
   width : 60px;
   height : 20px;
   background-color: red;
   border-radius: 20px;
 }
 .switch::after {
  content: '';
  position: absolute;
  width: 18px;
  height: 18px;
  border-radius: 50%;
  background-color: white;
  top: 1px; // TO GIVE AN EFFECT OF CIRCLE INSIDE SWITCH.
  left: 5px;
  transition: all 0.3s;
}
.checkbox:checked + .switch::after {
  left : 40px; 
}
.checkbox:checked + .switch {
  background-color: green;
}
.checkbox { 
   display : none;
}

.btn{
            background-color: red;
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
        }
        .green{
            background-color: #199319;
        }
        .red{
            background-color: red;
        }
        
</style>

<div class="card">
  <div class="card-header">
    Results
  </div>
  <div class="card-body">
    <h5 class="card-title">The Publishing of the Election Results </h5>
  </div>
  
    <table class="table">
        <!-- TABLE TOP ROW HEADINGS-->
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Mode</th>
        </tr>
        <?php
  
            // Use foreach to access all the courses data
            foreach ($All_courses as $course) { ?>
            <tr>
                <td><?php echo $course['publish']; ?></td>
                <td><?php 
                        // Usage of if-else statement to translate the 
                        // tinyint status value into some common terms
                        // 0-Inactive
                        // 1-Active
                        if($course['status']=="1") 
                            echo "Active";
                        else 
                            echo "Inactive";
                    ?>                          
                </td>
                <td>
                    <?php 
                    if($course['status']=="1") 
  
                        // if a course is active i.e. status is 1 
                        // the toggle button must be able to deactivate 
                        // we echo the hyperlink to the page "deactivate.php"
                        // in order to make it look like a button
                        // we use the appropriate css
                        // red-deactivate
                        // green- activate
                        echo 
"<a href=deactivate.php?id=".$course['id']." class='btn red'>Deactivate</a>";
                    else 
                        echo 
"<a href=activate.php?id=".$course['id']." class='btn green'>Activate</a>";
                    ?>
            </tr>
           <?php
                }
                // End the foreach loop 
           ?>
    </table>
</div>



