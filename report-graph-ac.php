<?php 
    include('include/config.php');    
  include('include/header.php');
   ?>

 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />  
    <link href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/fh-3.3.2/r-2.4.1/datatables.min.css" rel="stylesheet"/>
  
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

                                    <h1 class="main-title float-left">Report</h1>

                                    <ol class="breadcrumb float-right">

										<li class="breadcrumb-item">Home</li>

										<li class="breadcrumb-item active">  Report</li>

                                    </ol>

                                    <div class="clearfix"></div>

                            </div>

					</div>

			</div>

            

			<div class="row">

			

                    <div class="col-md-12">						

						<div class="card mb-3">

							<div class="card-header">

								<h3><i class="fa fa-hand-pointer-o"></i> Account Head based Report</h3>		
				

							</div>
 
							<div class="card-body">

     <form method="POST" name="filter2" action="" enctype="multipart/form-data">

        <div class="row">
        <div class="col-lg-3 col-md-3 col-12">

<label class="form-label btn btn-info form-control"><b>Select Account Head</b></label>
<select class="form-control" name="project_id">
<option value="">--Select Project--</option>
<?php
$queryus ="SELECT * FROM ac_heads order by ac_name asc";
$results = $db->query($queryus);
while($rows=mysqli_fetch_array($results))
{
?>
<option value="<?php echo $rows['id'];?>" <?php if($_POST['project_id']==$rows['id']) echo'selected'; ?>><?php echo $rows['ac_name']; ?></option>
<?php
}
?>
</select>
 </div>
    
<div class="col-lg-2 col-md-2 col-12">
<label class="form-label btn btn-info form-control"><b>Start Date</b></label>
<input type="date" name="s_date" value="<?php echo $_POST['s_date']; ?>" class="form-control"   > 
</div>


<div class="col-lg-2 col-md-2 col-12">
<label class="form-label btn btn-info form-control"><b>End Date</b></label>
<input type="date" name="end_date"   value="<?php echo $_POST['end_date']; ?>"  class="form-control"   > 
</div>
<div class="col-lg-1 col-md-1 col-12">
<button type="submit" name="filer" class="btn btn-info m-l-5">   Search   </button>
<br/><a href='report.php'>View All</a>
</div>
</div>
 </form>
 <hr style="color: black; border: 2px solid black"><br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>		
<div class="row"><div class="col-md-6">
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
</div><div class="col-md-6">
<canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
</div>
<div class="col-md-6">
<canvas id="myChart3" style="width:100%;max-width:600px"></canvas>
</div>
<?php
    if(isset($_POST['s_date'])) 
    {
        $msg = "Report Date From - ".$_POST['s_date']." to ". $_POST['end_date'];      
         if($_POST['project_id']!=''){
            $p_id=$_POST['project_id']; //project_id= ac_head
            $qry =" where date BETWEEN '".date("Y-m-d", strtotime($_POST['s_date']))."' and '".date("Y-m-d", strtotime($_POST['end_date']))."' and ac_head='$p_id' ";
            $qry2 =" and emp_payments.date BETWEEN '".date("Y-m-d", strtotime($_POST['s_date']))."' and '".date("Y-m-d", strtotime($_POST['end_date']))."' and ac_head='$p_id' ";
     
         } else {
            $qry =" where date BETWEEN '".date("Y-m-d", strtotime($_POST['s_date']))."' and '".date("Y-m-d", strtotime($_POST['end_date']))."'";
            $qry2 =" and emp_payments.date BETWEEN '".date("Y-m-d", strtotime($_POST['s_date']))."' and '".date("Y-m-d", strtotime($_POST['end_date']))."'";
     
         }
        } else { 
            $qry=""; $qry2="";
            $msg="Report of All Records";
        }

        


//total credid and debit records
echo'<p style="color:green"><b>'.$msg.'</b></p>';

//total credid and debit records
$queryu ="SELECT cd, sum(amount) as amount2 FROM `emp_payments` ".$qry." group by cd;";
$result = $db->query($queryu);
$i=1; $cr=0; $dt=0;
	while($row=mysqli_fetch_array($result))
	{
		if($row['cd']=='Credit') {
			$cr=$row['amount2']; 
		} else {
			$dt=$row['amount2']; 
		}
	}
	?>
<script>
var xValues = ["Credit", "Debit", "Diffrence"];
var yValues = [<?php echo $cr; ?>, <?php echo $dt; ?>, <?php echo $cr-$dt; ?>]; //[55, 49, 44, 24, 15];
var barColors = ["green", "orange", "blue"];

new Chart("myChart2", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total Credit & Debit Chart"
    }
  }
});
</script>		

<?php
$queryu ="SELECT p_type, sum(amount) as amount2, payment_type.payment_type_name as p_typee  FROM `emp_payments` LEFT JOIN payment_type ON  emp_payments.p_type= payment_type.id   where cd='Debit' ".$qry2." group by p_type";
$result = $db->query($queryu);
$i=1; $cr=0; $dt=0; 
//print_r($result); 
$keys=array(); $values=array();
	while($row=mysqli_fetch_array($result))
	{
	array_push($keys, $row['p_typee']);
	array_push($values, $row['amount2']);
	}
?>
	<script>
var xValues = <?php echo json_encode($keys); ?>;
var yValues = <?php echo json_encode($values); ?>;//[55, 49, 44, 24, 15];
var barColors = ["red", "green","blue","orange","brown", "orange", "cyan"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total Expending Amount"
    }
  }
});

new Chart("myChart3", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total Expending Amount"
    }
  }
});


</script>	




						</div>

                        <!-- end card-->					

                    </div>

 

			</div>



  </div>

			<!-- END container-fluid -->



		</div>

		<!-- END content -->



    </div>
        <?php include('include/footer.php'); ?>
<script  src="https://code.jquery.com/jquery-3.7.0.min.js" ></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/fh-3.3.2/r-2.4.1/datatables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
 
  <script> 
$(document).ready(function() {
let table = new DataTable("#example", {
  // ordering: false,
  fixedHeader: {
    header: true,
    footer: true,
  },
  dom: "lBfrtip",
  buttons: ["copy", "csv", "pdf"],
});
let table1 = new DataTable("#myTable1", {
  ordering: false,
  fixedHeader: {
    header: true,
    footer: true,
  },
  dom: "lBfrtip",
  buttons: ["copy", "csv", "pdf"],
});

} );
</script>
    
 
 
 
 




	 