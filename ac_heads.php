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

													<h1 class="main-title float-left">Dashboard</h1>

													<ol class="breadcrumb float-right">

														<li class="breadcrumb-item">Home</li>

														<li class="breadcrumb-item active">Account Head</li>

													</ol>

													<div class="clearfix"></div>

											</div>

									</div>

						</div>

						<!-- end row -->

							<div class="row">
                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">					

										<div class="card mb-3">
											<div class="card-header">
												<?php if(isset($_GET['act'])){
															$act=$_GET['act'];
															if($act=='del'){
																$pid=$_GET['pid'];
																$st=$_GET['st'];
																if(isset($_GET['st']))
																$queryu ="update ac_heads set status='$st' where id = '$pid'";
																else
																$queryu ="delete FROM ac_heads where id = '$pid'";

																$result = $db->query($queryu); echo"Updated.";
															}
													}
												?>
											<a href="new_achead.php"><h3><i class="fa fa-plus"></i> Add Account Head</h3></a>	 
                                         	<div class="card-body">
                                             	<table id="example1" class="table table-bordered table-responsive-xl table-hover display">
													<thead>
                                                        	<tr>
															<th>SR.</th>
															<th>Chart of Account Name</th>
                                                            <th>Action</th>
                                                         	</tr>
													</thead> 

													<tbody> 

														<?php 		 
														
														$queryu ="SELECT * FROM ac_heads order by ac_name asc";
														$result = $db->query($queryu);
															$i=1;
															while($row=mysqli_fetch_array($result)) 	{
                                                              	?>

													 	<tr>

															<td><b><?php echo $i++; ?></b></td><td>  <?php echo  $row['ac_name']; ?></td>
															<td>
															<!--<?php if($row['status']=='0') { ?><a href="?act=del&pid=<?php echo  $row['id'];?>&st=1">Deactive</a>
																<?php } else { ?>
															<a href="?act=del&pid=<?php echo  $row['id'];?>&st=0">Active</a>
															<?php } ?>
															<br/>-->
															<a href="?act=del&pid=<?php echo  $row['id'];?>" onclick="return confirm('Are you sure want to delete?')">Delete</a>
															<br/>	<br/>
															<a href="new_achead.php?act=edit&pid=<?php echo  $row['id'];?>">Edit</a>
														</td>
                                                             
														</tr>



														<?php } ?>

														 

													</tbody>

												</table>

												

											</div>														

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