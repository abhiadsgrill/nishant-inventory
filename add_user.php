 
	<?php 
    include('include/config.php'); 
 

if (isset($_POST['submit'])){ 
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $address = $_POST['address']; 
    $qu = "Insert Into users (name, mobile, email, password, city,address) 
            Values('$name','$mobile','$email','$password','$city','$address')";
    $rs = $db->query($qu); 
      if($rs){
        echo "<script>alert('add successfully');
        window.location = 'add_user.php';
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
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">


			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">User</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Add User</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->
 
			
			<div class="row">
			
                    <div class="col-md-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Create user</h3>
								A simple demo form that uses most of supported Parsley elements to show how to bind, configure and validate them properly.
							</div>
								
							<div class="card-body">
																
										<form action="" method="POST" >

                                        <div class="row">				
											    <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="userName">User Name<span class="text-danger">*</span></label>
                                                        <input type="text" name="name"   placeholder="Enter user name" class="form-control" id="userName" required>
                                                     </div>
                                                 </div>
                                                    <div class="col-lg-6">
                                                      <div class="form-group">
                                                        <label for="emailAddress">Email address<span class="text-danger">*</span></label>
                                                        <input type="email" name="email"   placeholder="Enter email" class="form-control" id="emailAddress" required>
                                                     </div>
                                                    </div>
                                         </div>
                                         <div class="row">				
											    <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="Phone">Phone<span class="text-danger">*</span></label>
                                                        <input type="text" name="mobile"    placeholder="Enter phone number" class="form-control" id="userName" required>
                                                     </div>
                                                 </div>
                                                    <div class="col-lg-6">
                                                      <div class="form-group">
                                                        <label for="Password">Password<span class="text-danger">*</span></label>
                                                        <input type="password" name="password"    placeholder="Enter password" class="form-control" id="emailAddress" required>
                                                     </div>
                                                    </div>
                                         </div>
                                         <div class="row">				
											    <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="userName">City<span class="text-danger">*</span></label>
                                                        <input type="text" name="city"     placeholder="Enter your city" class="form-control" id="userName">
                                                     </div>
                                                 </div>
                                                    <div class="col-lg-6">
                                                      <div class="form-group">
                                                        <label for="Address"> Address<span class="text-danger">*</span></label>
                                                        <input type="text" name="address"   placeholder="Enter your address" class="form-control" id="emailAddress">
                                                     </div>
                                                    </div>
                                         </div>
                                                 

                                                    <div class="form-group text-right m-b-0">
                                                        <button class="btn btn-primary" type="submit" name="submit">
                                                           Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary m-l-5">
                                                            Cancel
                                                        </button>
                                                    </div>

                                        </form>
										
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
	 