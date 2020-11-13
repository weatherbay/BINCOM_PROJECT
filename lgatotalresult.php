<?php
include_once 'database.php';

$db = new backend();


$error = $lgaresult =""; 

if(isset($_POST['lgaresult'])) $lgaresult = $db->sanitizeString($_POST['lgaresult']);


if ($lgaresult ==  ""){
        $error =  "validate(form);<br /><br />";
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
        <header class="header-area clearfix mb-5">
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
                            <h2>LGA RESULT</h2>
                        </div>

                        <div class="cart-table clearfix">
						
                            <form method ="post" action = "lgatotalresult.php" onSubmit = "return validate(this)">
							<div class="row">
                                    <div class="col-md-6 mb-3">
                                        <select name="lgaresult" id="lgaresult">
										<option value="Ughelli North">Ughelli North<option/>
										<option value="Sapele">Sapele<option/>
										<option value="Warri South">Warri South<option/>
										<option value="Ukwuani">Ukwuani<option/>
										
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="submit" class="btn btn-primary" name="search" value="search">
                                    </div>
							
							</form>
                        </div>
                    </div>
                    
                </div>
            </div>
			<div class="cart-table clearfix">
                            <table id = "datatable" class="table table-responsive">
                                <thead>
                                    <tr>
                                        
										 
                                        <th>TotalResult</th>
                                        
                                        
										 
                                    </tr>
                                </thead>
                                <tbody class="bg-black">
								<h1 class="bg-danger">
                                   <?php
								   
								   $result = $db->queryresult_pu_result("SELECT * FROM lga  WHERE lga_name='$lgaresult'") or die ("could not execute lga");
									while($row =mysqli_fetch_assoc($result))
											
									{
										$lgaid = $row['lga_id'];
					
										$frompoll = $db->queryresult_pu_result("SELECT * FROM polling_unit  WHERE lga_id='$lgaid'") or die ("could not execute polling_unit");
										while($row =mysqli_fetch_assoc($frompoll)){
											$uniqueid = $row['uniqueid'];
											$lgasum = $db->queryresult_pu_result("SELECT polling_unit_uniqueid, SUM(party_score) FROM announced_pu_results WHERE polling_unit_uniqueid='$uniqueid'") or die ("could not execute party_sum");
											$loadresult = $lgasum;
											while($row = mysqli_fetch_assoc($loadresult)){
											$db->partyscore($row['SUM(party_score)']);
											echo "<script>window.location ='lgatotalresult.php'</script>";
											}
									}}
				
				
								   ?>
                                    <h1>
                                </tbody>
                            </table>
                        </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
	

  

    
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