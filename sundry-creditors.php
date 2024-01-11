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
										<h3 class="main-title float-left">Sundry Creditors</h3>
										<ol class="breadcrumb float-right">
											<li class="breadcrumb-item">Accounts</li>
											<li class="breadcrumb-item active">Sundry Creditors</li>
										</ol>
										<div class="clearfix"></div>
								</div>
						</div>
				</div>
				<!-- end row -->
				 	
				
                       <!--wood-->

				<div id="wood3" class="tabcontent wood">
				<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
							<div class="card mb-3">
								<!--
								<div class="card-header">
									<h3><i class="fa fa-table"></i> Wood List</h3>
									DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table: pagination, instant search and multi-column ordering. <a target="_blank" href="https://datatables.net/">(more details)</a>
										</div>

								-->
									
								<div class="card-body">
									<div class="table-responsive">
									           <!-- SHOWING DATA IN TABLE -->
                    <table id="example1" class="table table-bordered table-responsive-xl table-hover display">
                    
                        <thead>
                            <tr>
                                <th scope="col">Sr no</th>
                                <th scope="col">Party Name</th>
                                <th scope="col">   Inv No.</th>
                                <th scope="col">   Inv Date.</th>
                                <th scope="col">Cash Amount Due</th>
                                <th scope="col">Bill Amount Due</th>
                                <th scope="col">Due Days</th>
                                <th scope="col">Days Passed</th>
                                 
                            </tr>
                        </thead>
 
                        	<?php
							
							$creditors_report_query = "SELECT * FROM sale ORDER BY inv_date  DESC  ";
							$creditors_query_result = $db->query($creditors_report_query);
								$i=1;
								while($row=mysqli_fetch_array($creditors_query_result))
								{

								    //$nnn = $row['cmt']; 
								   //$cmt = number_format($nnn, 2, '.', '');
                                    $currentDate = new DateTime("now");
                                    $inv_date = new DateTime($row['inv_date']);
                                    $daysPassed = $inv_date->diff($currentDate)->days;


								?>

							<tr>
							    <td><?php echo ++$i; ?></td>
								<td><?php echo $row['p_name']; ?></td>
								<td><?php echo $row['inv_no']; ?></td>
								<td><?php echo $row['inv_date']; ?></td>
								<td><?php echo $row['cash_amt']; ?></td>
								<td><?php echo $row['check_amt']; ?></td>
								<td><?php echo $row['due_days']; ?></td>
								<td><?php echo $daysPassed ?></td>
                                
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
    
 
     -->
     <?php include('include/footer.php'); ?>
     
 