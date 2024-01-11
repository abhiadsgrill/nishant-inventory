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
							<h3 class="main-title float-left">Stock List</h3>
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

					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-default" id="nilgiri">
							<!--<a href="#" class="tablinks" onclick="openCity(event, 'nilgiri')">-->
							<h3 class="text-white text-uppercase m-b-20">nilgiri</h3>
							<h6 class="m-b-20 text-white counter" id="nilgiri_count">10</h6>
							<!--</a>-->
						</div>
					</div>

					<!--<a href="#" class="tablinks" onclick="openCity(event, 'bamboo')">-->
					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-warning" id="bamboo">
							<!--<a href="#" class="tablinks" onclick="openCity(event, 'bamboo')">-->
							<h3 class="text-white text-uppercase m-b-20">bamboo</h3>
							<h6 class="m-b-20 text-white counter" id="bamboo_count">0</h6>
							<!--</a>-->
						</div>
					</div>
					<!--</a>-->

					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<!--<a href="#" class="tablinks" onclick="openCity(event, 'plywood')">-->
						<div class="card-box noradius noborder bg-info" id="plywood">
							<h3 class="text-white text-uppercase m-b-20">plywood</h3>
							<h6 class="m-b-20 text-white counter" id="plywood_count">0</h6>
						</div>
						<!--</a>-->
					</div>


					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<!--<a href="#" class="tablinks" onclick="openCity(event, 'plywood')">-->
						<div class="card-box noradius noborder bg-info" id="wood">
							<h3 class="text-white text-uppercase m-b-20">wood</h3>
							<h6 class="m-b-20 text-white counter" id="wood_count">0</h6>
						</div>
						<!--</a>-->
					</div>



				</div>
				<!-- end row -->


				<!--nilgiri-->

				<div id="nilgiri3" class="tabcontent nilgiri">
					<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-table"></i> nilgiri List</h3>
									<!--DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table: pagination, instant search and multi-column ordering. <a target="_blank" href="https://datatables.net/">(more details)</a>-->
								</div>

								<div class="card-body">
									<div class="table-responsive">
										<!-- SHOWING DATA IN TABLE -->
										<table id="example1" class="table table-bordered table-responsive-xl table-hover display">

											<thead>
												<tr>
													<th scope="col">Sr no</th>
													<th scope="col">Category</th>
													<th scope="col"> Type</th>
													<th scope="col"> Subtype</th>
													<th scope="col">MT</th>
													<th scope="col">MW</th>
													<th scope="col">ML</th>
													<!--<th scope="col">Meserment Type</th>-->
													<th scope="col">cbt</th>
													<th scope="col">cmt</th>
													<th scope="col">qty</th>
													<th scope="col">Action</th>
												</tr>
											</thead>

											<?php
											$queryu = "SELECT products.*,subtype.subtype_name,ptype.ptname,category.catname, products.id as pb_id FROM products INNER JOIN ptype ON products.type = ptype.id INNER JOIN subtype ON subtype.id = products.subtype 
                            INNER JOIN category ON products.cat_id = category.id where cat_id = '1'  order by products.id desc;";
											$result = $db->query($queryu);
											$nilgiri_count = mysqli_num_rows($result);

											echo "
                                                <script>
                                                    document.getElementById('nilgiri_count').innerText = " . $nilgiri_count . ";
                                                </script>
                                            ";

											$i = 1;
											while ($row = mysqli_fetch_array($result)) {
												$nnn = $row['cmt'];
												$cmt = number_format((float)$nnn, 2, '.', '');
											?>

												<tr>
													<td><?php echo ++$i; ?></td>
													<td><?php echo $row['catname']; ?></td>
													<td><?php echo $row['ptname']; ?></td>
													<td><?php echo $row['subtype_name']; ?></td>
													<td><?php echo $row['mt']; ?></td>
													<td><?php echo $row['mw']; ?></td>
													<td><?php echo $row['ml']; ?></td>
													<!--<td><?php echo $row['cat_id']; ?></td>-->
													<td><?php echo number_format((float)$row['cbt'], 2, '.', ''); ?></td>
													<td><?php echo $cmt ?></td>
													<td><?php echo $row['qty']; ?></td>
													<?php

													echo '
														<td>
														<button class="btn btn-primary">
															<a href="update-stock.php?id=' . $row["pb_id"] . '" class="text-white">
																
															Update
															</a> 
														</button>
														<button class="btn btn-danger">
															<a href="delete-stock.php?id=' . $row["pb_id"] . '" class="text-white">
																Delete
															</a> 
														</button></td>
														';
													?>

												</tr>

											<?php } ?>

										</table>
									</div>
								</div>
							</div><!-- end card-->
						</div>
					</div>
				</div>


				<!--bamboo-->

				<div id="bamboo2" class="tabcontent bamboo">
					<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-table"></i> bamboo Stock List</h3>
									<!--DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table: pagination, instant search and multi-column ordering. <a target="_blank" href="https://datatables.net/">(more details)</a>-->
								</div>

								<div class="card-body">
									<div class="table-responsive">
										<!-- SHOWING DATA IN TABLE -->
										<table id="example1" class="table table-bordered table-responsive-xl table-hover display">

											<thead>
												<tr>
													<th scope="col">Sr no</th>
													<th scope="col">Category</th>
													<th scope="col"> Type</th>
													<th scope="col"> Subtype</th>
													<th scope="col">W(ft)</th>
													<th scope="col">L(ft)</th>
													<th scope="col">T(mm)</th>
													<!--<th scope="col">Meserment Type</th>-->
													<th scope="col">SQFT</th>
													<th scope="col">SQMT</th>
													<th scope="col">qty</th>
													<th scope="col">Action</th>
												</tr>
											</thead>

											<?php

											$queryu = "SELECT products.*,subtype.subtype_name,ptype.ptname,category.catname , products.id as pb_id  FROM products INNER JOIN ptype ON products.type = ptype.id INNER JOIN subtype ON subtype.id = products.subtype INNER JOIN category ON products.cat_id = category.id where cat_id = '2'  order by products.id desc;";
											$result = $db->query($queryu);

											$bamboo_count = mysqli_num_rows($result);

											echo "
                                                <script>
                                                    document.getElementById('bamboo_count').innerText = " . $bamboo_count . ";
                                                </script>
                                            ";


											$i = 1;
											while ($row = mysqli_fetch_array($result)) {
											?>

												<tr>
													<td><?php echo ++$i; ?></td>
													<td><?php echo $row['catname']; ?></td>
													<td><?php echo $row['ptname']; ?></td>
													<td><?php echo $row['subtype_name']; ?></td>
													<td><?php echo $row['mt']; ?></td>
													<td><?php echo $row['mw']; ?></td>
													<td><?php echo $row['ml']; ?></td>
													<!--<td><?php echo $row['cat_id']; ?></td>-->
													<td><?php echo number_format((float)$row['cbt'], 2, '.', ''); ?></td>
													<td><?php echo number_format((float)$row['cmt'], 2, '.', ''); ?></td>
													<td><?php echo $row['qty']; ?></td>
													
														<?php

														echo '
														<td>
														<button class="btn btn-primary">
														<a href="update-stock.php?id=' . $row["pb_id"] . '" class="text-white">

														Update
														</a> 
														</button>
														<button class="btn btn-danger">
														<a href="delete-stock.php?id=' . $row["pb_id"] . '" class="text-white">
														Delete
														</a> 
														</button></td>
														';
														?>

												</tr>

											<?php } ?>

										</table>
									</div>

								</div>
							</div><!-- end card-->
						</div>
					</div>
				</div>


				<!--plywood-->

				<div id="plywood1" class="tabcontent plywood">
					<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-table"></i> Plywood Stock List</h3>
									<!--DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table: pagination, instant search and multi-column ordering. <a target="_blank" href="https://datatables.net/">(more details)</a>-->
								</div>

								<div class="card-body">
									<div class="table-responsive">
										<!-- SHOWING DATA IN TABLE -->
										<table id="example1" class="table table-bordered table-responsive-xl table-hover display">

											<thead>
												<tr>
													<th scope="col">Sr no</th>
													<th scope="col">Category</th>
													<th scope="col"> Type</th>
													<th scope="col"> Subtype</th>
													<th scope="col">W(ft)</th>
													<th scope="col">L(ft)</th>
													<th scope="col">T(mm)</th>
													<!--<th scope="col">Meserment Type</th>-->
													<th scope="col">SQFT</th>
													<th scope="col">SQMT</th>
													<th scope="col">qty</th>
													<th scope="col">Action</th>
												</tr>
											</thead>

											<?php

											$queryu = "SELECT products.*,subtype.subtype_name,ptype.ptname,category.catname, products.id as pb_id FROM products INNER JOIN ptype ON products.type = ptype.id INNER JOIN subtype ON subtype.id = products.subtype INNER JOIN category ON products.cat_id = category.id where cat_id = '3'  order by products.id desc;";
											$result = $db->query($queryu);

											$plywood_count = mysqli_num_rows($result);

											echo "
                                                <script>
                                                    document.getElementById('plywood_count').innerText = " . $plywood_count . ";
                                                </script>
                                            ";


											$i = 1;
											while ($row = mysqli_fetch_array($result)) {
											?>

												<tr>
													<td><?php echo ++$i; ?></td>
													<td><?php echo $row['catname']; ?></td>
													<td><?php echo $row['ptname']; ?></td>
													<td><?php echo $row['subtype_name']; ?></td>
													<td><?php echo $row['mt']; ?></td>
													<td><?php echo $row['mw']; ?></td>
													<td><?php echo $row['ml']; ?></td>
													<!--<td><?php echo $row['cat_id']; ?></td>-->
													<td><?php echo number_format((float)$row['cbt'], 2, '.', ''); ?></td>
													<td><?php echo number_format((float)$row['cmt'], 2, '.', ''); ?></td>
													<td><?php echo $row['qty']; ?></td>
													<?php

echo '
<td>
<button class="btn btn-primary">
	<a href="update-stock.php?id='.$row["pb_id"].'" class="text-white">
		
	Update
	</a> 
</button>
<button class="btn btn-danger">
	<a href="delete-stock.php?id='.$row["pb_id"].'" class="text-white">
		Delete
	</a> 
</button></td>
';
?>

												</tr>

											<?php } ?>

										</table>
									</div>

								</div>
							</div><!-- end card-->
						</div>
					</div>
				</div>


				<!--plywood-->

				<div id="wood1" class="tabcontent wood">
					<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-table"></i> wood Stock List</h3>
									<!--DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table: pagination, instant search and multi-column ordering. <a target="_blank" href="https://datatables.net/">(more details)</a>-->
								</div>

								<div class="card-body">
									<div class="table-responsive">
										<!-- SHOWING DATA IN TABLE -->
										<table id="example1" class="table table-bordered table-responsive-xl table-hover display">

											<thead>
												<tr>
													<th scope="col">Sr no</th>
													<th scope="col">Category</th>
													<th scope="col"> Type</th>
													<th scope="col"> Subtype</th>
													<th scope="col">W(ft)</th>
													<th scope="col">L(ft)</th>
													<th scope="col">T(mm)</th>
													<!--<th scope="col">Meserment Type</th>-->
													<th scope="col">SQFT</th>
													<th scope="col">SQMT</th>
													<th scope="col">qty</th>
													<th scope="col">Action</th>
												</tr>
											</thead>

											<?php

											$queryu = "SELECT products.*,subtype.subtype_name,ptype.ptname,category.catname, products.id as pb_id FROM products INNER JOIN ptype ON products.type = ptype.id INNER JOIN subtype ON subtype.id = products.subtype INNER JOIN category ON products.cat_id = category.id where cat_id = '4'  order by products.id desc;";
											$result = $db->query($queryu);

											$wood_count = mysqli_num_rows($result);

											echo "
                                                <script>
                                                    document.getElementById('wood_count').innerText = " . $wood_count . ";
                                                </script>
                                            ";


											$i = 1;
											while ($row = mysqli_fetch_array($result)) {
											?>

												<tr>
													<td><?php echo ++$i; ?></td>
													<td><?php echo $row['catname']; ?></td>
													<td><?php echo $row['ptname']; ?></td>
													<td><?php echo $row['subtype_name']; ?></td>
													<td><?php echo $row['mt']; ?></td>
													<td><?php echo $row['mw']; ?></td>
													<td><?php echo $row['ml']; ?></td>
													<!--<td><?php echo $row['cat_id']; ?></td>-->
													<td><?php echo number_format((float)$row['cbt'], 2, '.', ''); ?></td>
													<td><?php echo number_format((float)$row['cmt'], 2, '.', ''); ?></td>
													<td><?php echo $row['qty']; ?></td>
													<?php

echo '
<td>
<button class="btn btn-primary">
	<a href="update-stock.php?id='.$row["pb_id"].'" class="text-white">
		
	Update
	</a> 
</button>
<button class="btn btn-danger">
	<a href="delete-stock.php?id='.$row["pb_id"].'" class="text-white">
		Delete
	</a> 
</button></td>
';
?>

												</tr>

											<?php } ?>

										</table>
									</div>

								</div>
							</div><!-- end card-->
						</div>
					</div>
				</div>






			</div>
		</div>
		<!-- END content -->

	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<script>
		$(document).ready(function() {

			$(".nilgiri").show();
			$(".bamboo").hide();
			$(".plywood").hide();
			$(".wood").hide();

			$("#nilgiri").click(function() {
				console.log("nilgiri clicked");
				$(".nilgiri").show();
				$(".bamboo").hide();
				$(".plywood").hide();
				$(".wood").hide();
			});
			$("#bamboo").click(function() {
				console.log("bamboo clicked");
				$(".bamboo").show();
				$(".nilgiri").hide();
				$(".plywood").hide();
				$(".wood").hide();
			});

			$("#plywood").click(function() {
				console.log("plywood clicked");
				$(".plywood").show();
				$(".bamboo").hide();
				$(".nilgiri").hide();
				$(".wood").hide();
			});


			$("#wood").click(function() {
				console.log("plywood clicked");
				$(".wood").show();
				$(".bamboo").hide();
				$(".nilgiri").hide();
				$(".plywood").hide();
			});
		});
	</script>


	<?php include('include/footer.php'); ?>