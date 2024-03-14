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

$appointment = "SELECT * FROM cancelapp WHERE user_email='$var' Order By canceldate Desc";
$result=mysqli_query($conn,$appointment) or die(mysqli_error($conn));
$rowcount=mysqli_num_rows($result);
$online="DELETE FROM cancelnotification WHERE user_email='$var'";
$delete = mysqli_query($conn,$online);




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
                      <div class="col-sm-12 hidden-xs user-card-wrapper separator"><div class="user-card row bg-white">
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
                     
               
                
                 <?php
                 include_once('profilesidebar.php');
                 ?>
         
                 <div class="app-container"style="position: relative;top:-795px;width: 1270px;left: 241px;">
                 <div data-reactroot=""class="main-container bg-grey" style="overflow: auto;position: relative; top: 72px;text-align: center;">
                                                    <?php
                                                    if($rowcount > 0){

                                 $row=mysqli_fetch_all($result,MYSQLI_ASSOC);

                                     foreach ($row as $row){ ?>
                                   <div class="container" >
                                      <div class="row"style="top:-220px;position: relative; left: 85px;">
                                          <div class="col-lg-4">
                                              <div class="card card-margin" style="position: relative;width: 625px;top: 270px;left: 267px;height: 264px;">
                                                  <div class="card-header no-border">
                                                      <h5 class="card-title" ></h5>
                                                  </div>
                                                  <div class="card-body pt-0">
                                                      <div class="widget-49">
                                                          <div class="widget-49-title-wrapper">
                                                              <div class="widget-49-date-primary"style="position: absolute;top: 102px;left: 25px;">
                                                                  <span class="widget-49-date-day"style="font-size: 22px;" ><?php echo htmlspecialchars($row['appointment_id']);?></span>
                                                                  
                                                              </div>
                                                              <div class="widget-49-meeting-info" style="overflow: hidden;">
                                                                  <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 28px;font-size: 17px;">Doctor Name: Dr.<?php echo htmlspecialchars($row['doc_name']);?> </span>
                                                                  <span class="widget-49-pro-title"style="    position: absolute;left: 113px;font-size: 17px;top: 49px;">Patient Name: <?php echo htmlspecialchars($row['pname']);?> </span>

                                                                  <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 72px;font-size: 17px; ">Appointment Date:<?php echo htmlspecialchars($row['booking_date']);?></span>
                                                                  <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 95px;font-size: 17px;">Appointment Booking Time:<?php echo htmlspecialchars($row['booking_time']);?></span>
                                                                   <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 116px;font-size: 17px;">Hospital Name:<?php echo htmlspecialchars($row['hname']);?></span>
                                                                    <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 138px;font-size: 17px;">Treatment Mode:<?php echo htmlspecialchars($row['tmode']);?></span>
                                                                    <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 161px;font-size: 17px;">Cancel By:<?php echo htmlspecialchars($row['cancelby']);?></span>
                                                                    <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 186px;font-size: 17px;">Cancel Date:<?php echo htmlspecialchars($row['canceldate']);?></span>
                                                                    <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 208px;font-size: 17px;">Reason:<?php echo htmlspecialchars($row['reason']);?></span>

                                                              </div>
                                                          </div>
                                                          
                                                          

                                                              
                                                          </div>
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