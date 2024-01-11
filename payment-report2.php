<?php 
    include('include/config.php'); 
    $idd= $_REQUEST['attandance'];
    if(isset($_POST['attandance'])) $idd=$_POST['attandance'];
    $queryu1 ="SELECT employes.*,teams.name as nn  FROM  employes LEFT JOIN teams ON  teams.id= employes.team_id where employes.id='$idd'";		
    $result1 = $db->query($queryu1);
    $row1=mysqli_fetch_array($result1);
  
  $queryu ="SELECT emp_payments.*, employes.name, employes.phone, pm_projects.project_name as project_name2, payment_type.payment_type_name as ptypee, teams.name as team_name, ac_heads.ac_name FROM emp_payments 
                                     LEFT JOIN pm_projects ON pm_projects.id = emp_payments.project_id
                                     LEFT JOIN employes ON employes.id = emp_payments.emp_id
                                     LEFT JOIN teams ON  teams.id= employes.team_id 
                                          LEFT JOIN payment_type ON  emp_payments.p_type= payment_type.id 
                                     LEFT JOIN ac_heads ON  emp_payments.ac_head_id= ac_heads.id 
                                     where emp_payments.amount > 0  and emp_payments.emp_id = 0";	
                                 
if(isset($_POST['search2'])){
    $queryu.= " and emp_payments.date BETWEEN '".date("Y-m-d", strtotime($_POST['fdate']))."' and '".date("Y-m-d", strtotime($_POST['tdate']))."'";
    $msg = "Report of date Range ".$_POST['fdate']." to ". $_POST['tdate'];
} else if(isset($_POST['filer'])){
    $dat = date('Y-m-d');
   // $datee = $_POST['date_wise'];
    $queryu.= " and emp_payments.date BETWEEN '".date("Y-m-d", strtotime($_POST['date_wise']))."' and '".$dat."' and emp_payments.ac_head_id='".$idd."'"; 
    $msg = "Report of date Range ".date("Y-m-d", strtotime($_POST['date_wise']))." to ". $dat;
} else {
    $queryu.= " and MONTH(emp_payments.date) = MONTH(CURRENT_DATE())";  //show this months records
    $msg = "Report of Current Month";
}

//echo $queryu;
$result = $db->query($queryu);
    
//echo"<br/><br/>".$queryu;
?>

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
                                    <h1 class="main-title float-left">
                                                                       
                                   Payments</h1>   
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">  Payments</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>           

			<div class="row">	
                    <div class="col-md-12">	
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Payments</h3>		
							</div>
							<div class="card-body">

<form method="POST" name=" " action="">
<div class="row">
<div class="col-lg-4 col-md-4 col-12">
<label class="form-label btn btn-info form-control"><b>Select Account Head</b></label>
<select class="form-control" name="attandance">
<option value="">--Select Account Head--</option>
<?php
$queryus ="SELECT id, ac_name FROM ac_heads where status='0' order by ac_name asc";
$results = $db->query($queryus);
while($rows=mysqli_fetch_array($results))
{
?>
<option value="<?php echo $rows['id']; ?>" <?php if($rows['id']== $idd) echo"selected"; ?>><?php echo $rows['ac_name']; ?></option>
<?php
}
?>
</select>
</div>

<div class="col-lg-4 col-md-4 col-12">
<label class="form-label btn btn-info form-control"><b>View</b></label>
<select class="form-control" name="date_wise">
<option value="">--Select Date--</option>
<option value="<?php echo date('Y-m-d', strtotime('-1 days'))?>">Last days</option>
<option value="<?php echo date('Y-m-d', strtotime('-7 days')) ?>">last Week</option>
<option value="<?php echo date('Y-m-d', strtotime('-30 days')) ?>">This Month</option> 
</select>
</div>
<div class="col-lg-1 col-md-1 col-12">
<button type="submit" name="filer" class="btn btn-info m-l-5">   Search   </button>
</div>
</div>
 </form>

 

 <div class="col-12 mt-3">
<form method="POST" action="" enctype="multipart/form-data">
<div class="row">
<input type="hidden" value="<?php echo $idd ?>" name="attandance">
<div class="col-lg-3 col-md-2 col-12">
<label class="form-label btn btn-info form-control"> First Date </label>
<input type="date" name="fdate" value="<?php echo $_POST['fdate']; ?>" class="form-control" required="">
</div>
<div class="col-lg-3 col-md-2 col-12">
   <label class="form-label btn btn-info form-control"> To Date </label>
<input type="date" name="tdate" value="<?php echo $_POST['tdate']; ?>" class="form-control" required="">
</div>
<div class="col-lg-1 col-md-2 col-12">
<button type="submit" class="btn btn-success btn-mt-20 btn-width-100" name="search2">Search</button>
</div>
</div>

 

 <hr style="color: black; border: 2px solid black"><br>
 <!--<h4><font color='green'><?= $msg?></font></h4>
<p>Name: <?php echo $row1['name'] ?><br/>
Phone: <?php echo $row1['phone'] ?> <br/>
Team: <?php echo $row1['nn'] ?> <br/>
Hour Rate: <?php echo $row1['salary'] ?> <br/>
Monthly: <?php echo $row1['emp_salary'] ?> </p>-->


                                        <form action="" method="POST" enctype="multipart/form-data" class="col-md-12">
                                        <div class="row">	
				                          <table id="example1" class="table table-bordered table-responsive-xl table-hover display">
													<thead>
														<tr>
															<th>Sr. No.</th>
                                                          <!--  <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Team</th>-->
													        <th>Amount</th>
															 <th>Purpose</th> 
															 <th>Type</th> 
                                                             <th>Chart of Payment</th>
                                                             <th>Account Head</th>
															 <th>Project name</th> 
															  <th>Date</th>
														 </tr>
													</thead> 
													<tbody> 
														<?php 
															$i=0; $credit=0; $debit=0;
															while($row=mysqli_fetch_array($result))
															{
															?> 
														<tr>
                                                            <td> <?php echo ++$i;?></td>     
															<!--<td> <?php echo $row['name'] ?> </td>
															<td> <?php echo $row['phone'] ?> </td>
                                                            <td> <?php echo $row['team_name'] ?> </td>-->
														 	<td class="text-success">₹ <?php echo $row['amount']; 
                                                            if($row['cd']=='Credit') { 
                                                                $credit=$credit+$row['amount'];
                                                            } else {
                                                                $debit=$debit+$row['amount'];
                                                                } ?>
                                                             <td> <?php echo $row['purpose'] ?></td>
                                                             <td class="<?php if($row['cd']=='Credit') echo'text-success'; else echo 'text-warning';?>"> <?php echo $row['cd'] ?></td>
                                                             <td> <?php echo $row['ptypee'] ?></td>
                                                             <td> <?php echo $row['ac_name'] ?> </td> 
                                                             <td> <?php echo $row['project_name2'] ?> </td>                                                              
                                                            <td> <?php echo $row['date'] ?> </td>
                                                           </tr>
														<?php } ?>
 				                                      </tbody>
												</table>
                       
                                                 </form>	
                                                 <p>Total Credit: ₹ <?php echo $credit?>, </p>
                                                 <p>Total Debit: ₹ <?php echo $debit?>, </p>
                                                 <h2>Total Amount (Credit-Debit): ₹ <?php echo $credit- $debit; ?></h2>
                                </div>	
						</div>
                        <!-- end card-->
                    </div>

			</div>
            </div>
			<!-- END container-fluid -->
		</div>
	<!-- END content -->
    </div>
	<!-- END content-page -->
    <?php include('include/footer.php'); ?>

	 