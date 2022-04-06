<?php require 'header.php'?>

<!--this is where the body will go-->

                            

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
				 			 
					<?php 
					//$dbconnect = mysqli_connect('localhost', 'admin', 'pass1234', 'voting');
					//retrieve the data from the database
					// step 1 - write down the sql statement
					$sql = "SELECT * FROM candidates WHERE position_id =  1 AND election_id = 1";
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
						
						$vote_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
						$vote_query = mysqli_query($conn, $vote_sql);
						$total_votes = mysqli_num_rows($vote_query);
				?>
					
				
				 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/2.webp" alt=""></a>
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
                                <h1><?php echo $total_votes;?></h1>
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
						
						$vote_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
						$vote_query = mysqli_query($conn, $vote_sql);
						$total_votes = mysqli_num_rows($vote_query);
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
                                <h1><?php echo $total_votes;?></h1>
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
						
						$vote_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
						$vote_query = mysqli_query($conn, $vote_sql);
						$total_votes = mysqli_num_rows($vote_query);
				?>
					
				
				 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/2.webp" alt=""></a>
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
                                     <h1><?php echo $total_votes;?></h1>
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
					$sql = "SELECT * FROM candidates WHERE position_id =  4 AND election_id = 1";
					// step 2-execute the sql statement using the mysqli_query function_exists
					$result = mysqli_query($conn, $sql);
					//step 3 - fetch the results
					$presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);
					
					foreach($presidents as $pres){
						$user_id = $pres['user_id'];
						$candidate_id = $pres['id'];
						$user_sql ="SELECT * FROM User WHERE id = $user_id"; 
						$user_results = mysqli_query($conn, $user_sql);
						$user_details = mysqli_fetch_assoc($user_results);
						$firstname = $user_details['first_name'];
						$othernames = $user_details['other_name'];
						
						$vote_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
						$vote_query = mysqli_query($conn, $vote_sql);
						$total_votes = mysqli_num_rows($vote_query);
				?>
					
				
				 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/2.webp" alt=""></a>
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
                                     <h1><?php echo $total_votes;?></h1>
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
						
						$vote_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
						$vote_query = mysqli_query($conn, $vote_sql);
						$total_votes = mysqli_num_rows($vote_query);
				?>
					
				
				 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/2.webp" alt=""></a>
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
                                     <h1><?php echo $total_votes;?></h1>
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
												<h2>Welfare</h2>
												<p>Vote For Your Preferred Welfare Candidate </p>
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
						$othernames = $user_details['othernames'];
						
						$vote_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
						$vote_query = mysqli_query($conn, $vote_sql);
						$total_votes = mysqli_num_rows($vote_query);
				?>
					
				
				 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/2.webp" alt=""></a>
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
                                     <h1><?php echo $total_votes;?></h1>
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
		
<?php require 'footer.php'?>
<!-- HTML !-->
<button  role="button">Button 24</button>

