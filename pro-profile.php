<?php include('include/config.php'); 
?>

<?php 
 
 if($_POST['admin_name'] !='')
 {
    //  $upnimg = $_FILES['pimg']['name'];
	//  $nimgtxt = mt_rand();
	//  $upimgname = $nimgtxt.$upnimg;
	//  $targetFilePath = "profile_img/".$nimgtxt.$_FILES['pimg']['name']; 
 /*
	 if(move_uploaded_file($_FILES['pimg']['tmp_name'],$targetFilePath))
	 {
		echo $qu="Update admins set admin_name='".addslashes($_POST['admin_name'])."',admin_email='".addslashes($_POST['admin_email'])."',admin_pass='".$_POST['admin_pass']."',pimg='".$upimgname."',
		admin_contact='".addslashes($_POST['admin_contact'])."',admin_country='".addslashes($_POST['admin_country'])."'
          where id='".$_SESSION['aid']."'";
			 $rs=$db->query($qu);
			 $error="Update Successfully !";
	 }
	 else
	 {*/
        $qu="Update admins set admin_name='".addslashes($_POST['admin_name'])."',admin_email='".addslashes($_POST['admin_email'])."',
        admin_pass='".$_POST['admin_pass']."',admin_contact='".addslashes($_POST['admin_contact'])."',admin_country='".addslashes($_POST['admin_country'])."'
          where admin_id='".$_SESSION['admin_id']."'";
			 $rs=$db->query($qu);
			 $error="Update Successfully !";
	// }
 }
   


//$error='';
$queryus = "SELECT * FROM admins where admin_id='".$_SESSION['admin_id']."'";
$results = $db->query($queryus);
$rows = mysqli_fetch_array($results);

?>


<?php include('include/header.php'); ?>

<div id="main"> 
 <?php include('include/nav.php'); ?> 
 
 <?php include('include/sidebar.php'); ?>

	<!-- top bar navigation -->
 

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
						<div class="row">
								<div class="col-xl-12">
										<div class="breadcrumb-holder">
												<h1 class="main-title float-left">My Profile</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Home</li>
													<li class="breadcrumb-item active">Profile</li>
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
												<h3><i class="fa fa-user"></i> Profile details</h3>								
											</div>
												<?php echo $error; ?>
											<div class="card-body"> 
 
												<form action=""  method="POST" enctype="multipart/form-data">
								
												<div class="row">	
												
												<div class="col-lg-9 col-xl-9">
													
													<div class="row">				
														<div class="col-lg-6">
														<div class="form-group">
														<label>Full name (required)</label>
														<input class="form-control" name="admin_name" type="text" value=" <?php echo $rows['admin_name']?>" required />
														</div>
														</div>

														<div class="col-lg-6">
														<div class="form-group">
														<label>Valid Email (required)</label>
														<input class="form-control" name="admin_email" type="email" value=" <?php echo $rows['admin_email']?>" required />
														</div>
														</div>  
													</div>

                                                    <div class="row">				
														<div class="col-lg-6">
														<div class="form-group">
														<label>Phone</label>
														<input class="form-control" name="admin_contact" type="text" value=" <?php echo $rows['admin_contact']?>" />
														</div>
														</div> 
                                                    
 				
														<div class="col-lg-6">
														<div class="form-group">
														<label>Country</label>
														<input class="form-control" name="admin_country" type="text"value=" <?php echo $rows['admin_country']?>" />
														</div>
														</div> 
                                                        </div>    
												 
													<div class="row">				
														<div class="col-lg-6">
														<div class="form-group">
														<label>Password (leave empty not to change)</label>
														<input class="form-control" name="password" type="password" value=" <?php echo $rows['admin_pass']?>" value="" />
														</div>
														</div>              			                                
														   
													</div>
													
													<div class="row">
														<div class="col-lg-12">
														<button type="submit" name="update" class="btn btn-primary">Edit profile</button>
														</div>
													</div>
												
												</div>
                                                </form>		
												
												
												<div class="col-lg-3 col-xl-3 border-left">
													<b>Latest activity</b>: Dec 06 2017, 22:23	
													<br />
													<b>Register date: </b>: Nov 24 2017, 20:32	
													<br />
													<b>Register IP: </b>: 123.456.789
													
													<div class="m-b-10"></div>
													
													<div id="avatar_image">
														<img alt="image" style="max-width:100px; height:auto;" src="assets/images/avatars/admin.png" />
														<br />
														<i class="fa fa-trash-o fa-fw"></i> <a class="delete_image" href="#">Remove avatar</a>
																	
													</div>  
													<div id="image_deleted_text"></div>  
													<div class="m-b-10"></div> 
													<div class="form-group">
													<label>Change avatar</label> 
													<input type="file" name="pimg" class="form-control">
													</div>
													
												</div>
												</div>								
												
												</form>										
												
								</div>	
								<!-- end card-body -->								
									
							</div>
							<!-- end card -->					

						</div>
						<!-- end col -->	
															
					</div>
					<!-- end row -->	


            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
  <?php include('include/footer.php'); ?>
 
	 