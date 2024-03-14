<?php
include_once('db_connection.php');
$var=$_SESSION['email'];
$login = "SELECT * FROM users WHERE email='$var'";
$result=mysqli_query($conn,$login) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
$username=$row['username'];
$email=$row['email'];

?>

<?php

$appointment = "SELECT * FROM medicalbill WHERE user_email='$var' Order by appointment_id DESC";
$result=mysqli_query($conn,$appointment) or die(mysqli_error($conn));

$rowcount=mysqli_num_rows($result);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
  <title>User Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap-custom.min.css" />
        <link rel="stylesheet" type="text/css" href="css/home-fc7feca9f503fbeaf0f12645f3d0f2dc.css" />
 <link rel="stylesheet" type="text/css" href="css/bootstrap-custom.min.css" />
        <link rel="stylesheet" type="text/css" href="css/home-fc7feca9f503fbeaf0f12645f3d0f2dc.css" />
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
     
        
      </head>
<body>
<?php 
include_once('profilenav.php');
?> 
              
               <div class="row" id="userCardContainer">
                      <div class="col-sm-10 hidden-xs user-card-wrapper separator"><div class="user-card row bg-white">
                        <div class="product-name heading-two col-sm-3 col-lg-2">Your Profile</div>
                        <div class="user-info col-sm-9 col-lg-10">
                          <div class="user-details">
                            <div class="user-name heading-four"><?php echo htmlspecialchars($username);?></div>
                            <div class="user-contact text-small subtle"><!-- react-text: 66 --><?php echo htmlspecialchars($email);?><!-- /react-text --><!-- react-text: 18 --><!-- /react-text --></div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                </body>
               
                
                 <?php
                 include_once('profilesidebar.php');
                 ?>
         
                 <div class="app-container"style="position: relative;top:-795px;width: 1270px;left: 241px;">
                 <div data-reactroot=""class="main-container bg-grey"style="overflow: auto;position: relative; top: 72px;text-align: center;">
                                    <?php
                                                    if($rowcount > 0){

                                 $row=mysqli_fetch_all($result,MYSQLI_ASSOC);

                                     foreach ($row as $row){ ?>
                                   <div class="container">
                                      <div class="row">
                                          <div class="col-lg-4">
                                              <div class="card card-margin" style="position: relative;width: 495px;top:70px;left: 407px;height: 236px;">
                                                  <div class="card-header no-border">
                                                      <h5 class="card-title" ></h5>
                                                  </div>
                                                  <div class="card-body pt-0">
                                                      <div class="widget-49">
                                                          <div class="widget-49-title-wrapper">
                                                              <div class="widget-49-date-primary"style="position: absolute;top: 78px;left: 25px;">
                                                                  <span class="widget-49-date-day"style="font-size: 22px;" ><?php echo htmlspecialchars($row['appointment_id']);?></span>
                                                                  
                                                              </div>
                                                              <div class="widget-49-meeting-info" style="overflow: hidden;">
                                                                  <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 41px;font-size: 17px;">Doctor Name: Dr.<?php echo htmlspecialchars($row['doc_name']);?> </span>
                                                                  <span class="widget-49-pro-title"style="position: absolute;left: 113px;font-size: 17px;top: 64px;">Patient Name: <?php echo htmlspecialchars(ucfirst($row['pname']));?> </span>
                                                                   <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 110px;font-size: 17px;">Hospital Name:<?php echo htmlspecialchars($row['hname']);?></span>
                                                                    <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 86px;font-size: 17px;">Treatment Mode:<?php echo htmlspecialchars($row['tmode']);?></span>
                                                                    <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 135px;font-size: 17px;">Billing Date:<?php echo htmlspecialchars($row['time']);?></span>


                                                                    

                                                          <?php $a_id = $row['appointment_id'];  ?>
                                                         
                                                          <form method='POST' action="downloadbill.php" style="position: absolute;top: 173px;left: 352px;">
                                    
                                                         <input type='hidden' value="<?php echo $row['appointment_id'];  ?>" name='appointment_id'>
                                                        <button type='submit' class='btn btn-primary' name='cancel' >Download Bill</button>
                                            
                                                         </form>

                                                              </div>
                                                          </div>
                                         

                                                              
                                                          </div>

                                                          
                                            
                                                     <!--/form-->
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                  </div>
                <?php }}else{
                  echo "No Records Found";
                } ?>
                  </div>
                </div>

                         
                       

      </body>
    </html>