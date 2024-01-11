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
										<h3 class="main-title float-left">Sales Report</h3>
										<ol class="breadcrumb float-right">
											<li class="breadcrumb-item">Sales Stock</li>
											<li class="breadcrumb-item active">Sales Report/li>
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
                                <th scope="col">Date</th>
                                <th scope="col">   Inv No.</th>
                                 <th scope="col">   Party Name</th>
                                <th scope="col">Cash Amount</th>
                                 <th scope="col">Cheque Amount</th>
                                <th scope="col">Actions</th>
                                 
                            </tr>
                        </thead>
 
                        	<?php
							$queryu ="SELECT products_sale.*,subtype.subtype_name,ptype.ptname,category.catname FROM products_sale INNER JOIN ptype ON products_sale.type = ptype.id INNER JOIN subtype ON subtype.id = products_sale.subtype 
							INNER JOIN category ON products_sale.cat_id = category.id where meserment_type = '3'  order by products_sale.id desc;";
							$sale_report_query = "SELECT * FROM sale ORDER BY inv_no  DESC  ";
							$sale_query_result = $db->query($sale_report_query);
							$result = $db->query($queryu);
								$i=1;
								while($row=mysqli_fetch_array($sale_query_result))
								{

								    //$nnn = $row['cmt']; 
								   //$cmt = number_format($nnn, 2, '.', '');


								?>

							<tr>
							    <td><?php echo ++$i; ?></td>
								<td><?php echo $row['inv_date']; ?></td>
								<td><?php echo $row['inv_no']; ?></td>
								<td><?php echo $row['p_name']; ?></td>
								<td><?php echo $row['cash_amt']; ?></td>
								<td><?php echo $row['check_amt']; ?></td>
								<td><a href="sales-report-more.php?inv
								_no=<?php echo $row['inv_no'] ?>"><button class="btn btn-success">View More</button></a></td>
							</tr>

							<?php } ?>
               
                    </table>
					</div>
			 	</div>														
			</div><!-- end card-->					
						</div> 
				</div>
				</div>
				<!--ply-->
				
						<div id="ply2" class="tabcontent ply">
				<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-table"></i> PLy Stock List</h3>
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
                                <th scope="col">   Type</th>
                                 <th scope="col">   Subtype</th>
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
  	 
							$queryu ="SELECT products_sale.*,subtype.subtype_name,ptype.ptname,category.catname FROM products_sale INNER JOIN ptype ON products_sale.type = ptype.id INNER JOIN subtype ON subtype.id = products_sale.subtype INNER JOIN category ON products_sale.cat_id = category.id where meserment_type = '4'  order by products_sale.id desc;";
							$result = $db->query($queryu);
								$i=1;
								while($row=mysqli_fetch_array($result))
								{
								?>

							<tr>
							    <td><?php echo ++$i; ?></td>
								<td><?php echo $row['catname']; ?></td>
								<td><?php echo $row['ptname']; ?></td>
								<td><?php echo $row['subtype_name']; ?></td>
								<td><?php echo $row['mt']; ?></td>
								<td><?php echo $row['mw']; ?></td>
						     	<td><?php echo $row['ml']; ?></td>
								<!--<td><?php echo $row['meserment_type']; ?></td>-->
								<td><?php echo number_format($row['cbt'], 2, '.', '');?></td>
								<td><?php echo number_format($row['cmt'], 2, '.', '');?></td>
								<td><?php echo $row['qty']; ?></td>
								<td>Action</td>
							</tr>

							<?php } ?>
             
                    </table>
									</div>
									
								</div>														
							</div><!-- end card-->					
						</div> 
				</div>
				</div>
				
				<!--other-->
						<div id="other1" class="tabcontent other">
			         	<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-table"></i> Other List</h3>
									<!--DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table: pagination, instant search and multi-column ordering. <a target="_blank" href="https://datatables.net/">(more details)</a>-->
								</div>
									
								<div class="card-body">
									<div class="table-responsive">
									           <!-- SHOWING DATA IN TABLE -->
                    <table id="example1" class="table table-bordered table-responsive-xl table-hover display">
                    
                        <thead>
                            <tr>
                                <th scope="col">Sr no</th>
                                <th scope="col">other</th>
                                <th scope="col"> Category Type</th>
                                <th scope="col">MT</th>
                                 <th scope="col">MW</th>
                                <th scope="col">ML</th>
                         
                             
                              
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                  
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
    
    <!-- <script>
$(document).ready(function(){
    
        $(".wood").show();
       $(".other").hide();
       $(".ply").hide();
       
   $("#wood").click(function(){
    $(".wood").show();
     $(".other").hide();
       $(".ply").hide();
  });
  $("#ply").click(function(){
      $(".ply").show();
      $(".wood").hide();
       $(".other").hide();
  });
  
    $("#other").click(function(){
      $(".other").show();
      $(".wood").hide();
        $(".ply").hide();
  });
});
</script>
 
     -->
     <?php include('include/footer.php'); ?>
     
 