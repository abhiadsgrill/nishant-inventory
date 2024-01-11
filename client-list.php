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

														<li class="breadcrumb-item active">Vendor</li>

													</ol>

													<div class="clearfix"></div>

											</div>

									</div>

						</div>

						<!-- end row -->

							<div class="row">
							<?php if(isset($_GET['act'])){
															$act=$_GET['act'];
															if($act=='del'){
																$pid=$_GET['pid'];
																$st=$_GET['st'];
																if(isset($_GET['st']))
																$queryu ="update pm_clients set status='$st' where id = '$pid'";
																else 
																$queryu ="delete FROM pm_clients where id = '$pid'";
																
																$result = $db->query($queryu); echo"Updated.";
															}
													}
												?>
                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">	
										<div class="card mb-3">
											<div class="card-header">
											<a href="add-client.php"><h3><i class="fa fa-plus"></i> New Vendor</h3></a>	 
                                         	<div class="card-body">
                                             	<table id="example1" class="table table-bordered table-responsive-xl table-hover display">
													<thead>
                                                        	<tr>
                                                            <th>SR.</th>
															<th>Client Name</th>
                                                            <th>Phone</th>
                                                            <th>Email</th>
                                                            <th>GST No</th>
                                                            <th>City</th>
                                                            <th>Address</th>
															<th>Action</th>

                                                            <!--<th>Created Date</th>-->
                                                         	</tr>
													</thead> 
													<tbody> 
														<?php 		
														$queryu ="SELECT * FROM pm_clients order by id desc";
														$result = $db->query($queryu);
															$i=1;
															while($row=mysqli_fetch_array($result)) { 
                                                              ?>
													 	<tr>
															<td> <?php echo $i++; ?> </td>
                                                            <td>  <?php echo  $row['name']; ?></td>
                                                            <td>  <?php echo  $row['phone']; ?></td>
                                                            <td>  <?php echo  $row['email']; ?></td>
                                                            <td>  <?php echo  $row['gstno']; ?></td>
                                                            <td>  <?php echo  $row['city']; ?></td>
                                                            <td>  <?php echo  $row['address']; ?></td>     
															<td><?php if($row['status']=='0') { ?><a href="?act=del&pid=<?php echo  $row['id'];?>&st=1">Deactivate</a>
																<?php } else { ?>
															<a href="?act=del&pid=<?php echo  $row['id'];?>&st=0">Activate</a>
															<?php } ?><br/>
															<a href="?act=del&pid=<?php echo  $row['id'];?>" onclick="return confirm('Are you sure want to delete?')">Delete</a>
															<br/>
															<a href="add-client.php?act=edit&pid=<?php echo  $row['id'];?>">Edit</a>     
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