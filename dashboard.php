<?php include('include/config.php'); ?>
<?php include('include/header.php'); ?>

<div id="main"> 
 <?php include('include/nav.php'); ?>
 
	
 
 <?php include('include/sidebar.php'); ?>


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left fb-bold">Dashboard <small class="text-success"> Welcome : <?php echo $_SESSION['admin_name'] ?></small> </h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">Dashboard</li>
													</ol>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>
						<!-- end row -->
						
						
 
						
							<div class="row">
									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
											<div class="card-box noradius noborder bg-default">
													<i class="fa fa-user-o float-right text-white"></i>
													<h6 class="text-white text-uppercase m-b-20">User</h6>
													<?php 
													$qurni ="SELECT *FROM users";
                                                $rsni = $db->query($qurni);
                                                $users=mysqli_num_rows($rsni);
                                                ?>
													<h1 class="m-b-20 text-white counter"><?php echo $users; ?></h1>
													<span class="text-white"><?php echo $users; ?> New User</span>
											</div>
									</div>

									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
											<div class="card-box noradius noborder bg-warning">
													<i class="fa fa-bar-chart float-right text-white"></i>
												 	<?php 
													$qurni ="SELECT *FROM category";
                                                $rsni = $db->query($qurni);
                                                $catagory=mysqli_num_rows($rsni);
                                                ?>
													<h6 class="text-white text-uppercase m-b-20">Category</h6>
													<h1 class="m-b-20 text-white counter"><?php echo $catagory; ?></h1>
														<span class="text-white"><?php echo $catagory; ?> New </span>
											</div>
									</div>

									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
											<div class="card-box noradius noborder bg-info">
													<i class="fa fa-bar-chart float-right text-white"></i>
											 	<?php 
													$qurni ="SELECT *FROM ptype";
                                                  $rsni = $db->query($qurni);
                                                  $ptype=mysqli_num_rows($rsni);
                                                ?>
													<h6 class="text-white text-uppercase m-b-20">  Category Type</h6>
													<h1 class="m-b-20 text-white counter"><?php echo $ptype; ?></h1>
														<span class="text-white"><?php echo $ptype; ?> New </span>
											</div>
									</div>

									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
											<div class="card-box noradius noborder bg-danger">
													<i class="fa fa-bar-chart float-right text-white"></i>
										 	<?php 
													$qurni ="SELECT *FROM subtype";
                                                $rsni = $db->query($qurni);
                                                $subtype=mysqli_num_rows($rsni);
                                                ?>
													<h6 class="text-white text-uppercase m-b-20">SubType</h6>
													<h1 class="m-b-20 text-white counter"><?php echo $subtype; ?></h1>
														<span class="text-white"><?php echo $subtype; ?> New </span>
											</div>
									</div>
							</div>
							<!-- end row -->


						 
							<!-- end row -->
							
							
							<div class="row">

									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
										<div class="card mb-3">
											<div class="card-header">
												<h3><i class="fa fa-users"></i> User details</h3>
									 
											</div>
												
											<div class="card-body">
												
												<table id="example1" class="table table-bordered table-responsive-xl table-hover display">
													<thead>
														<tr>
															<th>Name</th>
															<th>User ID</th>
														  <th>mobile</th>
															<th>City</th>
													 
															<th>Date</th>
															<th>Last Login</th>
															<th>Action</th>
															 
														</tr>
													</thead> 
													<tbody> 
														<?php
														$queryu ="SELECT *FROM users order by id desc";
														$result = $db->query($queryu);
															$i=1;
															while($row=mysqli_fetch_array($result))
															{
															?>
  
														<tr>
															<td><?php echo $row['name']; ?></td>
															<td><?php echo $row['uid']; ?></td>
															<td><?php echo $row['mobile']; ?></td>
															<td><?php echo $row['city']; ?></td>
													 
															<td><?php echo $row['date']; ?></td>
															<td><?php echo $row['last_login']; ?></td>
															<td>Action</td>
														</tr>

														<?php } ?>
														 
													</tbody>
												</table>
												
											</div>														
										</div><!-- end card-->					
									</div>

									
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 d-none">						
										<div class="card mb-3">
											<div class="card-header">
												<h3><i class="fa fa-star-o"></i> Tasks progress</h3>
												Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											</div>
												
											<div class="card-body">
												<p class="font-600 m-b-5">Task 1 <span class="text-primary pull-right"><b>95%</b></span></p>
												<div class="progress">
												<div class="progress-bar progress-bar-striped progress-xs bg-primary" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="95"></div>
												</div>
												
												<div class="m-b-20"></div>
												
												<p class="font-600 m-b-5">Task 2 <span class="text-primary pull-right"><b>88%</b></span></p>
												<div class="progress">
												<div class="progress-bar progress-bar-striped progress-xs bg-primary" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="88"></div>
												</div>
												
												<div class="m-b-20"></div>
												
												<p class="font-600 m-b-5">Task 3 <span class="text-info pull-right"><b>75%</b></span></p>
												<div class="progress">
												<div class="progress-bar progress-bar-striped progress-xs bg-info" role="progressbar" style="width: 78%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75"></div>
												</div>

												<div class="m-b-20"></div>
												
												<p class="font-600 m-b-5">Task 4 <span class="text-info pull-right"><b>70%</b></span></p>
												<div class="progress">
												<div class="progress-bar progress-bar-striped progress-xs bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>
												</div>

												<div class="m-b-20"></div>
												
												<p class="font-600 m-b-5">Task 5 <span class="text-warning pull-right"><b>68%</b></span></p>
												<div class="progress">
												<div class="progress-bar progress-bar-striped progress-xs bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="68"></div>
												</div>

												<div class="m-b-20"></div>
												
												<p class="font-600 m-b-5">Task 6 <span class="text-warning pull-right"><b>65%</b></span></p>
												<div class="progress">
												<div class="progress-bar progress-bar-striped progress-xs bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="65"></div>
												</div>	

												<div class="m-b-20"></div>
												
												<p class="font-600 m-b-5">Task 7 <span class="text-danger pull-right"><b>55%</b></span></p>
												<div class="progress">
												<div class="progress-bar progress-bar-striped progress-xs bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="55"></div>
												</div>	

												<div class="m-b-20"></div>
												
												<p class="font-600 m-b-5">Task 8 <span class="text-danger pull-right"><b>40%</b></span></p>
												<div class="progress">
												<div class="progress-bar progress-bar-striped progress-xs bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
												</div>									
											</div>
											<div class="card-footer small text-muted">Updated today at 11:59 PM</div>
										</div><!-- end card-->					
									</div>
							
							
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 d-none">						
										<div class="card mb-3">
											<div class="card-header">
												<h3><i class="fa fa-envelope-o"></i> Latest messages</h3>
												Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											</div>
												
											<div class="card-body">
												
												<div class="widget-messages nicescroll" style="height: 400px;">
																<a href="#">
																	<div class="message-item">
																		<div class="message-user-img"><img src="assets/images/avatars/avatar2.png" class="avatar-circle" alt=""></div>
																		<p class="message-item-user">John Doe</p>
																		<p class="message-item-msg">Hello. I want to buy your product</p>
																		<p class="message-item-date">11:50 PM</p>
																	</div>
																</a>
																<a href="#">
																	<div class="message-item">
																		<div class="message-user-img"><img src="assets/images/avatars/avatar5.png" class="avatar-circle" alt=""></div>
																		<p class="message-item-user">Ashton Cox</p>
																		<p class="message-item-msg">Great job for this task</p>
																		<p class="message-item-date">14:25 PM</p>
																	</div>
																</a>
																<a href="#">
																	<div class="message-item">
																		<div class="message-user-img"><img src="assets/images/avatars/avatar6.png" class="avatar-circle" alt=""></div>
																		<p class="message-item-user">Colleen Hurst</p>
																		<p class="message-item-msg">I have a new project for you</p>
																		<p class="message-item-date">13:20 PM</p>
																	</div>
																</a>
																<a href="#">
																	<div class="message-item">
																		<div class="message-user-img"><img src="assets/images/avatars/avatar10.png" class="avatar-circle" alt=""></div>
																		<p class="message-item-user">Fiona Green</p>
																		<p class="message-item-msg">Nice to meet you</p>
																		<p class="message-item-date">15:45 PM</p>
																	</div>
																</a>
																<a href="#">
																	<div class="message-item">
																		<div class="message-user-img"><img src="assets/images/avatars/avatar2.png" class="avatar-circle" alt=""></div>
																		<p class="message-item-user">Donna Snider</p>
																		<p class="message-item-msg">I have a new project for you</p>
																		<p class="message-item-date">15:45 AM</p>
																	</div>
																</a>
																<a href="#">
																	<div class="message-item">
																		<div class="message-user-img"><img src="assets/images/avatars/avatar5.png" class="avatar-circle" alt=""></div>
																		<p class="message-item-user">Garrett Winters</p>
																		<p class="message-item-msg">I have a new project for you</p>
																		<p class="message-item-date">15:45 AM</p>
																	</div>
																</a>
																<a href="#">
																	<div class="message-item">
																		<div class="message-user-img"><img src="assets/images/avatars/avatar6.png" class="avatar-circle" alt=""></div>
																		<p class="message-item-user">Herrod Chandler</p>
																		<p class="message-item-msg">Hello! I'm available for this job</p>
																		<p class="message-item-date">15:45 AM</p>
																	</div>
																</a>
																<a href="#">
																	<div class="message-item">
																		<div class="message-user-img"><img src="assets/images/avatars/avatar10.png" class="avatar-circle" alt=""></div>
																		<p class="message-item-user">Jena Gaines</p>
																		<p class="message-item-msg">I have a new project for you</p>
																		<p class="message-item-date">15:45 AM</p>
																	</div>
																</a>
																<a href="#">
																	<div class="message-item">
																		<div class="message-user-img"><img src="assets/images/avatars/avatar2.png" class="avatar-circle" alt=""></div>
																		<p class="message-item-user">Airi Satou</p>
																		<p class="message-item-msg">I have a new project for you</p>
																		<p class="message-item-date">15:45 AM</p>
																	</div>
																</a>
																<a href="#">
																	<div class="message-item">
																		<div class="message-user-img"><img src="assets/images/avatars/avatar10.png" class="avatar-circle" alt=""></div>
																		<p class="message-item-user">Brielle Williamson</p>
																		<p class="message-item-msg">I have a new project for you</p>
																		<p class="message-item-date">15:45 AM</p>
																	</div>
																</a>
															</div>
												
											</div>
											<div class="card-footer small text-muted">Updated today at 11:59 PM</div>
										</div><!-- end card-->					
									</div>
									
							</div>			



            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
    
	<footer class="footer">
		<span class="text-right">
		Copyright <a target="_blank" href="#">Your Website</a>
		</span>
		<span class="float-right">
		Powered by <a target="_blank" href="https://www.adsgrill.com"><b>Adsgrill</b></a>
		</span>
	</footer>

</div>
<!-- END main -->
 <?php include('include/footer.php'); ?>