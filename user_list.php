<?php
include('include/config.php'); ?>
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
										<h1 class="main-title float-left">Stock List</h1>
										<ol class="breadcrumb float-right">
											<li class="breadcrumb-item">Stock</li>
											<li class="breadcrumb-item active">Stock List/li>
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
									<h3><i class="fa fa-table"></i> Stock List</h3>
									<!--DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table: pagination, instant search and multi-column ordering. <a target="_blank" href="https://datatables.net/">(more details)</a>-->
								</div>
									
								<div class="card-body">
									<div class="table-responsive">
									           <!-- SHOWING DATA IN TABLE -->
                   						<table id="example1" class="table table-bordered table-responsive-xl table-hover display	">
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
									
								</div>														
							</div><!-- end card-->					
						</div> 
				</div>
 

            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
    
     <?php include('include/footer.php'); ?>