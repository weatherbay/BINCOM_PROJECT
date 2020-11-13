<?php
include_once 'database.php';

$db = new backend();
global $try;

$error = $polling_id = $party_abbrev= $party_score=$personnel_name=$user_ip_address=""; 
if (isset($_POST['polling_id'])) $polling_id =$db->sanitizeString($_POST['polling_id']); 
if (isset($_POST['party_abbrev'])) $party_abbrev =$db->sanitizeString($_POST['party_abbrev']); 
if (isset($_POST['party_score'])) $party_score =$db->sanitizeString($_POST['party_score']); 
if (isset($_POST['personnel_name'])) $personnel_name =$db->sanitizeString($_POST['personnel_name']); 
if (isset($_POST['user_ip_address'])) $user_ip_address  =$db->sanitizeString($_POST['user_ip_address']); 



if ($polling_id ==  "" || $party_abbrev =="" || $party_score=="" || $personnel_name =="" || $user_ip_address ==""){
	$error =  "validate(this);<br /><br />";

}
    
		else
		  {
			  
			 $result = $db->queryresult_pu_result("INSERT INTO projectpollling (polling_unit_uniqueid,party_abbreviation,party_score,entered_by_user,user_ip_address) VALUES 
			 ('$polling_id', '$party_abbrev', ' $party_score','$personnel_name','$user_ip_address')");
			 
			 if($result){
				 echo "<script> alert('info added')</script>";
				 echo "<script>window.location ='newpollingunit.php'</script>";
			 }
			
			
			
        }


?>







		  




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Title  -->
    <title>Polling unit| Result page</title>

    

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li><a href="resultpage.php">Poll_Result</a></li>
                    <li><a href="lgatotalresult.php">LGA_Result</a></li>
                    
                    <li class="active"><a href="newpollingunit.php">New_Unit</a></li>
                    
                </ul>
            </nav>
            
            
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                
                <a href="https://twitter.com/tobiagbabi"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <div class="cart-table-area section-padding-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>NEW POLLING UNIT ENTRY</h2>
                        </div>

                        <div class="cart-table clearfix">
						
                            <form method ="post" action = "newpollingunit.php" onSubmit = "return validate(this)">
							<div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" id="polling_id" name="polling_id" value="" placeholder="Polling_id" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="party_abbrev" name="party_abbrev" value="" placeholder="party_abbrev" required>
                                    </div>
							</div>
							
							<div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" id="party_score" name="party_score" value="" placeholder="Party_score" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="personnel_name" name="personnel_name" value="" placeholder="personnel_name" required>
                                    </div>
									
							<div class="row">
                                    <div class="col-md-6 mb-3 ml-3">
                                        <input type="text" class="form-control" id="user_ip_address" name="user_ip_address" value="" placeholder="user_ip_address" required>
                                    </div>
                                    <div class="col-md-6 mb-3 ml-3">
                                        <input type="submit" class="btn-lg btn-primary" name="add" value="Add">
                                    </div>
							
							
							</form>
                        </div>
                    </div>
                    
                </div>
            </div>
			
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
	

  

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        
                        <!-- Copywrite Text -->
                        <p class="copywrite">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved|...Tel:08126541151 <i class="icon-home color-danger" aria-hidden="true"></i> by <a href="https://tobi-agbabi.herokuapp.com" target="_blank">Tobi</a>
</p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
	
	<!--contact js-->
  <script src="js/validate.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  

  <script src="js/main.js"></script>

</body>

</html>



