<?php require 'header.php'?>
<?php

     #checking if the button has been clicked
if (isset($_POST['vote'])){
	#creating variables to hold form data
	$president = $vicepresident = $general = $academics = $sports =$welfare  = 0;
	$success = $error = '';
		
	
	
    //picking data from the form
	if (isset($_POST['president'])){
    $president = $_POST['president'];
	}
	if (isset($_POST['vicepresident'])){
    $vicepresident = $_POST['vicepresident'];
	}
	if (isset($_POST['general'])){
    $general = $_POST['general'];
	}
	if (isset($_POST['academics'])){
    $academics = $_POST['academics'];
	}
	if (isset($_POST['sports'])){
    $sports = $_POST['sports'];
	}
	if (isset($_POST['welfare'])){
    $welfare = $_POST['welfare'];
	}
	//prevent cross site scripting attack
       
		$election_id = 1;
	
		$user_id = $_SESSION['id'];
		//check weather already registered
		// step 1 - write down the sql statement
	$sql = "SELECT * FROM vote WHERE user_id = $user_id  AND election_id = $election_id";
	// step 2-execute the sql statement using the mysqli_query function_exists
	$result = mysqli_query($conn, $sql);
	//step 3 - check if a row has been found
	$row = mysqli_num_rows($result);
	//$row = $result;
	
	if ($row>0){
		$error= '
				<div class="alert alert-danger alert-mg-b alert-st-four" role="alert">
                                <i class="fa fa-window-close adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
                                <i class="fa fa-times adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
                                <p class="message-mg-rt"><strong>Oh snap!</strong> You Have Already Voted in This Election.</p>
                 </div>
				';
	}else{
	//save data to database
	//sql statement to insert data to candidate table
	$sql = "INSERT INTO vote (user_id, candidate_id, election_id) 
            VALUES ($user_id, $president, $election_id),
					($user_id, $vicepresident, $election_id),
					($user_id, $general, $election_id),
					($user_id, $academics, $election_id),
					($user_id, $sports, $election_id),
					($user_id, $welfare, $election_id)";
	
            if ($conn ->query($sql)===TRUE){
                $success = '
				<div class="alert alert-success alert-st-one" role="alert">
                                <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
                                <p class="message-mg-rt"><strong>Well done!</strong> You successfully voted.</p>
                            </div>
				';
            }else{
                $error = '
				<div class="alert alert-danger alert-mg-b alert-st-four" role="alert">
                                <i class="fa fa-window-close adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
                                <i class="fa fa-times adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
                                <p class="message-mg-rt"><strong>Oh snap!</strong> Something Went Wrong Please Try Again..</p>
                 </div>
				';
            }
	}
	
}	

?>
<!--this is where the body will go-->

                            <?php 
								if (isset($success)):
								echo $success;
								endif;
								if(isset($error)):
									echo $error;
									endif;
													
							?>           

