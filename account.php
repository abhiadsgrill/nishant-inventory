  
<?php 
  include('include/config.php');  
  if (isset($_POST['submit'])) { 
   
     $purpose = $_POST['purpose'];
     $amount = $_POST['amount'];
     $project_id = $_POST['project_id'];
     $emp_id = $_POST['emp_id'];
     $date = $_POST['date'];
     $cd = $_POST['cd'];
     $p_type = $_POST['p_type'];
     $post_by = $_SESSION['admin_id'];
     $ac_head_id=$_POST['ac_head_id'];
   
     $qu = "Insert Into emp_payments (emp_id, date,post_by,amount,project_id, purpose,cd,p_type, ac_head_id) 
      Values('$emp_id','$date','$post_by', '$amount','$project_id','$purpose','$cd','$p_type','$ac_head_id')";
      $rs = $db->query($qu); 
   
     if($rs){
     echo "<script>alert('added  Payment');

        window.location = 'account.php';

        </script>";
  }else{

     echo "<script>alert('Please Try Again');

         </script>";

    }
 
}
  ?>

<?php include('include/header.php'); ?>
 <div id="main"> 
 <?php include('include/nav.php'); ?> 
 <?php include('include/sidebar.php'); ?>
   <div class="content-page">
    <div class="content">
 	<div class="container-fluid">
 	<div class="row">

					<div class="col-xl-12">

							<div class="breadcrumb-holder">

                                    <h1 class="main-title float-left">Account</h1>

                                    <ol class="breadcrumb float-right">

										<li class="breadcrumb-item">Home</li>

										<li class="breadcrumb-item active">  Account Attendance</li>

                                    </ol>

                                    <div class="clearfix"></div>

                            </div>

					</div>

			</div>

           	<div class="row">
                     <div class="col-md-12">						

						<div class="card mb-3">

							<div class="card-header">

								<h3><i class="fa fa-hand-pointer-o"></i>   Account</h3>								

							</div>

						 	<div class="card-body">
						 	     	<form action="" method="POST" enctype="multipart/form-data">
                                         <div class="row">				
											  <!-- <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="project">project<span class="text-danger">*</span></label>
                                                <select class="form-control" name="project_id">

                                                    <option value="">--Select Project--</option>
                                                    
                                                    <?php
                                                    
                                                  /*  $queryus ="SELECT *FROM pm_projects";
                                                    
                                                    $results = $db->query($queryus);
                                                    
                                                    while($rows=mysqli_fetch_array($results))
                                                    
                                                    {
                                                    
                                                    ?>
                                                    
                                                    <option value="<?php echo $rows['id']; ?>"><?php echo $rows['project_name']; ?></option>
                                                    
                                                    <?php
                                                    
                                                    }
                                                    */
                                                    ?>
                                                    
                                                    </select>

                                                         </div>
                                                 </div>-->
                                                 <script>
                                                 function get_ac_chart(ac_head){
                                                  if(ac_head>=1){
                                                    $.ajax({
                                                          type:'POST',
                                                          url:'view_ac_chart_byhead.php',
                                                          data:'ac_head='+ac_head,
                                                          success:function(html){
                                                              $('#p_type').html(html);
                                                          }
                                                      }); 
                                                  }else{
                                                      $('#p_type').html('<option value="">Select Chart of Account</option>'); 
                                                  }

                                                 }
                                                 </script>
                                                 <div class="col-lg-6">
                                                    <div class="form-group">
                                                    <label for="project">Account Head<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="ac_head_id" onchange="get_ac_chart(this.value)">
                                                    <option value="">--Select Account Head--</option>                                              
                                                    <?php                                                    
                                                    $queryus ="SELECT * FROM ac_heads where status='0' order by ac_name asc";
                                                    $results = $db->query($queryus);
                                                    while($rows=mysqli_fetch_array($results))
                                                    {
                                                    ?>
                                                    <option value="<?php echo $rows['id']; ?>"><?php echo $rows['ac_name']; ?></option>                                                    
                                                    <?php                                                    
                                                    }                                                    
                                                    ?>
                                                    </select>
                                                    </div>
                                                 </div>
                                                 <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="userName">Chart of Accounts  <span class="text-danger">*</span></label>
                                                        <input type='hidden' value='0' name='emp_id' /> 
                                                        <select class="form-control" name="p_type" id="p_type">
                                                        <option value="">--Chart of Accounts --</option> 
                                                    </select>  
                                                       <!-- <select class="form-control" name="emp_id">

                                                    <option value="">--Select Employee--</option>
                                                    
                                                    <?php
                                                   /* 
                                                    $queryus ="SELECT * FROM employes where status='0'";
                                                    
                                                    $results = $db->query($queryus);
                                                    
                                                    while($rows=mysqli_fetch_array($results))
                                                    
                                                    {
                                                    
                                                    ?>
                                                    
                                                    <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                                                    
                                                    <?php
                                                    
                                                    }
                                                    */
                                                    ?>
                                                    
                                                    </select>    -->                                                 
                                                     </div>
                                                 </div>
                                                  <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="userName">Amount<span class="text-danger">*</span></label>
                                                        <input type="number" name="amount"  placeholder="Amount" class="form-control" id="userName">
                                                     </div>
                                                 </div>
                                                  <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="userName">Date<span class="text-danger">*</span></label>
                                                        <input type="date" name="date"  placeholder="date" class="form-control" id="userName">
                                                     </div>
                                                 </div>
                                                 
                                                   <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="userName">Payment Type<span class="text-danger">*</span></label>
                                                        <select class="form-control" name="cd" required>
                                                          <option value="">Select</option>
                                                            <option>Credit</option>
                                                            <option>Debit</option>                                                         
                                                        </select>
                                                     </div>
                                                 </div>
 
											     <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="userName">Remark<span class="text-danger">*</span></label>
                                                        <textarea name="purpose" data-parsley-trigger="change"  placeholder="Enter Remark" class="form-control" id="userName"></textarea>
                                                     </div>
                                                 </div>
                                                
 
                                                  <div class="form-group text-right m-b-0">
                                                        <input class="btn btn-primary" type="submit" value="submit" name="submit"/>
                                                        <button type="reset" class="btn btn-secondary m-l-5">
                                                            Cancel
                                                        </button>
                                                    </div>													

					    	</div>
                              </div>
                             	</div>
                            </form>
                                 </div>
                            
                            	 
                            		</div>

	                                          </div>

	<!-- END content-page -->

    <?php include('include/footer.php'); ?>

	 