<!--THE PRESIDENT-->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-new-file"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>President</h2>
												<p>Vote For Your Preferred Presidentisl Candidate </p>
											</div>
										</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="product-new-list-area">
            <div class="container-fluid">
                <div class="row">
				 <form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "post" id="voteForm" style='background-color:yellow;'>
				 <!-- <p>dsajhvhasjbxasbjb</p> -->
					<?php 
				
					// step 1 - write down the sql statement
					$sql = "SELECT * FROM candidates WHERE position_id = 1 AND election_id = 1";
					// step 2-execute the sql statement using the mysqli_query function_exists
					$result = mysqli_query($conn, $sql);
					//step 3 - fetch the results
					$presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);
					
					foreach($presidents as $pres){
						$user_id = $pres['users_id'];
						$candidate_id = $pres['id'];
						$user_sql ="SELECT * FROM User WHERE id = $user_id"; 
						$user_results = mysqli_query($conn, $user_sql);
						$user_details = mysqli_fetch_assoc($user_results);
						$firstname = $user_details['first_name'];
						$othernames = $user_details['other_name'];
				?>
		
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/1.webp" alt=""></a>
                            <div class="overlay-content">
							<br />
                                <a href="#">
                                    <h1>President</h1>
                                </a>
                                <a href="#" class="btn-small"><?php echo $firstname." ".$othernames;?></a>
								<br />
                                
                                <a class="pro-tlt" href="#">
                                    <h4><?php echo $firstname." ".$othernames;?></h4>
                                </a>
                                <div class="pro-rating">
                                    <input type ="radio" name = "president" id ="president" value = "<?php echo $candidate_id;?>" style ="width:30px; height:30px; cursor:pointer; margin-left:20px;">
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
						}
				?>                  
                    
                </div>
            </div>
        </div>
		<!--VICE PRESIDENT-->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-new-file"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>Vice President</h2>
												<p>Vote For Your Preferred Vice Presidential Candidate </p>
											</div>
										</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="product-new-list-area">
            <div class="container-fluid">
                <div class="row">
				 <?php 
					//$dbconnect = mysqli_connect('localhost', 'admin', 'pass1234', 'voting');
					//retrieve the data from the database
					// step 1 - write down the sql statement
					$sql = "SELECT * FROM candidates WHERE position_id =  2 AND election_id = 1";
					// step 2-execute the sql statement using the mysqli_query function_exists
					$result = mysqli_query($conn, $sql);
					//step 3 - fetch the results
					$presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);
					
					foreach($presidents as $pres){
						$user_id = $pres['users_id'];
						$candidate_id = $pres['id'];
						$user_sql ="SELECT * FROM User WHERE id = $user_id"; 
						$user_results = mysqli_query($conn, $user_sql);
						$user_details = mysqli_fetch_assoc($user_results);
						$firstname = $user_details['first_name'];
						$othernames = $user_details['other_name'];
				?>
					
				
				 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/2.webp" alt=""></a>
                            <div class="overlay-content">
							<br />
                                <a href="#">
                                    <h1>Vice President</h1>
                                </a>
                                <a href="#" class="btn-small"><?php echo $firstname." ".$othernames;?></a>
								<br />
                                
                                <a class="pro-tlt" href="#">
                                    <h4><?php echo $firstname." ".$othernames;?></h4>
                                </a>
                                <div class="pro-rating">
                                    <input type ="radio" name = "vicepresident" id ="vicepresident" value = "<?php echo $candidate_id;?>" style ="width:30px; height:30px; cursor:pointer; margin-left:20px;">
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
						}
				?>
				                    
                    
                </div>
            </div>
        </div>
		
		<!--SEC GEN-->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-new-file"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>Secretary general</h2>
												<p>Vote For Your Preferred Secretary General Candidate </p>
											</div>
										</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="product-new-list-area">
            <div class="container-fluid">
                <div class="row">
				 <?php 
					//$dbconnect = mysqli_connect('localhost', 'admin', 'pass1234', 'voting');
					//retrieve the data from the database
					// step 1 - write down the sql statement
					$sql = "SELECT * FROM candidates WHERE position_id =  3 AND election_id = 1";
					// step 2-execute the sql statement using the mysqli_query function_exists
					$result = mysqli_query($conn, $sql);
					//step 3 - fetch the results
					$presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);
					
					foreach($presidents as $pres){
						$user_id = $pres['users_id'];
						$candidate_id = $pres['id'];
						$user_sql ="SELECT * FROM User WHERE id = $user_id"; 
						$user_results = mysqli_query($conn, $user_sql);
						$user_details = mysqli_fetch_assoc($user_results);
						$firstname = $user_details['first_name'];
						$othernames = $user_details['other_name'];
				?>
					
				
				 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/3.jpg" alt=""></a>
                            <div class="overlay-content">
							<br />
                                <a href="#">
                                    <h1>Secretary General</h1>
                                </a>
                                <a href="#" class="btn-small"><?php echo $firstname." ".$othernames;?></a>
								<br />
                                
                                <a class="pro-tlt" href="#">
                                    <h4><?php echo $firstname." ".$othernames;?></h4>
                                </a>
                                <div class="pro-rating">
                                    <input type ="radio" name = "general" id ="general" value = "<?php echo $candidate_id;?>" style ="width:30px; height:30px; cursor:pointer; margin-left:20px;">
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
						}
				?>
				                    
                    
                </div>
            </div>
        </div>
		
		<!--ACADEMICS-->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-new-file"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>Academics Secretary</h2>
												<p>Vote For Your Preferred Academics Secretarial Candidate </p>
											</div>
										</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="product-new-list-area">
            <div class="container-fluid">
                <div class="row">
				 <?php 
					//$dbconnect = mysqli_connect('localhost', 'admin', 'pass1234', 'voting');
					//retrieve the data from the database
					// step 1 - write down the sql statement
					$sql = "SELECT * FROM candidates WHERE position_id = 4 AND election_id = 1";
					// step 2-execute the sql statement using the mysqli_query function_exists
					$result = mysqli_query($conn, $sql);
					//step 3 - fetch the results
					$presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);
					
					foreach($presidents as $pres){
						$user_id = $pres['users_id'];
						$candidate_id = $pres['id'];
						$user_sql ="SELECT * FROM User WHERE id = $user_id"; 
						$user_results = mysqli_query($conn, $user_sql);
						$user_details = mysqli_fetch_assoc($user_results);
						$firstname = $user_details['first_name'];
						$othernames = $user_details['other_name'];
				?>
					
				
				 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/4.png" alt=""></a>
                            <div class="overlay-content">
							<br />
                                <a href="#">
                                    <h1> Academics Secretary</h1>
                                </a>
                                <a href="#" class="btn-small"><?php echo $firstname." ".$othernames;?></a>
								<br />
                                
                                <a class="pro-tlt" href="#">
                                    <h4><?php echo $firstname." ".$othernames;?></h4>
                                </a>
                                <div class="pro-rating">
                                    <input type ="radio" name = "academics" id ="academics" value = "<?php echo $candidate_id;?>" style ="width:30px; height:30px; cursor:pointer; margin-left:20px;">
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
						}
				?>
				                    
                    
                </div>
            </div>
        </div>
				<!--SPORTS-->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-new-file"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>Sports</h2>
												<p>Vote For Your Preferred Sports Secretarial Candidate </p>
											</div>
										</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="product-new-list-area">
            <div class="container-fluid">
                <div class="row">
				 <?php 
					//$dbconnect = mysqli_connect('localhost', 'admin', 'pass1234', 'voting');
					//retrieve the data from the database
					// step 1 - write down the sql statement
					$sql = "SELECT * FROM candidates WHERE position_id =  6 AND election_id = 1";
					// step 2-execute the sql statement using the mysqli_query function_exists
					$result = mysqli_query($conn, $sql);
					//step 3 - fetch the results
					$presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);
					
					foreach($presidents as $pres){
						$user_id = $pres['users_id'];
						$candidate_id = $pres['id'];
						$user_sql ="SELECT * FROM User WHERE id = $user_id"; 
						$user_results = mysqli_query($conn, $user_sql);
						$user_details = mysqli_fetch_assoc($user_results);
						$firstname = $user_details['first_name'];
						$othernames = $user_details['other_name'];
				?>
					
				
				 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/5.webp" alt=""></a>
                            <div class="overlay-content">
							<br />
                                <a href="#">
                                    <h1>Sports</h1>
                                </a>
                                <a href="#" class="btn-small"><?php echo $firstname." ".$othernames;?></a>
								<br />
                                
                                <a class="pro-tlt" href="#">
                                    <h4><?php echo $firstname." ".$othernames;?></h4>
                                </a>
                                <div class="pro-rating">
                                    <input type ="radio" name = "sports" id ="sports" value = "<?php echo $candidate_id;?>" style ="width:30px; height:30px; cursor:pointer; margin-left:20px;">
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
						}
				?>
				                    
                    
                </div>
            </div>
        </div>
				<!--WELFARE-->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-new-file"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>Security</h2>
												<p>Vote For Your Preferred Security Candidate </p>
											</div>
										</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="product-new-list-area">
            <div class="container-fluid">
                <div class="row">
				 <?php 
					//$dbconnect = mysqli_connect('localhost', 'admin', 'pass1234', 'voting');
					//retrieve the data from the database
					// step 1 - write down the sql statement
					$sql = "SELECT * FROM candidates WHERE position_id =  5 AND election_id = 1";
					// step 2-execute the sql statement using the mysqli_query function_exists
					$result = mysqli_query($conn, $sql);
					//step 3 - fetch the results
					$presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);
					
					foreach($presidents as $pres){
						$user_id = $pres['users_id'];
						$candidate_id = $pres['id'];
						$user_sql ="SELECT * FROM User WHERE id = $user_id"; 
						$user_results = mysqli_query($conn, $user_sql);
						$user_details = mysqli_fetch_assoc($user_results);
						$firstname = $user_details['first_name'];
						$othernames = $user_details['other_name'];
				?>
					
				
				 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/6.jpg" alt=""></a>
                            <div class="overlay-content">
							<br />
                                <a href="#">
                                    <h1>Welfare</h1>
                                </a>
                                <a href="#" class="btn-small"><?php echo $firstname." ".$othernames;?></a>
								<br />
                                
                                <a class="pro-tlt" href="#">
                                    <h4><?php echo $firstname." ".$othernames;?></h4>
                                </a>
                                <div class="pro-rating">
                                    <input type ="radio" name = "welfare" id ="welfare" value = "<?php echo $candidate_id;?>" style ="width:30px; height:30px; cursor:pointer; margin-left:20px;">
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
						}
				?>
				                    
                    
                </div>
            </div>
        </div>
		<div class="section-admin container-fluid" style="margin-top: 15px;">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">                                             
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                
                              <input type="submit" class="button-24" name = "vote" id = "vote" value = "Click To Submit Your Vote">
                            
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</form>
<?php require 'footer.php'?>
<!-- HTML !-->


